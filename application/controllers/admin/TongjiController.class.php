<?php

class TongjiController extends PlateformController
{
    //投票统计
    public function searchAction(){
        $action_id = $_COOKIE['action_id'];
        $request = $_SERVER['REQUEST_METHOD'];
        $model = new Model("two");
        if ($request=='POST'){
            $data = $_POST;
            if ($data['start']){
                $sql = "select *from sl_two WHERE start";
            }
           $start = strtotime($data['start']);
           $end = strtotime($data['end']);
//            var_dump($start);die;

            include CUR_VIEW_PATH . "Stongji" . DS ."detail.html";
        }
        $sql = "select id,biaoti from sl_two WHERE action_id = $action_id";
        $list = $model->select($sql);
        //加载查询视图
        include CUR_VIEW_PATH . "Stongji" . DS ."search.html";
    }

    //无效投票
    public function invalidAction(){
        $option_id = $_GET['option_id'];
        $sql = "select num from sl_two where id=$option_id";
        //日志类型  作废
        $data['type']="作废";
        $model = new Model("log");
        $result = $model->insert($data);
    }

    //投票管理
    public function manageAction(){
        setcookie("action_id",1);
        $action_id = $_COOKIE['action_id'];
        $model = new TongjiModel("two");
        $list = $model->search($action_id);
        include CUR_VIEW_PATH . "Stongji" . DS ."manage.html";
    }

    //票数修改日志
    public function logAction(){
        $model = new Model("log");
        if (isset($_GET['type'])){
            if ($_GET['type']==1){
                //直接改票操作：增加或减少
                $sql = "select *from sl_log WHERE `type`='增加' OR `type`='减少'";
                $list = $model->select($sql);
            }else{
                //被作废票
                $sql = "select *from sl_log WHERE type='作废'";
                $list = $model->select($sql);
            }
        }else{
            //全部
            $sql = "select *from sl_log";
            $list = $model->select($sql);
        }
        include CUR_VIEW_PATH . "Stongji" . DS ."log.php";
    }

    //历史总访问量管理
    public function visitsAction(){
        include CUR_VIEW_PATH . "Stoupiao" . DS ."action_list.php";
    }

    //增加票数和投票人数
    public function increaseAction(){
        $data = $_POST;
        $data['type']="增加";
        $model = new Model("log");
        $result = $model->insert($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //减少票数和投票人数
    public function decreaseAction(){
        $data = $_POST;
        $data['type']="减少";
        $model = new Model("log");
        $result = $model->insert($data);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //锁定时的提示信息
    public function lockAction(){
        $data = $_POST;
        $model = new Model("two");
        $sql = "update sl_two set mes='{$data['mes']}' WHERE id={$data['id']}";
        $result = $model->query($sql);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //解除锁定
    public function unlockAction(){
        $data = $_POST;
        $model = new Model("two");
        $sql = "update sl_two set mes='' WHERE id={$data['id']}";
        $result = $model->query($sql);
        if ($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    //投票数据归零
    public function zeroAction(){
        $action_id = $_COOKIE['action_id'];
        $model = new Model("two");
        $sql = "update sl_two set num=0,mes='' WHERE action_id={$action_id}";
        $result = $model->query($sql);
        if ($result){
            return $this->jump("index.php?p=admin&c=tongji&a=manage","清除成功",3);
        }else{
            return $this->jump("index.php?p=admin&c=tongji&a=manage","清除失败",3);
        }
    }
}