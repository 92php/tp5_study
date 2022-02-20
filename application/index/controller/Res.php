<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2022/1/13
 * Time: 22:08
 */

namespace app\index\controller;


class Res
{
    public function index(){
        echo 'index';
        halt(input());
    }

    public function save(){
        halt(input());
    }

    public function update($id){
        halt($id);
    }

    public function create(){
        halt(input());
    }

    public function delete($id){
        halt($id);
    }

    public function edit($id){
        halt($id);
    }

    public function read($id){
        halt($id);
    }
}