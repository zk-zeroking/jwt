<?php
declare(strict_types = 1);
namespace ZeroKing;

use ZeroKing\Base64Url\Base64Url;

class JWT
{
    private $header = ['typ' => 'JWT'];
    private $payload = [];
    private $key = '';
    public function getToken():string {
        return $this->base64UrlEncode($this->header).'.'.$this->base64UrlEncode($this->payload).'.'.$this->signature();
    }
    public function setHeader($key,$value):self {
        $this->header[$key] = $value;
        return $this;
    }
    public function setPayload($key,$value):self {
        $this->payload[$key] = $value;
        return $this;
    }
    public function setKey($key):self {
        $this->key = $key;
        return $this;
    }
    private function base64UrlEncode($value):string {
        return Base64Url::encode($value);
    }

    private function base64Decode($value):array {
        return Base64Url::decode($value);
    }

    private function signature(){
        return hash_hmac('sha256',$this->base64UrlEncode($this->header).'.'.$this->base64UrlEncode($this->payload),$this->key);
    }
}