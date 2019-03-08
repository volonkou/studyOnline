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
           if($type==1||$type==2||$type==3||$type==4){
               $map[] = ['type', '=', $type];
               $testData = Db::table('question')->where($map)->select();
               //      处理答案数据类型
               if (!is_null($testData)) {
                   foreach ($testData as $key => $row) {
                       $testData[$key]['options'] = explode("||", $row['options']);
                   }
               }
           }else{
               $testData = Db::table('video') ->order('id','desc')->paginate(9);
           }
            //        将数据存储起来给模板调用
            $this->view->assign('empty', '<span style="red">没有任何数据</span>');
            $this->view->assign('testData', $testData);

            switch ($type){
                case 1:
                    return $this->view->fetch('judge');
                    break;
                case 2:
                    return $this->view->fetch('choice');
                    break;
                case 3:
                    return $this->view->fetch('fillblanks');
                    break;
                case 4:
                    return $this->view->fetch('briefanswer');
                    break;
                case 5:
                    return $this->view->fetch('videolist');
                    break;
            }


        } else {
//            打开页面默认展示判断题
            $testData = Db::table('question')->where('type', '1')->select();
            if (!is_null($testData)) {
                foreach ($testData as $key => $row) {
                    $testData[$key]['options'] = explode("||", $row['options']);
                }
            }
            $this->view->assign('empty', '<span style="red">没有任何数据</span>');
            $this->view->assign('testData', $testData);
            return $this->view->fetch('judge');
        }




    }


//    校验选择题和判断题
    public function check()
    {
        $id = Request::param('id');

        $answer = $answer = Db::table('question')->where('id', $id)->find();
        return $answer;
    }


}