<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\wamp64\www\Zhifu\public/../app/index\view\user\pay.html";i:1608799124;}*/ ?>
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
  <link rel="stylesheet" type="text/css" href="/static/css/addOrder.css" />
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

<body onbeforeunload="goodbye()">
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

<div class="warp">
  <form id="addOrderForm">
    <h3>账单信息</h3>
    <div id="forminfo">
      <h5><b>确认收货地址</b></h5>
      <?php if(is_array($payData) || $payData instanceof \think\Collection || $payData instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($payData) ? array_slice($payData,0,1, true) : $payData->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pay): $mod = ($i % 2 );++$i;?>
      <input type="hidden" id="userid" value="<?php echo $pay['uid']; ?>">
      姓名：<span id="username"><?php echo $pay['username']; ?></span>
      电话号码：<span id="phone"><?php echo $pay['phone']; ?></span>
      收货地址：<span id="address"><?php echo $pay['address']; ?></span>
      <br/> <label for="pay_method">支付方式</label>：
      <input name="" type="radio" value="" checked="checked" id="pay_method">&nbsp;支付宝支付
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <h5 class="dark"><b>确认账单信息</b></h5>
    <table id="myorderTable" cellpadding="0" cellspacing="0">
      <tr>
        <th width="276">我的宝贝</th>
        <th width="247">商品规格</th>
        <th width="179">商品单价</th>
        <th width="132">购买数量</th>
        <th width="132">商品折扣</th>
        <th width="232">小计</th>
      </tr>
      <?php if(is_array($payData) || $payData instanceof \think\Collection || $payData instanceof \think\Paginator): $i = 0; $__LIST__ = $payData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pay): $mod = ($i % 2 );++$i;?>
      <tr class="order_lists" >
        <input type="hidden" class="commodity" id="<?php echo $pay['id']; ?>"/>
        <td >
          <div class="info-detail">
            <a class="img-box" href="javascript:" onclick="secommodity(<?php echo $pay['cid']; ?>)">
              <img src="<?php echo $pay['img']; ?>" alt="" class="info-img">
            </a>
            <div class="info-msg">
              <a href="javascript:" onclick="secommodity(<?php echo $pay['cid']; ?>)"><div class="info-title"><?php echo $pay['cname']; ?></div></a>
            </div>
          </div>
        </td>
        <td ><?php echo $pay['specification']; ?></td>
        <td id="price"><?php echo $pay['price']; ?></td>
        <td id="num"><?php echo $pay['number']; ?></td>
        <td ><?php echo $pay['discount']; ?></td>
        <td  id="totalprice_<?php echo $pay['id']; ?>" class="totalprice"><?php echo $pay['totalprice']; ?></td>
      </tr>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    
    <div class="Order_price">
      <div class="box_wrapper">
        <div class="box_shadow">
          <div>
            <span class="realpay-title">实付款:</span>
            <span><div id="total_money"></div></span>
          </div>
          <div class="order-confirm">
            <div><b>寄送至：</b><span id="order-address"></span></div>
            <div><b>收货人：</b><span id="order-user"></span> <span id="order-phone"></span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="add_orderbox">
      <a href="javascript:" class="op-return" onclick="deleteAll(<?php echo $pay['uid']; ?>)"><i class="fa fa-angle-left"></i>返回购物车</a>
      <a href="javascript:" class="op-cart" onclick="pay(<?php echo $pay['id']; ?>)">提交订单</a>
    </div>
  </form>
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
    window.location = '<?php echo url("Commodity/commodityinfo"); ?>' + '?id=' + id;
  }

  function deleteAll(id) {
    if (confirm('还有订单未提交，确定不买了吗？')) {
      window.location = '<?php echo url("User/dopaydelete"); ?>' + '?id=' + id;
    }
  
  }
  //window
  // function goodbye(){
  //   let id = $("#userid").val();
  //   event.returnValue=("确定离开当前页面吗？");
  //   window.location = '<?php echo url("User/dopaydelete"); ?>' + '?id=' + id;
  //
  // }
</script>
<script>
  //totalMoney
  let total = 0;
  let commodity = $('.commodity');
  commodity.each(function () {
      var goods = parseFloat($(this).parents('.order_lists').find('.totalprice').html());
      total += goods;
    
  });
  $('#total_money').html('￥' +total);
  
  function pay(){
    let arr = [];
    commodity.each(function () {
        //id是订单id
        let id = parseFloat($(this).parents('.order_lists').find('.commodity').attr("id"));
        arr.push({id});
        
    });
    $.ajax({
      'url': '<?php echo url("doorder"); ?>',
      'data': {'pays': JSON.stringify(arr)},
      'type': 'post',
      'dataType': 'JSON',
      success: function (response) {
        if (response.code) {
          setTimeout(function (){
            window.location.href = "/index/Alipay/index?pid=" + response.data.pid + "&totalprice=" + response.data.totalprice;
          },response.wait * 200);
        } else {
          // window.location.href = "/index/User/order"
        }
      }
    })
  }
  
</script>
<script>
  //获取用户信息
  let user = document.getElementById("username");
  address = document.getElementById("address");
  phone = document.getElementById("phone");
  $('#order-user').html(user.innerText);
  $('#order-address').html(address.innerText);
  $('#order-phone').html(phone.innerText);
  // user.onblur = function (){
  //   $('#order-user').html(user.value);
  // }
  // address.onblur = function (){
  //   $('#order-address').html(address.value);
  // }
  // phone.onblur = function (){
  //   $('#order-phone').html(phone.value);
  // }
</script>
</html>