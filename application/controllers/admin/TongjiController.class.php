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
    //增加票数和投票人数
    public function increaseAction(){
//        var_dump($_POST);
        $data['type']="增加";
        if (1){
            echo 1;
        }else{
            echo 0;
        }
    }
    //减少票数和投票人数
    public function decreaseAction(){
        $data['type']="减少";
        var_dump($_POST);
        if (0){
            echo 1;
        }else{
            echo 0;
        }
    }
    //锁定时的提示信息
    public function lockAction(){
//        $data['type']="锁定";
        if (1){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function unlockAction(){
//        $data['type']="解锁";

    }
}