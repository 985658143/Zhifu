<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp64\www\Zhifu\public/../app/index\view\login\userlogin.html";i:1608534632;}*/ ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="icon" type="image/x-icon" href="/static/img/money.png"/>
  <link rel="stylesheet" type="text/css" href="/static/css/login.css" />
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/js/cookie.js"></script>
  <script type="text/javascript" src="/static/js/code.js"></script>
  <title>欢迎登录 智付商城</title>
</head>
<body>
<a href="/index/user/index"><img class="logo" src="/static/img/logo.png" alt="logo"></a>
<h1>欢迎登陆智付商城</h1>
<form id="userForm">
  <table>
    <tr>
      <p id="status"></p>
      <td class="tdx"><label for="username">用户名：</label></td>
      <td>
        <input type="text" id="username" name="username" value=""/>
        <span style="color:red"></span>
      </td>
    </tr>
    <tr>
      <td class="tdx"><label for="password">密&nbsp;&nbsp;&nbsp;码：</label></td>
      <td>
        <input type="password" name="password" id="password"/>
      </td>
    </tr>
    <tr>
      <td>
        <canvas id="canvas"></canvas>
      </td>
      <td>
        <input type="text" id="a1 " value="" placeholder="请输入验证码（不区分大小写）" class="input-val"/>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="text-td1">
        <input type="submit" id="b3" name="submit" value="登陆"/>
        <input type="button" id="b2" value="注册"/>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="text-td2">
        <input type="button" id="b1" value="管理员"/>
        <input type="button" value="用户"/>
      </td>
    </tr>
  </table>
</form>
</body>
<script>
  let b1 = document.getElementById("b1");
  b1.onclick = function () {
    window.location = '/index/login/login'
  }
  let b2 = document.getElementById("b2");
  b2.onclick = function () {
    window.location = '/index/user/register'
  }
</script>
<script>
  $(function () {
    code_draw();
    // 点击后刷新验证码
    $("#canvas").on('click', function () {
      code_draw();
    })
    $("#b3").on('click', function () {
      let user = document.getElementById("username");
      let pwd = document.getElementById("password");
      if (user.value == '' || pwd.value == '') {
        alert('输入不能为空！');
      } else {
        // 将输入的内容转为大写，可通过这步进行大小写验证
        let val = $(".input-val").val().toLowerCase();
        // 获取生成验证码值
        let num = $('#canvas').attr('data-code');
        if (val == '') {
          alert("请输入验证码！");
        } else if (val == num) {
          //ajax验证
          $("#userForm").submit(function () {
            console.log('表单被提交了');
            let formData = new FormData(document.getElementById("userForm"));
            $.ajax({
              url: "/index/Login/doUserLogin",
              type: "post",
              dataType: "json", //text, json, html
              data: formData,
              contentType: false,
              processData: false,
              beforeSend: function () {
                $("#status").html('<i class="fa fa-spin fa-spinner"></i>正在登录请稍后')
              },
              success: function (response) {
                $("#status").html(response.msg);
                if (response.code) {
                  //登录成功
                  setTimeout(function () {
                    window.location.href = "/index/User/index"
                  }, response.wait * 200);
                } else {
                  //后端处理有错误
                  $("#status").html(response.msg);
                }
              },
            });
            return false; //禁用默认的表单提交跳转
          });
        } else {
          alert("验证码错误！请重新输入！");
        }
      }
    })
  })


</script>
</html>