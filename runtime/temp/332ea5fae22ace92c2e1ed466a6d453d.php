<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp64\www\Zhifu\public/../app/index\view\admin\orderdetails.html";i:1609936820;}*/ ?>
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
  <!--    js-->
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/plugin/bs/js/bootstrap.min.js"></script>
  <!--    菜单动画-->
  <script type="text/javascript" src="/static/js/backend/jquery.metisMenu.js"></script>
  <script type="text/javascript" src="/static/js/backend/custom.js"></script>

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
          <a href="/index/Admin/adminpage">Home</a>
          <i class="fa fa-angle-right"></i>
          <span>orderdetails</span>
        </h2>
      </div>
      <!--content-->
      <div class="content-top">
        <div class="col-md-12 ">
          <div class="content-top-2">

            <div class="top-content">
              <h2 class="title1">物流信息</h2>
              <div class="express">
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($data) ? array_slice($data,0,1, true) : $data->slice(0,1, true); if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$logistics): $mod = ($i % 2 );++$i;?>
                运单号码：<span><?php echo $logistics['serialnum']; ?></span>
                物流公司：<span><?php if($logistics['expressname'] == 'HTKY'): ?>百世快递<?php endif; if($logistics['expressname'] == 'STO'): ?>申通快递<?php endif; if($logistics['expressname'] == 'YTO'): ?>圆通快递<?php endif; if($logistics['expressname'] == 'HHTT'): ?>天天快递<?php endif; ?>
                         </span>
                <?php endforeach; endif; else: echo "$empty" ;endif; ?>
              </div>
              <ul class="od-ul">
                <?php if(is_array($traces) || $traces instanceof \think\Collection || $traces instanceof \think\Paginator): $i = 0; $__LIST__ = $traces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$traces): $mod = ($i % 2 );++$i;?>
                <li class="table-list">
                  <span class="accepttime"><?php echo $traces['AcceptTime']; ?></span>
                  <span class="acceptstation"><?php echo $traces['AcceptStation']; ?></span>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>

            <div class="top-content">
              <h2 class="title1">订单详情</h2>
              <ul class="od-ul">
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($data) ? array_slice($data,0,1, true) : $data->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$od): $mod = ($i % 2 );++$i;?>
                <li class="table-list">收货人：<?php echo $od['username']; ?>   <?php echo $od['phone']; ?></li>
                <li class="table-list">收货地址：<?php echo $od['address']; ?></li>
                <li class="table-list">订单号：<?php echo $od['pid']; ?></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
              <table class="table order_dd">
                <tr>
                  <th>商品</th>
                  <th>单价</th>
                  <th>数量</th>
                  <th>折扣</th>
                  <th>小计</th>
                  <th>状态</th>
                </tr>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$od): $mod = ($i % 2 );++$i;?>
                <tr>
                  <td>
                    <div class="od_detail">
                      <a class="img-box" >
                        <img src="<?php echo $od['img']; ?>" alt="" class="info-img" >
                      </a>
                      <div class="info-msg">
                        <div class="info-title"><?php echo $od['cname']; ?></div>
                      </div>
                      <div class="spe-info"><p><?php echo $od['specification']; ?></p></div>
                    </div>
                  </td>
                  <td><?php echo $od['price']; ?></td>
                  <td><?php echo $od['number']; ?></td>
                  <td><?php echo $od['discount']; ?></td>
                  <td><?php echo $od['totalprice']; ?></td>
                  <td><?php echo $od['status']; ?></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
              <div class="table-footer">
                <a href="/index/Admin/order"><input type="button" class="btn btn-primary" value="返回"></a>
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

</html>

