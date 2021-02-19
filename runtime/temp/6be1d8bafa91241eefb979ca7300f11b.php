<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\wamp64\www\Zhifu\public/../app/index\view\user\register.html";i:1608535072;}*/ ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>欢迎注册 智付商城</title>
  <link rel="icon" type="image/x-icon" href="/static/img/money.png"/>
  <link rel="stylesheet" type="text/css" href="/static/css/regist.css" />
  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  <script type="text/javascript" src="/static/js/cookie.js"></script>
  <script type="text/javascript" src="/static/js/code.js"></script>
  <meta charset="UTF-8">
</head>
<body>
<a href="/index/user/index"><img class="logo" src="/static/img/logo.png" alt="logo"></a>
<form id="regForm">
  <h1>欢迎注册智付商城</h1>
  <table>
    <tr>
      <td class="tds"><label for="username">用户名：</label></td>
      <td>
        <input type="text" name="username" id="username"/>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="password">密码：</label></td>
      <td>
        <input type="password" name="password" id="password"/>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="repassword">确认密码：</label></td>
      <td>
        <input type="password" name="repassword" id="repassword"/>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="gender">性别：</label></td>
      <td>
        <div>
          <select class="form-control" name="gender" id="gender">
            <option value="unknown" selected="selected">保密</option>
            <option value="boy">男</option>
            <option value="girl">女</option>
          </select>
        </div>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="avatar">上传头像：</label></td>
      <td>
        <input type="file" name="avatar" id="avatar"/>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="birth">生日：</label></td>
      <td>
        <input type="date" name="birth" id="birth"/>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="address">地址：</label></td>
      <td>
        <input type="text" name="address" id="address"/>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="phone">手机号：</label></td>
      <td>
        <input type="number" name="phone" id="phone"/>
      </td>
    </tr>
    <tr>
      <td class="tds"><label for="email">邮箱：</label></td>
      <td>
        <input type="text" name="email" id="email"/>
      </td>
    </tr>
    <tr>
      <td>
        <canvas id="canvas"></canvas>
      </td>
      <td>
        <input type="text" id="a1" value="" placeholder="请输入验证码（不区分大小写）" class="input-val"/>
      </td>
    </tr>
    <tr>
      <td class="sub_td" colspan="2">
        <input type="submit" id="register" name="register" value="注册用户"/>
      </td>
    </tr>
    <tr>
      <td class="sub_td" colspan="2">
        <a href="/index/Login/userlogin"><p>已有账号？立即登录</p></a>
      </td>
    </tr>
  </table>
  <div class="register" id="status"></div>
</form>
</body>
<script>
  $(function () {
    code_draw();
    // 点击后刷新验证码
    $("#canvas").on('click', function () {
      code_draw();
    })
    $("#register").on('click', function () {
      // 将输入的内容转为大写，可通过这步进行大小写验证
      let val = $(".input-val").val().toLowerCase();
      // 获取生成验证码值
      let num = $('#canvas').attr('data-code');
      if (val == '') {
        alert("请输入验证码！");
      } else if (val == num) {
        //ajax验证
        $("#regForm").submit(function () {
          console.log('表单被提交了');
          let formData = new FormData(document.getElementById("regForm"));
          $.ajax({
            url: "/index/User/doRegister",
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
                //后端处理正常
                setTimeout(function () {
                  window.location.href = "/index/Login/userlogin"
                }, response.wait * 200);
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
          return false; //禁用默认的表单提交跳转
        });
      } else {
        alert("验证码错误！请重新输入！");
      }
    })
  })
</script>
</html>