<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\wamp64\www\Zhifu\public/../app/index\view\user\userpage.html";i:1608627736;}*/ ?>
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
  <link rel="stylesheet" type="text/css" href="/static/css/swiper-bundle.css" />
  <link rel="stylesheet" type="text/css" href="/static/plugin/fa/css/font-awesome.css" />
  
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/plugin/bs/js/bootstrap.js"></script>
  <script type="text/javascript" src="/static/js/swiper-bundle.js"></script>
  <title>智付商城</title>
  <link rel="icon" type="image/x-icon" href="/static/img/money.png"/>
  <style>
    .swiper-container {
      width: 100%;
      margin: 0 auto;
      text-align: center;
      position: absolute;
    }
  </style>
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
  <div class="line2" id="nav-top">
    <a href="/index/User/index"><img id="logo" src="/static/img/logo.png" alt="logo"/></a>
    <input type="text" value="" id="s1"/>
    <input type="submit" value="搜 索" onclick="search()"/>
    <span id="goto">
			<a id="goto_order" href="/index/User/order">我的订单</a>
			<a id="goto_cart" href="/index/User/spcart"><i class="fa fa-shopping-cart"></i>我的购物车</a>
		</span>
  </div>
</div>
<div class="page-container">
  <div class="row">
    <div class="z_menu">
      <div class="fore1">
        <div class="nav-title">个人中心</div>
        <div class="nav-content"><a href="/index/User/userinfo">我的信息</a></div>
        <div class="nav-content"><a href="/index/User/changepwd">修改密码</a></div>
      </div>
      <div class="fore2">
        <div class="nav-title">订单中心</div>
        <div class="nav-content"><a href="/index/User/order">我的订单</a></div>
      </div>
      <div class="fore4">
        <div class="nav-title">关注中心</div>
        <div class="nav-content"><a href="/index/User/collect">我的收藏</a></div>
      </div>
    </div>
    <div class="z_content">
      <h3 class="title">欢迎<?php echo \think\Cookie::get('username'); ?>用户</h3>
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide s2">
            <img src="/static/img/slider1.jpg" alt=""/>
            <img src="/static/img/slider2.jpg" alt=""/>
          </div>
          <div class="swiper-slide s2">
            <img src="/static/img/slider3.jpg" alt=""/>
            <img src="/static/img/slider4.jpg" alt=""/>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      
      </div>
    </div>
  </div>
</div>

<div id="common_foot">
  <p>
    Copyright © 2020-2021 智付商城 版权所有 保留一切权利
  </p>
</div>
</body>
<script>
  let mySwiper = new Swiper('.swiper-container', {
    
    loop: true, // 循环模式选项
    
    // 如果需要分页器
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    
    // 如果需要前进后退按钮
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 2000,
      stopOnLastSlide: false,
      disableOnInteraction: true,
    },
    
  })
  for (i = 0; i < mySwiper.pagination.bullets.length; i++) {
    mySwiper.pagination.bullets[i].onmouseover = function () {
      this.click();
    };
  }
  
  //如果你在swiper初始化后才决定使用clickable，可以这样设置
  mySwiper.params.pagination.clickable = true;
  //此外还需要重新初始化pagination
  mySwiper.pagination.destroy()
  mySwiper.pagination.init()
  mySwiper.pagination.bullets.eq(0).addClass('swiper-pagination-bullet-active');
</script>
<script>
  function search() {
    let content = document.getElementById("s1");
    let value = content.value;
    window.location = '<?php echo url("Commodity/search"); ?>' + '?value=' + value;
  }
</script>
</html>