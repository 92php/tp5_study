<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/1/10
 * Time: 22:11
 */

namespace app\facade;

use think\Facade;

class Singwa extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
        //return 'Singwa'; //不能这么写？？？ 因为没有绑定别名
        return '\app\common\Singwa';
    }
}