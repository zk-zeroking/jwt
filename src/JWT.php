<?php
declare(strict_types = 1);
namespace ZeroKing;

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

    }

    private function base64Decode($value):string {

    }

    private function signature(){
        return hash_hmac('sha256',$this->base64UrlEncode($this->header).'.'.$this->base64UrlEncode($this->payload),$this->key);
    }
}