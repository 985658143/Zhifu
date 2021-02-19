<?php


namespace app\index\model;


use think\Db;
use think\Model;

class Orderdetails extends Model
{
  public function deleteOd($id){
    return Db::name('orderdetails')->field('id',true)->where(['pid'=>$id])->delete(true);
  }
}