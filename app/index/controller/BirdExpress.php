<?php
  namespace app\index\controller;

  class BirdExpress {
    private $EBuisinessID;
    private $AppKey;
    private $ReqURL;

    public function __construct()
    {
      $this -> EBuisinessID = 1694269;
      $this -> AppKey = '9c7d6779-48e7-4e6f-bc1c-c4cebb1d984a';
      $this -> ReqURL = 'https://api.kdniao.com/Ebusiness/EbusinessOrderHandle.aspx';

    }

    public function getOrderTracesByJson($ShipperCode,$LogisticCode,$arrayFlag)
    {
      $requestData = "{   
                          'OrderCode':'',
                          'ShipperCode':'$ShipperCode',
                          'LogisticCode':'$LogisticCode'
                      }";
      $postData = array(
        'EBusinessID' => $this->EBuisinessID,
        'RequestType' => '1002',//接口指令1002
        'RequestData' => urlencode($requestData),
        'DataType' => '2',
      );
      $postData['DataSign'] = $this->encrypt($requestData, $this->AppKey);
      $result = $this->sendPost($this->ReqURL, $postData);
      //根据公司业务处理返回的信息......
      if ($arrayFlag){
        $result = json_decode($result,true);
        //TODO 方便物流信息的倒序展示，进行数组反转
        $result['Traces'] = array_reverse($result['Traces']);
      }
      return $result;
    }
    public function sendPost($url, $datas)
    {
      $temps = array();
      foreach ($datas as $key => $value) {
        $temps[] = sprintf('%s=%s', $key, $value);
      }
      $post_data = implode('&', $temps);
      $url_info = parse_url($url);
      if (empty($url_info['port'])) {
        $url_info['port'] = 80;
      }
      $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
      $httpheader .= "Host:" . $url_info['host'] . "\r\n";
      $httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
      $httpheader .= "Content-Length:" . strlen($post_data) . "\r\n";
      $httpheader .= "Connection:close\r\n\r\n";
      $httpheader .= $post_data;
      $fd = fsockopen($url_info['host'], $url_info['port']);
      fwrite($fd, $httpheader);
      $gets = "";
      $headerFlag = true;
      while (!feof($fd)) {
        if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
          break;
        }
      }
      while (!feof($fd)) {
        $gets .= fread($fd, 128);
      }
      fclose($fd);

      return $gets;
    }

    /**
     * 电商Sign签名生成
     * @param data 内容
     * @param appkey Appkey
     * @return DataSign签名
     */
    public function encrypt($data, $appkey)
    {
      return urlencode(base64_encode(md5($data . $appkey)));
    }
  }