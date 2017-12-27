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
    public function two1Action()
    {
        $data1['action_id'] = $_GET['action_id'];
        $data = $_POST;
        for ($i=0;$i<count($data['neirong']);$i++){
            $data1['neirong']=$data['neirong'][$i];
            $data1['stroy']=$data['stroy'][$i];
            $data1['biaoti']=$data['biaoti'][$i];
            $data1['header']=$data['header'][$i];
            $model=new model('two');
            $model->insert($data1);
          }
          $data2['action_id'] = $_GET['action_id'];
          $data2['dnpx']=$data['dnpx'];
          $data2['sjpx']=$data['sjpx'];
          $data2['fy']=$data['fy'];
          $data2['sousuo']=$data['sousuo'];
          $model=new model('rule');
          $model->insert($data2);

          $this->jump('http://www.ggg.com/index.php?p=admin&c=toupiao&a=three&action_id='.$_GET['action_id'],'',0);
//        foreach ($data['neirong'] as $v) {
//             $data1['neirong']=$v;
//             foreach ($data['biaoti'] as $s){
//                 $data1['biaoti']=$s;
//                 foreach ($data['stroy'] as $s1) {
//                     $data1['stroy']=$s1;
//                       foreach ($data['header'] as $s2){
//                           $data1['header']=$s2;
//                           var_dump($data1);
//                           continue;
//                       }
//                     continue;
//                 }
//                 continue;
//             }
//        }

    }
    //投票的第三部
    public function threeAction(){

	    include CUR_VIEW_PATH . "Stoupiao" . DS ."three.html";
    }
    //投票第三步的操作
    public function three1Action(){
        $data=$_POST;

        $data['xs']=implode(',',$data['xs']);
        $data['after_xs']=implode(',',$data['after_xs']);
        $data['end_xs']=implode(',',$data['end_xs']);
        $data['phxm']=implode(',',$data['phxm']);
        $data['tpqd']=implode(',',$data['tpqd']);
        $data['start']=strtotime($data['start']);
        $data['end']=strtotime($data['end']);
        $model=new model('rule');
        $model->xg($data,$_GET['action_id']);
        $this->jump('www.baidu.com','','');
//            var_dump(implode(',',$data['xs']));
//            var_dump(implode(',',$data['after_xs']));
//            var_dump(implode(',',$data['end_xianshi']));
//            var_dump(implode(',',$data['phxm']));
//            var_dump(implode(',',$data['tpqd']));
//            var_dump(strtotime($data['start']));
//            var_dump(strtotime($data['end']));
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
        echo $filename;
    }






















//活动添加跳转
	public function insertAction(){
	    $data=$_POST;
	    $model=new model('toupiao');
        $model->insert($data);
        $id=mysql_insert_id();
        $this->jump("index.php?p=admin&c=toupiao&a=two&id=$id",'',0);

	}
 
}