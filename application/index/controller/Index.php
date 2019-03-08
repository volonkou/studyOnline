<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/2/23
 * Time: 15:14
 */

namespace app\index\controller;

use think\Db;
use app\common\controller\Base;//导入公共控制器
use think\facade\Request;

class Index extends Base
{
    public function index()
    {
        $cate = Db::table('cate')->select();
        $this->view->assign('cate',$cate );

        $type = Request::param('cate_id');

        if (isset($type)) {
            $map[] = ['type', '=', $type];

            $testData = Db::table('question')->where($map)->select();

        }else{
            $testData = Db::table('question')->where('type','1')->select();
            $this->view->assign('cateName', '判断题');
        }
        $this->view->assign('testData', $testData);
        return $this->view->fetch('index');
    }

}