<?php
/**
 * User: renyongheng
 * Date: 2019/6/4
 * Time: 15:55
 */

namespace app\api\model;
use think\Db;
use think\Model;

class News extends Model
{
    public function getNews($id = 1)
    {
        $res = Db::name('news')->where('id', $id)->select();
        return $res;
    }

    public function getNewsList()
    {
        $res = Db::name('news')->select();
        return $res;
    }
    public function getCreate($postData)
    {
//        var_dump($postData);        exit;
        $data = [
            "title"  => $postData["title"],
            "content" => $postData["content"],
        ];
//        var_dump($data["title"]);exit;
        $res = Db::name('news')->insert($data);
        return $res;
    }
    public function getUpdate($postData,$id){
        $data = [
            "title"  => $postData["title"],
//            "content" => $postData["content"],
        ];
//        print_r($data);exit;

        $res = Db::name('news')->where('id',$id )->update($data);;
        return $res;
    }
    public function getDelete($id){
        $res = Db::name('news')->where('id',$id )->delete();
        return $res;
    }


}