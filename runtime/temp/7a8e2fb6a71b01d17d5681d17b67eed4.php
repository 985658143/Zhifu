<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\wamp64\www\Zhifu\public/../app/index\view\alipay\index.html";i:1608799096;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
<form name=alipayment action='pagepay' method=post>
  <input id='WIDout_trade_no' name='WIDout_trade_no' value='<?php echo $pid; ?>'type="hidden"/>
  <input id='WIDsubject' name='WIDsubject' value='厦门支付商城订单'type="hidden"/>
  <input id='WIDtotal_amount' name='WIDtotal_amount' value='<?php echo $totalprice; ?>'type="hidden"/>
  <input id='WIDbody' name='WIDbody' value='立即发货'type="hidden"/>
</form>
<h1>跳转到支付宝支付页面......请稍等</h1>
<script>
  function autoSubmit() {
    document.alipayment.submit();
  }
  autoSubmit();
</script>

</body>
</html>