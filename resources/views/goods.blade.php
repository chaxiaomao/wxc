<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<title>微小茶</title>
	</head>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<style type="text/css">
		*{
			padding: 0px;
			margin:0px;
		}
		a:link{text-decoration:none;} 
		.content {
			width: 100%;
			text-align: center;
		}
		.content img {
			width: 100%;
		}
		.di {
			display: block;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            color: #474747;
            background-color: #fff;
		}
		.row {
			background-color: red;
			font-size: 16px;
			line-height: 60px;
			text-align: center;
		}
		.row a {
			color: #fff;
		}
		.row a:first-child{
			border-right: 1px solid #fff;
		}
	</style>
<body>
	<div class="content">
		<img src="/imgs/goods.png">
	</div>
	<div class="di">
		<div class="container-fluid">
			<div class="row">
				<a class="col-md-6" href="{{url('buy',[$goods_id])}}">加入购物车</a>
				<a class="col-md-6" href="{{url('buy',[$goods_id])}}">立即购买</a>
			</div>
		</div>
	</div>
</body>
</html>