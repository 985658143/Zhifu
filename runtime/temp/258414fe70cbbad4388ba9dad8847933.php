<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\wamp64\www\Zhifu\public/../app/index\view\user\order.html";i:1609937102;}*/ ?>
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
  <noscript>抱歉，你的浏览器不支持 JavaScript!</noscript>
  
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
    <div class="z_content">
      <h4 class="user-title">我的订单</h4>
      <div class="order-tab">
        <table class="table">
          <tr>
            <th>账单号</th>
            <th>总价</th>
            <th>日期</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
          <?php if(is_array($orderData) || $orderData instanceof \think\Collection || $orderData instanceof \think\Paginator): $i = 0; $__LIST__ = $orderData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?>
          <tr class="order_list">
            <td id="pid"><?php echo $order['pid']; ?></td>
            <td><?php echo $order['totalprice']; ?></td>
            <td><?php echo $order['date']; ?></td>
            <td id="status"><?php echo $order['status']; ?></td>
            <td>
              <a href="javascript:" class="btn btn-primary" onclick="seInfo('<?php echo $order['pid']; ?>')">查看详情</a>
              <a href="javascript:" onclick="deleteInfo('<?php echo $order['pid']; ?>')" class="btn btn-primary">删除</a>
            </td>
          </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
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
  
  function seInfo(id) {
    window.location = '<?php echo url("User/orderdetails"); ?>' + '?id=' + id;
  }
  
  function deleteInfo(id) {
    if (confirm("确定要删除该订单吗？")) {
      window.location = '<?php echo url("User/doorderdelete"); ?>' + '?id=' + id;
    }
  }

</script>
</html>