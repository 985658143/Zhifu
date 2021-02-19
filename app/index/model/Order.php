<?php


namespace app\index\model;

use think\Db;
use think\Model;

class Order extends  Model
{
  public function deleteOrder($id){
    return Db::name('order')->field('id',true)->where(['pid'=>$id])->delete(true);
  }
}