<?php


namespace app\index\model;


use think\Db;
use think\Model;

class Pay extends Model
{
  public function deletePay($id){
    return Db::name('pay')->field('id',true)->where(['pid'=>$id])->delete(true);
  }
}