<?php
/**
 * Created by PhpStorm.
 * User: elite
 * Date: 2019-02-28
 * Time: 16:22
 */

namespace app\admin\common\model;

use think\Model;
class Question extends Model
{
    protected $pk = 'id';
    protected $table = 'question';
}