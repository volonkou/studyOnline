<?php
/**
 * Created by PhpStorm.
 * User: koufulong
 * Date: 2019/3/5
 * Time: 22:35
 */

namespace app\admin\controller;

use app\admin\common\controller\Base;
use app\admin\common\model\Video as VideonModel;
use think\facade\Request;
use think\Db;
class Video extends Base
{
    public function addVideo()
    {
        $this->view->assign('title', '新建视频');
        return $this->view->fetch('addvideo');
    }
    //保存视频
    public function save()
    {
        if (Request::isPost()){
            //1.获取表单提交的数据
            $data = Request::post();

                //获取上传的视频信息
                $file = Request::file('title_video'); //获取file对象

                //文件信息验证与上传到服务器指定目录
                $info = $file -> validate([
                    'ext'=>'avi,mp4,mov,mkv,flv,3gp'  //文件扩展名
                ]) -> move('uploads/');  //移动到public/uploads目录下面
                if ($info) {
                    $data['video_url'] = $info->getSaveName();

                } else {
                    $this->error($file->getError(),'addvideo');
                }

                //将数据写到文档表中
                if(VideonModel::create($data)){
                    $this->success('文章发布成功','index/index');
                } else {
                    $this->error('文章保存失败');
                }


        } else {
            $this->error('请求类型错误');
        }
    }

//    视频列表
    public function videoList()
    {
        $videoList = Db::table('video')->paginate(20);

        $this->view->assign('title', '视频管理');
        $this->view->assign('empty', '<span style="red">没有任何数据</span>');
        $this->view->assign('videoList', $videoList);
        return $this->view->fetch('videolist');
    }

    //    删除题目操作
    public function doDelete()
    {
//获取要删除的题目ID
        $id = Request::param('id');
        if (VideonModel::where('id', $id)->delete()) {
            return $this->success('删除成功', 'videolist');
        } else {
            return $this->error('删除失败');
        }
    }

}