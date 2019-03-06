<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/3/5
 * Time: 23:15
 */

namespace app\index\controller;
use app\common\controller\Base;
use app\common\model\Video as VideoModel;

class Video extends Base
{
//    视频列表
    public function videoList()
    {
        $videoList = VideoModel::select();

        $this->view->assign('empty', '<span style="red">没有任何数据</span>');
        $this->view->assign('videoList', $videoList);
        return $this->view->fetch('videolist');
    }

}