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
use think\facade\Request;

class User extends Base
{
    public function userList()
    {
        $userList = UserModel::select();
        $this->view->assign('title', '用户管理');
        $this->view->assign('empty', '<span style="red">没有任何数据</span>');
        $this->view->assign('userList', $userList);

        return $this->view->fetch('userList');
    }

    public function addStudent()
    {
        $this->assign('title', ' 添加学生');
        return $this->fetch();
    }

    public function addSave()
    {
        if (Request::isAjax()) {
//    验证数据
            $data = Request::post();//要验证的数据
            $rule = 'app\common\validate\User';
            $res = $this->validate($data, $rule);
            if (true !== $res) {
                return ['status' => -1, 'message' => $res];
            } else {
                if (UserModel::create($data)) {
                    return ['status' => 1, 'message' => '添加成功'];
                } else {
                    return ['status' => 0, 'message' => '添加失败'];
                }
            }
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

}