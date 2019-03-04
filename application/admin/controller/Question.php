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

    public function get()
    {
        $data = QuestionModel::get(1);
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

    public function questionList()
    {
        $questionList = QuestionModel::select();

        $this->view->assign('title', '题目管理');
        $this->view->assign('empty', '<span style="red">没有任何数据</span>');
        $this->view->assign('questionList', $questionList);
        return $this->view->fetch('questionlist');
    }

    //    删除题目操作
    public function doDelete()
    {
//获取要删除的题目ID
        $id = Request::param('id');
        if (QuestionModel::where('id', $id)->delete()) {
            return $this->success('删除成功', 'questionlist');
        } else {
            return $this->error('删除失败');
        }
    }
}