<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


function abcd()
{
    return "abcd";
}


// 获取应用根目录
function getWebRootPath()
{
    if ('cli' == PHP_SAPI) {
        $scriptName = realpath($_SERVER['argv'][0]);
    } else {
        $scriptName = $_SERVER['SCRIPT_FILENAME'];
    }

    $path = realpath(dirname($scriptName));

    if (!is_file($path . DIRECTORY_SEPARATOR . 'think')) {
        $path = dirname($path);
    }

    return $path . DIRECTORY_SEPARATOR;
}
