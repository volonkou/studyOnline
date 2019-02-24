<?php
/*
 * user表的验证器
 * */

namespace app\common\validate;

use think\Validate;
class User extends Validate
{
protected $rule=[
    'name|姓名'=>[
        'require'=>'require',
        'length'=>'5,20',
        'chsAlphaNum'=>'chsAlphaNum'//仅允许汉子，字母
    ],
    'email|邮箱'=>[
        'require'=>'require',
        'email'=>'email',
        'unique'=>'user'//该字段必须在user表中是惟一的
    ],
    'password|密码'=>[
//        'require'=>'require',
        'length'=>'5,20',
        'alphaNum'=>'alphaNum',
        'confirm'=>'confirm',//自动与password_confirm字段进行相等校验
    ]
];
}