<?php


namespace app\index\controller;

use think\Cookie;
use think\Db;
use think\Loader;



class User extends Common
{
  public function userpage()
  {
    return $this->fetch();
  }

  public function logout()
  {
    //清除cookie
    $this->clearCookie();
    $this->redirect('Login/userlogin');
  }

  public function index()
  {
    $commodityData = Db::name('commodity')->field(true)->order('id')->paginate(9);
    $this->Typelist();
    $this->assign('commodityData', $commodityData);
    return $this->fetch();

  }

  public function register()
  {
    if ($this->checkUserLoginStatus()) {
      //如果已经登录 -> 首页
      $this->redirect('User/userpage');
    } else {
      //否则 显示登录页
      return $this->fetch();
    }
  }

  public function doRegister()
  {
    if ($avatar = $this->request->file('avatar')) {
      $avatar = $avatar->move(UPLOAD_PATH);
      $data = $this->request->post();
      foreach ($data as $field => $value) {
        if (empty($value)) {
          $this->error('字段不能为空');
        }
      }
      $userModel = new \app\index\model\User();
      $result = $userModel->se($data['username'], $data['phone'], $data['email']);
      if ($result) {
        $this->error('数据已存在');
      } elseif ($data['password'] != $data['repassword']) {
        $this->error('两次输入密码不一致,请检查');
      } elseif (strlen($data['password']) < 6) {
        $this->error('密码长度小于6');
      } elseif (!preg_match("/^1[345789]\d{9}$/", $data['phone'])) {
        $this->error('手机号格式不正确');
      } elseif (!preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", $data['email'])) {
        $this->error('邮箱格式不正确');
      } else {
        unset($data['repassword']);
        //TODO 数据验证
        $data['password'] = md5($data['password']);
        $transform1 = $avatar->getSaveName();
        $transform2 = str_replace("\\", "/", $transform1);
        $data['avatar'] = '/upload/' . $transform2;
        $data['regitime'] = date("Y-m-d", time());
        $userModel = new \app\index\model\User();
        $res = $userModel->register($data);
        if ($res) {
          //记住登录状态
          $this->success('注册成功');
        } else {
          $this->error('注册失败');
        }
      }
    } else {
      $this->error('头像上传错误');
    }
  }

  public function addCollect($id)
  {
    $user = new \app\index\model\User();
    $userid = $user->seUid(Cookie::get('username'));
    $commodity = Db::name('commodity')->find($id);
    $arr['cid'] = $commodity['id'];
    $arr['uid'] = $userid['id'];
    $arr['cname'] = $commodity['cname'];
    $arr['img'] = $commodity['img'];
    $arr['number'] = $commodity['number'];
    $arr['price'] = $commodity['price'];
    $arr['discountprice'] = $commodity['discountprice'];
    if ($arr['number'] > 0) {
      $arr['status'] = '有货';
    } else {
      $arr['status'] = '缺货';
    }
    $collect = new \app\index\model\Collect();
    $result = $collect->seCollect($arr['cid']);
    if ($result) {
      $this->error('你已经收藏过啦');
    } else {
      $res = Db::name('collect')->field(true)->insert($arr);
      if ($res) {
        $this->success('收藏成功', 'User/collect');
      } else {
        $this->error('收藏失败', 'Commodity/commodityinfo');
      }
    }

  }

  public function collect()
  {
    $user = new \app\index\model\User();
    $userid = $user->seUid(Cookie::get('username'));
    $uid = $userid['id'];
    $collectData = Db::name('collect')->where([
      'uid' => $uid
    ])->select();
    $this->assign('empty', '<span class="empty">当前没有收藏，快去收藏你喜欢的商品吧！</span>');
    return $this->fetch('', ['collectData' => $collectData]);

  }

  public function doCollectdelete($id)
  {
    $UserModel = new \app\index\model\User();
    $result = $UserModel->deleteCollect($id);
    if ($result == 1) {
      $this->redirect('User/collect');
    } else {
      $this->redirect('User/collect');
    }
  }

  public function changepwd()
  {
    return $this->fetch();
  }

  public function doChangepwd()
  {
    $data = $this->request->post();
    $user = new \app\index\model\User();
    $res = $user->sepw(Cookie::get('username'));
    $id = $user->seid(Cookie::get('username'));
    if ($res == ['password' => md5($data['oldpassword'])]) {
      if (!empty($data['password'] && $data['password'] == $data['repassword'])) {
        $user->uppw($data, $id);
        $this->success('修改成功,正在跳转到首页', url(''));
      } else {
        $this->error('修改失败');
      }
    }
  }

  public function userinfo()
  {
    $user = new \app\index\model\User();
    $userData = $user->seuser(Cookie::get('username'));
    $this->assign('userData', $userData);
    return $this->fetch();

  }

  public function doUpuser()
  {
    $data = $this->request->post();
    foreach ($data as $field => $value) {
      if (empty($value)) {
        $this->error('字段不能为空');
      }
    }
    $UserModel = new \app\index\model\User();
    $avatar = $this->request->file('avatar');
    if ($avatar) {
      $avatar = $avatar->move(UPLOAD_PATH);
      $transform1 = $avatar->getSaveName();
      $transform2 = str_replace("\\", "/", $transform1);
      $data['avatar'] = '/upload/' . $transform2;
    }
    $result = $UserModel->updateUser($data);
    if ($result === false) {
      $this->error('修改失败');
    } elseif ($result == 0) {
      $this->success('数据没有变化');
    } elseif (!preg_match("/^1[345789]\d{9}$/", $data['phone'])) {
      $this->error('手机号格式不正确');
    } elseif (!preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/", $data['email'])) {
      $this->error('邮箱格式不正确');
    } else {
      $this->success('修改成功', url(''));
    }

  }

  public function spcart()
  {
    $user = new \app\index\model\User();
    $user = $user->seuid(Cookie::get('username'));
    $uid = $user['id'];

    $spData = Db::name('spcart')->field(true)->where([
      'uid' => $uid
    ])->order('id')->select();
    if ($spData) {
      return $this->fetch('', ['spData' => $spData]);
    } else {
      $this->error('购物车没有商品，再去逛逛吧！', url('User/index'));
    }

  }

  public function dospcartadd($id, $num)
  {

    $commodity = Db::name('commodity')->find($id);
    $user = new \app\index\model\User();
    $user = $user->seuid(Cookie::get('username'));
    $uid = $user['id'];
    $arr['uid'] = $uid;

    $arr['cid'] = $id;
    $arr['cname'] = $commodity['cname'];
    $arr['img'] = $commodity['img'];
    $arr['typeid'] = $commodity['typeid'];
    $arr['specification'] = $commodity['specification'];
    $arr['number'] = $num;
    $arr['price'] = $commodity['price'];
    $arr['discountprice'] = $commodity['discountprice'];
    $arr['totalprice'] = $num * $commodity['discountprice'];
    $SModel = new \app\index\model\Spcart();
    $result = $SModel->seCommodity($id,$uid);
    if ($result) {
      $spcart = Db::name('spcart')->where(['cid' => $id,'uid' => $uid])->find();
      $spcart['number'] = $num + $spcart['number'];
      $spcart['totalprice'] = $spcart['number'] * $commodity['discountprice'];
      $res = $SModel->updateNum($spcart);
      if ($res) {
        $this->redirect('User/addsucceed');
      } else {
        $this->redirect('Commodity/commodityinfo');
      }
    } else {
      $res = Db::name('spcart')->field(true)->insert($arr);
      if ($res) {
        $this->redirect('User/addsucceed');
      } else {
        $this->redirect('Commodity/commodityinfo');
      }
    }

  }

  public function addsucceed()
  {
    $this->Typelist();
    return $this->fetch();
  }

  public function doSpdelete($id)
  {
    $UserModel = new \app\index\model\User();
    $result = $UserModel->deleteSp($id);
    if ($result == 1) {
      $this->redirect('User/spcart');
    } else {
      $this->redirect('User/spcart');
    }
  }

  //立即购买
  public function addpay($id, $num)
  {

    $commodity = Db::name('commodity')->find($id);
    $user = new \app\index\model\User();
    $user = $user->seuid(Cookie::get('username'));
    $pid = uniqid();
    $arr['uid'] = $user['id'];
    $arr['username'] = $user['username'];
    $arr['address'] = $user['address'];
    $arr['phone'] = $user['phone'];
    $arr['cid'] = $commodity['id'];
    $arr['pid'] = $pid;
    $arr['cname'] = $commodity['cname'];
    $arr['img'] = $commodity['img'];
    $arr['specification'] = $commodity['specification'];
    $arr['number'] = $num;
    $arr['discount'] = $commodity['discount'];
    $arr['price'] = $commodity['price'];
    // if ($arr['discount']) {
    $arr['totalprice'] = $num * $commodity['discountprice'];
    // } else {
    //   $arr['totalprice'] = $num * $commodity['price'];
    // }
    $res = Db::name('pay')->field(true)->insert($arr);
    if ($res) {
      $this->result([
        'url' => '/index/User/pay',
        'pid' => $pid,
      ], 1);
    } else {
      $this->result([
        'url' => '/index/User/commodityinfo'
      ], 0);
    }
  }

  //购物车添加订单
  public function addmorepay($carts)
  {
    $carts = json_decode($carts, true);
    $totalPrice = 0;
    $pid = uniqid();
    foreach ($carts as $cart) {
      //根据商品id查询商品信息
      $commodity = new \app\index\model\Commodity();
      $commodityData = $commodity::get($cart['id']);

      //拼装订单表数据，写入订单表
      $pay = new \app\index\model\Pay();
      $pay->uid = cookie('id');
      $pay->cid = $commodityData->id;
      $pay->pid = $pid;
      $res = $commodityData['number'] - $cart['num'];
      //判断购买商品数量是否大于商品原有数量
      if ($res < 0) {
        $this->error('购买数量大于商品数量，下单失败', url('User/spcart'));
      }
      //
      $pay->number = $cart['num'];
      $pay->discount = $commodityData->discount;
      if ($pay->discount) {
        $pay->totalprice = $commodityData->price * $cart['num'] * $commodityData->discount;
      } else {
        $pay->totalprice = $commodityData->price * $cart['num'];
      }
      $pay->address = cookie('address');
      $pay->phone = cookie('phone');
      $pay->save();
      $totalPrice += $pay->totalprice;
      //删除购物车对应商品
      $spcart = new \app\index\model\Spcart();
      $res = $spcart::where('cid', '=', $pay['cid'])->delete();
    }
    if ($res) {
      $this->result([
        'url' => '/index/User/pay',
        'pid' => $pid,
      ], 1);
    } else {
      $this->result([
        'url' => 'User/spcart'
      ], 0);
    }
  }

  public function pay($pid)
  {
    $user = new \app\index\model\User();
    $user = $user->seuid(Cookie::get('username'));
    $uid = $user['id'];

    $payView = new \app\index\model\PayView();
    $payData = $payView->where([
      'uid' => $uid,
      'pid' => $pid,
    ])->select();

    return $this->fetch('pay', ['payData' => $payData]);

  }

  public function dopaydelete($id)
  {
    $UserModel = new \app\index\model\User();
    $result = $UserModel->deleteAll($id);
    if ($result) {
      $this->redirect('User/spcart');
    } else {
      $this->redirect('User/pay');
    }
  }

  public function doorder($pays)
  {
    $totalPrice = 0;
    $pays = json_decode($pays, true);
    foreach ($pays as $pay) {
      $data = new \app\index\model\Pay();
      $payData = $data::get($pay['id']);
      //拼装订单表数据，写入订单表
      $order = new \app\index\model\Order();
      $order->uid = cookie('id');
      $order->pid = $payData->pid;
      $order->payid = $payData->id;
      $order->totalprice = $payData->totalprice;
      $order->date = date("Y-m-d", time());
      $order->status = '未发货';
      $order->save();
      //商品数量相应减少
      $commodity = new \app\index\model\Commodity();
      $cid = $payData['cid'];
      $CData = $commodity::get($cid);
      $CData->number -= $payData->number;
      $num = $CData->number;
      $commodity->deleteNum($cid, $num);

      $totalPrice += $order->totalprice;
    }
    //写入订单详情表
    $orderData = Db::name('order')->field(true)->where([
      'uid' => $order->uid
    ])->order('id')->select();
    foreach ($orderData as $data) {
      $od = new \app\index\model\Orderdetails();
      $od->payid = $data['payid'];
      $od->oid = $data['id'];
      $od->pid = $data['pid'];
      $od->save();
      $pid = $od->pid;
    }

    if ($od) {
      $this->result([
        'url' => 'Alipay/index',
        'pid' => $pid,
        'totalprice' => $totalPrice,
      ], 1);
    } else {
      $this->result([
        'url' => 'User/pay'
      ], 0);
    }
  }


  public function order()
  {
    //接受数据
    //获取总金额
    //获取购物车信息

    $user = new \app\index\model\User();
    $user = $user->seuid(Cookie::get('username'));
    $uid = $user['id'];

    $orderData = Db::name('order')->field(true)->where([
      'uid' => $uid
    ])->order('id')->select();

    $this->assign('empty', '<span class="empty">当前没有订单，再去逛逛吧！</span>');
    return $this->fetch('', ['orderData' => $orderData]);

  }

  public function doorderdelete($id)
  {
    $order = new \app\index\model\Order();
    $result1 = $order->deleteOrder($id);
    $pay = new \app\index\model\Pay();
    $result2 = $pay->deletePay($id);
    $orderdetails = new \app\index\model\Orderdetails();
    $result3 = $orderdetails->deleteOd($id);
    $logistics = new \app\index\model\Logistics();
    $result4 = $logistics->deleteLd($id);
    if ($result1 && $result2 && $result3 && $result4) {
      $this->success('删除成功', url('User/order'));
    } else {
      $this->error('删除失败', url('User/order'));
    }
  }

  public function orderdetails($id)
  {
    $user = new \app\index\model\User();
    $user = $user->seuid(Cookie::get('username'));
    $uid = $user['id'];
    $orderView = new \app\index\model\OdView();
    $data = $orderView->where([
      'pid' => $id,
      'uid' => $uid,
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



  public function Logistics(){
    $ShipperCode = "YTO";
    $LogisticCode = "745168794";
    $express = new BirdExpress();
    $expressMsg = $express->getOrderTracesByJson($ShipperCode,$LogisticCode,1);

    var_dump($expressMsg);
    // return view('Logistics',['expressMsg'=>$expressMsg]);
  }


}