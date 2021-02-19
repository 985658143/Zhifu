<?php


namespace app\index\model;


use think\Model;
use think\db;

class Spcart extends Model
{
  public function seCommodity($cid,$uid)
  {
    return $this->where([
      'cid' => $cid,
      'uid' => $uid,
    ])->find(); // TODO: Change the autogenerated stub
  }

  public function updateNum($data)
  {
    return $this->isUpdate(true)->data($data)->save();
  }

  public function deleteSpcart($id)
  {
    return Db::name('spcart')->field('id', true)->where(['cid' => $id])->delete(true);

  }

}