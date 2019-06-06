<?php

namespace app\api\controller\v1;
use think\Controller;
use think\Request;

class News extends  Controller
{
    //获取列表  ***/v1/News
    public function index()
    {
        $model = new \app\api\model\News();
        $data = $model->getNewsList();// 查询数据

        $code = $data ? 200 : 404 ;

        $data = [
            'code' => $code,
            'data' => $data
        ];
        return json($data);

    }

    //获取详情 ***/v1/News/3
    public function view($id)
    {
        $model = new \app\api\model\News();

        $data = $model->getNews($id);// 查询数据

        $code = $data ? 200 : 404 ;

        $data = [
            'code' => $code,
            'data' => $data
        ];
        return json($data);
    }

    //创建 ***/v1/News
    public function create()
    {
        $model = new \app\api\model\News();

        $request = Request::instance();//初始化
        $postData = $request->get();

        $data = $model->getCreate($postData);// 创建数据，返回成功则为1

        $code = $data ? 200 : 404 ;

        $data = [
            'code' => $code,
            'data' => $data
        ];

        return json($data);
    }

    //更新 ***/v1/News/1
    public function update($id)
    {
        if(!$id){
            json(["code"=>5001,"message"=>"没有获取到id"]);
        }

        $model = new \app\api\model\News();
        $request = Request::instance();//初始化
        $postData = $request->param();

        $data = $model->getUpdate($postData,$id);// 查询数据
        if ($data) {
            $code = 200;
        } else {
            $code = 404;
            $data = "没有获取到id";
        }
        $data = [
            'code' => $code,
            'data' => $data
        ];

        return json($data);
    }

    //删除 ***/v1/News/1
    public function delete($id)
    {
        if(empty($id)){
            return json(["code"=>5001,"message"=>"没有获取到id"]);
        }

        $model = new \app\api\model\News();

        $data = $model->getDelete($id);// 查询数据
        if ($data) {
            $code = 200;
        } else {
            $code = 404;
            $data = "没有获取到id";
        }
        $data = [
            'code' => $code,
            'data' => $data
        ];

        return json($data);
    }

}