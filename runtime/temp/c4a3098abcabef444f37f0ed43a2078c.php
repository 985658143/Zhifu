<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\wamp64\www\Zhifu\public/../app/index\view\user\index.html";i:1609125098;}*/ ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/static/plugin/bs/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/index.css" />
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
      width: 1200px;
      text-align: center;
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
  <div class="line2">
    <img id="logo" src="/static/img/logo.png" alt="logo"/>
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
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide s1"><img src="/static/img/banner1.png" alt=""/></div>
        <div class="swiper-slide s1"><img src="/static/img/brands.png" alt=""/></div>
        <div class="swiper-slide s1"><img src="/static/img/banner3.jpg" alt=""/></div>
      </div>
      <div class="swiper-pagination"></div>
      
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    
    </div>
  </div>
  
  <div class="main-contain">
    <div class="c_title">
      <h3>热卖单品</h3>
    </div>
    <div id="line2">
      <?php if(is_array($commodityData) || $commodityData instanceof \think\Collection || $commodityData instanceof \think\Paginator): $i = 0; $__LIST__ = $commodityData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$commodity): $mod = ($i % 2 );++$i;?>
      <div class="block1"><a href="javascript:" id="commodity" onclick="secommodity(<?php echo $commodity['id']; ?>)" target="_blank">
        <div class="img-wrapper">
          <img src="<?php echo $commodity['img']; ?>" alt="">
        </div>
        <h5><?php echo $commodity['cname']; ?></h5>
      </a>
        <p class="info">
          <span class="price_red r1">￥<?php echo $commodity['price']; ?></span>
          <span class="price">￥<?php echo $commodity['discountprice']; ?></span>
        </p>
      </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    
    </div>
    <div id="line3">
      <?php if(empty(\think\Cookie::get('id')) || ((\think\Cookie::get('id') instanceof \think\Collection || \think\Cookie::get('id') instanceof \think\Paginator ) && \think\Cookie::get('id')->isEmpty())): ?>
      <div class="block2">
        <div class="user-top"></div>
        <div class="user-bottom">
          <a href="#"><span class="mascot">
                </span></a>
          <h4>Hi!你好</h4>
          <div class="user-ft">
            <a href="/index/Login/userlogin">登录</a>
            <a href="/index/User/register">注册</a>
          </div>
        </div>
      </div>
      <?php else: ?>
      <div class="block2">
        <div class="user-top"></div>
        <div class="user-bottom">
          <div class="i-pic">
            <a href="/index/User/userpage">
              <img id="用户头像" src="<?php echo \think\Cookie::get('avatar'); ?>" alt="">
              <div class="mask"></div>
            </a>
          </div>
          <h4 class="user-h">Hi!<?php echo \think\Cookie::get('username'); ?></h4>
          <div class="i-ft">
            <a href="/index/User/userpage">用户中心</a>
            <a href="/index/User/spcart">购物车</a>
            <a href="/index/User/collect">我的收藏</a>
            <a href="/index/User/userinfo">我的信息</a>
          </div>
        </div>
      </div>
      <?php endif; ?>
      <div class="block2">
        <a href="#"><img src="/static/img/draw.png" alt=""></a>
      </div>
    </div>
  </div>
  
  <div id="line4">
    <div class="swiper-container">
      <div class="swiper-wrapper sw2">
        <div class="swiper-slide ">
          <img src="/static/img/banner2.1.jpg" alt=""/>
          <img src="/static/img/banner2.2.jpg" alt=""/>
          <img src="/static/img/banner2.3.jpg" alt=""/>
          <img src="/static/img/banner2.4.jpg" alt=""/>
        </div>
        <div class="swiper-slide ">
          <img src="/static/img/banner2.9.jpg" alt=""/>
          <img src="/static/img/banner2.6.jpg" alt=""/>
          <img src="/static/img/banner2.7.jpg" alt=""/>
          <img src="/static/img/banner2.8.jpg" alt=""/>
        </div>
      </div>
      <!-- 如果需要分页器 -->
      <div class="swiper-pagination"></div>
      
      <!-- 如果需要导航按钮 -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    
    </div>
  </div>
  <div id="line5">
			<span id="line5_1">
				<img src="/static/img/index/icon_g1.png" alt="icon_g1"/>&nbsp;&nbsp;5星好评 质量保证
			</span>
    <span id="line5_2">
				<img src="/static/img/index/icon_g2.png" alt="icon_g2"/>&nbsp;&nbsp;7天退货 15天换货
			</span>
    <span id="line5_3">
				<img src="/static/img/index/icon_g3.png" alt="icon_g3"/>&nbsp;&nbsp;100元起免运费
			</span>
    <span id="line5_4">
				<img src="/static/img/index/icon_g4.png" alt="icon_g4"/>&nbsp;&nbsp;维修网点 全国联保
			</span>
  </div>
</div>
<div class="fixed">
  <a href="/index/User/spcart">
    <img src="/static/img/head/qr.jpg" width="100" alt="qrcode"/>
  </a>
  <a href="#common_head" class="toTop">
  </a>

</div>
<div id="common_foot">
  <p>
    Copyright © 2020-2021 网上商城 版权所有 保留一切权利
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
      delay: 3000,
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
  
  function secommodity(id) {
    window.location = '<?php echo url("Commodity/commodityinfo"); ?>' + '?id=' + id;
  }
  
  function selist(id) {
    window.location = '<?php echo url("Commodity/commoditylist"); ?>' + '?id=' + id;
  }
  
  function search() {
    let content = document.getElementById("s1");
    let value = content.value;
    window.location = '<?php echo url("Commodity/search"); ?>' + '?value=' + value;
  }
</script>
</html>