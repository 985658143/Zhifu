<?php


namespace app\index\model;


use  think\Db;
use think\Model;

class Collect extends Model
{
  public function seCollect($cid)
  {
    return $this->whereOr([
      'cid' => $cid,
    ])->find(); // TODO: Change the autogenerated stub
  }

}