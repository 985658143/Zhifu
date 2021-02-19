<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp64\www\Zhifu\public/../app/index\view\admin\adminpage.html";i:1608536589;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>智付商城后台</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="keywords" content="backend"/>
  <link rel="icon" type="image/x-icon" href="/static/img/money.png"/>
  <script type="application/x-javascript"> addEventListener("load", function () {
    setTimeout(hideURLbar, 0);
  }, false);
  
  function hideURLbar() {
    window.scrollTo(0, 1);
  } </script>
  <!--    css-->
  <link rel="stylesheet" type="text/css" href="/static/plugin/bs/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/backend/style.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/backend/custom.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/backend/backend.css" />
  <link rel="stylesheet" type="text/css" href="/static/plugin/fa/css/font-awesome.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/swiper-bundle.css" />
  <!--    js-->
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/plugin/bs/js/bootstrap.min.js"></script>
  <!--    菜单动画-->
  <script type="text/javascript" src="/static/js/backend/jquery.metisMenu.js"></script>
  <script type="text/javascript" src="/static/js/backend/custom.js"></script>
  
  <script type="text/javascript" src="/static/js/swiper-bundle.js"></script>
  <script type="text/javascript" src="/static/js/backend/scripts.js"></script>
  <style>
    .swiper-container {
      width: 1091px;
      margin: 0 auto;
      text-align: center;
    }
  </style>
  <script>
    $(function () {
      $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);
      if (!screenfull.enabled) {
        return false;
      }
      $('#toggle').click(function () {
        screenfull.toggle($('#container')[0]);
      });
    });
  </script>
</head>
<body>
<div id="wrapper">
  
  <nav class="navbar-default navbar-static-top" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <h1><a class="navbar-brand" href="/index/Admin/adminpage">智付商城</a></h1>
    </div>
    <div class=" border-bottom">
      <div class="full-left">
        <div class="clearfix"></div>
      </div>
      <div class="drop-men">
        <ul class=" nav_1">
          
          <li class="dropdown">
            <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown">
              <span class=" name-caret"><?php echo \think\Cookie::get('name'); ?>
                <i class="caret"></i>
              </span>
              <img src="/static/img/cat.jpg" class="avatar">
            </a>
            <ul class="dropdown-menu " role="menu">
              <li><a href="/index/Admin/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="clearfix">
      
      </div>
      
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li>
              <a href="/index/Admin/adminpage" class=" hvr-bounce-to-right"><i class="fa fa-desktop nav_icon"></i> <span
                class="nav-label">管理</span><span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                
                <li><a href="/index/Admin/userlist" class=" hvr-bounce-to-right">
                  <i class="fa fa-user-circle nav_icon"></i>用户管理
                </a></li>
  
                <li><a href="/index/Admin/typelist" class=" hvr-bounce-to-right">
                  <i class="fa fa-list-alt nav_icon"></i>分类管理
                </a></li>
  
                <li><a href="/index/Admin/commodity" class=" hvr-bounce-to-right">
                  <i class="fa fa-shopping-cart nav_icon"></i>商品管理
                </a></li>
  
                <li><a href="/index/Admin/order" class=" hvr-bounce-to-right">
                  <i class="fa fa-list nav_icon"></i>订单管理
                </a></li>
                
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">
      <div class="banner">
        <h2>
          <a href="#">Home</a>
        </h2>
      </div>
      <div class="content-top">
        <div class="col-md-12 ">
          <div class="content-top-1">
            <div class="top-content">
              <h4 class="title">欢迎<?php echo \think\Cookie::get('name'); ?>管理员，系统的日益完善离不开您的理解与支持！</h4>
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
                <!-- 如果需要分页器 -->
                <div class="swiper-pagination"></div>
              
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="copy">
      <p> &copy; 2020 Zhifu. All Rights Reserved | Design by</p>
    </div>
  </div>
  <div class="clearfix"></div>
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

</html>

