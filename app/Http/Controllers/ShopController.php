<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;
use Overtrue\Wechat\Auth;

use DB;
use App\User;
use App\Order;
use App\Item;
use App\Fee;
use App\Address;

use Overtrue\Wechat\Payment;
use Overtrue\Wechat\Payment\Order as WxOrder;
use Overtrue\Wechat\Payment\Business;
use Overtrue\Wechat\Payment\UnifiedOrder;

class ShopController extends Controller
{

    public $gs = [
        1 => ['goods_id' => 1, 'goods_name' => '微小茶古树儒香红茶1(20包/箱)', 'price' => 0.1, 'goods_img' => '/imgs/g1.jpg', 'good_info_img' => '/imgs/good_info1.jpg'],
        2 => ['goods_id' => 2, 'goods_name' => '微小茶古树儒香红茶2(20包/箱)', 'price' => 0.2, 'goods_img' => '/imgs/g2.jpg', 'good_info_img' => '/imgs/good_info2.jpg'],
        3 => ['goods_id' => 3, 'goods_name' => '微小茶古树儒香红茶3(20包/箱)', 'price' => 0.3, 'goods_img' => '/imgs/g3.jpg', 'good_info_img' => '/imgs/good_info3.jpg'],
        4 => ['goods_id' => 4, 'goods_name' => '微小茶古树儒香红茶4(20包/箱)', 'price' => 0.4, 'goods_img' => '/imgs/g4.jpg', 'good_info_img' => '/imgs/good_info4.jpg'],
    ];

    public function __construct()
    {
        $this->middleware('verify', ['except' => 'index']);
    }

    //首页控制器,any请求
    public function index(Request $req)
    {
        if ($req->session()->get('user')) {
            return view('index', ['gs' => $this->gs]);
        }
        $auth = new Auth(env('WX_ID'), env('WX_SEC'));
        //$to = "http://www.wxcmob.com";
        $user = $auth->authorize();
        $req->session()->put('user', $user->all());
        return back();
    }

    //详情页面控制器url
    public function goods($gid)
    {
        $g = $this->gs[$gid];
        return view('goods', $g);
    }

    //购买url，重定向到cart控制器
    public function buy($gid)
    {
        $g = $this->gs[$gid];
        Cart::add($g['goods_id'], $g['goods_name'], $g['price'], 1, array('img' => $g['good_info_img']));
        return redirect('cart');
    }

    //购物车控制器cart
    public function cart()
    {
        $gs = Cart::getContent();
        $total = Cart::getTotal();
        if (Cart::isEmpty()) {
            return view('baket_blank');
        }
        return view('baket', ['gs' => $gs, 'total' => $total]);
    }

    //个人中心控制器url,get请求
    public function personal(Request $req)
    {
        if ($req->session()->get('user')) {

        }
        $info = $req->session()->get('user');
        $openid = $info['openid'];
        $userid = DB::table('users')->where('openid', $openid)->value('userid');
        $p1 = DB::table('users')->where('openid', $openid)->value('p1');
        $p1_name = DB::table('users')->where('uid', $p1)->value('name');
        return view('personal', ['info' => $info, 'userid' => $userid, 'p1_name' => $p1_name]);
    }

    //清除指定ID的商品，get请求
    public function cleanItem()
    {
        $gid = $_GET['gid'];
        Cart::remove($gid);
        $total = Cart::getTotal();
        echo $total;
    }

    //增加和减少某个ID的商品的数量并返回总金额，get请求
    public function playItem()
    {

        $gid = $_GET['gid'];
        $g = $this->gs[$gid];
        $gp = $_GET['u'];
        if ($gp == 0) {
            Cart::update($gid, array('quantity' => -1));
        } else {
            Cart::add($g['goods_id'], $g['goods_name'], $g['price'], 1, array('img' => $g['good_info_img']));
        }
        $total = Cart::getTotal();
        echo $total;
    }

    //购物车->结算，订单控制器url，传入参数
    public function done(Request $req)
    {

        $gs = Cart::getContent();
        $total = Cart::getTotal();

        $opid = $req->session()->get('user');
        $ads = DB::table('address')->where('openid', $opid['openid'])->where('invalid', 0)->get();

        //找出默认地址，invalid==1
        $mads = DB::table('address')->where('openid', $opid['openid'])->where('invalid', 0)->where('state', 1)->get();
        $arr2 = $this->object2array($mads);

        //如果没有默认地址，制作一个假的默认地址，传入姓名为空
        if (count($mads) == 0) {
            $arr2 = array((object)array('name' => ''));
        }

        $arr = array();

        for ($i = 0; $i < count($ads); $i++) {
            $arr[$i]["aid"] = $ads[$i]->aid;
            $arr[$i]["rec"] = $ads[$i]->name;
            $arr[$i]["city"] = $ads[$i]->city;
            $arr[$i]["dz"] = $ads[$i]->address;
            $arr[$i]["tel"] = $ads[$i]->tel;
            $arr[$i]["state"] = $ads[$i]->state;
        }
        //检验登录
        if (!session('user')) {
            return redirect('/');
        }

        return view('ordsn', ['gs' => $gs, 'total' => $total, 'ads' => $arr, 'mads' => $arr2]);
    }

    //增加地址控制器
    public function addAddress(Request $req)
    {
        $openid = $req->session()->get('user');
        //先判断如果地址state==1,则把之前的默认地址改为0,
        if ($req->state == 1) {
            DB::table('address')->where('openid', $openid['openid'])->where('invalid', 0)->where('state', 1)->update(['state' => 0]);
        }
        //aid不为0或者不为null时候，则为修改收货地址
        if (!empty($req->aid)) {
            DB::table('address')->where('aid', $req->aid)->update(['name' => $req->rec, 'city' => $req->city, 'address' => $req->dz, 'state' => $req->state, 'openid' => $openid['openid'], 'tel' => $req->tel]);
            exit;
        }
        //增加地址，返回aid
        $aid = DB::table('address')->insertGetId(['name' => $req->rec, 'city' => $req->city, 'address' => $req->dz, 'state' => $req->state, 'openid' => $openid['openid'], 'tel' => $req->tel]);
        echo $aid;
    }

    //订单表的【确认下单】控制器url,post表单数据
    public function pay(Request $req)
    {
        $uo = $req->session()->get('user');
        $order = new Order();
        $order->openid = $uo['openid'];
        $order->uid = DB::table('users')->where('openid', $uo['openid'])->value('uid');
        $order->ordsn = date('Ymd') . mt_rand(100000, 999999);
        $order->xm = $_POST['o_receiver'];
        $order->address = $_POST['o_dz'];
        $order->tel = $_POST['o_tel'];
        $order->momey = Cart::getTotal();
        $order->ordtime = date("Y-m-d H:i:s", time() + 8 * 60 * 60);
        $order->save();
        //开始写入订单对应的商品
        $gs = Cart::getContent();
        foreach ($gs as $g) {
            $item = new Item();
            $item->oid = $order->oid;
            $item->gid = $g['id'];
            $item->goods_name = $g['name'];
            $item->num = $g['quantity'];
            $item->price = $g['price'];
            $item->good_info_img = $g['attributes']['img'];
            $item->save();
        }
        //dd($gs);
        Cart::clear();
        //dd($this->WxPay($order->oid));
        return view('pay', ['order_money' => $order->momey, 'oid' => $order->oid, 'payconfig' => $this->WxPay($order->oid)]);
    }

    //微信支付回调url
    public function payok()
    {

        $order = Order::find(70);
        $order->ispay = 1;
        if (!$order) {
            return redirect('/');
        }

        //开始分钱，上级p1代理，上上级代理p2,上上上级代理p3
        $user = User::find($order->uid);
        $rate = [0.5, 0.25, 0.1];
        foreach ([$user->p1, $user->p2, $user->p3] as $k => $p) {
            //if($p == 0){
//				break;
//			}
            if ($p > 0) {
                $fee = new Fee();
                $fee->uid = $p;
                $fee->byid = $user->uid;
                $fee->oid = $order->oid;
                $fee->money = $order->momey * $rate[$k];
                $fee->save();
            }
        }

        return '购物成功';
    }

    public function WxPay($oid)
    {

        $order = Order::find($oid);

        //第一步:做一个交易对象 business
        $business = new Business(env('WX_ID'), env('WX_SEC'), env('MER_ID'), env('MER_SEC'));

        /**
         *第二步:做一个订单对象
         */
        $wxorder = new WxOrder();
        $wxorder->body = '微小茶商品';
        $wxorder->out_trade_no = $order->ordsn;
        $wxorder->total_fee = intval($order->momey * 100); //单位为"分",字符串类型
        $wxorder->openid = $order->openid;
        $wxorder->notify_url = "http://www.wxcmob.com/payok";

        /*
        *第三步:统一下单
        */
        $unifieOrder = new UnifiedOrder($business, $wxorder);
        /*
        *第四步:生成支付配置文件
        */
        $payment = new Payment($unifieOrder);
        //生成支付的JS对象
        return $payment->getConfig();
    }

    //修改用户信息rul,get请求
    public function revise(Request $req)
    {
        $info = $req->session()->get('user');
        $openid = $info['openid'];
        $username = DB::table('users')->where('openid', $openid)->value('name');
        $userid = DB::table('users')->where('openid', $openid)->value('userid');
        $subtime = DB::table('users')->where('openid', $openid)->value('subtime');
        return view('revise', ['info' => $info, 'username' => $username, 'userid' => $userid, 'subtime' => $subtime]);
    }

    //查询个人订单,get请求
    public function myorders(Request $req)
    {
        $info = $req->session()->get('user');
        $openid = $info['openid'];
        $uid = User::where('openid', $openid)->value('uid');
        //$uorders = Order::where([['uid','=',$uid],['invalid','=','0']])->get();
        $uorders = Order::where('uid', $uid)->where('invalid', 0)->get();
        $ayy = array();
        for ($i = 0; $i < count($uorders); $i++) {
            $ayy[$i]["oid"] = $i;
            $ayy[$i]["ordsn"] = $uorders[$i]->ordsn;
            $ayy[$i]["money"] = $uorders[$i]->momey;
            $ayy[$i]["ordtime"] = $uorders[$i]->ordtime;
            $oitem = Order::find($uorders[$i]->oid)->item;
            $ayy[$i]['img'] = $this->object2array($oitem);
        }
        //dd($ayy);
        //Cart::clear();
        return view('myorders', ['ordsns' => $ayy]);
    }

    //删除订单控制器，get请求
    public function deleteOrdsn()
    {
        $ordsn = $_GET['ordsn'];
        $dorder = Order::where('ordsn', $ordsn)->first();
        $dorder->invalid = 1;
        $dorder->save();
    }

    //个人地址地址控制器
    public function myAddress(Request $req)
    {
        $opid = $req->session()->get('user');
        $ads = DB::table('address')->where('openid', $opid['openid'])->where('invalid', 0)->where('state', 0)->get();
        //找出默认地址，invalid==1
        $mads = DB::table('address')->where('openid', $opid['openid'])->where('invalid', 0)->where('state', 1)->get();
        $arr2 = $this->object2array($mads);
        //如果没有默认地址，制作一个假的默认地址，传入姓名为空
        if (count($mads) == 0) {
            //$anull = new ObjStory();
            $arr2 = array((object)array('name' => ''));
        }
        $arr = array();
        for ($i = 0; $i < count($ads); $i++) {
            $arr[$i]["aid"] = $ads[$i]->aid;;
            $arr[$i]["rec"] = $ads[$i]->name;
            $arr[$i]["city"] = $ads[$i]->city;
            $arr[$i]["dz"] = $ads[$i]->address;
            $arr[$i]["tel"] = $ads[$i]->tel;
            $arr[$i]["state"] = $ads[$i]->state;
        }
        return view('myAddress', ['ads' => $arr, 'mads' => $arr2]);
    }

    //删除地址控制器，get控制器
    public function deleteAddress(Request $req)
    {
        DB::table('address')->where('aid', $req->aid)->update(['invalid' => 1]);
    }

    //对象转换数组方法
    function object2array($object)
    {
        $array = array();
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }
}
