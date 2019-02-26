<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/2/25
 * Time: 21:08
 */

namespace app\admin\controller;

use app\admin\common\controller\Base;


class Index extends Base
{
    public function index()
    {
//        判断用户是否登录
        $this->isLogin();
        return $this->view->fetch();
    }
}