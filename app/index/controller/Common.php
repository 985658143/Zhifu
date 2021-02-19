<?php


namespace app\index\controller;

use think\Controller;
use think\Cookie;
use think\Db;

class Common extends Controller
{
  protected function clearCookie()
  {
    $cookies = Cookie::get();
    foreach ($cookies as $key => $value) {
      Cookie::set($key, null);
    }
  }

  protected function batchSetCookie($cookies)
  {
    foreach ($cookies as $key => $value) {
      Cookie::set($key, $value);
    }
  }

  protected function checkLibrarianLoginStatus()
  {
    return Cookie::has('name');
  }

  protected function checkUserLoginStatus()
  {
    return Cookie::has('username');
  }

  protected function checkServiceLoginStatus()
  {
    return Cookie::has('servicename');
  }

  protected function Typelist()
  {
    $TypeData = Db::name('type')->field(true)->order('id')->paginate(8);
    $this->assign('TypeData', $TypeData);
//        return $this->fetch();
  }
}