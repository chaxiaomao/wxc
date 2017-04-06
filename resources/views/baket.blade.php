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
	<!-- <script type="text/javascript" src="/js/mui.js"></script> -->
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
	.mother{height: auto;padding: 20px;}
	.father{padding-left:20px;}
	.sister{height: 100px; background-color: #fff;border-radius:10px;margin:0 auto;padding:5px;margin-bottom: 20px;position:relative;}
	.s_left,.s_right,.chacha{display: inline-block;}
	.sister img{width:90px;height:90px;}
	.s_left{float:left;}
	.s_right{position:absolute;overflow: hidden;white-space: nowrap;left: 90px; line-height: 1.6;}
	.s_right p{font-size: 14px;}
	.chacha{width:18px;height: 18px;line-height: 18px; border-radius: 50%;color:#e50112; border:1px solid #e50112;right:5px;top:5px;position: absolute;}
	.bother{display: inline-block;float: right;position: absolute;top:70px;right: 10px;}
	.sum{text-align: center;clear:both}
	.mui-numbox {height: 20px;border:none;background-color: rgba(0,0,0,0);}
    .mui-numbox .mui-numbox-btn-minus,.mui-numbox .mui-numbox-btn-plus{border-radius: 50% !important;}
    .mui-numbox .mui-numbox-btn-minus{left:10px;}
    .mui-numbox .mui-numbox-btn-plus{right:10px;}
   	.mui-numbox .mui-numbox-input, .mui-numbox .mui-input-numbox{border:1px solid #ccc !important;}
   	.mui-numbox [class*=numbox-btn]{width: 20px;color: #fff;background-color: #e50112;}
   	.btn {position: relative;top:20px;width: 360px;height: 60px;margin:0 auto;}
	.lbtn,.rbtn{position:absolute;display:inline-block;width:40%;height:40px;}
	.lbtn {left:20px;}
	.rbtn {right:20px;}
	.mui-bar-tab .mui-tab-item.mui-active{color:#e50112;}
	.mui-btn-negative, .mui-btn-danger, .mui-btn-red {border:1px solid #e50112;background-color:#e50112;}
	#kefu{bottom: 60px;right: 10px;position: absolute;position: fixed;padding-right: 20px;max-width: 70px;}
	#you{z-index: 99;}
	#kong{display: none;}
</style>
<body>
	<div class="mhead">红茶只喝微小茶</div>
<div id="you">
	<div class="mstep">
		<img src="/imgs/l1.png">
	</div>
	<form action="{{url('done')}}" method="post">
	{{csrf_field()}}
	<div class="mother">
		@foreach($gs as $g)
		<div id="{{$g['id']}}_item" class="sister">
			<div class="s_left"><img src="{{$g['attributes']['img']}}"></div>
			<div class="s_right">
				<!-- <p>微小茶古树儒香红茶(20包/箱)</p> -->
				<p id="goods_name">{{$g['name']}}</p>
				<p>￥<input id="{{$g['id']}}_price" style="color:#e50112;border:none" value="{{$g['price']}}"></input></p>
			</div>
			<!-- <div class="chacha"></div> -->
			<button id="{{$g['id']}}_chacha" type="button" class="chacha">×</button>
			<div class="bother">
				<div id="{{$g['id']}}" class="mui-numbox">
				  <button class="mui-btn mui-numbox-btn-minus" type="button">-</button>
				  <input id="{{$g['id']}}inp" class="mui-numbox-input" type="number" value="{{$g['quantity']}}" />
				  <button class="mui-btn mui-numbox-btn-plus" type="button">+</button>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div style="padding-bottom:60px;">
		<p class="sum">商品总额:￥<span id="sum" style="color:#e50112;border:none;background:none;">{{$total}}</span></p>
		<div class="btn">
	        <a href="{{url('/')}}"><button type="button" class="lbtn mui-btn mui-btn-danger">继续逛逛</button></a>
	        <button type="submit" class="rbtn mui-btn mui-btn-danger">&nbsp;去结算&nbsp;</button>		
		</div>
	</div>
</div>
	<div id="kong" style="text-align:center;color:#ccc;height:400px;line-height:400px;font-size:20px;">你的购物车空空如也</div>
	</form>
	<img id="kefu" src="/imgs/kf.png">
		<nav class="mui-bar mui-bar-tab">
            <a class="mui-tab-item" id="page_index" href="{{url('/')}}">
                <span style="font-size:20px;position:relative;top:2px;" class="icon iconfont icon-shouye1" aria-hidden="true"></span><br>
                <span style="position:relative;bottom:2px;font-size:10px;" class="mui-tab-label">首页</span>
            </a>
            <a class="mui-tab-item mui-active" id="page_search" href="#">
                <span class="icon iconfont icon-gouwuche01"></span><br>
                <span style="font-size:10px;" class="mui-tab-label">购物车</span>
            </a>
            <a class="mui-tab-item" id="page_personal" href="{{url('personal')}}">
                <span class="icon iconfont icon-geren"></span><br>
                <span style="letter-spacing:-0.1em;font-size:10px;" class="mui-tab-label ">个人中心</span>
            </a>
        </nav>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<!-- <script type="text/javascript" src="/js/zepto.js"></script> -->
<script type="text/javascript">
	// var total = parseFloat($("#sum").val());
	// jq清真的绑定事件
	$(document).ready(function(){
	    //Add
	    $(".mui-numbox-btn-minus").click(function(e){
	        //Vars
	        var count = 1;
	        var newcount = 0;
	        //Wert holen + Rechnen
	        var elemID = $(this).parent().attr("id");
	        var countField = $("#"+elemID+'inp');
	        var count = $("#"+elemID+'inp').val();
	        var newcount = parseInt(count) - 1;
	        if(newcount < 1){
	        	$("#"+elemID+'inp').val(1);
	        	// $("#sum").html(data);
	        	return false;
	        }
	        $.ajax({
	        	type:'get',
	        	async:false,
	        	url:"{{url('playItem')}}",
	        	data:{gid:elemID,u:'0'},
	        	success:function(data){
	        		$("#sum").html(data);
	        	},
	        	error:function(xhr,state){

	        	}
	        });
	        //Neuen Wert setzen
	        $("#"+elemID+'inp').val(newcount);
	    });

	    $(".mui-numbox-btn-plus").click(function(e){
	        //Vars
	        var count = 1;
	        var newcount = 0;
	        //Wert holen + Rechnen
	        var elemID = $(this).parent().attr("id");
	        var countField = $("#"+elemID+'inp');
	        var count = $("#"+elemID+'inp').val();
	        var newcount = parseInt(count) + 1;
	        $.ajax({
	        	type:'get',
	        	async:false,
	        	url:"{{url('playItem')}}",
	        	data:{gid:elemID,u:'1'},
	        	success:function(data){
	        		$("#sum").html(data);
	        	},
	        	error:function(xhr,state){

	        	}
	        });
	        //Neuen Wert setzen
	        $("#"+elemID+'inp').val(newcount);
	    });

	    $(".chacha").click(function(e){
	    	var elemID = $(this).parent().attr("id");
	    	// var gval = $("#"+gid+'inp');
	    	var gid = elemID.slice(0,1);
	    	$.ajax({
				type:'get',
				async:false,
				url:"{{url('cleanItem')}}",
				data:{gid:gid},
				success:function(data){
					$('#'+elemID).hide();
					console.log(data);
					if(data == 0){
						$("#you").hide();
						$("#kong").show();
					}
					$("#sum").html(data);
				},
				error:function(xhr,state){
					alert("出错了,请稍后试试");
				}
			});
	    });
	});

</script>
</html>