<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\wamp64\www\Zhifu\public/../app/index\view\user\spcart.html";i:1608686083;}*/ ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/static/plugin/bs/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/index.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/main.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/cart/carts.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/cart/reset.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/head.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/prodList.css" />
  <link rel="stylesheet" type="text/css" href="/static/css/swiper-bundle.css" />
  <link rel="stylesheet" type="text/css" href="/static/plugin/fa/css/font-awesome.css" />
  
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/plugin/bs/js/bootstrap.js"></script>
  <script type="text/javascript" src="/static/js/swiper-bundle.js"></script>
  <script type="text/javascript" src="/static/js/carts.js"></script>

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
<section class="cartMain">
  <div class="cartMain_hd">
    <ul class="order_lists cartTop">
      <li class="list_chk">
        <!--所有商品全选-->
        <input type="checkbox" id="all" class="whole_check">
        <label for="all"></label>全选
      </li>
      <li class="list_con">商品信息</li>
      <li class="list_info">商品参数</li>
      <li class="list_price">单价</li>
      <li class="list_amount">数量</li>
      <li class="list_sum">金额</li>
      <li class="list_op">操作</li>
    </ul>
  </div>
  <div class="cartBox">
    <div class="order_content">
      <?php if(is_array($spData) || $spData instanceof \think\Collection || $spData instanceof \think\Paginator): $i = 0; $__LIST__ = $spData;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$spcart): $mod = ($i % 2 );++$i;?>
      <ul class="order_lists">
        <li class="list_chk">
          <input type="checkbox" id="checkbox_<?php echo $spcart['id']; ?>" class="son_check">
          <label for="checkbox_<?php echo $spcart['id']; ?>" id="<?php echo $spcart['cid']; ?>"></label>
        </li>
        <li class="list_con">
          <div class="list_img"><a href="javascript:" onclick="secommodity(<?php echo $spcart['cid']; ?>)">
            <img src="<?php echo $spcart['img']; ?>" alt=""></a></div>
          <div class="list_text"><a href="javascript:" onclick="secommodity(<?php echo $spcart['cid']; ?>)"><?php echo $spcart['cname']; ?></a></div>
          <div class="list_text">
            <a href="javascript:" onclick="setype(<?php echo $spcart['typeid']; ?>)">
              <?php if($spcart['typeid'] == '1'): ?>电脑手机<?php endif; if($spcart['typeid'] == '2'): ?>家用电器<?php endif; if($spcart['typeid'] == '3'): ?>箱包钟表<?php endif; if($spcart['typeid'] == '4'): ?>食品饮料<?php endif; if($spcart['typeid'] == '5'): ?>图书杂志<?php endif; if($spcart['typeid'] == '6'): ?>服装鞋子<?php endif; if($spcart['typeid'] == '7'): ?>彩妆潮品<?php endif; ?>
            </a>
          </div>
        </li>
        <li class="list_info">
          <p><?php echo $spcart['specification']; ?></p>
        </li>
        <li class="list_price">
          <p class="price">￥<?php echo $spcart['discountprice']; ?></p>
          <p class="price_red r1">￥<?php echo $spcart['price']; ?></p>
        </li>
        <li class="list_amount">
          <div class="amount_box">
            <a href="javascript:" class="reduce reSty">-</a>
            <input type="text" value="<?php echo $spcart['number']; ?>" class="sum">
            <a href="javascript:" class="plus">+</a>
          </div>
        </li>
        <li class="list_sum">
          <p class="sum_price">￥<?php echo $spcart['totalprice']; ?></p>
        </li>
        <li class="list_op">
          <p class="del"><a href="javascript:" class="delBtn">
            <input type="button" class="btn btn-primary" value="移除商品"/></a></p>
        </li>
      
      </ul>
      <?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </div>
  </div>
  
  <!--底部-->
  <div class="bar-wrapper">
    <div class="bar-right">
      <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
      <div class="totalMoney">共计: <strong class="total_text">￥0.00</strong></div>
      <div class="calBtn"><a href="javascript:" onclick="payall()">结算</a></div>
      <p id="cart-status"></p>
    </div>
  </div>

</section>
<section class="model_bg"></section>
<section class="my_model">
  <p class="mtitle">删除宝贝<span class="closeModel">X</span></p>
  <p>您确认要删除该宝贝吗？</p>
  <div class="opBtn"><a href="javascript:" class="dialog-sure" onclick="deleteSp('<?php echo $spcart['id']; ?>')">确定</a><a
    href="javascript:" class="dialog-close">关闭</a></div>
</section>
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
    window.location = '<?php echo url("Commodity/commodityinfo"); ?>' + '?id=' + id;
  }
  
  function setype(id) {
    window.location = '<?php echo url("Commodity/commoditylist"); ?>' + '?id=' + id;
  }
  
  function deleteSp(id) {
      window.location = '<?php echo url("doSpdelete"); ?>' + '?id=' + id;
  }
  
  let $sonCheckBox = $('.son_check');
  function payall() {
    let arr = [];
    $sonCheckBox.each(function () {
      if ($(this).is(':checked')) {
        //id是cid num是商品数量
        var id = parseFloat($(this).parents('.order_lists').find('.mark').attr("id"));
        var num = parseInt($(this).parents('.order_lists').find('.sum').val());
        arr.push({id, num});
      }
    });
    $.ajax({
      'url': '<?php echo url("addmorepay"); ?>',
      'data': {'carts': JSON.stringify(arr)},
      'type': 'post',
      'dataType': 'JSON',
      success: function (response) {
        console.log(response);
        if (response.code) {
          setTimeout(function () {
            window.location.href = "/index/User/pay?pid=" + response.data.pid;
          }, response.wait * 200);
        } else {
          $("#cart-status").html(response.msg);
        }
      }
    })
  }
  // $("#cart-status").blur(function (){
  //   $("#cart-status").html("");
  // })

</script>
</html>