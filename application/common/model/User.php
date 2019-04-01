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
    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time'; //创建时间字段
    protected $updateTime = 'update_time'; //更新时间字段


    //用户密码修改器
    public function setPasswordAttr($value)
    {
        return sha1($value);
    }
}