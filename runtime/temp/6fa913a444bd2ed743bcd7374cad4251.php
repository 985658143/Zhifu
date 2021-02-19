<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp64\www\Zhifu\public/../app/index\view\user\orderdetails.html";i:1609937110;}*/ ?>
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
  <link rel="stylesheet" type="text/css" href="/static/plugin/fa/css/font-awesome.css" />
  
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/plugin/bs/js/bootstrap.js"></script>
  <title>智付商城</title>
  <link rel="icon" type="image/x-icon" href="/static/img/money.png" />
</head>

<body>
<div id="common_head">
  <div class="line1">
    <div class="content">
      <ul>
        <?php if(empty(\think\Cookie::get('id')) || ((\think\Cookie::get('id') instanceof \think\Collection || \think\Cookie::get('id') instanceof \think\Paginator ) && \think\Cookie::get('id')->isEmpty())): ?>
        <li >
          <span >
            <a href="/index/Login/login">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/index/User/register">注册</a>
          </span>
        </li>
        <?php else: ?>
        <li>
          <span >
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
    <input type="submit" value="搜 索" onclick="search()" />
    <span id="goto">
			<a id="goto_order" href="/index/User/order">我的订单</a>
			<a id="goto_cart" href="/index/User/spcart"><i class="fa fa-shopping-cart"></i>我的购物车</a>
		</span>
  </div>
</div>
<div class="warp order-info">

  <form >
  <div class="trade-info">
    <div class="trade-title">
      <p>物流信息</p>
    </div >
    <div class="express">
      <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($data) ? array_slice($data,0,1, true) : $data->slice(0,1, true); if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$logistics): $mod = ($i % 2 );++$i;?>
      运单号码：<span><?php echo $logistics['serialnum']; ?></span>
      物流公司：<span><?php if($logistics['expressname'] == 'HTKY'): ?>百世快递<?php endif; if($logistics['expressname'] == 'STO'): ?>申通快递<?php endif; if($logistics['expressname'] == 'YTO'): ?>圆通快递<?php endif; if($logistics['expressname'] == 'HHTT'): ?>天天快递<?php endif; ?>
               </span>
      <?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </div>

    <ul>
      <?php if(is_array($traces) || $traces instanceof \think\Collection || $traces instanceof \think\Paginator): $i = 0; $__LIST__ = $traces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$traces): $mod = ($i % 2 );++$i;?>
      <li class="table-list">
        <span class="accepttime"><?php echo $traces['AcceptTime']; ?></span>
        <span class="acceptstation"><?php echo $traces['AcceptStation']; ?></span>
      </li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  </form>

  <form >
    <div class="trade-info">
      <div class="trade-title">
        <p>订单详情</p>
      </div >
      <ul>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($data) ? array_slice($data,0,1, true) : $data->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$od): $mod = ($i % 2 );++$i;?>
        <li class="table-list">收货人：<?php echo $od['username']; ?>   <?php echo $od['phone']; ?></li>
        <li class="table-list">收货地址：<?php echo $od['address']; ?></li>
        <li class="table-list">订单号：<?php echo $od['pid']; ?></li>

        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <table id="ordertable" cellpadding="0" cellspacing="0">
        <tr>
          <th width="276">我的宝贝</th>
          <th width="247">单价</th>
          <th width="179">数量</th>
          <th width="132">折扣</th>
          <th width="132">小计</th>
          <th width="232">状态</th>
        </tr>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$od): $mod = ($i % 2 );++$i;?>
        <tr class="order_lists">
          <input type="hidden" class="commodity" id="<?php echo $od['id']; ?>"/>
          <td>
            <div class="info-detail">
              <a class="img-box" href="javascript:" onclick="secommodity('<?php echo $od['cid']; ?>')">
                <img src="<?php echo $od['img']; ?>" alt="" class="info-img">
              </a>
              <div class="info-msg">
                <a href="javascript:" onclick="secommodity('<?php echo $od['cid']; ?>')" title="<?php echo $od['cname']; ?>"><div class="info-title"><?php echo $od['cname']; ?></div></a>
              </div>
              <div class="spe-info"><p><?php echo $od['specification']; ?></p></div>
            </div>
          </td>
          <td><?php echo $od['price']; ?></td>
          <td><?php echo $od['number']; ?></td>
          <td><?php echo $od['discount']; ?></td>
          <td id="totalprice"><?php echo $od['totalprice']; ?></td>
          <td><?php echo $od['status']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <div class="Order_price">
        <div class="box_wrapper bw">
          <div class="box_shadow">
            <div>
              <span class="realpay-title">实付款:</span>
              <div id="total_money"></div>
            </div>

          </div>
        </div>
      </div>
      <div class="add_orderbox">
        <a href="/index/User/order" class="op-return" ><i class="fa fa-angle-left"></i>返回订单</a>
      </div>
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
  //totalMoney
  let total = 0;
  let commodity = $('.commodity');
  commodity.each(function () {
    var goods = parseFloat($(this).parents('.order_lists').find('#totalprice').html());
    total += goods;

  });
  $('#total_money').html('￥' +total);
</script>
<script>
  function search(){
    let content = document.getElementById("s1");
    let value = content.value;
    window.location = '<?php echo url("Commodity/search"); ?>' + '?value=' + value;
  }
  function secommodity(id) {
    window.location = '<?php echo url("Commodity/commodityinfo"); ?>' + '?id=' + id;
  }
</script>
</html>