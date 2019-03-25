<?php
/**
 * Created by PhpStorm.
 * User: elite
 * Date: 2019-02-27
 * Time: 09:57
 */

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\User as UserModel;
use app\admin\common\model\UserExam;

use think\Env;
use think\facade\Request;
use think\Db;
use think\facade\App;

class User extends Base
{
    public function userList()
    {
        $userList = Db::table('user')->paginate(20);
        $this->view->assign('title', '用户管理');
        $this->view->assign('userList', $userList);
        return $this->view->fetch('userList');
    }


    public function classList()
    {
        $userList = UserModel::all();
        foreach ($userList as $key => $v) {
            if ($userList[$key]['class']) {
                $class[] = $userList[$key]['class'];
            }

        }
        $data = array_unique($class);
//        dump($data);
        $this->view->assign('classlist', $data);
        return $this->view->fetch('classlist');

    }

//班级用户列表
    public function getClassUser()
    {
        $className = Request::param('class');
        $userList = Db::table('user')->where('class', $className)->paginate(20);
        $this->view->assign('title', $className);
        $this->view->assign('userList', $userList);
        return $this->view->fetch('userList');
    }

//    删除班级
    public function DeleteClass()
    {
        $className = Request::param('class');
        if (UserModel::where('class', $className)->delete()) {
            return $this->success('删除成功', 'classList');
        } else {
            return $this->error('删除失败');
        }
    }

    public function addStudent()
    {
        $this->assign('title', ' 添加学生');
        return $this->fetch();
    }

//新建用户的方法
    public function addSave()
    {
        if (Request::isAjax()) {
//            获取到前台模板提交到的数据
            $data = Request::post();
//            验证用户提交数据的规则
            $rule = 'app\common\validate\User';
//            进行数据匹配验证
            $res = $this->validate($data, $rule);
            if (true !== $res) {
//            返回错误信息
                return ['status' => -1, 'message' => $res];
            } else {
//                将当前获取的数据插入到数据库
                if (UserModel::create($data)) {
                    return ['status' => 1, 'message' => '添加成功'];
                } else {
                    return ['status' => 0, 'message' => '添加失败'];
                }
            }
        }
    }

//    导入用户方法
    public function importUser()
    {
        $rootPath = App::getRootPath();
        $file = Request::file('title_class'); //获取file对象
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
                $i++;
            }
            $user = new UserModel();
            $user->saveAll($data);
            return $this->redirect('user/userlist');
        }
    }


//    渲染编辑用户的界面
    public function userEdit()
    {
//        获取要编辑的用户的ID
        $userId = Request::param('id');
//        根据ID进行查询
        $userInfo = UserModel::where('id', $userId)->find();
//        设置编辑界面模板变量
        $this->view->assign('title', '编辑用户');
        $this->view->assign('userInfo', $userInfo);
//        渲染编辑模板
        return $this->view->fetch('useredit');

    }

//编辑完成后保存数据
    public function doEdit()
    {
//        获取用户提交的信息
        $data = Request::param();

//        去除用户ID
        $id = $data['id'];
//        获取用户原来的数据
        $oldData = UserModel::get($id);

//        将用户密码加密在保存
        if ($data['password'] == $oldData['password']) {
            unset($data['password']);
        } else {
            $data['password'] = sha1($data['password']);
        }

//        删除ID
        unset($data['id']);
//        halt($data);
//        执行更新操作
        if (UserModel::where('id', $id)->data($data)->update()) {
            return $this->success('更新成功', 'userList');
        } else {
            return $this->error('更新失败');
        }

    }

//    删除用户操作
    public function doDelete()
    {
//获取要删除的用户ID
        $id = Request::param('id');

        if (UserModel::where('id', $id)->delete()) {
            return $this->success('删除成功', 'userList');
        } else {
            return $this->error('删除失败');
        }
    }

    public function set()
    {
        $id = Request::param('id');

        if (Db::table('user')->where('id', $id)->update(['is_admin' => '1'])) {
            return $this->success('设置成功', 'userList');
        } else {
            return $this->error('设置失败');
        }
    }

    public function quitSet()
    {
        $id = Request::param('id');
        if (Db::table('user')->where('id', $id)->update(['is_admin' => '0'])) {
            return $this->success('取消成功', 'userList');
        } else {
            return $this->error('取消失败');
        }
    }

//    查看学生考试情况
    public function getUserExamList()
    {
        $id = Request::param('id');
        $data = Db::table('user_exam')->where('user_id', $id)->paginate(20);
        $this->view->assign('empty', '<span style="color:red">没有任何数据</span>');
        $this->view->assign('title', '考试成绩');
        $this->view->assign('examList', $data);
        return $this->view->fetch('examlist');
    }


//    修改学生成绩
    public function EditScore()
    {
        $data = Request::post();
        $id = $data['id'];
        unset($data['id']);
        if (UserExam::where('id', $id)->data($data)->update()) {
            return $this->success('修改成功', 'examlist');
        } else {
            return $this->error('修改失败');
        }
    }
}