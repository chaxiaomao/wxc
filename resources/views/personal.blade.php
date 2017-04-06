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
	.mui-content,.mui-grid-view.mui-grid-9{background-color:#fff;}
	.mui-bar-tab .mui-tab-item.mui-active{color:#e50112;}
	.mui-navigate-right:after, .mui-push-right:after{content: none !important}
	.mui-content > .mui-table-view:first-child{margin-top:0px;}

	#kefu{bottom: 60px;right: 10px;position: absolute;position: fixed;padding-right: 20px;max-width: 70px;}
	.mui-navigate-right img{float: left;width:72px;height: 72px;border-radius: 50%;}
	.mui-navigate-right .xinxi{float: left;height:72px;padding-left: 10px;}
	.xinxi p{margin-bottom: 5px;}
	.jiantou{float: right;height: 72px;line-height: 72px;}

	.mui-grid-view.mui-grid-9 .mui-table-view-cell{padding:0px;}
	.more{margin-top:10px;}
    .more span {display: inline-block;color: gray;float: right;}
	.mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body{color:gray;}
	.mui-table-view-cell > a:not(.mui-btn){color:gray;}
	.huiyuan{width:100%;height:40px;text-align:center;margin-top:10px;background-color:#FFF}
	.huiyuan a{color:gray;line-height:40px;padding:40px;}
	.mui-bar-tab ~ .mui-content {padding-bottom: 0px;}
    .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body {line-height:12px;font-size:12px;display: block;width: 100%;height: 15px;margin-top: 0px;text-overflow: ellipsis;color: gray;}
    .icon-chanpinxiangqingqianwang{color:gray;top:0px;font-size:12px;float: right;}
</style>
<body> 
	<div class="mhead">红茶只喝微小茶</div>
	<div id="genggai" class="mui-content">
        <div class="mui-row">
            <div class="mui-col-sm-11 mui-col-xs-12">
                <li class="mui-table-view-cell">
                    <a class="mui-navigate-right" href="{{url('personal/revise')}}">
                        <img src="{{$info['headimgurl']}}">
                        <div class="xinxi">
                            <p>会员号:{{$userid}}</p>
                            <p>会员昵称:{{$info['nickname']}}</p>
                            <p>推荐人:{{$p1_name}}</p>
                        </div>
                        <div class="jiantou"><span class="icon iconfont icon-chanpinxiangqingqianwang"></span></div>
                    </a>
                </li>
            </div>
        </div>
    </div>
    <div class="mui-content">  
<!--触发字符：mgrid-->  
        <ul class="mui-table-view mui-grid-view mui-grid-9">  
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="#">  
                    <span style="font-size:18px;color:#e50112;">0<span style="font-size:12px;">元</span></span>  
                    <div class="mspan mui-media-body">我的业绩</div>
                </a>
            </li>
           <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="#">  
                    <span class="icon iconfont icon-hexintuandui"></span>  
                    <div class="mspan mui-media-body">我的团队</div>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="#">  
                    <span class="icon iconfont icon-icon"></span>  
                    <div class="mui-media-body">现金管理</div>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="#">  
                    <span class="icon iconfont icon-qrcode-copy-copy"></span>  
                    <div class="mui-media-body">我的二维码</div>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="{{url("personal/myorders")}}">  
                    <span class="icon iconfont icon-wodedingdan"></span>  
                    <div class="mui-media-body">我的订单</div>
                </a>
            </li>
            <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                <a href="#">  
                    <span class="icon iconfont icon-tuiguangjilu-copy"></span>  
                    <div class="mui-media-body">产品推广</div>
                </a>
            </li>
        </ul>  
    </div>
    <div class="huiyuan">
        <a>未购买会员</a><span style="color:gray">|</span>
        <a>已购买会员</a>
    </div>
    <div class="more mui-content">
        <div class="mui-row">
            <div class="mui-col-sm-11 mui-col-xs-12">
                <li class="mui-table-view-cell">
                    <a>
                        我的会员
                        <span class="icon iconfont icon-chanpinxiangqingqianwang"></span>
                    </a>
                </li>
            </div>
        </div>
    </div>
    <div class="more mui-content">
        <div class="mui-row">
            <div class="mui-col-sm-11 mui-col-xs-12">
                <li class="mui-table-view-cell">
                    <a href="{{url('personal/myAddress')}}">
                        收货地址
                        <span class="icon iconfont icon-chanpinxiangqingqianwang"></span>
                    </a>
                </li>
            </div>
        </div>
    </div>
    <div class="more mui-content">
        <div class="mui-row">
            <div class="mui-col-sm-11 mui-col-xs-12">
                <li class="mui-table-view-cell">
                    <a>
                        我的消费额度 <span style="color:#e50112">0</span>
                    </a>
                </li>
            </div>
        </div>
    </div>
	<img id="kefu" src="/imgs/kf.png">
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
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">

</script>
</html>