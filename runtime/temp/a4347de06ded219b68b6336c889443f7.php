<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\wamp64\www\Zhifu\public/../app/index\view\user\userinfo.html";i:1608627736;}*/ ?>
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
    <div class="">
      <div class="z_content">
        <h4 class="user-title">我的信息</h4>
        <div class="atr">
          <div class="u-pic">
            <img id="用户头像" src="<?php echo $userData['avatar']; ?>" alt="">
            <input type="hidden" value="<?php echo $userData['avatar']; ?>">
            <div class="mask"></div>
          </div>
          <div class="info-m">
            <div>
              <b>用户名：<?php echo $userData['username']; ?></b>
            </div>
          </div>
        </div>
        <div class="user-set">
          <form data-toggle="validator" id="userform">
            <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">
            <div class="form-group">
              <b>修改头像：</b><input type="file" class="form-card" name="avatar" value="<?php echo $userData['avatar']; ?>">
            </div>
            <div class="form-group">
              <b>用&nbsp;&nbsp;户&nbsp;&nbsp;名：</b><?php echo $userData['username']; ?>
            </div>
            <div class="form-group">
              <b>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</b>
              <select class="form-card" name="gender" id="gender">
                <option value="unknown" <?php if($userData['gender']=='unknown'): ?>selected="selected"<?php endif; ?>>保密</option>
                <option value="boy" <?php if($userData['gender']=='boy'): ?>selected="selected"<?php endif; ?>>男</option>
                <option value="girl" <?php if($userData['gender']=='girl'): ?>selected="selected"<?php endif; ?>>女</option>
              </select>
            </div>
            <div class="form-group">
              <b>出生日期：</b><input type="date" class="form-card" name="birth" value="<?php echo $userData['birth']; ?>">
            </div>
            <div class="form-group">
              <b>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：</b><input type="text" class="form-card" name="address" value="<?php echo $userData['address']; ?>">
            </div>
            <div class="form-group">
              <b>手&nbsp;&nbsp;机&nbsp;&nbsp;号：</b><input type="text" class="form-card" name="phone" value="<?php echo $userData['phone']; ?>">
            </div>
            <div class="form-group">
              <b>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</b><input type="text" class="form-card" name="email" value="<?php echo $userData['email']; ?>">
            </div>
            <div class="form-group">
              <b>注册时间：</b><?php echo $userData['regitime']; ?>
            </div>
            <div class="user-button">
              <button type="submit" class="btn btn-default">提交</button>
              <a href="/index/User/userpage">
                <button type="button" class="btn btn-default">返回</button>
              </a>
            </div>
            <div id="status"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class=""></div>
<div id="common_foot">
  <p>
    Copyright © 2020-2021 智付商城 版权所有 保留一切权利
  </p>
</div>
</body>
<script>
  
  $("#userform").submit(function () {
    console.log('表单被提交了');
    let formData = new FormData(document.getElementById("userform"));
    $.ajax({
      url: "/index/User/doUpuser",
      type: "post",
      dataType: "json", //text, json, html
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function () {
        console.log('我在请求发送之前会被执行');
        $("#status").html("<i class='fa fa-spinner fa-spin'></i>");
      },
      success: function (response) {
        $("#status").html(response.msg);
        if (response.code) {
          $("#status").html("<i class='fa fa-check'></i>" + response.msg);
          setTimeout(function () {
            window.location.href = "/index/User/userinfo"
          }, response.wait * 1000);
        } else {
          //后端处理有错误
          $("#status").html(response.msg);
        }
      },
      error: function (e) {
        console.log(e);
        $("#status").html("<i class='fa fa-close'></i>" + response.msg);
      },
      complete: function () {
        console.log('请求完成,无论成功与失败,我都会执行');
        
      }
    });
    return false; //禁用默认的表单提交跳转
  });
</script>
<script>
  function search() {
    let content = document.getElementById("s1");
    let value = content.value;
    window.location = '<?php echo url("Commodity/search"); ?>' + '?value=' + value;
  }
</script>
</html>