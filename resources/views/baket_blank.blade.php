<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>微小茶</title>
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
	.mhead {font-weight:bold;letter-spacing:8px;height: 40px;background-color: rgb(244,244,244);color: #e50112;line-height: 40px;text-align: center;}
	.mstep {border-bottom: 1px solid #fff;height:38px;}
	.mstep img{width:100%;height:36px;}
	.mother{height: 140px;padding: 20px;}
	.father{padding-left:20px;}
	.sister{height: 100px; background-color: #fff;border-radius:10px;margin:0 auto;padding:5px;margin-bottom: 20px;position:relative;}
	.s_left,.s_right,.chacha{display: inline-block;}
	.sister img{width:90px;height:90px;}
	.s_left{float:left;}
	.s_right{float:left;line-height: 1.6;}
	.s_right p{font-size: 14px;}
	.chacha{width:18px;height: 18px;line-height: 18px; border-radius: 50%;color:#e50112; border:1px solid #e50112;right:5px;top:5px;position: absolute;}
	.bother{display: inline-block;float: right;position: relative;bottom:50px;right: 10px;}
	.sum{text-align: center;clear:both}
	.mui-numbox {height: 20px;border:none;background-color: rgba(0,0,0,0);}
    .mui-numbox .mui-numbox-btn-minus,.mui-numbox .mui-numbox-btn-plus{border-radius: 50% !important;}
    .mui-numbox .mui-numbox-btn-minus{left:10px;}
    .mui-numbox .mui-numbox-btn-plus{right:10px;}
   	.mui-numbox .mui-numbox-input, .mui-numbox .mui-input-numbox{border:1px solid #ccc !important;}
   	.mui-numbox [class*=numbox-btn]{width: 20px;color: #fff;background-color: #e50112;}
   	.btn {position: relative;top:20px;width: 360px;height: 60px;margin:0 auto;}
	.lbtn,.rbtn{position:absolute;display:inline-block;width:140px;height:40px;}
	.lbtn {left:20px;}
	.rbtn {right:20px;}
	.mui-bar-tab .mui-tab-item.mui-active{color:#e50112;}
	.mui-btn-negative, .mui-btn-danger, .mui-btn-red {border:1px solid #e50112;background-color:#e50112;}
	#kefu{bottom: 60px;right: 10px;position: absolute;position: fixed;padding-right: 20px;max-width: 70px;}
</style>
<body>
	<div class="mhead">红茶只喝微小茶</div>
	<div style="text-align:center;color:#ccc;height:400px;line-height:400px;font-size:20px;">你的购物车空空如也</div>
	<img id="kefu" src="/imgs/kf.png">
		<nav class="mui-bar mui-bar-tab">
            <a class="mui-tab-item" id="page_index" data-index="0" href="{{url('/')}}">
                <span style="font-size:20px;position:relative;top:2px;" class="icon iconfont icon-shouye1" aria-hidden="true"></span><br>
                <span style="position:relative;bottom:2px;font-size:10px;" class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item mui-active" id="page_search" data-index="1" href="#">
                <span class="icon iconfont icon-gouwuche01"></span><br>
                <span style="font-size:10px;" class="mui-tab-label">购物车</span>
            </a>
            <a class="mui-tab-item" id="page_personal" data-index="2" href="{{url('personal')}}">
                <span class="icon iconfont icon-geren"></span><br>
                <span style="letter-spacing:-0.1em;font-size:10px;" class="mui-tab-label ">个人中心</span>
            </a>
        </nav>
</body>
<script type="text/javascript">
</script>
</html>