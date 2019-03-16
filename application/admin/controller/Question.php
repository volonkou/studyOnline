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
use app\admin\common\model\Exam;
use think\facade\Request;
use think\Db;

class Question extends Base
{
    public function add()
    {
//        这个模板保存的名字是新建题目
        $this->view->assign('title', '新建题目');
//        返回这个模板是添加
        return $this->view->fetch('add');
    }
//新建问题方法
    public function saveQuestion()
    {
//          获取到模板提交到的数据
            $data = Request::param();
            if (QuestionModel::create($data)) {
                return ['status' => 1, 'message' => '添加成功'];
            } else {
                return ['status' => 0, 'message' => '添加失败'];
            }

    }
//查询问题，形成问题列表
    public function questionList()
    {
//        获取问题数据列表并设置分页
        $questionList = Db::table('question')->paginate(20);
//        设置浏览器标题
        $this->view->assign('title', '题目管理');
//        保存获取到的数据
        $this->view->assign('questionList', $questionList);
//        打开对应问题列表的模板页面
        return $this->view->fetch('questionlist');
    }

    //    删除题目操作
    public function doDelete()
    {
//获取要删除的题目ID
        $id = Request::param('id');
//        根据获取到的问题id删除对应问题
        if (QuestionModel::where('id', $id)->delete()) {
            return $this->success('删除成功', 'questionlist');
        } else {
            return $this->error('删除失败');
        }
    }

//    生成试卷
    public function generateExam()
    {
        $data = Request::post();


        if (Exam::create($data)) {
            return ['status' => 1, 'message' => '试卷添加成功'];
        } else {
            return ['status' => 0, 'message' => '试卷添加失败'];
        }
    }

}