<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wamp64\www\Zhifu\public/../app/index\view\admin\addcommodity.html";i:1610350046;}*/ ?>
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
      <h1><a class="navbar-brand" href="/index/Admin/Adminpage">智付商城</a></h1>
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
          <span>addcommodity</span>
        </h2>
      </div>
      <!--content-->
      <div class="content-top">
        <div class="col-md-12 ">
          <div class="content-top-2">
            <div class="top-content">
              <h2 class="title2">商品信息</h2>
              <div class="form-body">
                <form id="addForm">
                  <div class="form-group">
                    <b>商品名：</b><input type="text" class="form-control3" id="cname" name="cname">
                  </div>
                  <div class="form-group">
                    <b>单价：</b><input type="text" class="form-control3" name="price" id="price">
                  </div>
                  <div class="form-group">
                    <b>类别：</b>
                    <select class="form-control3" name="typeid" id="typeid">
                      <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                      <option value="<?php echo $type['id']; ?>" selected="selected"><?php echo $type['typename']; ?></option>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <b>数量：</b><input type="text" class="form-control3" name="number" id="number">
                  </div>
                  <div class="form-group">
                    <b>折扣：</b><input type="text" class="form-control3" name="discount" id="discount">
                  </div>
                  <div class="form-group">
                    <b>折后价：</b><input type="text" class="form-control3" name="discountprice" id="discountprice"
                                      readonly>
                  </div>
                  <div class="form-group">
                    <b>详情：</b><br>
                    <textarea style="width:300px;height: 200px" type="text" class="form-control3" name="specification"
                              id="specification"></textarea>
                  </div>
                  <div class="form-group">
                    <b>图片：</b><input type="file" class="form-control3" name="img" id="img">
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">提交</button>
                    <button type="reset" class="btn btn-primary">重置</button>
                  </div>
                  <div class="form-group">
                    <a href="/index/Admin/commodity"><input type="button" class="btn btn-primary" value="返回"></a>
                  </div>
                  <div id="status"></div>
                </form>
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
  //折后价跟随折扣变化
  let discount = document.getElementById("discount");
  let price = document.getElementById("price");
  let disprice = document.getElementById("discountprice");
  
  discount.onblur = function () {
    if (discount.value != 0) {
      disprice.value = discount.value * price.value;
    } else {
      disprice.value = price.value;
    }
  }
</script>
<script>
  
  $("#addForm").submit(function () {
    console.log('表单被提交了');
    let formData = new FormData(document.getElementById("addForm"));
    $.ajax({
      url: "/index/Admin/doCommodityadd",
      type: "post",
      dataType: "json",
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $("#status").html('<i class="fa fa-spin fa-spinner"></i>')
      },
      success: function (response) {
        $("#status").html(response.msg);
        if (response.code) {
          
          setTimeout(function () {
            window.location.href = "/index/Admin/commodity"
          }, response.wait * 1000);
          
        } else {
          //后端处理有错误
          $("#status").html(response.msg);
        }
      },
      error: function (e) {
        console.log(e);
        $("#status").html("<i class='fa fa-close'></i>");
      },
      complete: function () {
        console.log('请求完成,无论成功与失败,我都会执行');
      }
    });
    return false;
  });
</script>
</html>

