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
use app\admin\common\model\Question as QuestionModel;
use app\common\model\Exam;

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
            if ($type == 1 || $type == 2 || $type == 3 || $type == 4) {
                $map[] = ['type', '=', $type];
//                从问题的数据表根据type这个条件查询数据，根据创建时间倒序排列并分页
                $data = Db::table('question')->where($map)->order('create_time', 'desc')->paginate(5);
//                $data是数组，前端页面不识别，通过render方法转换成json
                $page = $data->render();
                $testData = $data->all();
                //      处理答案数据类型
                if (!is_null($testData)) {
                    foreach ($testData as $key => $row) {
                        $testData[$key]['options'] = explode("||", $row['options']);
                    }
                }
            } else {
                if ($type == 5) {
                    $data = Db::table('video')->order('id', 'desc')->paginate(9);
                } else if ($type == 6) {
                    $data = Db::table('exam')->paginate(9);

                }
                $page = $data->render();
                $testData = $data->all();
            }
            //        将数据存储起来给模板调用
            $this->view->assign('testData', $testData);
//            将处理过的分页信息保存起来
            $this->view->assign('page', $page);

            switch ($type) {
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
                case 6:
                    return $this->view->fetch('examlist');
                    break;
            }


        } else {
//            打开页面默认展示判断题
            $data = Db::table('question')
                ->where('type', '1')
                ->order('create_time', 'desc')
                ->paginate(5);
            $page = $data->render();
            $testData = $data->all();
            if (!is_null($testData)) {
                foreach ($testData as $key => $row) {
                    $testData[$key]['options'] = explode("||", $row['options']);
                }
            }
            $this->view->assign('testData', $testData);
            $this->view->assign('page', $page);
            return $this->view->fetch('judge');
        }


    }


//    校验选择题和判断题
    public function check()
    {
        $id = Request::param('id');

        $answer = Db::table('question')->where('id', $id)->find();
        return $answer;
    }

//获取试卷详情
    public function examDetail()
    {
        $cate = Db::table('cate')->select();
        $this->view->assign('cate', $cate);
//获取试卷的ID
        $id = Request::param('exam_id');
        $exam = Db::table('exam')->where('id', $id)->find();
        $examData = explode("||", $exam['data']);
//        根据试卷所有题目的ID，获取对应题目
        $data = QuestionModel::all($examData);
        if (!is_null($data)) {
            foreach ($data as $key => $row) {
                $data[$key]['options'] = explode("||", $row['options']);
            }
        }
        $this->view->assign('testData', $data);
        $this->view->assign('examID', $id);

        return $this->view->fetch('examdetail');
    }


    //    校验试卷
    public function checkExam()
    {
        $json = Request::post();
        $exam = Db::table('exam')->where('id', $json['examID'])->find();
        unset($json['examID']);
        $json['name'] = $exam['name'];
//        保存考试信息
        if (Exam::create($json)) {
            return 1;
        } else {
            return 0;
        }


    }


}