<?php
/*
 * 基础控制器
 * */

namespace app\common\controller;

use think\Controller;
use think\facade\Session;

class Base extends Controller
{
    /*
     * 初始化方法
     * 创建常量和公众方法
     * 在所有的方法之前调用
     * */
    protected function initialize()
    {

    }

//    防止重复登录

    public function isLogin()
    {
        if(Session::has('user_id')){
            $this->error('您已经登录','index/index');
        }
    }
 public function unLogin(){
     if(!Session::has('user_id')){
         $this->error('请先登录','/index/user/login');
     }
 }

}