<?php


namespace app\index\controller;

use think\Db;

class Admin extends Common
{
  public function adminpage()
  {
    return $this->fetch();
  }

  public function logout()
  {
    //清除cookie
    $this->clearCookie();
    $this->redirect('Login/login');
  }

  public function userlist()
  {
    $LibModel = new \app\index\model\Admin();
    $data = $LibModel->userlist();
    return $this->fetch('userlist', ['data' => $data]);
  }

  public function upuser($id)
  {
    $LibModel = new \app\index\model\Admin();
    $user = $LibModel->selectUser($id);
    return $this->fetch('', ['user' => $user]);
  }

  public function doUserupdate()
  {
    $data = $this->request->post();
    foreach ($data as $field => $value) {
      if (empty($value)) {
        $this->error('字段不能为空');
      } elseif (strlen($data['password']) < 6) {
        $this->error('密码长度小于6');
      } elseif (!preg_match("/^1[345789]\d{9}$/", $data['phone'])) {
        $this->error('手机号格式不正确');
      } elseif (!preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", $data['email'])) {
        $this->error('邮箱格式不正确');
      }
    }
    $data['password'] = md5($data['password']);
    $LibModel = new \app\index\model\Admin();
    $avatar = $this->request->file('avatar');
    if ($avatar) {
      $avatar = $avatar->move(UPLOAD_PATH);
      $transform1 = $avatar->getSaveName();
      $transform2 = str_replace("\\", "/", $transform1);
      $data['avatar'] = '/upload/' . $transform2;
    }
    $id = $LibModel->queryuserid($data['username']);
    $result = $LibModel->updateUser($id, $data);
    if ($result) {
      $this->success('修改成功', url('Admin/userlist'));
    } else {
      $this->error('修改失败', url('Admin/upuser'));
    }

  }

  public function doUserdelete($id)
  {
    $LibModel = new \app\index\model\Admin();
    $result = $LibModel->deleteUser($id);
    if ($result == 1) {
      $this->success('删除成功', url('Admin/userlist'));
    } else {
      $this->error('删除失败', url('Admin/userlist'));
    }
  }

  public function commodity()
  {
    $LibModel = new \app\index\model\Admin();
    $data = $LibModel->commodity();
    return $this->fetch('commodity', ['data' => $data]);
  }
  public function addcommodity()
  {
    $type = new \app\index\model\Type();
    $res = $type->selectALL();
    return $this->fetch('addcommodity', ['res' => $res]);
  }

  public function doCommodityadd()
  {
    if ($img = $this->request->file('img')) {
      $img = $img->move(UPLOAD_PATH);
      $data = $this->request->post();
      foreach ($data as $field => $value) {
        if (empty($value)) {
          $this->error('字段不能为空');
        }
      }
      $CModel = new \app\index\model\Commodity();
      $result = $CModel->selectCommodity($data['cname']);
      if ($result) {
        $this->error('数据已存在');
      } else {
        //TODO 数据验证
        $LibModel = new \app\index\model\Admin();
        $transform1 = $img->getSaveName();
        $transform2 = str_replace("\\", "/", $transform1);
        $data['img'] = '/upload/' . $transform2;
        $res = $LibModel->addCommodity($data);
        if ($res) {
          //记住登录状态
          $this->success('添加成功', url('Admin/commodity'));
        } else {
          $this->error('添加失败', url('Admin/addcommodity'));
        }
      }
    } else {
      $this->error('图片上传错误');
    }

  }

  public function upcommodity($id)
  {
    $LibModel = new \app\index\model\Admin();
    $commodity = $LibModel->selectCommodity($id);
    $type = new \app\index\model\Type();
    $res = $type->selectALL();
    $this->assign('res',$res);
    $this->assign('commodity',$commodity);
    return $this->fetch();
  }

  public function doCommodityupdate()
  {
    $data = $this->request->post();
    foreach ($data as $field => $value) {
      if (empty($value)) {
        $this->error('字段不能为空');
      }
    }
    $LibModel = new \app\index\model\Admin();
    $img = $this->request->file('img');
    if ($img) {
      $img = $img->move(UPLOAD_PATH);
      $transform1 = $img->getSaveName();
      $transform2 = str_replace("\\", "/", $transform1);
      $data['img'] = '/upload/' . $transform2;
    }
    $result = $LibModel->updateCommodity($data['id'], $data);
    if ($result) {
      $this->success('修改成功', url('Admin/commodity'));
    } else {
      $this->error('修改失败', url('Admin/upcommodity'));
    }

  }

  public function doCommoditydelete($id)
  {
    $LibModel = new \app\index\model\Admin();
    $result = $LibModel->deleteCommodity($id);
    //对应收藏的商品状态置为缺货
    $res = $LibModel->seCollect($id);
    if($res){
      $LibModel->upCollect($id);
    }
    //对应购物车的商品删除
    $LibModel->deleteSpcart($id);

    if ($result) {
      $this->success('删除成功', url('Admin/commodity'));
    } else {
      $this->error('删除失败', url('Admin/commodity'));
    }
  }
  public function typelist()
  {
    $LibModel = new \app\index\model\Admin();
    $data = $LibModel->type();
    return $this->fetch('typelist', ['data' => $data]);
  }

  public function uptype($id)
  {
    $LibModel = new \app\index\model\Admin();
    $type = $LibModel->selectTid($id);
    return $this->fetch('', ['type' => $type]);
  }

  public function doTypeupdate()
  {
    $data = $this->request->post();
    foreach ($data as $field => $value) {
      if (empty($value)) {
        $this->error('字段不能为空');
      }
    }
    $LibModel = new \app\index\model\Admin();
    $id = $LibModel->selectTid($data['id']);
    $result = $LibModel->updateType($id, $data);
    if ($result) {
      $this->success('修改成功', url('Admin/typelist'));
    } else {
      $this->error('修改失败', url('Admin/uptype'));
    }

  }

  public function addtype()
  {
    return $this->fetch();
  }

  public function doTypeadd()
  {
    $data = $this->request->post();
    foreach ($data as $field => $value) {
      if (empty($value)) {
        $this->error('字段不能为空');
      }
    }
    $TModel = new \app\index\model\Type();
    $result = $TModel->selectTname($data['typename']);
    if ($result) {
      $this->error('数据已存在');
    } else {
      //TODO 数据验证
      $LibModel = new \app\index\model\Admin();
      $res = $LibModel->addType($data);
      if ($res) {
        //记住登录状态
        $this->success('添加成功', url('Admin/typelist'));
      } else {
        $this->error('添加失败', url('Admin/addtype'));
      }
    }
  }

  public function doTypedelete($id)
  {
    $LibModel = new \app\index\model\Admin();
    $result = $LibModel->deleteType($id);
    //对应商品删除
    $commodity = new \app\index\model\Commodity();
    $result2 = $commodity->deleteAll($id);
    $cid = $commodity->seCid($id);
    //对应收藏的商品状态置为缺货
    foreach ($cid as $aa){
      $result3 = $LibModel->seCollect($aa);
      if($result3){
        $LibModel->upCollect($aa);
      }
      //对应购物车的商品删除
      $result4 = $LibModel->seSpcart($aa);
      if($result4){
        $LibModel->deleteSpcart($aa);
      }
    }

    if ($result && $result2) {
      $this->success('删除成功', url('Admin/typelist'));
    } else {
      $this->error('删除失败', url('Admin/addtype'));
    }
  }

  public function order()
  {
    $data = Db::name('order')->field(true)->order('id')->paginate(20);
    return $this->fetch('', ['data' => $data]);
  }

  public function orderdetails($id)
  {
    $orderView = new \app\index\model\OdView();
    $data = $orderView->where([
      'pid' => $id,
    ])->select();
    foreach ($data as $key){
      $ShipperCode = $key['expressname'];
      $LogisticCode = $key['serialnum'];
    }
    $express = new BirdExpress();
    $expressMsg = $express->getOrderTracesByJson($ShipperCode,$LogisticCode,1);
    $traces = $expressMsg['Traces'];
    $this->assign('data',$data);
    $this->assign('traces',$traces);
    $this->assign('empty', '<span class="empty">商品还没发货，亲！再耐心等等吧！</span>');
    return $this->fetch();
  }

  public function dodeleteOd($id)
  {
    $result1 = Db::name('order')->field(true)->where(['pid' => $id])->delete(true);
    $result2 = Db::name('pay')->field(true)->where(['pid' => $id])->delete(true);
    $result3 = Db::name('orderdetails')->field('id', true)->where(['pid' => $id])->delete(true);
    if ($result1 && $result2 && $result3) {
      $this->success('删除成功', url('Admin/order'));
    } else {
      $this->error('删除失败', url('Admin/order'));
    }
  }

  public function addlogistics($id){
    $logistics = new \app\index\model\Logistics();
    $logistics->pid = $id;
    return $this->fetch('',['logistics'=>$logistics]);

  }
  public function dologisticsadd(){
    $data = $this->request->post();
    foreach ($data as $field => $value) {
      if (empty($value)) {
        $this->error('字段不能为空');
      }
      $ShipperCode = $data['expressname'];
      $LogisticCode = $data['serialnum'];
      $id = $data['pid'];
    }
      $logistics = new \app\index\model\Logistics();
      $result = $logistics->selectPid($id);
      if ($result){
        $this->error('商品已发货');
      }else{
        $express = new BirdExpress();
        $expressMsg = $express->getOrderTracesByJson($ShipperCode,$LogisticCode,1);
        if($expressMsg['Success'] == true) {//返回信息成功
          $logistics->expressname = $ShipperCode;
          $logistics->serialnum = $LogisticCode;
          $logistics->pid = $id;
          $logistics->save();
          $res =  Db::name('order')->field(true)->where(['pid' => $id])->update(['status' => '已发货']);
          if ($res){
            $this->success('发货成功', url('Admin/order'));
          }else{
            $this->error('发货失败，请重新发货。');
          }
        }else{
          $this->error('无物流信息，请重新发货。');
        }
      }
  }


}