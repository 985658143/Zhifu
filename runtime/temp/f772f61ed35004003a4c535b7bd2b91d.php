<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp64\www\Zhifu\public/../app/index\view\user\addsucceed.html";i:1608534632;}*/ ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/static/plugin/bs/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/index.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/foot.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/main.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/head.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/prodList.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/prodInfo.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/swiper-bundle.css" />
  <link rel="stylesheet" type="text/css" href="/static/plugin/fa/css/font-awesome.css" />
  
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/plugin/bs/js/bootstrap.js"></script>
  <script type="text/javascript" src="/static/js/swiper-bundle.js"></script>
  
  <script type="text/javascript" src="/static/js/productinfo.js"></script>
  <script type="text/javascript" src="/static/js/addShopping.js"></script>
  <title>智付商城</title>
  <link rel="icon" type="image/x-icon" href="/static/img/money.png"/>

</head>

<body>
<div id="common_head">
  <div class="line1">
    <div class="content">
      <ul>
        <?php if(empty(\think\Cookie::get('id')) || ((\think\Cookie::get('id') instanceof \think\Collection || \think\Cookie::get('id') instanceof \think\Paginator ) && \think\Cookie::get('id')->isEmpty())): ?>
        <li>
          <span>
            <a href="/index/Login/login">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/index/User/register">注册</a>
          </span>
        </li>
        <?php else: ?>
        <li>
          <span>
            <a href="/index/User/userpage">用户中心</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/index/User/logout">退出登录</a>
          </span>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="line2">
    <a href="/index/User/index"><img id="logo" src="/static/img/logo.png" alt="logo"/></a>
    <input type="text" value="" id="s1"/>
    <input type="submit" value="搜 索" onclick="search()"/>
    <?php if(empty(\think\Cookie::get('id')) || ((\think\Cookie::get('id') instanceof \think\Collection || \think\Cookie::get('id') instanceof \think\Paginator ) && \think\Cookie::get('id')->isEmpty())): ?>
    <span id="goto">
			<a id="goto_order" href="javascript:">我的订单</a>
			<a id="goto_cart" href="javascript:"><i class="fa fa-shopping-cart"></i>我的购物车</a>
		</span>
    <?php else: ?>
    <span id="goto2">
			<a id="goto_order2" href="/index/User/order">我的订单</a>
			<a id="goto_cart2" href="/index/User/spcart"><i class="fa fa-shopping-cart"></i>我的购物车</a>
		</span>
    <?php endif; ?>
    <img id="erwm" src="/static/img/head/e2.png" alt="e2" width="76"/>
  </div>
  <div class="line3">
    <div class="content">
      <ul>
        <li><a href="/index/User/index">首页</a></li>
        <li><a href="/index/Commodity/commodityall">全部商品</a></li>
        <li><a href="/index/Commodity/discount">折扣商品</a></li>
        <?php if(is_array($TypeData) || $TypeData instanceof \think\Collection || $TypeData instanceof \think\Paginator): $i = 0; $__LIST__ = $TypeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
        <li><a href="javascript:" id="typename" onclick="selist(<?php echo $type['id']; ?>)"><?php echo $type['typename']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
</div>
<div id="index">
  <div id="line1">
    <h2 style="color: red"><i class="fa fa-check-circle -lg"></i>已成功加入购物车</h2>
    <div class="result-op">
      <a href="/index/User/index" class="op-return"><i class="fa fa-angle-left"></i>返回主页</a>
      <a href="/index/User/spcart" class="op-cart">去购物车结算</a>
    </div>
  </div>
</div>

<div class="fixed">
  <a href="#" target="_blank">
    <img src="/static/img/head/qr.jpg" width="100" alt="qrcode"/>
  </a>
  <a href="#common_head" class="toTop"></a>
</div>
<div id="common_foot">
  <p>
    Copyright © 2020-2021 网上商城 版权所有 保留一切权利
  </p>
</div>
</body>

<script type="text/javascript">
  
  function selist(id) {
    window.location = '<?php echo url("Commodity/commoditylist"); ?>' + '?id=' + id;
  }
  
  function search() {
    let content = document.getElementById("s1");
    let value = content.value;
    window.location = '<?php echo url("Commodity/search"); ?>' + '?value=' + value;
  }
  
  let d1 = document.getElementById("goto_order");
  d1.onclick = function () {
    alert("请先登录一下吧！");
    window.location = '/index/Login/userlogin'
  }
  
  let d2 = document.getElementById("goto_cart");
  d2.onclick = function () {
    alert("请先登录一下吧！");
    window.location = '/index/Login/userlogin'
  }
</script>
</html>