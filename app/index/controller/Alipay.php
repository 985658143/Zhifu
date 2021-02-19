<?php


namespace app\index\controller;


use think\Loader;

class Alipay extends Common
{
  public function alipay(){
    define("AOP_SDK_WORK_DIR", EXTEND_PATH.'/alipay/tmp/');
    define("AOP_SDK_DEV_MODE", true);
    require_once (EXTEND_PATH.'/alipay/lotusphp_runtime/Lotus.php');

    $lotus = new \Lotus();
    $lotus->option["autoload_dir"] = EXTEND_PATH.'/alipay/aop/';
    $lotus->devMode = AOP_SDK_DEV_MODE;
    $lotus->defaultStoreDir = AOP_SDK_WORK_DIR;
    $lotus->init();
  }
  public function index($pid,$totalprice){
    return $this->fetch('', ['pid' => $pid,'totalprice' => $totalprice]);
  }

  public function pagepay(){
    require_once (EXTEND_PATH.'/alipay/pagepay/pagepay.php');
  }
  public function notify_url(){
    require_once (EXTEND_PATH.'/alipay/notify_url.php');
  }
  public function return_url(){
    require_once (EXTEND_PATH.'/alipay/return_url.php');
  }


}