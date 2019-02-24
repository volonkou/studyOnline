<?php
/*
 * 测试专用
 * */

namespace app\index\controller;
use app\common\controller\Base;

class Test extends Base
{
    public function test(){
        $data=[
            'name'=>'fulong',
            'email'=>'email@lll.com',
//            'password'=>'123456'
        ];

        $rule='app\common\validate\User';
        return $this->validate($data,$rule);

    }
}