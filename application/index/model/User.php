<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/1/24
 * Time: 21:45
 */
namespace app\index\model;
use think\Model;

class User extends Model
{

    public $autoWriteTimestamp = true;
    //protected $createTime = 'c_time'; //自定义表中字段
    /**
     * 字段设置
     * @param $value
     * @param $data
     * @return string
     */
    public function setNameAttr($value,$data){
        return $value."|sing";
    }
}