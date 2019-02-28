<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/2/23
 * Time: 19:27
 */

namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\User as UserModel;
use think\facade\Request;
use think\facade\Session;

class User extends Base
{
    //注册页面
    public function register()
    {
        $this->assign('title', '用户注册');
        return $this->fetch();
    }


//    处理用户提交的注册信息
    public function insert()
    {
        if (Request::isAjax()) {
//    验证数据
            $data = Request::post();//要验证的数据
            return $data;
            $rule = 'app\common\validate\User';
            $res = $this->validate($data,$rule);
            if (true !== $res) {
                return ['status' => -1, 'message' => $res];
            } else {
                if ($user=UserModel::create($data)) {
                    $loginUser = UserModel::get($user->id);
                    Session::set('user_id',$loginUser->id);
                    Session::set('user_name',$loginUser->name);
                    Session::set('is_admin',$loginUser->is_admin);
                    return ['status' => 1, 'message' => '恭喜注册成功'];
                } else {
                    return ['status' => 0, 'message' => '注册失败'];
                }
            }
        }
    }

//用户登录
    public function login()
    {
        $this->isLogin();
        return $this->view->fetch('login', ['title' => '用户登录']);
    }

//    用户登录验证与查询
    public function loginCheck()
    {
        if (Request::isAjax()) {
//    验证数据
            $data = Request::post();//要验证的数据
            $rule = [
                'email|邮箱' => 'require|email',
                'password|密码' => 'require|alphaNum'
            ];
            $res = $this->validate($data, $rule);
            if (true !== $res) {
                return ['status' => -1, 'message' => $res];
            } else {
//                执行查询
                $result = UserModel::get(function ($query) use ($data) {
                    $query->where('email', $data['email'])
                        ->where('password', sha1($data['password']));
                });
                if (null == $result) {
                    return ['status' => 0, 'message' => '邮箱或密码不正确！'];
                } else {
//              将用户的数据写到session中
                    Session::set('user_id', $result->id);
                    Session::set('user_name', $result->name);
                    Session::set('is_admin', $result->is_admin);
                    return ['status' => 1, 'message' => '恭喜登录成功'];
                }
            }
        }
    }

//    用户退出登录
    public function logout()
    {
        Session::clear();
        $this->success("退出登录成功", "index/index");
    }
}