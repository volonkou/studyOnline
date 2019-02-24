<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/2/23
 * Time: 19:27
 */

namespace app\index\controller;

use app\common\controller\Base;

class User extends Base
{
    //注册页面ß
    public function register()
    {
        $this->assign('title', '用户注册');
        return $this->fetch();
    }
}