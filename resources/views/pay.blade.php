<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>支付-微小茶</title>
</head>
<style type="text/css">
/*.pay{width:90%;height: 50px;border:none;background-color: #e50112;}*/
*{padding:0px;margin:0px;font-family: "微软雅黑"}
a:link{text-decoration:none;}
a,button{font-size:14px}
.warp{text-align: center;width: 95%;margin:0 auto;}
.child1{margin:20px 0;}
.child1 p{padding-top: 10px;color:gray;}
.mbtn{background-color:#e50112;color:#fff;padding:0px 20px;height: 45px;border:none;border-radius: 4px;display: inline-block;line-height: 45px;}
</style>
<body>
    <div class="warp">
    	<form action="{{url('payok')}}" method="post">
            {{csrf_field()}}
            <div class="child1">
                <input type="hidden" name="oid" value="{{$oid}}">
                <p style="font-weight:bold;">订单已提交，请立即支付!</p>
                <p>你需支付:￥<span>{{$order_money}}</span></p>
                <p>付款方式:微信支付</p>
            </div>
            <div>
                <a href="javascript:history.go(-1);" class="mbtn">查看该订单</a>
                <a href="{{url('/')}}" class="mbtn">继续逛逛</a>
                <button type="button" class="mbtn" onClick="WXPayment();">立即支付</button>
            </div>
        </form>
    </div>
</body>
<script>
	var WXPayment = function() {
		if( typeof WeixinJSBridge === 'undefined' ) {
			alert('请在微信在打开页面！');
			return false;
		}
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest', {!!$payconfig!!}, function(res) {
			switch(res.err_msg) {
				case 'get_brand_wcpay_request:cancel':
					alert('用户取消支付！');
					break;
				case 'get_brand_wcpay_request:fail':
					alert('支付失败！（'+res.err_desc+'）');
					break;
				case 'get_brand_wcpay_request:ok':
					alert('支付成功！');
					break;
				default:
					alert(JSON.stringify(res));
					break;
			}
		});
	}
</script>
</html>