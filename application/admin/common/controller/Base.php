<?php
/*
 * 后台公公控制器
 * */

namespace app\admin\common\controller;

use think\Controller;
use think\facade\Session;
class Base extends Controller
{
//初始化方法
    protected function initialize()
    {

    }

//    检测用户是否登录
    public function isLogin()
    {

        if(!Session::has('user_id')){
            $this->error('请先登录','/index/user/login');
        }else if(Session::get('is_admin')!==1 && Session::get('is_admin')!==2){
            $this->error('你不是管理员或老师','/');
        }
    }

}
