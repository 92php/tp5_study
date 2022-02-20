<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//http://www.test.com/index.php/think
Route::get('think', function () {
    return 'hello,ThinkPHP5! 666';
});

//http://www.test.com/index.php/hello/echo
// :后面对应的是动态参数
Route::get('hello/:name', 'index/hello');
//Route::rule('hello/:name', 'index/hello','get');
//Route::rule('hello/:name/[:type]', 'index/hello','get');
//Route::rule('hello/:name$', 'index/hello','get');
//Route::get('/', 'index/hello');
//http://www.test.com/index.php/hello/echo.html
//Route::get('hello/:name', 'index/hello',['ext'=>'html']);
//Route::get('hello/:name', 'index/hello')->ext('html');
//html 优先级大于 shtml
//Route::get('hello/:name', 'index/hello',['ext'=>'shtml'])->ext('html');
//Route::get('hello/[:yam]', 'index/hello',[],['yam'=>'\d+']);
//Route::get('hello/[:yam]', 'index/hello',[])->patten(['yam'=>'\d+']);

/*
 * 资源路由
 */
//Route::resource("res","index/res");
//Route::resource("blog.comment","index/comment");


return [
   /* '__reset__'=>[
        'res' => 'index/res',
    ],
    'hello/:name' => 'index/hello',
    'test/:na' => [
        'index/test',
        ['ext'=>'html'],
        ['na'=>'\d+']
    ],*/
];
