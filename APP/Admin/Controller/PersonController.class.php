<?php
   namespace Admin\Controller;
   use Think\Controller;
    class PersonController extends BaseController {
        function __construct(){
            parent::__construct();
        }
    public function person(){
            $titles = array();
            $titles['prt'] = "个人信息";
            $titles['prtLink'] = CONTROLLER_NAME;
            
            $this->assign("titles", $titles);

            //echo session('adminID');
            $obj=M('');
            $sql="SELECT * FROM admin WHERE adminId =".session('adminID');
            $admininfo=$obj->query($sql);
            //var_dump($admininfo);
            $this->assign('admininfo',$admininfo);
            $this->display();
        }
    public function modifyInfo(){
        
        
         if(IS_POST){

                $oldPwd = I("post.oldpwd");
                $newPwd = I("post.newpwd");
                $data['adminRealName'] = I("post.realName");
                $data['adminAge'] = I("post.age");
                $data['adminSex'] = I("post.sex");
                $data['adminPhone'] = I("post.Phone");
                $data['adminEmail'] = I("post.Email");
                $data['adminAddress'] = I("post.Address");
                $data['updateTime'] = time();

                $where['adminId'] = I('post.usrId');
                if($oldPwd != $newPwd && $oldPwd !=null){
                    $data['adminPwd'] = md5($newPwd);
                    $where['adminPwd'] = md5($oldPwd);
                }

                
                
                $obj = M("admin");
                if($obj->where($where)->save($data)){
                    $this->success("用户信息修改成功，请重新登陆", U("Index/index"));
                }else{
                    $this->error("用户信息修改失败，请检查");
                }
        }else{
            
        }
    }
}