<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\wamp64\www\Zhifu\public/../app/index\view\user\collect.html";i:1609123823;}*/ ?>
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
    <div class="z_part">
      <div class="top-content">
        <h4 class="user-title">我的收藏</h4>
        <div id="line8">
          <?php if(is_array($collectData) || $collectData instanceof \think\Collection || $collectData instanceof \think\Paginator): $i = 0; $__LIST__ = $collectData;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$collect): $mod = ($i % 2 );++$i;?>
          <div class="block1" id="<?php echo $collect['id']; ?>">
            <a href="javascript:" id="commodity" onclick="secommodity(<?php echo $collect['cid']; ?>)" >
            <div class="img-wrapper">
              <img src="<?php echo $collect['img']; ?>" alt="">
            </div>
            <h5><?php echo $collect['cname']; ?></h5>
          </a>
            <p class="info">
              <span class="price">￥<?php echo $collect['discountprice']; ?></span>
              <span class="price_red r1">￥<?php echo $collect['price']; ?></span>
              <span class="c_status" id="c_status"><?php echo $collect['status']; ?></span>
              <a href="javascript:" onclick="deleteCollect(<?php echo $collect['id']; ?>)" class="collect_btn">取消收藏</a>
            </p>
          </div>
          <?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </div>
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
  function search() {
    let content = document.getElementById("s1");
    let value = content.value;
    window.location = '<?php echo url("Commodity/search"); ?>' + '?value=' + value;
  }
  
  function secommodity(id) {
    if(id){
      window.location = '<?php echo url("Commodity/commodityinfo"); ?>' + '?id=' + id;
    }else{
      alert("此商品不存在");
    }
  }
  
  function deleteCollect(id) {
    if(confirm("确定取消收藏吗？")){
      window.location = '<?php echo url("doCollectdelete"); ?>' + '?id=' + id;
    }
  }
</script>
<script>
  let status = $('.c_status');
  status.each(function () {
    if($(this).html()=="有货"){
      $(this).parents('.block1').find('.c_status').css('display','none');
    }else{
      $(this).parents('.block1').find('a:first').attr("href","#");
      $(this).parents('.block1').find('a:first').attr("onclick","");
    }
  });
</script>
</html>