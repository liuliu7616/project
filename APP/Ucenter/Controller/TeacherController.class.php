<?php
    namespace Ucenter\Controller;
    use Think\Controller;
    class TeacherController extends BaseController {
    	function __construct(){
    		parent::__construct();

    		layout('Public/tplTLayout');
	    	$this->assign('state', strtolower(ACTION_NAME));
    	}

        private function chkUsrInfo(){
            $where['thrId'] = session("ID");
            $info = M('teacher')->where($where)->find();

            if($info['thrAge'] != null && $info['createTime'] != null && $info['updateTime']){
                return true;
            }else{
                return false;
            }
        }

    	/*
    	 *	2018年3月8日19:43:41
    	 *	教师管理中心首页
    	 */
        public function index(){
            $where['showThr'] = 1;
            $id = session("ID");
            $where['_string'] = '(msgFromId = ' . $id . ' and state = -1) OR (msgAccessId = ' . $id . ' and state = 1) ';
            $this->assign("msgCount", M('message')->where($where)->Count() + M('message')->where(array('state' => -2))->Count());
            $this->assign("gpCount", M('gproject')->where(array('gpThrId' => session("ID")))->Count());

            $this->assign('usrSex', session('SEX'));
            
        	$this->assign("title", "登录信息");
            $this->display();
        }
        public function scoreimport(){
            $this->assign("title", "成绩批量导入");
            $tid=session('ID');
            $sql="SELECT permission FROM teacher WHERE thrId=".$tid;
              $permission=M("")->query($sql);
              $this->assign('permission', $permission[0]['permission']);
            
            $this->display();
        }


        public function uploadscore(){
            $sql="update teacher  SET permission =1 WHERE thrId=".session('ID');
            $obj=M('');
            $status=$obj->execute($sql);
           
            if($status){
                    $this->success("上传成功");
            }
            else{
                    $this->error("上传失败，请重试");
            }
        }

        public function import(){   
            if (!empty ( $_FILES ['file_stu'] ['name'])){  
                $tmp_file = $_FILES ['file_stu'] ['tmp_name'];  
                $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );  
                $file_type = $file_types [count ( $file_types ) - 1];  
      
                /*判别是不是.xls文件，判别是不是excel文件*/  
                if (strtolower($file_type)!="xls" && strtolower($file_type)!="xlsx")                
                {  
                    $this->error ( '不是Excel文件，重新上传' );  
                }  
      
                /*设置上传路径*/  
                /*
                
                windows  
                $savePath = "Public/upfile/Excel/";
                linux
                $savePath = ".Public/upfile/Excel/";  
                */
               $savePath = "Public/upfile/Excel/";  
               //echo $savePath;  
      
                /*以时间来命名上传的文件*/  
                $str = date ('Ymdhis');   
                $file_name = $str.".".$file_type;  
      
                /*是否上传成功*/  
                if (!copy ($tmp_file,$savePath.$file_name)) {  
                    $this->error ('上传失败');  
                }  
                  
                /*读取Excel内容，函数具体实现后文有说明*/  
                $res = readExcel($savePath.$file_name,"UTF-8",$file_type);  
      
                /*重要代码 解决Thinkphp M、D方法不能调用的问题    
                如果在thinkphp中遇到M 、D方法失效时就加入下面一句代码  
                */  
               // spl_autoload_register ( array ('Think', 'autoload' ) );  
      
                /*对生成的数组进行数据库的写入*/  
                //var_dump($res);/*
                $obj=M('');
                $sql="SELECT cId FROM course WHERE thrId= ".session('ID');
                $cid=$obj->query($sql);
                foreach ( $res as $k => $v ) { 
                    if ($k != 0) { 
                        if($k==1){
                            continue;
                        }
                        else{
                            $where ['stuId'] = $v[1];  
                            $where ['cId'] = $cid[0]['cId'];  
                            $data ['part1'] = $v[2];  
                            $data ['part2'] = $v[3]; 
                            $data ['part3'] = $v[4];  
                            $data ['part4'] = $v[5]; 
                            $data ['part5'] = $v[6];
                            $data['score']=$v[2]+$v[3]+ $v[4]+$v[5]+$v[6];
                            //var_dump($data);
                            $result = M ('score')->where($where)->save($data);  
                            if ($result===false) {  
                                $this->error ('导入数据库失败');  
                            }
                        } 
                        
                    }  
                }  
                $this->success('导入成功','scoreImport'); 
            }  
        }  

        public function exportexcel(){  
          
        //spl_autoload_register(array('Think','autoload'));  
        //$data= M('stlinks')->select();  //查出数据
        $obj=M('');
        $sql="SELECT cId FROM course WHERE thrId= ".session('ID');
        $cid=$obj->query($sql);
        $sql="SELECT stuCard, student.stuId,part1,part2,part3,part4,part5 FROM student ,score WHERE student.stuId = score.stuId AND score.cId= ".$cid[0]['cId']."  ORDER BY stuCard ASC;";
        $data=$obj->query($sql);
        //echo $sql;
        //var_dump($data);  
        $name='scoremodel';    //生成的Excel文件文件名  
        pushExcel($data,$name);   
    } 

        /*
    	 *	2018年4月26日19:43:51
    	 *	教师管理中心个人信息 显示班级和科目
    	 */
        public function person(){
        	$this->assign("title", "个人管理");

            $obj = M('teacher');
            $usrDetail = $obj->where(array('thrId' => session('ID')))->find();
            $this->assign('usrDetail', $usrDetail);
            $obj=M('');
            $sql="SELECT cName FROM cname ,course WHERE cName.cNameId=course.cNameId and thrId =".session('ID');
            $cname=$obj->query($sql);
            $sql="SELECT majorName FROM major ,course WHERE major.majorId = course.classId and thrId =".session('ID');
            $classname=$obj->query($sql);
            $this->assign('cname',$cname);
            $this->assign('classname',$classname);
            //var_dump($cname);
            //var_dump($classname);
            $this->display();
        }
         /*
         *  2018年4月23日22:16:09
         *  后台管理中心-选课
         */
        public function uploadfile(){
            //var_dump( $_POST );
             $stuid=$_POST['stuid'];
              $cid=$_POST['cid'];
              
            if($stuid!=0 && $cid!=0){
                if(!empty($_FILES)){
                  //  echo " files";
                  //上传单个图像
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize   =     0 ;// 设置附件上传大小
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath  =      'Public/paper/'; // 设置附件上传根目录
                    $upload->savePath  =      ''; // 设置附件上传（子）目录
                    $upload->saveName = array('uniqid','');//上传文件的保存规则
                    $upload->autoSub  = false;//自动使用子目录保存上传文件 
                    $upload->subName  = array('date','Ymd');
                    // 上传单个图片
                    $info   =   $upload->uploadOne($_FILES['uploadfile']);

                    if(!$info) {// 上传错误提示错误信息
                        $this->error($upload->getError());
                    }else{// 上传成功 获取上传文件信息
                    //    echo $info;
                        //var_dump($info);
                         $paperUrl=$info['savepath'].$info['savename'];
                         $obj=M("score");
                         $where["cId"]=$cid;
                         $where["stuId"]=$stuid;
                         $data["paperUrl"]=$paperUrl;
                         $result=$obj->where($where)->save($data);
                         
                         if(!$result){
                             $this->error('上传失败！');
                         }else{
                             //$this->success('添加成功', 'Manager/manager-list');
                           //  $this->assign('jumpUrl', 'javascript:window.parent.location.reload();');
                             $this->success("添加成功");
                         }
                        
                    }
                }
            }else{
                $this->error(" 上传出错  请检查");
            }
        
        }

        /*
    	 *	2018年3月8日19:44:04
    	 *	教师管理中心毕设列表
    	 */
        public function bslist(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            }

        	$this->assign("title", "毕设列表");

            $obj = M("gproject");
            $bsList = $obj->field("gpId, gpTitle, gpContent, gpMust, state")->where(array('gpThrId' => session("ID")))->select();
            
            $obj = M("stlinks");
            foreach($bsList as &$v){
                $v['count'] = $obj->where(array("stlSpId" => $v['gpId']))->Count();
            }
            $this->assign('bsList', $bsList);
            
            $this->display();
        }
         /*
         *  2018年4月18日19:45:05
         *  教师管理中心新增成绩录入
         */
         public function edit_score(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            }

            $this->assign("title", "成绩录入");
            $tid= session("ID");

            $obj    = M('score'); // 实例化User对象
            $count  = $obj->where("cid=(select cId from course where thrId=".$tid.")")->Count();// 查询满足要求的总记录数
            //echo $count;
            
            $Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $Model =  M("");
         //$sql = 'select a.id,a.title,b.content from think_test1 as a, think_test2 as b where a.id=b.id '.$map.' order by a.id '.$sort.' limit '.$p->firstRow.','.$p->listRows;
            $sql= "SELECT score.stuId,score.cId,student.stuCard,student.stuRealName,score.paperUrl,score.part1,score.part2,score.part3,score.score from
                student,score WHERE student.stuId= score.stuId and score.cId =
                (select  cid from course WHERE thrId=".$tid." )".$sort.' limit '.$Page->firstRow.','.$Page->listRows;
            //echo $sql;
            $scoreList = $Model->query($sql);
            $this->assign('scoreList', $scoreList);
              $this->assign('page',$show);// 赋值分页输出
              $sql="SELECT permission FROM teacher WHERE thrId=".$tid;
              $permission=M("")->query($sql);
              $this->assign('permission', $permission[0]['permission']);
              //var_dump($permission[0]['permission']);
            $this->display();
        }
         /*        
         *  2018年4月22日14:45:05
         *  教师管理中心新增保存成绩
         */
         public function savescore(){
        
       
           $cid=(int)$_POST['cid'];
           $stuid=(int)$_POST['stuid'];
           $score1=(int)$_POST['score1'];
           $score2=(int)$_POST['score2'];
           $score3=(int)$_POST['score3'];

           
            if($cid !=0 && $stuid !=0 && $score<=100 && $score1>=0&& $score2>=0 && $score3>=0 ){
                $obj = M('score');
                $where['cId']=$cid;
                $where['stuId']=$stuid;
                $data['score']=$score1+$score2+$score3;
                $data['part1']=$score1;
                $data['part2']=$score2;
                $data['part3']=$score3;
                if($obj->where($where)->save($data)){        

                    // $this->success("成绩保存成功", U('Teacher/edit_score'));
                    $temdata['state']=1;
                    echo json_encode($temdata);
                   
                }
                else{
                    $this->error("成绩保存出错，请仔细检查");
                }
            }else{
                $this->error("成绩保存出错，请仔细检查");
            }
       
        }


        /*
    	 *	2018年3月8日19:45:05
    	 *	教师管理中心新增毕设
    	 */
        public function add(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            }

        	$this->assign("title", "新增毕设");
            $this->display();
        }

        /*
    	 *	2018年3月8日19:44:21
    	 *	教师管理中心消息管理
    	 */
        public function msg(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            }

        	$this->assign("title", "消息管理");

            $obj = M('stlinks');
            $data = array();
            $data = $obj->join("left join student on stlinks.stlStuId = student.stuId")->field("stuId, stuRealName")->where(array('stlThrId' => session("ID"), 'stlinks.state' => 2))->select();
            $this->assign("ff", $data);

            unset($obj);
            $where['showThr'] = 1;
            $id = session("ID");
            $where['_string'] = '(msgFromId = ' . $id . ' and state = -1) OR (msgAccessId = ' . $id . ' and state = 1) ';

            $obj    = M('message'); // 实例化User对象
            $count  = $obj->where($where)->Count();// 查询满足要求的总记录数
            $Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $List = $obj->field('msgId, msgFromId, msgAccessId, msgContent, createTime, state')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('List', $List);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出

            unset($where);
            $where['state'] = -2;
            $this->assign("adminList", $obj->field('msgId, msgFromId, msgAccessId, msgContent, createTime, state')->where($where)->select());

            $this->display();
        }

        /*
    	 *	2018年3月8日19:44:33
    	 *	教师管理中心毕设进度
    	 */
        public function plan(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Teacher/person'));
                return false;
            }

        	$this->assign("title", "毕设进度");

            $obj = M("plan");
            $where['plnThrId'] = session("ID");
            $stuList = $obj->join("left join student on plan.plnStuId = student.stuId")->join("left join stlinks on stlinks.stlSpId = plan.plnGpId")->join("left join gproject on gproject.gpId = plan.plnGpId")->field('plan.*, student.stuRealName, stlinks.updateTime, gproject.gpTitle')->where($where)->select();
            $this->assign("stuPlans", $stuList);

            $this->display();
        }   

        /*
         *  2018年3月11日12:17:57   2018.4.18  增加所教课程这个选项 和课容量
         *  教师管理中心个人信息修改
         */
        public function modifyInfo(){
            if(IS_POST){
                $oldPwd = I("post.oldpwd");
                $newPwd = I("post.newpwd");
                $data['thrRealName'] = I("post.realName");
                $data['thrAge'] = I("post.age");
                $data['thrSex'] = I("post.sex");
                $data['thrPhone'] = I("post.Phone");
                $data['thrEmail'] = I("post.Email");
                $data['thrAddress'] = I("post.Address");
                $data['thrStudy'] = I("post.Study");
                $data['updateTime'] = time();

                $TeachingCourse= I("post.TeachingCourse");
                $tPhone = I("post.chkPhone");
                $tEmail = I("post.chkEmail");
                $tAddress = I("post.chkAddress");
                $tStudy = I("post.chkStudy");
                $data['showState'] = ($tPhone != "" ? $tPhone : "0") . ($tEmail != "" ? $tEmail : "0") . ($tAddress != "" ? $tAddress : "0") . ($tStudy != "" ? $tStudy : "0");

                $where['thrId'] = I('post.usrId');
                if($oldPwd != $newPwd && $oldPwd !=null){
                    $data['thrPwd'] = md5($newPwd);
                    $where['thrPwd'] = md5($oldPwd);
                }
                /* $obj = M("course");
                 $temp_where['thrId']=I('post.usrId');
                 $temp_where2['thrId']=I('post.usrId');
                 $temp_where2['cNameId']=$TeachingCourse;
                 $temp_data['cNameId']=$TeachingCourse;
                 $temp_data['fullNum']=I('post.fullNum');
               //  echo $temp_data['cNameId'];
                if($obj->where($temp_where)->find() ){
                  // echo $result;
                    if(!$obj->where($temp_where2)->find()){
                        if($obj->where($temp_where)->setField('cNameId',$TeachingCourse)){
                          //  $this->success("课程修改成功", U("Teacher/person"));

                        }else{
                            $this->error("所教课程修改失败 教师已选择学科"+$TeachingCourse);
                        }
                    }else{
                      echo "the record has exist ";
                    }
                    
                }
                else{
                     $temp_data['thrId']=I('post.usrId');
                         if($obj->add($temp_data)){
                           // $this->success("课程修改成功", U("Teacher/person"));loginout

                        }else{
                            $this->error("所教课程修改失败 教师未选择学科");
                        }
                }*/

                $obj = M("teacher");
                if($obj->where($where)->save($data)){
                    $this->success("用户信息修改成功，请重新登陆", U("Teacher/loginout"));
                }else{
                    $this->error("用户信息修改失败，请检查");
                }
            }
        }

        /*
         *  2018年3月11日15:05:24
         *  教师管理中心新增毕设
         */
        public function addDesign(){
            if(IS_POST){
                $data['gpThrId'] = session('ID');
                $data['gpTitle'] = I("post.title");
                $data['gpContent'] = I("post.content");
                $data['gpAim'] = I("post.aim");
                $data['gpRequest'] = I("post.request");
                $data['gpMust'] = I("post.must");
                $data['gpFormal'] = I("post.formal");
                $data['gpOthers'] = I("post.other");
                $gpSHState = I("post.SHState");
                $data['gpSHState'] = $gpSHState == 2 ? $gpSHState : 1;
                $data['state'] = 0;

                $time = time();
                $data['updateTime'] = $time;
                $data['createTime'] = $time;

                $obj = M("gproject");
                if($obj->add($data)){
                    $this->success("课题添加成功", U('Teacher/bsList'));
                }else{
                    $this->error("课题添加失败，请检查");
                }
            }
        }

        /*
         *  2018年3月11日15:05:24
         *  教师管理中心新增毕设
         */
        public function modifyGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $GpDetail = $obj->where($where)->find();
                if(is_array($GpDetail) && !empty($GpDetail)){
                    $this->assign("gpDetail", $GpDetail);
                    $this->assign("title", "修改课题");

                    $this->display("edit");
                }else{
                    $this->error("操作错误，请检查");
                }
            }else{
                $this->error("操作错误，请检查");
            }
        }

        /*
         *  2018年3月18日13:36:20
         *  教师管理中心课题详情
         */
        public function checkGP(){
            if(IS_POST){
                $where["gpId"] = I("post.id");

                $obj = M("gproject");
                $GpDetail = $obj->where($where)->find();
                if(is_array($GpDetail) && !empty($GpDetail)){
                    echo json_encode(array("state" => true, "detail" => $GpDetail));
                }
            }else{
                echo json_encode(array("state" => false, "detail" => array()));
            }
        }

        /*
         *  2018年3月18日13:29:09
         *  教师管理中心修改毕设
         */
        public function updateGp(){
            if(IS_POST){
                $where['gpId'] = I("post.id");

                $data['gpThrId'] = session('ID');
                $data['gpTitle'] = I("post.title");
                $data['gpContent'] = I("post.content");
                $data['gpAim'] = I("post.aim");
                $data['gpRequest'] = I("post.request");
                $data['gpMust'] = I("post.must");
                $data['gpFormal'] = I("post.formal");
                $data['gpOthers'] = I("post.other");
                $data['gpSHState'] = I("post.SHState") == 2 ? 2 : 1;
                $data['state'] = 1;

                $time = time();
                $data['updateTime'] = $time;

                $obj = M("gproject");
                if($obj->where($where)->save($data)){
                    $this->success("课题修改成功", U('Teacher/bslist'));
                }else{
                    $this->error("课题修改失败，请检查");
                }
            }
        }

        /*
         *  2018年3月18日17:00:18
         *  教师管理中心删除课题
         */
        public function delGP($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $flag = $obj->where($where)->delete();
                if($flag){
                    $this->success("课题删除成功");
                }else{
                    $this->error("课题删除失败");
                }
            }else{
                $this->error("操作失败，请检查");
            }
        }

        /*
         *  2018年3月22日15:08:55
         *  教师管理中心学生课题选择
         */
        public function checkStuList(){
            if(IS_POST){
                $where['stlSpId'] = I("post.id");

                $obj = M("stlinks");
                $stuList = $obj->join("left join student on stlinks.stlStuId = student.stuId")->join("left join major on student.stuMajor = major.majorId")->field("stuRealName, stuPhone, stuEmail, majorName, stlinks.createTime, stlId")->where($where)->select();
                if(is_array($stuList) && !empty($stuList)){
                    foreach($stuList as &$v){
                        $v['createTime'] = date("Y-m-d H:i", $v['createTime']);
                    }
                    echo json_encode(array("state" => true, "stuList" => $stuList));
                }else{
                    echo json_encode(array("state" => false, "stuList" => array()));
                }
            }else{
                echo json_encode(array("state" => false, "stuList" => array()));
            }
            
        }

        /*
         *  2018年3月22日16:10:12
         *  教师管理中心确定课题
         */
        public function confirm($id = 0){
            if($id >= 0){
                $obj = M("stlinks");
                $GpInfo = $obj->field("stlSpId, stlStuId")->where(array("stlId" => $id))->find();

                $flag = true;
                $obj->startTrans();
                if(!$obj->where(array("stlSpId" => $GpInfo['stlSpId']))->save(array("state" => 3))){
                    $flag = true;
                }
                if(!$obj->where(array("stlId" => $id))->save(array("state" => 2, 'updateTime' => time()))){
                    $flag = true;
                }
                if(!M("gproject")->where(array("gpId" => $GpInfo['stlSpId']))->save(array("state" => 3))){
                    $flag = true;
                }
                if(!$obj->where(array('stlStuId' => $GpInfo['stlStuId'], 'state' => array("in", array(1, 3))))->delete()){
                    $flag = false;
                }

                if($flag){
                    $obj->commit();
                    $this->updateGPState();
                    $this->success("课题确认成功");
                }else{
                    $obj->rollback();
                    $this->success("课题确认失败，请检查");
                }

            }else{  
                $this->error("操作错误，请检查");
            }
        }

        /*
         *  2018年3月22日16:54:21
         *  教师管理中心学生详情
         */
        public function chkStuInfo(){
            if(IS_POST){
                $where['stlSpId'] = I("post.id");
                $where['state'] = 2;

                $obj = M("stlinks");
                $stuID = $obj->field("stlStuId")->where($where)->find();
                unset($where);

                $where['stuId'] = $stuID['stlStuId'];
                $o = M('student');
                $usrDetail = $o->join('left join major on student.stuMajor = major.majorId')->field('stuCard, stuRealName, major.majorName, stuSex, stuAge, stuPhone, stuEmail')->where($where)->find();
                if(is_array($usrDetail) && !empty($usrDetail)){
                    echo json_encode(array('state' => true, 'detail' => $usrDetail));
                }else{
                    echo json_encode(array('state' => false, 'detail' => array()));
                }
            }
        }

        /*
         *  2018年3月18日17:04:04
         *  教师管理中心注销
         */
        public function loginout(){
            session(null);
            $this->redirect("Index/index");
        }

        /*
         *  2018年4月17日18:07:48
         *  更新gproject state
         */
        public function updateGPState(){
            $obj = M('gproject');

            $idArray = $obj->field('gpId')->where(array('state' => 2))->select();
            foreach($idArray as $v){
                if(M('stlinks')->where(array('stlSpId' => $v['gpId']))->Count() == 0){
                    $obj->where(array('gpId' => $v['gpId']))->save(array('state' => 1));
                }
            }
        }

        /*
         *  2018年4月18日14:43:00
         *  新增消息
         */
        public function addMsg(){
            if(IS_POST){
                $data['msgParentId'] = 0;
                $data['msgFromId'] = session("ID");
                $f = I("post.receive");
                $data['msgContent'] = I("post.content");
                $data['createTime'] = time();
                $data['state'] = -1;
                $data['showStu'] = 1;
                $data['showThr'] = 1;

                $obj = M('message');
                if($f == -1){
                    $thrs = M('stlinks')->field("stlStuId")->where(array('stlThrId' => session("ID"), 'stlinks.state' => 2))->select();
                    
                    $flag = true;
                    $obj->startTrans();
                    foreach($thrs as $v){
                        $data['msgAccessId'] = $v['stlStuId'];
                        if(!$obj->add($data)){
                            $flag = false;
                        }
                    }

                    if($flag){
                        $obj->commit();
                    }else{
                        $obj->rollback();
                    }

                }else{
                    $data['msgAccessId'] = $f;
                    $flag = $obj->add($data);
                }

                if($flag){
                    $this->success("消息发送成功");
                }else{
                    $this->error("消息发送失败");
                }
            }
        }

        /*
         *  2018年4月18日15:51:17
         *  删除消息 学生操作
         */
        public function delMsg($id = 0){
            if($id == 0 || intval($id) <= 0){
                $this->error("参数错误，请检查");
                return false;
            }

            $obj = M('message');
            if($obj->where(array('msgId' => $id))->save(array('showThr' => -1))){
                $this->success("消息删除成功");
            }else{
                $this->error("消息删除失败");
            }

        }
    }
?>