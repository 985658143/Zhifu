<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp64\www\Zhifu\public/../app/index\view\commodity\commodityinfo.html";i:1609124675;}*/ ?>
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
        <li><a href="./seckill-list.html">折扣商品</a></li>
        <?php if(is_array($TypeData) || $TypeData instanceof \think\Collection || $TypeData instanceof \think\Paginator): $i = 0; $__LIST__ = $TypeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
        <li><a href="javascript:" id="typename" onclick="selist(<?php echo $type['id']; ?>)"><?php echo $type['typename']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
</div>
<?php if(is_array($commodityData) || $commodityData instanceof \think\Collection || $commodityData instanceof \think\Paginator): $i = 0; $__LIST__ = $commodityData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$commodityData): $mod = ($i % 2 );++$i;?>

<div id="warp">
  <div id="left">
    <div>
      <input type="hidden" value="<?php echo $commodityData['id']; ?>">
    </div>
    <div id="left_top">
      <img src="<?php echo $commodityData['img']; ?>" id="prod_img" alt="prod_img"/>
    </div>
  </div>
  <div id="right">
    <div id="right_top">
      <span id="prod_name"><?php echo $commodityData['cname']; ?><br/></span>
      <br>
      <span id="prod_desc"><?php echo $commodityData['specification']; ?><br/></span>
    
    </div>
    <div id="right_middle">
				<span id="right_middle_span">
                    类别：<span>
                    <?php if($commodityData['typeid'] == '1'): ?>电脑手机<?php endif; if($commodityData['typeid'] == '2'): ?>家用电器<?php endif; if($commodityData['typeid'] == '3'): ?>箱包钟表<?php endif; if($commodityData['typeid'] == '4'): ?>食品饮料<?php endif; if($commodityData['typeid'] == '5'): ?>图书杂志<?php endif; if($commodityData['typeid'] == '6'): ?>服装鞋子<?php endif; if($commodityData['typeid'] == '7'): ?>彩妆潮品<?php endif; ?>
                    <br/></span>
                    单价：<span class="price_red r1">￥<?php echo $commodityData['price']; ?></span><br/>
                    折后价：<span class="price_red r2">￥<?php echo $commodityData['discountprice']; ?></span><br/>
			            服     务：由智付商城负责发货，并提供售后服务<br/>
                    库存：<span id="prod_num"><?php echo $commodityData['number']; ?></span>件<br/>
                    <label for="buyNumInp">购买数量：</label>
	                <a href="javascript:void(0)" id="delNum" onclick="change(-1)">-</a>
	                <input id="buyNumInp" name="buyNum" type="text" value="1"/>
		            <a href="javascript:void(0)" id="addNum" onclick="change(1)">+</a>
                </span>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; if(empty(\think\Cookie::get('id')) || ((\think\Cookie::get('id') instanceof \think\Collection || \think\Cookie::get('id') instanceof \think\Paginator ) && \think\Cookie::get('id')->isEmpty())): ?>
    <div class="right_bottom">
      <button class="add_cart_but" type="button" id="a3">收藏商品</button>
      <button class="add_cart_but" type="button" id="a1"><i class="fa fa-shopping-cart"></i>加入购物车</button>
      <button class="buy_but" type="button" id="a2">立即购买</button>
    </div>
    <?php else: ?>
    <div class="right_bottom">
      <button class="add_cart_but" type="button" onclick="addCollect(<?php echo $commodityData['id']; ?>)">收藏商品</button>
      <button class="add_cart_but" type="submit" onclick="addCart(<?php echo $commodityData['id']; ?>)">
        <i class="fa fa-shopping-cart"></i>加入购物车
      </button>
      <button class="buy_but" type="button" onclick="addPay(<?php echo $commodityData['id']; ?>)">立即购买</button>
      
      <div id="status"></div>
    </div>
    <?php endif; ?>
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

<script>
  let a1 = document.getElementById("a1");
  a1.onclick = function () {
    alert("没有账号不能购买哦，请先登录一下吧！");
    window.location = '/index/Login/userlogin'
  }
  
  let a2 = document.getElementById("a2");
  a2.onclick = function () {
    alert("没有账号不能购买哦，请先登录一下吧！");
    window.location = '/index/Login/userlogin'
  }
  let a3 = document.getElementById("a3");
  a3.onclick = function () {
    alert("没有账号不能收藏哦，请先登录一下吧！");
    window.location = '/index/Login/userlogin'
  }
  
  function addCart(id) {
    
    let num = document.getElementById("buyNumInp").value;
    let total = parseInt(document.getElementById("prod_num").innerText);
    if (num > total) {
      alert("最多购买" + total + "个");
    } else {
      window.location = '<?php echo url("User/dospcartadd"); ?>' + '?id=' + id + '&num=' + num;
    }
  }
  
  function addCollect(id) {
    window.location = '<?php echo url("User/addCollect"); ?>' + '?id=' + id;
  }
  
  function addPay(id) {
    let num = document.getElementById("buyNumInp").value;
    let total = parseInt(document.getElementById("prod_num").innerText);
    if (num > total) {
      alert("最多购买" + total + "个");
    } else {
      $.ajax({
        'url': '<?php echo url("User/addpay"); ?>',
        'data': {id, num},
        'type': 'post',
        'dataType': 'JSON',
        success: function (response) {
          console.log(response);
          if (response.code) {
            setTimeout(function () {
              window.location.href = "/index/User/pay?pid=" + response.data.pid;
            }, response.wait * 200);
          } else {
            // window.location.href = "/index/User/pay"
          }
        }
      })
    }
  }
  
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