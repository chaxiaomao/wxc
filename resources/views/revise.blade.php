<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>修改用户信息</title>
</head>
<link rel="stylesheet" type="text/css" href="/css/mui.css">
<link rel="stylesheet" href="/css/demo.css">
<link rel="stylesheet" href="/css/iconfont.css">
<style type="text/css">
@font-face {font-family: "iconfont";
          src: url('/fonts/iconfont.eot'); /* IE9*/
          src: url('/fonts/iconfont.eot#iefix') format('embedded-opentype'), /* IE6-IE8 */
          url('/fonts/iconfont.woff') format('woff'), /* chrome, firefox */
          url('/fonts/iconfont.ttf') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+*/
          url('/fonts/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
        }

        .iconfont {
          font-family:"iconfont" !important;
          font-size:18px;
          font-style:normal;
          -webkit-font-smoothing: antialiased;
          -webkit-text-stroke-width: 0.2px;
          -moz-osx-font-smoothing: grayscale;
        }
	*{padding:0px;margin:0px;}
	body{background-color: rgb(229,229,229);}
	a:link{text-decoration: none;}
	.ul li{list-style:none}
	.mul{background-color:#fff;color:#CCC;font-size:14px;font-family:"微软雅黑";}
	.mul li img{width:80px;height:80px;border-radius:50%;}
	.mul li{/*height:60px;*/padding:25px 40px 30px 25px;border-bottom:1px solid #eee;}
	.mul li:first-child{line-height:80px;padding:10px 40px 10px 25px}
	.mul li span:nth-child(2),.mul li img,.minput{float:right;}
	.minput{border:none;text-align:right;}
	.save{width: 90%;margin:0 auto;text-align: center;background-color: #e50112;border-radius: 5px;height: 50px;line-height: 50px;color:#fff;display: block;margin-bottom: 20px;border:none;font-size: 18px;position:relative;top:120px;}
</style>
<body>
	<ul class="mul">
    	<li>修改头像<img src="{{$info['headimgurl']}}"></li>
        <li><span>会员号</span><span>{{$userid}}</span></li>
        <li><span>修改昵称</span><input name="name" value="{{$username}}" class="minput"></input></li>
        <li><span>关注时间</span><span>{{$subtime}}</span></li>
    </ul>
    <button class="save" type="submit">保&nbsp;&nbsp;存</button>
	<nav class="mui-bar mui-bar-tab">
        <a class="mui-tab-item" id="page_index" data-index="0" href="{{url('/')}}">
            <span style="font-size:20px;position:relative;top:2px;" class="icon iconfont icon-shouye1" aria-hidden="true"></span><br>
            <span style="position:relative;bottom:2px;font-size:10px;" class="mui-tab-label">首页</span>
        </a>
        <a class="mui-tab-item" id="page_search" data-index="1" href="{{url('cart')}}">
            <span class="icon iconfont icon-gouwuche01"></span><br>
            <span style="font-size:10px;" class="mui-tab-label">购物车</span>
        </a>
        <a class="mui-tab-item mui-active" id="page_personal" data-index="2" href="#">
            <span class="icon iconfont icon-geren"></span><br>
            <span style="letter-spacing:-0.1em;font-size:10px;" class="mui-tab-label ">个人中心</span>
        </a>
    </nav>
</body>
</html>