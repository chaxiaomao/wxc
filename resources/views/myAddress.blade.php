<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>收货地址-微小茶</title>
</head>
<style type="text/css">
	*{padding:0px;margin:0px;font-size:14px;font-family: "微软雅黑";letter-spacing: 1px;}
	body{background-color: rgb(229,229,229);padding-bottom:40px;}
	.mheader{width:100%;text-align: center;height:50px;background-color: #e50112;line-height:50px;color:#fff;}
	.mhead {font-weight:bold;letter-spacing:8px;height: 40px;background-color: rgb(244,244,244);color: #e50112;line-height: 40px;text-align: center;}
	.warp{background-color: #fff;height: auto;margin-bottom: 10px;color:gray}
	/*ul li{height: }*/
	.content{height:100px;border-bottom: 1px solid rgb(229,229,229);margin:0 10px;}
	.content p{padding-top:10px;}
	.c_buttom{height: 40px;margin:0 10px;line-height: 40px;position: relative;}
	.minput{height: 24px;width:24px;position:relative; top:8px;}
	.c_buttom span{float: right;padding-right: 20px;}
	.c_buttom span img{width: 24px;height: 24px;vertical-align: middle;padding-right: 5px;}
	/*地址蒙城*/
	#address_mash{display: none;position: absolute;top:0;width:100%;background-color: #fff;height: 100%;}
	#adress p,input{font-size: 14px;color:gray;}
	.mk{height: 40px;border-bottom: 1px solid #ddd;background-color: #fff;padding:10px 40px 10px 5px;line-height: 40px;}
	.mk lable ,.mp{display: inline-block;color:gray;height: 40px;float: left;padding-right: 5px;}
	.mi{border:none;height:40px;outline:none;}
	.ms{color:#ccc;}
	.md{height: 40px;line-height: 40px;}
	.mo{width:20px;}
	.baocun{height: 100px;width:90%;margin:0 auto;margin-top: 40px;text-align: center;}
	.adda{height: 40px;width: 40%;color:#fff;background-color: #e50112;border-radius: 5px;display: inline-block;line-height: 40px;margin:10px;font-size: 14px;border:none;}
	
	/*城市选择窗口*/
	#pop-contants {position: absolute;left: 50%;top: 50%;width: 300px;height: 400px;z-index: 9999;margin-left: -150px;margin-top: -200px;box-shadow: 0 0 25px rgba(0, 0, 0, .3);background-color: #fff;display: none;}
	.p_address {width:280px;line-height: 50px; height: 52px;padding: 10px;border-bottom: 1px solid #DADADA;text-align: center;color: #FF8A43;overflow: hidden;text-overflow: ellipsis;word-break: keep-all;}
	.myscroller {height: 280px;width:300px; overflow: auto;-webkit-overflow-scrolling: touch;}
	.pans {width: 49%;display: inline-block;height: 45px; line-height: 45px; text-align: center;color: #FF8A43;}
	.li_address{color:gray;padding:10px;border-bottom: 1px solid #eee;}
</style>
<body>
	<div class="mheader">新增一个收获地址</div>
    
   <!-- 显示地址层-->
    <div id="index1" class="">
    	<div id="address_list">
    		<ul id="address_content">
            	@if($mads[0]->name == "")
                @else
                <li class="warp" id="ali_{{$mads[0]->aid}}">
                    <div class="content">
                        <p id="rec_{{$mads[0]->aid}}"><span>{{$mads[0]->name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span id="tel_{{$mads[0]->aid}}">{{$mads[0]->tel}}</span></p>
                        <p id="address_{{$mads[0]->aid}}">{{$mads[0]->address}}</p>
                    </div>
                    <div class="c_buttom">
                        <input id="minput_{{$mads[0]->aid}}" class="minput" checked="checked" type="radio" value="" name="moren"/>&nbsp;&nbsp;默认地址
                        <span id="del_{{$mads[0]->aid}}" class="shanchu" onClick="deleteAddress(this)"><img src="/imgs/cursh.png">删除</span>
                        <span id="xiugai_{{$mads[0]->aid}}" class="xiugai" onClick="editAddress(this)"><img src="/imgs/pen.png">修改</span>
                    </div>
                </li>
                @endif
    			@foreach($ads as $ads)
				<li class="warp" id="ali_{{$ads['aid']}}">
                    <div class="content">
                        <p><span id="rec_{{$ads['aid']}}">{{$ads['rec']}}</span>&nbsp;&nbsp;&nbsp;&nbsp;<span id="tel_{{$ads['aid']}}">{{$ads['tel']}}</span></p>
                        <p id="address_{{$ads['aid']}}">{{$ads['city']}},{{$ads['dz']}}</p>
                    </div>
                    <div class="c_buttom">
                        <input id="minput_{{$ads['aid']}}" class="minput" type="radio" name="moren" value="" />&nbsp;&nbsp;默认地址
                        <span id="del_{{$ads['aid']}}" class="shanchu" onClick="deleteAddress(this)"><img src="/imgs/cursh.png">删除</span>
                        <span id="xiugai_{{$ads['aid']}}" class="xiugai" onClick="editAddress(this)"><img src="/imgs/pen.png">修改</span>
                    </div>
                </li>
    			@endforeach
    		</ul>
        </div>
    </div>
	
    <!-- //编辑收获地址层 -->
		<div id="address_mash">
			<div class="mhead"><span id="back" style="float:left;padding-left:10px;">返回</span></div>
            <input id="aid" type="hidden" value="">
			<div class="mk">
				<lable>收货人</lable>
				<input id="receiver" class="mi" type="" name="receiver" placeholder="请输入真实姓名" value="">
			</div>
			<div class="mk">
				<lable>手机号码</lable>
				<input id="phone" class="mi" type="number" name="phone" placeholder="请输入手机号码" value="">
			</div>
			<div class="mk">
				<lable>确认手机号码</lable>
				<input id="agphone" class="mi" type="number" name="agphone" placeholder="请输入手机号码" value="">
			</div>
			<div class="mk" id="address_xuan"> 
				<lable>省市区</lable>
				<p id="city" class="mi"></p>
			</div>
			<div id="pop-contants">
		    	 <p class="p_address"><span>请选择城市地址</span><em></em><em></em></p>
		    	 <ul id="cityAddress" class="myscroller"></ul>
		    	 <buttom id="p1" class="pans">取消</buttom>
	             <buttom id="p2" class="pans"> 重选</buttom>
		    </div>
			<div class="mk">
				<input style="width:100%" id="dz" class="mi" name="dz" placeholder="请输入收货人详细地址" value="">
			</div>
			<div class="md">
				<input id="box" class="mo" type="checkbox" name="state" value="0">是否默认为收货地址
			</div>
			<div class="baocun">
				<div id="clean" class="adda" type="button">清空地址</div>
				<button id="save" class="adda" type="button" onClick="addAddress()">保存地址</button>
			</div>
		</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/CityArea.js"></script>
<script type="text/javascript">
	//添加地址层状态
	var flag = 0;

	$(document).ready(function(){
		
		$(".mheader").click(function(){
			$("#receiver").val("");
			$("#phone").val("");
			$("#agphone").val("");
			$("#city").html("");	
			$("#box").val("");
			$("#dz").val("");
			$("#address_mash").show();
			$("#index1").hide();
		});

		$("#back").click(function(){
			$("#index1").show();
			$("#address_mash").hide();
		});

		//////选择城市
		$("#address_xuan").click(function() {
		    // $(".editA").show();
			$("#pop-contants").show();
		    AddreessSart(this);
		});

		$("#p1").click(function(){
			$("#pop-contants").hide();
		})
		
		$('body').on('click','#clean',function(){
			$("#aid").val("");
			$("#receiver").val("");
			$("#phone").val("");
			$("#agphone").val("");
			$("#city").html("");	
			$("#box").val("");
			$("#dz").val("");
			//localStorage.clear();
		});
		
	});
		
		function editAddress(obj){
			$("#index1").hide();
			$("#address_mash").show();
			var eid = $(obj).attr("id");
			var tid = eid.slice(7);
			var dz = $("#"+"address_"+tid).html();
			var arr = new Array();
			arr = dz.split(',');
			$("#aid").val(tid);
			$("#receiver").val($("#"+"rec_"+tid).html());
			$("#agphone").val($("#"+"tel_"+tid).html());
			$("#phone").val($("#"+"tel_"+tid).html());
			$("#city").html(arr[0]+","+arr[1]+","+arr[2]);
			$("#dz").val(arr[3]);
			$("#orde").hide();
		}
		
	    function deleteAddress(obj){
			if(confirm("确定删除此条地址吗?")){
				var did = $(obj).attr("id");
				var aid = did.slice(4);
				$.ajax({
					url:"{{url('personal/deleteAddress')}}",
					type:"get",
					data:{aid:aid},
					time:3000,
					success: function(){
						$("#"+"ali_"+aid).hide();
					},
					error:function(){
						
					}
				});
			}else{
				return;	
			}
		}
		
		function addAddress(){
			var tel = $("#phone").val();
			var receiver = $("#receiver").val();
			var city = $("#city").text();
			var dz = $("#dz").val();
			var state = 0;
			var aid = $("#aid").val();
			
			if(receiver == ""){
				alert("名字不能为空");
				return false;
			}
			if(!(/^1(3|4|5|7|8)\d{9}$/.test(tel))){
				alert("手机格式不正确!");
				return false;
			}
			if(tel == ""){
				alert("手机号码不能为空");
				return false;
			}
			if(tel !== $("#agphone").val()){
				alert("两次手机号码不一致");
				return false;
			}
			if(city == ""){
				alert("请选择城市地址");
				return false;
			}
			if(dz == ""){
				alert("请填写详细的地址");
				return false;
			}
			if($("#box").is(':checked')){
				state = 1;
				$("input[type='radio']").removeAttr('checked');
				$("#"+"minput_"+aid).attr("checked","checked");
			}
			$.ajax({
				url:"{{url('addAddress')}}",
				type:"get",
				data:{tel:tel,rec:receiver,city:city,dz:dz,state:state,aid:aid},
				time:3000,
				success: function(){
					$("#index1").show();
					$("#address_mash").hide();
				},
				error: function(){
					
				}
			});
		}
	
	//拼接字符串
	function StringBuffer() {
		this.__strings__ = new Array();
	}
	StringBuffer.prototype.append = function (str) {
		this.__strings__.push(str);
		return this;    //方便链式操作
	}
	StringBuffer.prototype.toString = function () {
		return this.__strings__.join("");
	}
	
</script>
</html>