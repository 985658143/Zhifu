<?php


namespace app\index\controller;

use app\index\model\Admin;
use app\index\model\User;
use app\index\model\Service;

class Login extends Common
{
  public function login()
  {
    //检查登录状态
    if ($this->checkLibrarianLoginStatus()) {
      //如果已经登录 -> 首页
      $this->redirect('Admin/adminpage');
    } else {
      //否则 显示登录页
      return $this->fetch();
    }
  }

  public function doLogin()
  {
    $data = $this->request->post();

    $LibModel = new Admin();
    $res = $LibModel->login($data['name'], $data['password']);
    if ($res) {
      $this->batchSetCookie($res);
      $this->success('登录成功,正在跳转到首页...', url('Admin/adminpage'));
    } else {
      //登录失败
      $this->error('用户名或密码错误');
    }

  }

  public function userlogin()
  {
    //检查登录状态
    if ($this->checkUserLoginStatus()) {
      //如果已经登录 -> 首页
      $this->redirect('user/index');
    } else {
      //否则 显示登录页
      return $this->fetch();
    }
  }

  public function doUserLogin()
  {
    $data = $this->request->post();

    $userModel = new User();
    $res = $userModel->login($data['username'], $data['password']);
    if ($res) {
      $this->batchSetCookie($res);
      $this->success('登录成功,正在跳转到首页...', url('user/index'));
    } else {
      //登录失败
      $this->error('用户名或密码错误');
    }

  }


}