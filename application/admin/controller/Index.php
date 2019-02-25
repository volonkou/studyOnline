<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/2/25
 * Time: 21:08
 */

namespace app\admin\controller;

use app\common\controller\Base;

class Index extends Base
{
    public function index()
    {
       return $this->fetch();
    }
}