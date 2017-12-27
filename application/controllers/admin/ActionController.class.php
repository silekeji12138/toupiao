<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/27
 * Time: 15:28
 */
class ActionController extends PlateformController
{
    //
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
        include CUR_VIEW_PATH . "Stoupiao" . DS ."action_vote.html";
    }
    /**
     * 删除具体投票选项
     */
    public function deleteAction(){
        $id=$_GET['id'];
        $model=new model('two');
        $model->dl('id='.$id);
    }
    /**
     * 主活动表删除,3表联动删除
     */
    public function delete1Action(){
        $id=$_GET['id'];
        $model=new model('toupiao');
        $model->dl('id='.$id);
        $rs=new model('two');
        $rs->dl('action_id='.$id);
        $rs1=new model('rule');
        $rs1->dl('action_id='.$id);
    }
}