<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\Wechat\Message;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\User as WxUser;
use Overtrue\Wechat\QRCode;

use DB;
use App\User;

// use Overtrue\Wechat\Menu;

class WxController extends Controller
{
	public function __construct()
    {
        $this->middleware('verify', ['except' => 'index']);
    }
    // 
	public function index(){

		$server = new Server(env('WX_ID'),env('WX_TK'), env('WX_RA'));

		$server->on('event','subscribe',[$this,'guanzhu']);
		$server->on('event','unsubscribe',[$this,'quguan']);

		// this->setWechatMenu();

		return $server->serve();
	}

	public function guanzhu($event){
		//取出粉丝的个人信息
		$wxuser = new WxUser(env('WX_ID'),env('WX_SEC'));
		//获取用户openid
		$wu = $wxuser->get($event->FromUserName);
		//有记录，且状态为1
		$user = User::where('openid',$event->FromUserName)->first();

		if($user && $user->state == 1){
			return;
		}

		if($user && $user->state == 0){
			$user->state = 1;
		}

		//数据库没用户信息，之前没关注过
		if(!$user){
			//实例化user
			$user = new User();
			$user->openid = $event->FromUserName;
			$user->name = $wu->nickname;
			$user->subtime = date("Y-m-d H:i:s",time()+8*60*60);
			//获取最后一个uid
			//$last_id = DB::table('users')->orderBy('uid','desc')->first();
			$user->save();
			$arr = (int)$user->uid + 10000;
			$user->userid = $arr;

			//在判断，是否扫描的场景二维码
			if($event->EventKey){
				$puid = substr($event->EventKey,8);
				$row = User::find($puid);
				//分配代理关系
				$user->p1 = $row['uid'];
				$user->p2 = $row['p1'];
				$user->p3 = $row['p2'];
			}
		}

		$user->save();

		$this->qr($user->uid);

		$msg = '亲爱的'.$user->name."\n"
				.'恭喜您成为了我们第'.$user->uid.'个会员'
				.'你的id：'.$user->userid."\n"
				.'感谢你对微小茶事业的关注和支持!'."\n"
				.'今天是：'.date("Y-m-d").',祝你生活愉快~';

		return $msg;
	}

	public function quguan($event){
		$openid = $event->FromUserName;
		$user = User::where('openid',$openid)->first();

		if($user){
			$user->state=0;
			$user->save();
		}
	}

	protected function mkd(){
		$path = date('/Y/md');
		if(!is_dir(public_path().$path)){
			mkdir(public_path().$path,0777,true);
		}
		return $path;
	}

	public function qr($uid){
		//开始生成场景二维码
		$qrcode = new QRCode(env('WX_ID'),env('WX_SEC'));
		$result = $qrcode->forever($uid);
		$ticket = $result->ticket;

		//下载二维码
		$qr = public_path().$this->mkd().'/'.'qr_'.$uid.'.jpg';

		$qrcode->download($ticket,$qr);
	}

	public function object2array($object) {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
              $array[$key] = $value;
            }
        }else {
            $array = $object;
        }
        return $array;
    }

}
