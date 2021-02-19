<?php

namespace app\index\model;
use think\Db;
use think\Model;

class Logistics extends Model{
    public function selectPid($id){
        return $this->whereOr([
          'pid' => $id
        ])->find(); // TODO: Change the autogenerated stub
    }
  public function deleteLd($id){
    return Db::name('logistics')->field('id',true)->where(['pid'=>$id])->delete(true);
  }
}