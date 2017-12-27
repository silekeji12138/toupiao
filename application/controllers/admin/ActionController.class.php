<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/27
 * Time: 15:28
 */
class ActionController extends BaseController
{
    public function listAction(){
        $model = new Model('toupiao');
        $sql = "select * from sl_toupiao";
        $list = $model->select($sql);
        include CUR_VIEW_PATH . "Stoupiao" . DS ."action_list.html";
    }
    public function indexAction(){
        $action_id = $_GET['action_id'];
        //将action_id存入cookie
        setcookie('action_id',$action_id,time()+3600,"/");
        $model = new Model('two');
        $sql = "select *from sl_two WHERE action_id={$action_id}";
        $list = $model->select($sql);
//        var_dump($sql);die;

        include CUR_VIEW_PATH . "Stoupiao" . DS ."action_vote.html";
    }
}