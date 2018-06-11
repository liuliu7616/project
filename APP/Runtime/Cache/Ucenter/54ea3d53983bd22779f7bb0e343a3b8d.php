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
<div class="adminme">
    <div class="line-big">
        <div class="xm3">
            <div class="panel border-back">
                <div class="panel-body text-center">
                    <img src="/project/Public/Images/sex_<?php echo $usrSex == 1 ? 'a' : 'v'; ?>.jpg" width="120" class="radius-circle" /><br />
                    <?php echo ($usrName); ?>
                </div>
                <div class="panel-foot bg-back border-back">&nbsp;<br/>您好，<?php echo ($usrName); ?> <br>&nbsp;</div>
            </div>
            <br />
            <div class="panel">
                <div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                    <li><span class="float-right badge bg-red">1</span><span class="icon-user"></span> 用户</li><!--
                    <li><span class="float-right badge bg-main"><?php echo ($msgCount); ?></span><span class="icon-file"></span> 消息</li>
                    <li><span class="float-right badge bg-main"><?php echo ($gpCount); ?></span><span class="icon-shopping-cart"></span> 毕设</li>-->
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
            <div class="alert alert-yellow"><span class="close"></span><strong>注意：</strong>您有<?php echo ($msgCount); ?>条信息，<a href="<?php echo U('Teacher/msg');?>">点击查看</a>。</div>
            <div class="alert">
                <h4>学生成绩分析系统</h4>
                <p class="text-gray padding-top">中学生成绩分析系统，动态网站技术<br/>汇集学生信息、成绩信息以及其他与之相关的数据，方便学生获得对自身成绩的分析</p>
                <a target="_blank" class="button bg-dot icon-user" href="<?php echo U('Teacher/person');?>"> 个人管理</a> <!--
                <a target="_blank" class="button bg-main icon-file-text" href="<?php echo U('Teacher/bslist');?>"> 毕设管理</a> -->
            </div>
        </div>
    </div>
   
</div>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>