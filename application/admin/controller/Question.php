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
use think\facade\App;
use PHPExcel_IOFactory;
use PHPExcel;

class Question extends Base
{
    public function add()
    {
//        这个模板保存的名字是新建题目
        $this->view->assign('title', '新建题目');
//        返回这个模板是添加
        return $this->view->fetch('add');
    }

    public function ImageUpload(){
        $data=Request::file('imglist');
        $info=$data->move('uploads/');
       return $info->getSaveName();
    }


//新建问题方法
    public function saveQuestion()
    {
//          获取到模板提交到的数据
        $data = Request::post();
//            将当前获取的数据插入到数据库
        if (QuestionModel::create($data)) {
            return ['status' => 1, 'message' => '添加成功'];
        } else {
            return ['status' => 0, 'message' => '添加失败'];
        }

    }

//    导入问题
    public function importQuestion()
    {
        $rootPath = App::getRootPath();
        $file = Request::file('title_question'); //获取file对象
        $info = $file->validate(['ext' => 'xlsx,xls,csv'])->move('uploads/');

        if ($info) {
            //获取文件名称
            $exclePath = $info->getSaveName();  //获取文件名
            $file_name = $rootPath . 'public/uploads/' . $exclePath;   //上传文件的地址
            //实例化PHPExcel类

            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
//            halt($objReader);
            $obj_PHPExcel = $objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8
            $excel_array = $obj_PHPExcel->getsheet(0)->toArray();
            $arr = reset($excel_array);
            unset($excel_array[0]);
//            halt($excel_array);
            $data = [];
            $i = 0;
//            halt($arr);
            foreach ($excel_array as $k => $v) {
                $data[$k][$arr[0]] = $v[0];
                $data[$k][$arr[1]] = $v[1];
                $data[$k][$arr[2]] = $v[2];
                $data[$k][$arr[3]] = $v[3];
                $data[$k][$arr[4]] = $v[4];
                $data[$k][$arr[5]] = $v[5];
                switch ($v[5]) {
                    case "A":
                        $data[$k][$arr[5]] = 1;
                        break;
                    case "B":
                        $data[$k][$arr[5]] = 2;
                        break;
                    case "C":
                        $data[$k][$arr[5]] = 3;
                        break;
                    case "D":
                        $data[$k][$arr[5]] = 4;
                        break;
                    case "正确":
                        $data[$k][$arr[5]] = 1;
                        break;
                    case "错误":
                        $data[$k][$arr[5]] = 2;
                        break;
                    default:
                        $data[$k][$arr[5]] = $v[5];

                }
                $i++;
            }

            $question = new QuestionModel();
            $question->saveAll($data);
            return $this->redirect('question/questionlist');
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