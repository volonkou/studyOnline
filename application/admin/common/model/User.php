<?php
/**
 * Created by PhpStorm.
 * User: elite
 * Date: 2019-02-26
 * Time: 16:37
 */

namespace app\admin\common\model;

use think\Model;

class User extends Model
{
    protected $pk = 'id';
    protected $table = 'user';
    protected $autoWriteTimestamp = true;
    protected $createTime = 'create_time'; //创建时间字段
    protected $updateTime = 'update_time'; //更新时间字段

//用户类型获取器
    public function getIsAdminAttr($value)
    {
        $status = ['1' => '老师', '0' => '学生'];
        return $status[$value];
    }

    //用户密码修改器
    public function setPasswordAttr($value)
    {
        return sha1($value);
    }
}