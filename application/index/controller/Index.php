<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/2/23
 * Time: 15:14
 */

namespace app\index\controller;

use app\common\controller\Base;//导入公共控制器
class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

}