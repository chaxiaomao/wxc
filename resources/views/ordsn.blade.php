<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title>编辑地址-微小茶</title>
</head>
<style type="text/css">
* {
	padding: 0px;
	margin: 0px;
}
body {
	background-color: rgb(229,229,229);
	color: gray;
	font-family: "微软雅黑";
	font-size: 14px;
	color: #aeaeae;
}
a:link {
	text-decoration: none;
}
.mhead {
	font-weight: bold;
	letter-spacing: 8px;
	height: 40px;
	background-color: rgb(244,244,244);
	color: #e50112;
	line-height: 40px;
	text-align: center;
}
.mstep {
	border-bottom: 1px solid #fff;
	height: 38px;
}
.mstep img {
	width: 100%;
	height: 36px;
}
#orde {
	z-index: 999;
	position: absolute;
	top: 0;
	width: 100%;
	height: 100%;
	background-color: rgb(229,229,229)
}
.warp, .a, .b, .c, .d {
	width: 100%;
	height: auto;
}
.warp-0 {
	border-bottom: 3px solid rgb(229,229,229);
	background-color: #fff
}
.a-1, .b-1 {
	padding: 10px 20px 0px 0px;
	height: 70px;
}
.a-1 img, input, .b-1 img, p {
	font-size: 14px;
}
.a-1 img, .b-1 img {
	width: 70px;
	height: 70px;
}
.a-1 input {
	line-height: 30px;
	max-width: 250px;
	white-space: nowrap;
	over-float: scroll;
	border: none;
	position: absolute
}
.a-1 input:last-child {
	position: absolute;
	right: 10px;
	text-align: right;
}
.b-1 p {
	position: absolute;
	top: 55px;
	color: #ddd;
	font-size: 16px;
	left: 70px;
}
.c-1 {
	background-color: rgb(102,102,102);
	height: 100px;
	overflow: auto;
	width: 100%;
}
.c-2 {
	height: 50px;
	position: relative;
}
.c-2 span {
	position: absolute;
	left: 10px;
	top: 10px;
	color: #fff;
	font-size: 13.67px;
	max-width: 240px;
	white-space: nowrap;
	text-overflow: ellipsis;
	overflow: hidden;
}
.edit {
	position: absolute;
	display: inline-block;
	right: 0px;
	height: 50px;
	border: 1px dashed #fff;
	width: 70px;
	text-align: center;
}
.edit img {
	width: 30px;
	line-height: 30px;
	position: relative;
	top: 10px;
}
.add-adress {
	height: 50px;
	text-align: center;
	line-height: 50px;
	color: #FF8A43;
}
.add-adress img {
	width: 20px;
	position: relative;
	top: 5px;
}
#a {
	z-index: 8;
	position: absolute;
}
#b {
	z-index: 9;
	position: absolute;
	background-color: #fff;
	width: 100%;
}
#c {
	z-index: 7;
	display: none;
}
#abc {
	position: relative;
	height: 80px;
}
.warp-1 {
	height: 40px;
	line-height: 34px;
	margin: 0 10px;
}
.warp-1 p {
	display: inline-block;
	float: left;
	font-size: 16px;
}
.warp-1 a {
	display: inline-block;
	float: right;
	color: #e50112;
	font-size: 16px;
}
.warp-2 {
	border-bottom: 25px solid rgb(229,229,229);
}
.d {
	height: 60px;
	padding: 10px 0 10px 0px;
	position: relative;
	border-bottom: 1px dashed #ddd;
	background-color: #fff
}
.d img {
	width: 60px;
	float: left;
	height: 60px;
	padding-left: 10px;
}
.d p:nth-child(3), .d p:nth-child(4) {
	float: right;
	position: absolute;
	color: #e50112;
}
.d p:nth-child(3) {
	right: 20px;
	top: 20px;
}
.d p:nth-child(4) {
	right: 20px;
	top: 50px;
}
.e {
	height: 48px;
	line-height: 48px;
	background-color: #fff
}
.e-1 {
	border-top: 15px solid rgb(229,229,229);
}
.e span {
	padding-left: 10px;
}
.e span:nth-child(2) {
	float: right;
	padding-right: 20px;
	color: #e50112;
}
.g {
	font-size: 14px;
	border-top: 20px solid rgb(229,229,229);
	padding-bottom: 30px;
	background-color: #fff
}
.g p {
	padding: 5px;
	float: none;
}
.pay {
	width: 90%;
	margin: 0 auto;
	text-align: center;
	background-color: #e50112;
	border-radius: 5px;
	height: 50px;
	line-height: 50px;
	color: #fff;
	display: block;
	margin-bottom: 20px;
	border: none;
	font-size: 18px;
}
/*地址蒙城*/
#adress_mash {/*display: none;*/
	z-index: 886;
	position: absolute;
	top: 0;
	width: 100%;
	background-color: #fff;
	height: 100%;
}
#adress p, input {
	font-size: 14px;
	color: gray;
}
.mk {
	height: 40px;
	border-bottom: 1px solid #ddd;
	background-color: #fff;
	padding: 10px 40px 10px 5px;
	line-height: 40px;
}
.mk lable, .mp {
	display: inline-block;
	color: gray;
	height: 40px;
	float: left;
	padding-right: 5px;
}
.mi {
	border: none;
	height: 40px;
	outline: none;
}
.ms {
	color: #ccc;
}
.md {
	height: 40px;
	line-height: 40px;
}
.mo {
	width: 20px;
}
.baocun {
	height: 100px;
	width: 90%;
	margin: 0 auto;
	margin-top: 40px;
	text-align: center;
}
.adda {
	height: 40px;
	width: 40%;
	color: #fff;
	background-color: #e50112;
	border-radius: 5px;
	display: inline-block;
	line-height: 40px;
	margin: 10px;
	font-size: 14px;
	border: none;
}
/*城市选择窗口*/
#pop-contants {
	position: absolute;
	left: 50%;
	top: 50%;
	width: 300px;
	height: 400px;
	z-index: 9999;
	margin-left: -150px;
	margin-top: -200px;
	box-shadow: 0 0 25px rgba(0, 0, 0, .3);
	background-color: #fff;
	display: none;
}
.p_address {
	width: 280px;
	line-height: 50px;
	height: 52px;
	padding: 10px;
	border-bottom: 1px solid #DADADA;
	text-align: center;
	color: #FF8A43;
	overflow: hidden;
	text-overflow: ellipsis;
	word-break: keep-all;
}
.myscroller {
	height: 280px;
	width: 300px;
	overflow: auto;
	-webkit-overflow-scrolling: touch;
}
.pans {
	width: 49%;
	display: inline-block;
	height: 45px;
	line-height: 45px;
	text-align: center;
	color: #FF8A43;
}
.li_address {
	color: gray;
	padding: 10px;
	border-bottom: 1px solid #eee;
}
</style>
<body>
<form action="{{url('pay')}}" method="post" value = "{{ csrf_token() }}">
  {{csrf_field()}}
  <div id="orde">
    <div class="mhead">红茶只喝微小茶</div>
    <div class="mstep"> <img src="/imgs/l2.png"> </div>
    <!-- 订单编辑层 -->
    <div class="warp">
      <div class="warp-0">
        <div id="abc">
        	 @if($mads[0]->name == "")
             	<!--<div id="b">
                    <div class="b">
                      <div class="b-1"> <img src="/imgs/location.png">
                        <p>还没有收获地址</p>
                      </div>
                    </div>
                  </div>-->
                  <div id="a" class="a">
                    <div class="a-1"> <img src="/imgs/location.png">
                     <input id="o_receiver" name="o_receiver" value="" readonly />
                      <input id="o_dz" style="position:absolute;left:70px;top:50px;width:60%" name="o_dz" value="" readonly />
                      <input id="o_tel" name="o_tel" value="" readonly/>
                    </div>
                  </div>
              @else
                  <div id="a" class="a">
                    <div class="a-1"> <img src="/imgs/location.png">
                     <input id="o_receiver" name="o_receiver" value="{{$mads[0]->name}}" readonly />
                      <input id="o_dz" style="position:absolute;left:70px;top:50px;width:60%" name="o_dz" value="{{$mads[0]->city}},{{$mads[0]->address}}" readonly />
                      <input id="o_tel" name="o_tel" value="{{$mads[0]->tel}}" readonly/>
                    </div>
                  </div>
                  <!--<div id="b">
                    <div class="b">
                      <div class="b-1"> <img src="/imgs/location.png">
                        <p>还没有收获地址</p>
                      </div>
                    </div>
                  </div>-->
          @endif
          <div id="b">
            <div class="b">
              <div class="b-1"> <img src="/imgs/location.png">
                <p>还没有收获地址</p>
              </div>
            </div>
          </div>
        </div>
        <div id="c">
          <div class="c">
            <div class="c-1" id="address_container">
              <div id="address_list" style="min-height:50px;">
                <ul id="aul">
                  @foreach($ads as $ads)
                  <li class="c-2"> <span id="aitem_{{$ads['aid']}}" class="myspan" onClick="selectAddress(this)"> {{$ads['rec']}},{{$ads['city']}},{{$ads['dz']}},{{$ads['tel']}}</span>
                    <div id="edit_{{$ads['aid']}}" class="edit" onClick="editAddress(this)"><img src="/imgs/edit.png"></div>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="add-adress"> <span id="add_address">增加<img src="/imgs/add.png">地址</span> </div>
            </div>
          </div>
        </div>
        <img style="width:100%;max-height:8px;position:relative;top:-8px;" src="/imgs/fengexian.png">
        <div class="warp-1">
          <p>订单商品</p>
          <a href="{{url('cart')}}">订单修改</a> </div>
      </div>
      <div class="warp">
        <div class="warp-2">
         @foreach($gs as $g)
          <div class="d"> <img src="{{$g['attributes']['img']}}">
            <p>{{$g['name']}}</p>
            <p>￥<span>{{$g['price']}}</span></p>
            <p style="color:gray">x<span>{{$g['quantity']}}</span></p>
          </div>
          @endforeach
          <div class="e"> <span>微信支付</span> </div>
          <div class="e"> <span>包邮</span> </div>
          <div class="e"> <span>商品金额</span> <span>￥<span>{{$total}}</span></span> </div>
          <div class="e e-1"> <span>运费金额</span> <span>￥<span>0</span></span> </div>
          <div class="e e-1"> <span>应付总额</span> <span>￥<span>{{$total}}</span></span> </div>
          <div class="g">
            <p>备注:公司指定快递，少数偏远地区以及村，组快件需自提，快递物流有效位一个月，请在发货后7天内几时查询物流信息，新旧包装随机发货，不支持指定包装。</p>
          </div>
        </div>
      </div>
      <button id="pay" class="pay" type="submit">立即支付</button>
    </div>
  </div>
</form>
<!-- //编辑收获地址层 -->
<div id="adress_mash">
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
    <ul id="cityAddress" class="myscroller">
    </ul>
    <buttom id="p1" class="pans">取消</buttom>
    <buttom id="p2" class="pans"> 重选</buttom>
  </div>
  <div class="mk">
    <input style="width:100%" id="dz" class="mi" name="dz" placeholder="请输入收货人详细地址" value="">
  </div>
  <div class="md">
    <input id="box" class="mo" type="checkbox" name="state">
    是否默认为收货地址 </div>
  <div class="baocun">
    <div id="clean" class="adda" type="button">清空地址</div>
    <button id="save" class="adda" type="button" onClick="addAddress()">保存地址</button>
  </div>
</div>
</body>
<!--<script type="text/javascript" src="/js/zepto.js"></script>-->
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/CityArea.js"></script>
<script type="text/javascript">
	
	//添加地址层标识符
	var flag = 0;
	
	$(document).ready(function(){
		
		$("#abc").click(function(){
			// $('#c').slideDown(300,function(){flag = 1;});
			if(flag == 0){
				$('#c').show();
				flag = 1;
			}else{
				$('#c').hide();
				flag = 0;
			}
		});
		
		if($("#o_receiver").val() != ""){
			$("#b").hide();
		}

		$("#add_address").click(function(){
			$("#receiver").val("");
			$("#phone").val("");
			$("#agphone").val("");
			$("#city").html("");	
			$("#box").val("");
			$("#dz").val("");
			$("#aid").val("");
			$("#orde").hide();
		});

		$("#back").click(function(){
			$("#orde").show();
			$("#c").hide();
		});

		//////选择城市
		$("#address_xuan").click(function() {
		    // $(".editA").show();
			$("#pop-contants").show();
		    AddreessSart(this);
		});

		$("#p1").click(function(){
			$("#pop-contants").hide();
		});
		
		$("#pay").click(function(){
			if($("#o_dz").val()=="" || $("#o_receiver").val()==""){
				alert("请填写收获地址!");
				return false;
			}
		});
		
	});
	
	function editAddress(obj){
		var eid = $(obj).attr("id");
		var tid = eid.slice(5);
		var content = $("#"+"aitem_"+tid).html();
		var arr = new Array();
		arr = content.split(',');
		//console.log(arr);
		$("#aid").val(tid);
		//console.log(tid);
		$("#receiver").val(arr[0]);
		$("#agphone").val(arr[5]);
		$("#phone").val(arr[5]);
		$("#city").html(arr[1]+","+arr[2]+","+arr[3]);
		$("#dz").val(arr[4]);
		$("#orde").hide();
	}
	
	function selectAddress(obj){
		$("#b").hide();
		var content = $(obj).html();
		//console.log(content);
		var arr = new Array();
		arr = content.split(',');
		console.log(arr);
		$("#o_receiver").val(arr[0]);
		$("#o_dz").val(arr[1]+","+arr[2]+","+arr[3]+","+arr[4]);
		$("#o_tel").val(arr[5]);
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
			$("#b").hide();
			$("#o_receiver").val(receiver);
			$("#o_dz").val(city + dz);
			$("#o_tel").val(tel);
		}
		$.ajax({
			url:"{{url('addAddress')}}",
			type:"get",
			data:{tel:tel,rec:receiver,city:city,dz:dz,state:state,aid:aid},
			time:3000,
			success: function(data){
				if(data){
					var aitem = $('<li class="c-2"></li>');
					var aspan = $('<span class="myspan" onClick="javascript:selectAddress(this)"></span>');
					aspan.attr("id",'aitem_'+data);
					var aimg = $('<div class="edit" onclick="editAddress(this)"><img src="/imgs/edit.png"></div>');
					aimg.attr("id",'edit_'+data);
					aspan.appendTo(aitem);
					aimg.appendTo(aitem);
					aitem.appendTo("#aul");
					$("#"+'aitem_'+data).html(receiver+","+city+dz+tel);
				}else{
					$("#"+"aitem_"+aid).html(receiver+","+city+dz+tel);
				}
				$("#orde").show();
				$("#c").hide();
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