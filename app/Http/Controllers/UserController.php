<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Overtrue\Wechat\Auth;

class UserController extends Controller
{
    public function login(Request $req){
    	if($req->session()->get('user')){
    		return redirect('/');
    	}
    	$auth = new Auth(env('WX_ID'),env('WX_SEC'));

    	$to = 'http://wxc123.tunnel.2bdata.com/login';
    	$user = $auth->authorize($to);
    	$req->session()->put('user',$user->all());

    	return back();
    }

    public function index(Request $req){
    	if(!$req->session()->get('user')){
    		return redirect('/login');
    	}

    	dd($req->session()->get('user'));
    }

    public function logout(Request $req){
    	$req->session()->forget('user');
    	echo "logout 0k";
    }
}
