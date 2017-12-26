<?php

class TongjiController extends BaseController
{
    public function searchAction(){
        $request = $_SERVER['REQUEST_METHOD'];
        if ($request=='POST'){
            $data = $_POST;
//            $start = strtotime($data['start']);
//            var_dump($start);die;
            include CUR_VIEW_PATH . "Stongji" . DS ."detail.html";
        }
        //加载查询视图
        include CUR_VIEW_PATH . "Stongji" . DS ."search.html";
    }
    //无效投票
    public function invalidAction(){
        echo phpinfo();
    }
    //投票管理
    public function manageAction(){
        include CUR_VIEW_PATH . "Stongji" . DS ."manage.html";
    }
    //票数修改日志
    public function logAction(){
        include CUR_VIEW_PATH . "Stongji" . DS ."log.php";
    }
    //历史总访问量管理
    public function visitsAction(){

    }
}