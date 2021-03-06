<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/1/8
 * Time: 21:47
 */

namespace think\config\driver;

class Yaml
{
    protected $config;

    public function __construct($config)
    {
        if(!function_exists('yaml_parse_file')){
            throw new \Exception("不存在yaml扩展！");
        }
        if (is_file($config)) {
            $config = yaml_parse_file($config);
        }

        $this->config = $config;
    }

    public function parse()
    {
        return $this->config;
    }
}