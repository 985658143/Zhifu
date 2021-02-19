<?php


namespace app\index\model;

use think\Db;
use think\Model;

class Admin extends Model
{
  public function login($name, $password)
  {
    return Db::name('admin')->field('password', true)->where([
      'name' => $name,
      'password' => $password,
    ])->find();
  }

  public function userlist()
  {
    return Db::name('user')->field(true)->order('id')->paginate(5);
  }

  public function updateUser($id, $data)
  {
    return Db::name('user')->where($id)->update($data);
  }

  public function deleteUser($id)
  {
    return Db::name('user')->field('id', true)->where(['id' => $id])->delete(true);
  }

  public function selectUser($id)
  {
    return Db::name('user')->where(['id' => $id])->find();
  }

  public function queryuserid($username)
  {
    return Db::name('user')->field('id', false)->where(['username' => $username])->find();
  }

  public function commodity()
  {
    return Db::name('commodity')->field(true)->order('id')->paginate(5);
  }

  public function addCommodity($data)
  {
    return Db::name('commodity')->field(true)->insert($data);
  }

  public function selectCommodity($id)
  {
    return Db::name('commodity')->where(['id' => $id])->find();
  }

  public function updateCommodity($id, $data)
  {
    return Db::name('commodity')->where(['id' => $id])->update($data);
  }

  public function deleteCommodity($id)
  {
    return Db::name('commodity')->field('id', true)->where(['id' => $id])->delete(true);
  }
  public function upCollect($id){
    return Db::name('collect')->field(true)->where(['cid' => $id])->update(['status' => '缺货']);
  }
  public function seCollect($id){
    return Db::name('collect')->where(['cid'=>$id])->select();
  }

  public function seSpcart($id){
    return Db::name('spcart')->where(['cid'=>$id])->select();
  }

  public function deleteSpcart($id)
  {
    return Db::name('spcart')->field('id', true)->where(['cid' => $id])->delete(true);
  }

  public function type()
  {
    return Db::name('type')->field(true)->order('id')->paginate(10);
  }

  public function selectTid($id)
  {
    return Db::name('type')->where(['id' => $id])->find();
  }

  public function updateType($id, $data)
  {
    return Db::name('type')->where($id)->update($data);
  }

  public function addType($data)
  {
    return Db::name('type')->field(true)->insert($data);
  }

  public function deleteType($id)
  {
    return Db::name('type')->field('id', true)->where(['id' => $id])->delete(true);
  }
}