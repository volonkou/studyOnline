<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/3/5
 * Time: 22:35
 */

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\Exam as ExamModel;
use think\facade\Request;
use think\Db;
class Exam extends Base
{

//    试卷列表
    public function examList()
    {
        $examList = Db::table('exam')->paginate(20);

        $this->view->assign('title', '试卷管理');
        $this->view->assign('empty', '<span style="red">没有任何数据</span>');
        $this->view->assign('examList', $examList);
        return $this->view->fetch('examList');
    }

    //    删除题目操作
    public function doDelete()
    {
//获取要删除的题目ID
        $id = Request::param('id');
        if (ExamModel::where('id', $id)->delete()) {
            return $this->success('删除成功', 'examList');
        } else {
            return $this->error('删除失败');
        }
    }

}