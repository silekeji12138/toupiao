<?php
//导入数据控制器
class ToupiaoController extends BaseController{
	
	 
	//载入添加导入数据页面
	public function addAction(){
        $model_id = $_REQUEST['model_id'];
        //得到字段模型
        $filedModel=new Model("filed");
        $filedLists=$filedModel->select("select * from sl_filed where model_id='{$model_id}'  order by  u10 asc,id desc ");//显示查询字段

        include CUR_VIEW_PATH . "Stoupiao" . DS ."toupiao_add.html";
	}
   //投票的活动的第二步
	public function twoAction(){
        include CUR_VIEW_PATH . "Stoupiao" . DS ."two.html";
    }
    public function two1Action(){
	    var_dump($_POST);
    }
    //投票的第三部
    public function threeAction(){
	    $data=$_POST;
	    if ($data!=''){
	        var_dump(111111);
        }
	    include CUR_VIEW_PATH . "Stoupiao" . DS ."three.html";
    }
    //菜单显示界面
    public function menuAction(){
        include CUR_VIEW_PATH . "Stoupiao" . DS ."menu.html";
    }
    //菜单提交
    public function menuaddAction(){
        var_dump($_POST);
    }
    //编辑菜单显示的页面
    public function menueditAction(){
        include CUR_VIEW_PATH . "Stoupiao" . DS ."menu.html";
    }
    //编辑活动
    public function bianjiAction(){
//        $model_id = $_REQUEST['model_id'];
        $model_id = 85;
        // 获取autotable_id
//        $autotable_id = $_GET['id'];
        $autotable_id = 1;
        //得到字段模型
        $filedModel=new Model("filed");
        $filedLists=$filedModel->select("select * from sl_filed where model_id='{$model_id}'  order by  u10 asc,id desc ");//显示查询字段

        // 获得当前表名
        $moxingModel = new MoxingModel("moxing");
        $tableName = $moxingModel->oneRowCol("u1", "id={$model_id}")['u1'];
        //先获取文章信息
        $tableModel = new Model($tableName);

        $autotable = $tableModel->selectByPk($autotable_id);
        //var_dump($autotable);die();
        include CUR_VIEW_PATH . "Stoupiao" . DS . "bianji.html";
    }
    //编辑活动显示
    public function editAction(){
        var_dump($_POST);die;
    }
    //编辑two
    public function bianjitwoAction(){
        include CUR_VIEW_PATH . "Stoupiao" . DS . "bianjitwo.html";
    }
    //edittwo
    public function edittwoAction(){
         var_dump($_POST);
    }


    /**
     * 下方是投票设置的具体选项
     */
    //基本设置
    public function shezhijbAction(){
        include CUR_VIEW_PATH . "Sshezhi" . DS ."three.html";
    }
    //微信的访问的设置
    public function shezhiwxAction(){
        include CUR_VIEW_PATH . "Sshezhi" . DS ."shezhiwx.html";
    }
    //投票规则的设置
    public function shezhigzAction(){
        include CUR_VIEW_PATH . "Sshezhi" . DS ."guize.html";
    }
    /**
     * 下面是投票功能的具体擦做
     */
    //邀请码显示界面
    public function yaoqingmaAction(){
        include CUR_VIEW_PATH . "Sgongneng" . DS ."yaoqingma.html";
    }
    //评论显示设置界面
    public function pinglunAction(){
        include CUR_VIEW_PATH . "Sgongneng" . DS ."pinglun.html";
    }
    //报名显示设置界面
    public function baomingAction(){
        include CUR_VIEW_PATH . "Sgongneng" . DS ."baoming.html";
    }
    //抽奖显示设置界面
    public function choujiangAction(){
        include CUR_VIEW_PATH . "Sgongneng" . DS ."choujiang.html";
    }
    //抽奖信息的添加的界面
    public function choujiang1Action(){
      $data=$_POST;
      var_dump($data);
    }
    //礼物的设置界面
    public function liwuAction(){
        include CUR_VIEW_PATH . "Sgongneng" . DS ."liwu.html";
    }


    /**
     * 暂时分开,免得眼睛看花,看不清楚
     */
    /**
     * 下方图片上传管理组
     */
    //封面图片的上传
    public function imageAction(){
        $filename ="./public/uploads/fengmiantu/".time().$_FILES['file']['name'];
        move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址
        echo json_encode($_FILES);
    }























	public function insertAction(){
	    var_dump($_POST);die;
	    require_once(LIB_PATH."PHPExcel-1.8".DS."Classes".DS."PHPExcel.php");
	    $filename="";
	    //上传文件到服务器
	    $this->library("Upload"); //载入文件上传类
	    $upload = new Upload(); //实例化上传对象
	    if ($filename = $upload->up($_FILES["wenjian"])){
	        //成功
	        echo "上传文件成功<br/>";
	        flush();
	         
	    }
        
	    //导入的表名
        $t = $_REQUEST["t"];	
        if(empty($t))
        {
            echo "请选择需要导入的表";
            die();
        }
        
       
        //文件名为文件路径和文件名的拼接字符串
        //$objReader = \PHPExcel_IOFactory::createReader('Excel5');//创建读取实例
        $objPHPExcel = PHPExcel_IOFactory::load($filename);//加载文件
        $sheet = $objPHPExcel->getSheet(0);//取得sheet(0)表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumn = $sheet->getHighestColumn(); // 取得总列数
        
        //设置村关系
        //如果是村管理员1
        $adminModel = new AdminModel('admin');
        $user = $adminModel->selectByPk($_SESSION['admin']['user_id']);
        //村ID
        $cun_id =  $user["cun_id"];
        
        //导入员工
        if($t="user")
        {
            $userModel = new Model("user");
            for($i=2;$i<=$highestRow;$i++)
            {
                $data['yonghuming']=$objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
                $data['xingming'] = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
                $data['mima'] =md5(substr($data['yonghuming'],5,6));
                $data['suoshucun']=$cun_id;
                $data['suoshuzu']=$cun_id;
                $data['daorurenxinxi']="姓名:".$user["nickname"]." 用户名:".$user["username"];
                
                if(count($userModel->select("select * from sl_user where yonghuming='{$data['yonghuming']}' "))>0)
                {
                    //用户名已存在
                    echo $data['yonghuming']."导入失败：用户名已存在<br/>";
                    continue;
                }else
                {
                    $userModel->insert($data);
                    echo $data['yonghuming']."导入成功<br/>";
                    flush();
                }
                
            }
        }else if($t="renyuan") //导入人员
        {
           $renyuanModel = new model("renyuan");
           for($i=2;$i<=$highestRow;$i++)
           {
               $data['yonghuming']=$objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
               $data['xingming'] = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
              
               
               if(count($userModel->select("select * from sl_user where yonghuming='{$data['yonghuming']}' "))>0)
               {
                   //用户名已存在
                   echo $data['yonghuming']."导入失败：用户名已存在<br/>";
                   continue;
               }else
               {
                   $userModel->insert($data);
                   echo $data['yonghuming']."导入成功<br/>";
                   flush();
               }
               
           }
           
           
        }else if($t="huji") //导入户籍
        {
            
        }
       
	       

		
	}
 
}