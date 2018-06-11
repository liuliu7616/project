<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title><?php echo ($title); ?></title>
    <meta name="keywords" content="关键词" />
    <meta name="description" content="描述" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/Public/Styles/css/pintuer.css">
    <link rel="stylesheet" href="/project/Public/Styles/css/admin.css">
    <link rel="stylesheet" href="/project/Public/Styles/css/page.css">
    <link rel="stylesheet" href="/project/Public/Styles/css/adminme.css">
    <link rel="stylesheet" href="/project/Public/Styles/css/select.css">
    <script src="/project/Public/Styles/js/jquery.js"></script>
    <script src="/project/Public/Styles/js/pintuer.js"></script>
    <script src="/project/Public/Styles/js/respond.js"></script>

    <style>
        
    </style>

</head>
<body>
    <header>
        <div class="layout layout_top bg22 fixed-top">
            <div class="navbar navbar-big radius navbarme">
                <div class="navbar-head">
                </div>
                <div class="navbar-body">
                    <ul class="nav nav-inline nav-menu nav-tabs nav-big">
                        <li><a href="<?php echo U('Teacher/index');?>" class="lls <?php echo $state == 'index' ? 'active' : '';?>">登录信息</a></li>
                        <li><a href="<?php echo U('Teacher/person');?>" class="lls <?php echo $state == 'person' ? 'active' : '';?>">个人管理</a></li>

                        <!--
                        <li><a href="<?php echo U('Teacher/add');?>" class="lls <?php echo $state == 'add' ? 'active' : '';?>">新增毕设</a></li>
                        <li><a href="<?php echo U('Teacher/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">毕设列表</a></li>
                        <li><a href="<?php echo U('Teacher/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">消息管理</a></li>
                        <li><a href="<?php echo U('Teacher/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">进度管理</a></li> -->
                        <li><a href="<?php echo U('Teacher/edit_score');?>" class="lls <?php echo $state == 'edit_score' ? 'active' : '';?>">成绩录入</a></li>
                        <li><a href="<?php echo U('Teacher/scoreimport');?>" class="lls <?php echo $state == 'scoreimport' ? 'active' : '';?>">成绩批量导入</a></li>
                    </ul>
                </div>
            </div>
            <p class="nav-p">
                欢迎您，<?php echo ($usrName); ?>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Teacher/loginout');?>">注销</a>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Teacher/index');?>">首页</a>
            </p>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="bread-me">
                <ul class="bread bg-green bg-inverse">
                    <li><a href="<?php echo U('Teacher/index');?>" class="icon-home"> 首页</a></li>
                    <li><?php echo ($title); ?></li>
                </ul>
            </div>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<style>
       
        #scoretable{
            font-size:26px;
            color:#1C86EE;
        }
        #container{
            height:50px;
            width:300px;
        }
    </style>
<form method="post" action="/project/index.php/Teacher/import" enctype="multipart/form-data">  
    <h3>导入成绩 -Excel表：</h3><input  type="file" name="file_stu" />  
    <input type="submit" id="import" value="导入" />  
</form> 
<div id='container'></div>

<a  id="scoretable"  href="/project/index.php/Teacher/exportexcel">点此下载成绩单 </a>

</body>
<script type="text/javascript">
if(<?php echo ($permission); ?>==1){
            document.getElementById("import").setAttribute("disabled", true);
           
        }
        else{
            document.getElementById("import").setAttribute("bg-red", true);
            //document.getElementById("submitbutton").setAttribute("disabled", false);
        }
</script>
</html>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>