<?php
/*
 * user表的验证器
 * */

namespace app\common\validate;

use think\Validate;
class User extends Validate
{
protected $rule=[
    'name|姓名'=>'require|length:2,20|chsAlphaNum',
    'email|邮箱'=>'require|email|unique:user',
    'password|密码'=>'require|length:6,20|alphaNum|confirm'
];
}