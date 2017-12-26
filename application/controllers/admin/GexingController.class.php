<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/26
 * Time: 16:01
 */
class GexingController extends BaseController
{
    public function headAction(){
        //加载添加页眉视图
        include CUR_VIEW_PATH . "Sgexing" . DS ."yemei.html";
    }
    public function footAction(){
        //加载添加页眉视图
        include CUR_VIEW_PATH . "Sgexing" . DS ."yejiao.html";
    }
}