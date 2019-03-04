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
        $this->view->assign('cate', $cate);
//获取题目类型的ID
        $type = Request::param('cate_id');

//        根据题目类型获取对应题目数据
        if (isset($type)) {
            $map[] = ['type', '=', $type];
            $testData = Db::table('question')->where($map)->select();


        } else {
//            打开页面默认展示判断题
            $testData = Db::table('question')->where('type', '1')->select();
            $this->view->assign('cateName', '判断题');
        }
//处理答案数据类型
        if (!is_null($testData)) {
            foreach ($testData as $key => $row) {
                $testData[$key]['options'] = explode("||", $row['options']);
            }
        }

//        将数据存储起来给模板调用
        $this->view->assign('empty', '<span style="red">没有任何数据</span>');
        $this->view->assign('testData', $testData);

        return $this->view->fetch('index');
    }


//    校验选择题和判断题
    public function check()
    {
        $id = Request::param('id');

        $answer = $answer = Db::table('question')->where('id', $id)->find();
        return $answer;
    }

}