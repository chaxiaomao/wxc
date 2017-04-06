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
/*body{font-size:62.5%;}*/
a:link{text-decoration: none;}
.carousel{height:240px;position:relative;overflow:hidden;margin:0 auto;}
.item {position:absolute;left:0;top:0;width:100%;height:100%;}
.fieldset, img{width:100%;}
.page-number{position: relative;text-align: center;bottom:16px;z-index: 99;}
.page-number li{width: 10px;height: 16px;display: inline-block;position: relative;}
.page-number .active:after {background: #fff !important;}
.page-number li:after{content: "";width: 0.4em;height: 0.4em;background: rgba(0,0,0,0.2);border-radius: 2em;position:absolute;top: 50%;left: 50%;margin-top: -0.2em;margin-left: -0.2em;}
#goodlist{position: relative;bottom:20px;margin:0 auto;margin-bottom:20px;clear: both;text-align: center;background-color: #fff}
#goodlist a{border-bottom: 1px solid #ddd;}
#goodlist a img{width:100%;}
.mui-bar-tab .mui-tab-item.mui-active{color:#e50112;}
#kefu{bottom: 60px;right: 10px;position: absolute;position: fixed;padding-right: 20px;max-width: 70px;}
</style>
<body>
  <ul class="carousel" ontouchstart="" >  
    <li class="item">    
      <img src="/imgs/b1.png"> 
    </li>
    <li class="item">    
      <img src="/imgs/b2.png"> 
    </li>
    <li class="item">    
      <img src="/imgs/b3.png">
    </li>
    <li class="item">  
      <img src="/imgs/b4.png">  
    </li>
  </ul>
  <ul class="page-number">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
  </ul>
    <div id="goodlist">
      @foreach($gs as $g)
      <a href="{{url('goods',[$g['goods_id']])}}">
        <img src="{{$g['goods_img']}}">
      </a>
      @endforeach
    </div>
    <img id="kefu" src="/imgs/kf.png">
      <nav class="mui-bar mui-bar-tab">
            <a class="mui-tab-item mui-active" href="#">
                <span style="position:relative;top:2px;" class="icon iconfont icon-qrcode-copy-copy" aria-hidden="true"></span><br>
                <span style="font-size:10px;" class="mui-tab-label">我的二维码</span>
            </a>
            <a class="mui-tab-item mui" id="page_search" data-index="1" href="{{url('cart')}}">
                <span class="icon iconfont icon-gouwuche01"></span><br>
                <span style="font-size:10px;" class="mui-tab-label">购物车</span>
            </a>
            <a class="mui-tab-item" id="page_personal" data-index="2" href="{{url('personal')}}">
                <span class="icon iconfont icon-geren"></span><br>
                <span style="letter-spacing:-0.1em;font-size:10px;" class="mui-tab-label ">个人中心</span>
            </a>
        </nav>
</body>
<script src="/js/LinkList.js"></script>
<script src="/js/carousel.js"></script>
<script>

    var carousel = CreateCarousel("carousel", "item", true).bindTouchEvent().setItemChangedHandler(onPageChanged);
    var dots = document.querySelectorAll(".page-number li");
    var curDot = dots[0];
    curDot.className = "active";
    function onPageChanged(preIndex, curIndex) {
      curDot.className = "";
      curDot = dots[curIndex];
      curDot.className = "active";
    }
  </script>
</html>