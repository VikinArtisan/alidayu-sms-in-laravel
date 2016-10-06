<?php

namespace Vikin\Alidayu;

/**
 * Class AlidayuMain
 * @package Vikin\Alidayu
 */
class AlidayuMain
{
    protected $client, $request;

    /**
     * AlidayuMain constructor.
     */
    public function __construct ()
    {
        $this->client = new TopClient();
        $this->client->appkey = config('alidayu.appkey');
        $this->client->secretKey = config('alidayu.secretKey');
        $this->request = new AlibabaAliqinFcSmsNumSendRequest();
    }

    /**
     * @param array  $param
     * @param string $freeSignName
     * @param string $extend
     *
     * @return mixed|\SimpleXMLElement|ResultSet
     */
    public function send ( array $param = [ 'code' => '', 'product' => '昆明松骋电子商城', 'phone' => '', 'template_id' => '' ], string $freeSignName, string $extend = '123456' )
    {
        $this->request->setExtend("$extend");
        $this->request->setSmsType("normal");
        $this->request->setSmsFreeSignName("$freeSignName");
        $this->request->setSmsParam("{'code':'" . $param['code'] . "','product':'" . $param['product'] . "'}");
        $this->request->setRecNum($param['phone']);
        $this->request->setSmsTemplateCode($param['template_id']);

        return json_decode(json_encode($this->client->execute($this->request)), true);
    }
}