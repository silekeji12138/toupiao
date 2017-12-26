<?php
// 字段类型模型
class FiledModel extends Model
{

    PUBLIC function getFiledDefaultValue($filed_id)
    {
        $filedDetail=$this->selectByPk($filed_id);
        $defaultValue=$this->oneRowCol("u8", "id={$filed_id}")['u8'];
        
        if($filedDetail["u7"]=="单选"||$filedDetail["u7"]=="多选")
        {
            //匹配正则查询
            $result = array();
            preg_match_all("/(?:sql{)(.*)(?:})/i",$defaultValue, $result);
            $sql_string=$result[1][0]; 
            
            if(strlen($sql_string)>0)
            {
                //sl_qudao|where id>0|order by id desc|ziyuanmingcheng
                $sql_array=explode("|", $sql_string);
                $table_name=$sql_array[0];
                $temp_model = new Model($table_name);
                $temp_array=$temp_model->select(" select ".$sql_array[3]." from  "." ".$sql_array[0]." ".$sql_array[1]." ".$sql_array[2] );
                foreach ($temp_array as $k=>$v)
                {
                    $defaultValueArray[$k]=$v[$sql_array[3]];
                    
                }
                //var_dump($defaultValueArray);die();
            }else
            {
                $defaultValueArray=explode("\r\n", $defaultValue);
                
            }
        }else 
        {
            
            $defaultValueArray=$defaultValue;
            
        }
        
        return $defaultValueArray;
        
    }
}