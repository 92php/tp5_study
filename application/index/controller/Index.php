<?php

namespace app\index\controller;

use ali\Send;
use think\App;
use think\Config;
use A;
use think\Container;
use think\Controller;
use think\Db;

class Index extends Controller
{

    /*public function __construct(App $app = null)
    {
        parent::__construct($app);
        // todo
    }*/

    public function initialize()
    {

    }

    public function testTrait()
    {
        //继承了think\Controller，就可以使用Jump里面的方法
    }

    public function _empty()
    {
        return "empty";
    }

    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        //halt(input());
        return 'hello,' . $name;
    }

    //http://www.test.com/index.php/index/index/test
    public function test()
    {
        Send::push();
    }

    public function obj()
    {
        $obj = new \ObjArray();
        var_dump($obj['title']);

        //$obj2 = new \ObjArray2();
        //var_dump($obj2['title']);

        $obj['age'] = 32;
        var_dump($obj);
    }

    public function yaconf()
    {
        //var_dump(\Yaconf::get("abc.title"));
    }

    public function testIni()
    {
        $rootPath = getWebRootPath();
        $file = $rootPath . "/config/test.ini";
        $res = parse_ini_file($file);
        var_dump($res);
    }


    public function testYaml()
    {
        $rootPath = getWebRootPath();
        $file = $rootPath . "/config/singwa.yaml";
        $res = yaml_parse_file($file);
        //var_dump($res);
    }

    public function yaml()
    {
        //var_dump(\Config::get("singwa."));
    }

    public function testapp()
    {
        var_dump(\Config::get("app.singwa_abc"));
    }

    public function getSingle()
    {
        $abc = \Single::getInstance()->getAbc();
        \Single::getInstance()->getAbc();
        \Single::getInstance()->getAbc();
        \Single::getInstance()->getAbc();
        var_dump($abc);
    }

    public function register()
    {
        /*$a = new \A();
        \SingwaRegister::set("singwa",$a);
        $res = \SingwaRegister::get("singwa")->abc();
        var_dump($res);*/

        $a = new \A();
        $res = \SingwaRegister::get("A")->abc();
        var_dump($res);
    }

    public function personBuy()
    {
        //$singwa = new \di\Person();
        //echo $singwa->buy();

        /*$singwa = new \di\Person();
        $bmw = new \di\Car();
        echo $singwa->buy($bmw);*/

        /*$singwa = new \di\Person();
        $bmw = new \di\M();
        echo $singwa->buy($bmw);*/

        /*\di\Container::getInstance()->set("person",new \di\Person());
        \di\Container::getInstance()->set("car",new \di\Car());
        $obj = \di\Container::getInstance()->get("person");
        //dump($obj);
        dump($obj->buy(\di\Container::getInstance()->get("car")));*/

        /*\di\Container::getInstance()->set("person",new \di\Person(new \di\Car()));
        \di\Container::getInstance()->set("car",new \di\Car());
        $obj = \di\Container::getInstance()->get("person");
        dump($obj->buy(\di\Container::getInstance()->get("car")));*/

        \di\Container::getInstance()->set("person", "\di\Person");
        \di\Container::getInstance()->set("car", "\di\Car");
        $obj = \di\Container::getInstance()->get("person");
        dump($obj->buy());
    }


    public function rel()
    {
        $obj = new \A();
        //dump($obj);
        $obj2 = new \ReflectionClass($obj);
        //dump($obj2);
        $instance = $obj2->newInstance();  //相当于实例化这个类
        //dump($instance);
        //获取反射类中的所有方法
        $methods = $obj2->getMethods();
        //dump($methods);
        foreach ($methods as $method) {
            //dump($method->getDocComment());
        }

        $properties = $obj2->getProperties();
        //dump($properties);

        //方法一
        //echo $instance->abc(1,2);
        //方法二
        //$method = $obj2->getMethod("abc");
        //echo $method->invokeArgs($instance,["mmm","444m"]);
        //方法三
        //$method = $obj2->getMethod("ddd");
        //echo $method->invoke($instance);

        //判断某个方法是否是公共的
        /*$method = new \ReflectionMethod($obj,"ddd");
        if($method->isPublic()){
            echo "ddd方法是公共的";
        }*/

        //获取方法中参数
        $method = new \ReflectionMethod($obj, "abc");
        $p = $method->getParameters();
        dump($p);
        dump($method->getNumberOfParameters());

    }


    public function aCount()
    {
        $obj = new \SingwaCount();
        //echo $obj->count();
        echo count($obj);
    }

    public function container()
    {
        //$config = new \Config();
        //dump($config::get("app."));

        //$a = Container::get("config")->get("app.");
        //dump($a);

        $config = app("config");
        //dump($config);
        dump($config->get("app."));
    }

    public function facade()
    {
        //这样写找不到对应的类？？？ 实际上thinkphp/base.php 里面有注册别名
        //找到 think\facade\Config
        //$config = new \Config();
        //dump($config::get("app."));

        //dump(\Config::get("app."));
        //Config中没有get方法，Facade父类也没有
        //最终调用的是：Facade类中的 __callStatic
        dump(\think\facade\Config::get("app."));

        //dump(\Test::abcd("a",123,"singwa"));

        //facade 静态方法get  ->  容器里面 实例   ->  实际类config get
    }

    public function testFacade()
    {
        //实际的 singwa类调用
        //$obj = new \app\common\Singwa();
        //echo $obj->abcd();

        //需要把上面的内容装换为门面模式思想类调用  第一种使用场景
        //echo \app\facade\Singwa::abcd();

        //第二种门面模式使用场景
        \think\Facade::bind('app\facade\Sing','app\common\Sing');
        dump(\app\facade\Sing::abcd());

    }


    public function abcd2()
    {
        dump(abcd());
        dump(abcdefg());
    }

    public function test2()
    {
        $obj = app("sa");
        dump($obj->abcd());

        dump(Container::get('sa')->abcd());

    }


    /**
     * tp5 操作数据库有两大场景 Db   Model
     */
    public function dbTest()
    {
        //SELECT * FROM `imooc_user`  WHERE id = 1
        //db类中没有query方法，最后走到db类中__callStatic方法
        //$res = Db::query("SELECT * FROM `imooc_user`  WHERE id = 1");
        //$res1 = Db::execute("SELECT * FROM `imooc_user`  WHERE id = 1");
        //dump($res1);
        /*$res = Db::table("imooc_user")->where(['id'=>1])->find();
        dump(Db::getLastSql());
        dump($res);*/

        //print_r(model("User"));

        /*$data = [
            'name' => "imooc_singwa_abc",
            'status' => 1,
        ];
        $res = model("User")->save($data);
        dump($res);*/
    }

    public function cache()
    {
        //先走到门面模式 和容器互通 最后走到 think\Cache.php 中 __make  之后调用 __call方法
        // 以file场景为例，think\cache\driver\File.php 中set方法
        //\Cache::set("singwa",['title'=>'mkw','name'=>'imooc']);
        dump(\Cache::get("singwa"));
    }


}

