<?php
/**
 * Created by PhpStorm.
 * User: zeroking
 * Date: 2020-07-19
 * Time: 16:40
 */

namespace ZeroKing\Header;


class Header
{
    const TYPE = 'type';
    const ALG = 'alg';
    private $_object;

    public function __construct()
    {
        $this->_object = new \stdClass();
    }

    public function setType($type) {
        return $this->set(self::TYPE,$type);
    }
    public function setAlg($alg) {
        return $this->set(self::ALG,$alg);
    }
    public function set($key,$value) {
        $this->_object->{$key} = $value;
        return $this;
    }
    public function toArray(){
        return (array)$this->_object;
    }
}