<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/26
 * Time: 16:03
 */
class FabuController extends BaseController
{
    public function entranceAction(){
        include CUR_VIEW_PATH . "Sfabu" . DS ."rukou.html";
    }
    //社交软件分享
    public function shareAction(){
        include CUR_VIEW_PATH . "Sfabu" . DS ."share.html";
    }
    //数据调用
    public function callAction(){
        include CUR_VIEW_PATH . "Sfabu" . DS ."diaoyong.html";
    }
}