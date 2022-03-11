<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/1/8
 * Time: 21:39
 */

namespace think\config\driver;

class Php
{
    protected $config;

    public function __construct($config)
    {
        if (is_file($config)) {
            $config = include $config;
        }

        $this->config = $config;
    }

    public function parse()
    {
        return $this->config;
    }
}