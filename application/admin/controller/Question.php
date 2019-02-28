<?php
/**
 * Created by PhpStorm.
 * User: elite
 * Date: 2019-02-28
 * Time: 09:08
 */

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\Question as QuestionModel;
use think\facade\Request;

class Question extends Base
{
    public function add()
    {
        $this->view->assign('title', '新建题目');
        return $this->view->fetch('add');
    }

    public function get(){
        $data=QuestionModel::get(1);
        halt($data);
    }

    public function saveQuestion()
    {
        if (Request::isAjax()) {

//    验证数据
            $data = Request::param();//要验证的数据
            if (QuestionModel::create($data)) {
                return ['status' => 1, 'message' => '添加成功'];
            } else {
                return ['status' => 0, 'message' => '添加失败'];
            }
        }

    }
}