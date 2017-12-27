<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/27
 * Time: 10:13
 */
class TongjiModel extends Model
{
    //投票项票数查询
    public function search($action_id){
        $sql = "select *from sl_two where action_id = {$action_id}";
        return $this->select($sql);
    }
}