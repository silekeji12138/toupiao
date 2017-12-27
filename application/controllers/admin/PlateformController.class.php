<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/27
 * Time: 11:18
 */
class PlateformController extends BaseController
{
    public function __construct()
    {
//        setcookie("action_id",1);
        //未选定活动不操作
        if (!isset($_COOKIE['action_id'])){
            $this->jump("index.php?p=admin&c=action&a=list","请选择投票活动");
        }
    }
}