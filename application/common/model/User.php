<?php
/*
 * user表的用户模型
 * */

namespace app\common\model;

use think\Model;

class User extends Model
{
    protected $pk = 'id';//默认指定主键
    protected $table = 'user';//指定数据表
}