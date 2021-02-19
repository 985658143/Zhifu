<?php


namespace app\index\controller;


use Think\Cookie;
use think\Db;

class Commodity extends Common
{
  public function commodityinfo($id)
  {
    $commodity = new \app\index\model\Commodity();
    $commodityData = $commodity::where('id', $id)->select();
    $this->assign('commodityData', $commodityData);
    $this->Typelist();
    return $this->fetch();

  }

  public function commoditylist($id)
  {

    $commodity = new \app\index\model\Commodity();
    $commodityData = $commodity->seTypeid($id);
    $this->assign('commodityData', $commodityData);
    $this->Typelist();
    return $this->fetch();

  }

  public function commodityall()
  {

    $commodity = new \app\index\model\Commodity();
    $commodityData = $commodity->seAll();
    $this->assign('commodityData', $commodityData);
    $this->Typelist();
    return $this->fetch();

  }
  public function discount()
  {

    $commodity = new \app\index\model\Commodity();
    $commodityData = $commodity->seDiscount();
    $this->assign('commodityData', $commodityData);
    $this->Typelist();
    return $this->fetch();

  }

  public function search($value)
  {
    $this->Typelist();
    $commodity = new \app\index\model\Commodity();
    $searchinfo = $commodity->seCommodity($value);
    if ($searchinfo) {
      $this->assign('searchinfo', $searchinfo);
      return $this->fetch();
    }
    else {
      $this->error('很抱歉，没有找到相关的商品。');
    }

  }



}