<?php
    namespace Ucenter\Controller;
    use Think\Controller;
    class StudentController extends BaseController {
    	function __construct(){
    		parent::__construct();

    		layout('Public/tplSLayout');
	    	$this->assign('state', strtolower(ACTION_NAME));
    	}

        private function chkUsrInfo(){
            $where['stuId'] = session("ID");
            $info = M('student')->where($where)->find();

            if($info['stuRealName'] != null && $info['stuSex'] != null && $info['stuPhone'] != null && $info['stuEmail'] != null && $info['stuMajor'] != null){
                return true;
            }else{
                return false;
            }
        }

    	/*
    	 *	2018年3月8日19:12:29
    	 *	学生管理中心首页
    	 */
        public function index(){

            $where['showStu'] = 1;
            $id = session("ID");
            $where['_string'] = '(msgFromId = ' . $id . ' and state = 1) OR (msgAccessId = ' . $id . ' and state = -1) ';
            $this->assign("msgCount", M('message')->where($where)->Count() + M('message')->where(array('state' => 2))->Count());

            $this->assign('usrSex', session('SEX'));
            
        	$this->assign("title", "登录信息");
            $this->display();
        }

        /*
    	 *	2018年3月8日19:13:22
    	 *	学生管理中心个人信息
    	 */
        public function person(){
        	$this->assign("title", "个人管理");

            $obj = M("student");
            $usrInfo = $obj->where(array("stuId" => session("ID")))->find();
            $this->assign("usrInfo", $usrInfo);
           // echo $usrInfo['stuPwd'];
            $where['majorId']=$usrInfo['stuMajor'];
            $obj = M("major");
            $major = $obj->where($where)->find();
            //echo $major;
            $this->assign("major", $major);
            //var_dump($major) ;
            $this->display();
        }

        /*
    	 *	2018年3月8日19:13:36
    	 *	学生管理中心毕设列表
    	 */
        public function bslist(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Student/person'));
                return false;
            }

        	$this->assign("title", "毕设列表");

            $obj = M("stlinks");
            $where['stlStuId'] = session("ID");
            $meGpList = $obj->join("left join gproject on stlinks.stlSpId = gproject.gpId")->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("stlinks.state as sstate, gproject.*, teacher.thrRealName")->where($where)->select();
            $this->assign("meGpList", $meGpList);

            $this->display();
        }

        /*
    	 *	2018年3月8日19:13:54
    	 *	学生管理中心毕设详情
    	 */
        public function detail(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Student/person'));
                return false;
            }


        	$this->assign("title", "毕设详情");

            $obj = M('stlinks');
            $where['stlStuId'] = session("ID");
            $where['stlinks.state'] = 2;
            
            $GpDetail = $obj->join("left join gproject on stlinks.stlSpId = gproject.gpId")->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("gproject.*, thrRealName, thrPhone, thrEmail, thrAddress, thrStudy")->where($where)->find();
            if(!isset($GpDetail)){
                $this->error("当前未有课题被选定。。。", U('Student/bslist'));
            }
            $this->assign("meDetail", $GpDetail);

            $this->display();
        }
         /*
         *  2018年4月23日19:13:54
         *  学生管理成绩
         */
        public function score(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Student/person'));
                return false;
            }


            $this->assign("title", "成绩查询");

            $obj = M('score');
            $where['stuId'] = session("ID");
            //echo session('ID');
            //$where['stlinks.state'] = 2;
            /*  各科成绩综合查询*/
            $scorelist = $obj->where($where)->order('cId asc')->select();
            if(!isset($scorelist)){
                $this->error("something wrong ", U('Student/index'));
            }
            $this->assign("scorelist", $scorelist);


            /*分科成绩查询  */
            /* query chinese score */
            $obj = M();
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =1)";
            $chineseScore=$obj->query($sql);
            $this->assign("chineseScore", $chineseScore);
            /* query math score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =2)";
            $mathScore=$obj->query($sql);
            $this->assign("mathScore", $mathScore);
            /* query english score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =3)";
            $englishScore=$obj->query($sql);
            $this->assign("englishScore", $englishScore);
            /* query physical score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =4)";
            $physicalScore=$obj->query($sql);
            $this->assign("physicalScore", $physicalScore);
            /* query chemical score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =5)";
            $chemicalScore=$obj->query($sql);
            $this->assign("chemicalScore", $chemicalScore);
            /* query biology score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =6)";
            $biologyScore=$obj->query($sql);
            $this->assign("biologyScore", $biologyScore);

            /* query politics score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =7)";
            $politicsScore=$obj->query($sql);
            $this->assign("politicsScore", $politicsScore);
            /* query history score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =8)";
            $historyScore=$obj->query($sql);
            $this->assign("historyScore", $historyScore);
            /* query geography score */
            $sql="select * from score where stuId=".session("ID")." and cId in (select cId from course where cNameId =9)";
            $geographyScore=$obj->query($sql);
            $this->assign("geographyScore", $geographyScore);
            //echo "sql  ".$sql;
            //var_dump(session);

            /*平均成绩查询*/

            $obj=M('');
            $sql="SELECT stuMajor FROM student WHERE stuID= ".session('ID');
            $thisclass=$obj->query($sql);
          //  var_dump($thisclass);
           // echo $thisclass[0]['stuMajor'];
           /* 语文成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=1)";
            $avgChinese=$obj->query($sql);
             $this->assign("avgChinese", $avgChinese);
            /* 数学成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=2)";
            $avgMath=$obj->query($sql);             
            $this->assign("avgMath", $avgMath);

            /* 英语成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=3)";
            $avgEnglish=$obj->query($sql);            
            $this->assign("avgEnglish", $avgEnglish);

            /* 物理成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=4)";
            $avgPhysical=$obj->query($sql);
            $this->assign("avgPhysical", $avgPhysical);

            /* 化学成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=5)";
            $avgChemical=$obj->query($sql);
            $this->assign("avgChemical", $avgChemical);

            /* 生物成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=6)";
            $avgBiology=$obj->query($sql);
            $this->assign("avgBiology", $avgBiology);

            /* 政治成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=7)";
            $avgPoliticals=$obj->query($sql);
            $this->assign("avgPoliticals", $avgPoliticals);

            /* 历史成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=8)";
            $avgHistory=$obj->query($sql);
            $this->assign("avgHistory", $avgHistory);

            /* 地理成绩平均分*/
            $sql="SELECT AVG(score) ,AVG(part1) ,AVG(part2),AVG(part3) FROM score WHERE stuId IN (select stuId from student where stuMajor =".$thisclass[0]['stuMajor'].") AND cId IN (SELECT cId FROM course WHERE cNameId=9)";
            $avgGeography=$obj->query($sql);
            $this->assign("avgGeography", $avgGeography);
            //var_dump($avgChinese);
            /* 单科成绩排名  获得位置local  和总人数 total*/
            $sql="SELECT stuMajor FROM student WHERE stuId=".session('ID');
            $class=M('')->query($sql);
            /*语文 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =1) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $chinesetotal=M('')->query($sql);
            
            $this->assign("chinesetotal", $chinesetotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =1) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$chineseScore[0][score];
            $chineselocal=M('')->query($sql);
            echo $chineselocal[0]['count(*)'];
            $this->assign("chineselocal", $chineselocal[0]['count(*)']);
            /*数学 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =2) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $mathtotal=M('')->query($sql);
            
            $this->assign("mathtotal", $mathtotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =2) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$mathScore[0][score];
            $mathlocal=M('')->query($sql);
            $this->assign("mathlocal", $mathlocal[0]['count(*)']);
            /*英语 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =3) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $englishtotal=M('')->query($sql);
            
            $this->assign("englishtotal", $englishtotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =3) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$englishScore[0][score];
            $englishlocal=M('')->query($sql);
            $this->assign("englishlocal", $englishlocal[0]['count(*)']);
            /*物理 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =4) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $physicaltotal=M('')->query($sql);
            
            $this->assign("physicaltotal", $physicaltotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =4) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$physicalScore[0][score];
            $physicallocal=M('')->query($sql);
            $this->assign("physicallocal", $physicallocal[0]['count(*)']);
            /*化学 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =5) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $chemicaltotal=M('')->query($sql);
            
            $this->assign("chemicaltotal", $chemicaltotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =5) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$chemicalScore[0][score];
            $chemicallocal=M('')->query($sql);
            $this->assign("chemicallocal", $chemicallocal[0]['count(*)']);
            /*生物 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =6) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $biologytotal=M('')->query($sql);
            
            $this->assign("biologytotal", $biologytotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =6) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$biologyScore[0][score];
            $biologylocal=M('')->query($sql);
            $this->assign("biologylocal", $biologylocal[0]['count(*)']);
            /*政治 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =7) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $politicstotal=M('')->query($sql);
            
            $this->assign("politicstotal", $politicstotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =7) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$politicsScore[0][score];
            $politicslocal=M('')->query($sql);
            $this->assign("politicslocal", $politicslocal[0]['count(*)']);
            /*历史 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =8) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $historytotal=M('')->query($sql);
            
            $this->assign("historytotal", $historytotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =8) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$historyScore[0][score];
            $historylocal=M('')->query($sql);
            $this->assign("historylocal", $historylocal[0]['count(*)']);
            /*地理 */
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =9) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) ORDER BY score DESC";
            $geographytotal=M('')->query($sql);
            
            $this->assign("geographytotal", $geographytotal[0]['count(*)']);
            $sql="SELECT count(*) FROM score WHERE cId In (select cId from course where cNameId =9) AND stuId IN (SELECT stuId FROM student WHERE stuMajor= ".$class[0][stuMajor]." ) AND score >= ".$geographyScore[0][score];
            $geographylocal=M('')->query($sql);
            $this->assign("geographylocal", $geographylocal[0]['count(*)']);
            
            $this->display();
            
        }

        /*
    	 *	2018年3月8日19:16:18
    	 *	学生管理中心消息管理
    	 */
        public function msg(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Student/person'));
                return false;
            }

        	$this->assign("title", "消息管理");

            $obj = M('stlinks');
            $data = array();
            $data = $obj->join("left join teacher on stlinks.stlThrId = teacher.thrId")->field("thrId, thrRealName")->where(array('stlStuId' => session("ID"), 'stlinks.state' => 2))->find();
            $this->assign("ff", $data);

            unset($obj);
            $where['showStu'] = 1;
            $id = session("ID");
            $where['_string'] = '(msgFromId = ' . $id . ' and state = 1) OR (msgAccessId = ' . $id . ' and state = -1) ';

            $obj    = M('message'); // 实例化User对象
            $count  = $obj->where($where)->Count();// 查询满足要求的总记录数
            $Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $List = $obj->field('msgId, msgFromId, msgAccessId, msgContent, createTime, state')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();

            $this->assign('List', $List);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出

            unset($where);
            $where['state'] = 2;
            $this->assign("adminList", $obj->field('msgId, msgFromId, msgAccessId, msgContent, createTime, state')->where($where)->select());

            $this->display();
        }

        /*
    	 *	2018年3月8日19:14:05
    	 *	学生管理中心毕设进度
    	 */
        public function plan(){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Student/person'));
                return false;
            }


        	$this->assign("title", "毕设进度");

            $obj = M('stlinks');
            $where['stlStuId'] = session("ID");
            $where['stlinks.state'] = 2;
            $count = $obj->join("left join gproject on stlinks.stlSpId = gproject.gpId")->join("left join teacher on gproject.gpThrId = teacher.thrId")->where($where)->Count();
            if($count == 0){
                $this->error("当前未有课题被选定。。。", U('Student/bslist'));
            }

            unset($where);
            $where['plnStuId'] = session("ID");
            $this->assign("info", M("plan")->where($where)->find());

            $this->display();
        }

        /*
    	 *	2018年3月8日19:14:19
    	 *	学生管理中心毕设选择
    	 */
        public function choose($GPName = null, $GPKey = null, $GPThrName = null, $GPState = null, $GPSH = null){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Student/person'));
                return false;
            }


            layout(false);
            $this->assign("title", "毕设选题");

            $where = array();
            $seachData['GPName'] = $GPName;
            if(isset($GPName) && !empty($GPName)){
                $where['gproject.gpTitle'] = array("like", "%{$GPName}%");
            }
            $seachData['GPKey'] = $GPKey;
            if(isset($GPKey) && !empty($GPKey)){
                $where['gproject.gpContent'] = array("like", "%{$GPKey}%");
            }
            $seachData['GPThrName'] = $GPThrName;
            if(isset($GPThrName) && !empty($GPThrName)){
                $where['teacher.thrId'] = $GPThrName;
            }

            $where['gproject.state'] = array("in", array(1, 2));
            $seachData['GPState'] = $GPState;
            if(isset($GPState) && !empty($GPState)){
                $where['gproject.state'] = $GPState == 1 ? array("in", array(1, 2)) : 3;
            }
            $seachData['GPSH'] = $GPSH;
            if(isset($GPSH) && !empty($GPSH)){
                $where['gproject.gpSHState'] = $GPSH;
            }
            $this->assign("seachData", $seachData);
            
            $obj    = M('gproject'); // 实例化User对象
            $count  = $obj->where($where)->Count();// 查询满足要求的总记录数
            $Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $gpList = $obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->field("gproject.*, teacher.thrRealName")->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('gpList', $gpList);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
        	
            unset($where);
            $obj = M("stlinks");
            $where['stlStuId'] = session("ID");
            $choseIds = $obj->field("stlSpId")->where($where)->select();
            $this->assign("choseIds", $choseIds);

            unset($where);
            $where['stlStuId'] = session('ID');
            $where['state'] = 2;
            $this->assign('FF', M('stlinks')->where($where)->Count() == 1 ? true : false);
            
            $thrList = M('gproject')->join("left join teacher on gproject.gpThrId = teacher.thrId")->distinct(true)->field('gpThrId, thrRealName')->where(array('gproject.state' => array('in', array(1, 2))))->select();
            $this->assign("thrList", $thrList);
            
            $this->display();
        }
        

         /*
         *  2018年3月8日19:14:19
         *  学生管理中心毕设选择
         */
        public function choose_course($GPName = null, $GPKey = null, $GPThrName = null, $GPState = null, $GPSH = null){
            if(!$this->chkUsrInfo()){
                $this->error("请先去完善个人信息，再进行其他操作", U('Student/person'));
                return false;
            }


            layout(false);
            $this->assign("title", "选择课程");
/*
*这里是检索部分 通过课题名字 关键字 老师名字 状态 等字段进行检索
 */
            $where = array();
            $seachData['GPName'] = $GPName;
            if(isset($GPName) && !empty($GPName)){
                $where['gproject.gpTitle'] = array("like", "%{$GPName}%");
            }
            $seachData['GPKey'] = $GPKey;
            if(isset($GPKey) && !empty($GPKey)){
                $where['gproject.gpContent'] = array("like", "%{$GPKey}%");
            }
            $seachData['GPThrName'] = $GPThrName;
            if(isset($GPThrName) && !empty($GPThrName)){
                $where['teacher.thrId'] = $GPThrName;
            }
/*
            $where['gproject.state'] = array("in", array(1, 2));
            $seachData['GPState'] = $GPState;
            if(isset($GPState) && !empty($GPState)){
                $where['gproject.state'] = $GPState == 1 ? array("in", array(1, 2)) : 3;
            }
            $seachData['GPSH'] = $GPSH;
            if(isset($GPSH) && !empty($GPSH)){
                $where['gproject.gpSHState'] = $GPSH;
            }
            $this->assign("seachData", $seachData);
            */
            $obj    = M('course'); // 实例化User对象
            $count  = $obj->Count();// 查询满足要求的总记录数
            $Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show   = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $courseList = $obj->join("left join teacher on course.thrId = teacher.thrId")->field("course.*, teacher.thrRealName")->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('courseList', $courseList);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            
            unset($where);
            $obj = M("stlinks");
            $where['stlStuId'] = session("ID");
            $choseIds = $obj->field("stlSpId")->where($where)->select();
            $this->assign("choseIds", $choseIds);

            unset($where);
            $where['stlStuId'] = session('ID');
            $where['state'] = 2;
            $this->assign('FF', M('stlinks')->where($where)->Count() == 1 ? true : false);
            
            $thrList = M('gproject')->join("left join teacher on gproject.gpThrId = teacher.thrId")->distinct(true)->field('gpThrId, thrRealName')->where(array('gproject.state' => array('in', array(1, 2))))->select();
            $this->assign("thrList", $thrList);
         /* var_dump($courseList);
            echo "</br>";
            var_dump($where) ;
            echo "</br>";
            var_dump($thrList);
             echo "</br>";
            var_dump($seachData);*/
            $this->display();
        }

        /*
         *  2018年3月22日12:31:05
         *  学生管理学生数据更新
         */
        public function modifyInfo(){
            if(IS_POST){
                $where['stuId'] = I("post.usr_id");
                /*
                $Pwd = I("post.old_pwd");
                // echo md5($Pwd);
                $newPwd = I("post.newpwd");
                if($Pwd != $newPwd){
                    $data['stuPwd'] = md5($newPwd);
                    $where['stuPwd'] = md5($Pwd);
                    
                }
                */
                $oldPwd = I("post.pwd");
                $newPwd = I("post.newpwd");
                if($oldPwd != $newPwd && $oldPwd !=null){
                    $data['stuPwd'] = md5($newPwd);
                    $where['stuPwd'] = md5($oldPwd);
                }
                $data['stuRealName'] = I("post.realName");
                $data['stuAge'] = I("post.age");
                $data['stuSex'] = I("post.sex");
                $data['stuPhone'] = I("post.phone");
                $data['stuEmail'] = I("post.email");
               // $data['stuMajor'] = I("post.usr_lvl");
                $data['updateTime'] = time();
                /*
                echo $oldPwd;
                echo $newPwd;
                var_dump($data);
                var_dump($where);
                */
                $obj = M("student");
                if($obj->where($where)->save($data)){
                    $this->success("用户信息修改成功, 请重新登陆", U('Student/loginout'));
                }else{
                    $this->error("用户信息修改失败，请检查");
                }
            }
        }

        /*
         *  2018年3月22日13:29:31
         *  学生管理课题详情
         */
        public function checkGPDetail($id = 0){
            if($id != 0){
                $where["gpId"] = $id;

                $obj = M("gproject");
                $field = "gproject.*, thrRealName, showState, thrStudy, thrPhone, thrEmail, thrAddress";
                $GpDetail =$obj->join("left join teacher on gproject.gpThrId = teacher.thrId")->field($field)->where($where)->find();

                if($GpDetail['showState'][0] == 0){
                    $GpDetail['thrPhone'] = "不公布";
                }
                if($GpDetail['showState'][1] == 0){
                    $GpDetail['thrEmail'] = "不公布";
                }
                if($GpDetail['showState'][2] == 0){
                    $GpDetail['thrAddress'] = "不公布";
                }
                if($GpDetail['showState'][3] == 0){
                    $GpDetail['thrStudy'] = "不公布";
                }

                if(is_array($GpDetail) && !empty($GpDetail)){
                    echo json_encode(array("state" => true, "detail" => $GpDetail));
                }
            }else{
                echo json_encode(array("state" => false, "detail" => array()));
            }
        }

        /*
         *  2018年3月22日13:54:13
         *  学生管理课题选定
         */
        public function chooseGP($id = 0, $thrid = 0){
            if($id >= 0 && $thrid >= 0){
                $obj = M("stlinks");
                if($obj->where(array('stlStuId' => session('ID')))->Count() > 6){
                    $this->error('亲，课题列表包裹上限为 6， 请先去减轻负重');
                    return false;
                }


                $data['stlStuId'] = session("ID");
                $data['stlThrId'] = $thrid;
                $data['stlSpId'] = $id;
                $data['state'] = 1;
                $time = time();
                $data['createTime'] = $time;
                $data['updateTime'] = $time;

                if($obj->add($data) && M("gproject")->where(array('gpId' => $id))->save(array("state" => 2))){
                    $this->success("该课题选择成功，等待确认...");
                }else{  
                    $this->error("该课题选择失败，请检查");
                }

            }else{  
                $this->error("操作参数错误，请检查");
            }
        }

        /*
         *  2018年3月8日20:28:12
         *  学生管理中心注销
         */
        public function loginout(){
            session(null);
            $this->redirect("Index/index");
        }

        /*
         * 2018年4月17日16:56:09
         * 学生退选
         */
        public function tuixuan($id = 0){
            if($id == 0 || intval($id) <= 0){
                $this->error('参数错误，请检查');
            }

            $obj = M("stlinks");
            $where['stlSpId'] = $id;
            $where['stlStuId'] = session("ID");

            $flag = true;
            $obj->startTrans();
            if(!$obj->where($where)->delete()){
                $flag = false;
            }
            if(!($obj->where(array('stlSpId' => $id))->Count() == 0 && M("gproject")->where(array("gpId" => $id))->save(array("state" => 1)))){
                $flag = false;
            }

            if($flag){
                $obj->commit();
                $this->success("课题退选成功");
            }else{
                $obj->rollback();
                $this->success("课题退选失败，请检查");
            }
        }

        /*
         * 2018年4月17日17:18:53
         * 无用课题删除
         */
        public function shanchu($id = 0){
            if($id == 0 || intval($id) <= 0){
                $this->error('参数错误，请检查');
            }

            $obj = M("stlinks");
            $where['stlSpId'] = $id;
            $where['stlStuId'] = session("ID");

            if($obj->where($where)->delete()){
                $this->success("课题删除成功");
            }else{
                $this->success("课题删除失败，请检查");
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
                $data['msgAccessId'] = I("post.receive");
                $data['msgContent'] = I("post.content");
                $data['createTime'] = time();
                $data['state'] = 1;
                $data['showStu'] = 1;
                $data['showThr'] = 1;

                $obj = M('message');
                if($obj->add($data)){
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
            if($obj->where(array('msgId' => $id))->save(array('showStu' => -1))){
                $this->success("消息删除成功");
            }else{
                $this->error("消息删除失败");
            }

        }

        /*
         *  2018年4月19日15:39:01
         *  学生添加进度
         */
        public function addPlan(){
            if(IS_POST){
                $obj = M('stlinks');
                $where['stlStuId'] = session("ID");
                $where['stlinks.state'] = 2;
                
                $dd = $obj->field("stlStuId, stlThrId, stlSpId")->where($where)->find();
                if(!isset($dd)){
                    $this->error("当前未有课题被选定。。。", U('Student/bslist'));
                }

                $data = array();
                $data['plnStuId'] = $dd['stlStuId'];
                $data['plnThrId'] = $dd['stlThrId'];
                $data['plnGpId'] = $dd['stlSpId'];

                $data['endtime1'] = I("post.endtime1") == "____/__/__ __:__" ? "" : I("post.endtime1");
                $data['title1'] = I("post.title1");
                $data['other1'] = I("post.other1");
                $data['endtime2'] = I("post.endtime2") == "____/__/__ __:__" ? "" : I("post.endtime2");
                $data['title2'] = I("post.title2");
                $data['other2'] = I("post.other2");
                $data['endtime3'] = I("post.endtime3") == "____/__/__ __:__" ? "" : I("post.endtime3");
                $data['title3'] = I("post.title3");
                $data['other3'] = I("post.other3");
                $data['endtime4'] = I("post.endtime4") == "____/__/__ __:__" ? "" : I("post.endtime4");
                $data['title4'] = I("post.title4");
                $data['other4'] = I("post.other4");
                $data['endtime5'] = I("post.endtime5") == "____/__/__ __:__" ? "" : I("post.endtime5");
                $data['title5'] = I("post.title5");
                $data['other5'] = I("post.other5");
                $data['endtime6'] = I("post.endtime6") == "____/__/__ __:__" ? "" : I("post.endtime6");
                $data['title6'] = I("post.title6");
                $data['other6'] = I("post.other6");
                $data['endtime7'] = I("post.endtime7") == "____/__/__ __:__" ? "" : I("post.endtime7");
                $data['title7'] = I("post.title7");
                $data['other7'] = I("post.other7");
                $data['flag'] = 1;
                $data['createTime'] = time();

                $obj = M('plan');
                if($obj->add($data)){
                    $this->success("进度节点添加成功", U('Student/plan'));
                }else{
                    $this->error("进度节点添加失败，请检查");
                }
            }
        }

    }
?>