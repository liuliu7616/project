<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title><?php echo ($titles['prt']); ?>-<?php echo ($titles['son']); ?></title>
    <meta name="keywords" content="关键词" />
    <meta name="description" content="描述" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/Public/Styles/css/pintuer.css">
    <link rel="stylesheet" href="/project/Public/Styles/css/admin.css">
    <link rel="stylesheet" href="/project/Public/Styles/css/page.css">
    <script src="/project/Public/Styles/js/jquery.js"></script>
    <script src="/project/Public/Styles/js/pintuer.js"></script>
    <script src="/project/Public/Styles/js/respond.js"></script>
</head>

<body>
    <header>
    <div class="lefter">
        <div class="logo"><a href="<?php echo U('Admin/index');?>"><img src="/project/Public/Images/logo.gif" style="height:50px;" alt="后台管理系统" /></a></div>
    </div>
    <div class="righter nav-navicon" id="admin-nav">
        <div class="mainer">
            <div class="admin-navbar">
                <span class="float-right">
                	<a class="button button-little bg-main" href="<?php echo U('Admin/index');?>" target="_blank">前台首页</a>
                    <a class="button button-little bg-yellow" href="<?php echo U('Admin/loginout');?>">注销登录</a>
                </span>
                <ul class="nav nav-inline admin-nav">
                    <li class="<?php echo $flag['prt'] == 'admin' ? 'active' : '';?>">
                        <a href="<?php echo U('Admin/index');?>" class="icon-home"> 开始</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'admin_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Admin/index');?>">登陆信息</a>
                            </li>
                            <?php if(session("state") != 3): ?>
                            <li class="<?php echo $flag['son'] == 'teacher_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/index');?>">教师管理</a>
                            </li>
                            <?php endif; ?>
                            <?php if(session("state") != 2): ?>
                            <li class="<?php echo $flag['son'] == 'student_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/index');?>">学生管理</a>
                            </li>
                            <?php endif; ?>
                            <?php if(session("state") == 1): ?>
                            <li class="<?php echo $flag['son'] == 'desgin_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Design/index');?>">毕设管理</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'select_course_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Selectcourse/index');?>">选课管理</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'msg_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Msg/index');?>">消息管理</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'usr_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/index');?>">用户管理</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if(session("state") != 3): ?>
                    <li class="<?php echo $flag['prt'] == 'teacher' ? 'active' : '';?>">
                        <a href="<?php echo U('Teacher/index');?>" class="icon-user"> 教师</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'teacher_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/index');?>">教师列表</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'teacher_add' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/add');?>">新增教师</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'teacher_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Teacher/recycle');?>">回收站</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(session("state") != 2): ?>
                    <li class="<?php echo $flag['prt'] == 'student' ? 'active' : '';?>">
                        <a href="<?php echo U('Student/index');?>" class="icon-file-text"> 学生</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'student_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/index');?>">学生列表</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'student_add' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/add');?>">新增学生</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'student_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Student/recycle');?>">回收站</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if(session("state") == 1): ?>
                    <li class="<?php echo $flag['prt'] == 'design' ? 'active' : '';?>">
                        <a href="<?php echo U('Design/index');?>" class="icon-file"> 毕设</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'design_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Design/index');?>">毕设列表</a>
                            </li>
                            <!-- <li class="<?php echo $flag['son'] == 'design_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Design/recycle');?>">回收站</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="<?php echo $flag['prt'] == 'msg' ? 'active' : '';?>">
                        <a href="<?php echo U('Msg/index');?>" class="icon-cog"> 消息</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'msg_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Msg/index');?>">消息列表</a>
                            </li>
                            <!-- <li class="<?php echo $flag['son'] == 'msg_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Msg/recycle');?>">回收站</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="<?php echo $flag['prt'] == 'usr' ? 'active' : '';?>">
                        <a href="<?php echo U('Usr/index');?>" class="icon-th-list"> 用户</a>
                        <ul>
                            <li class="<?php echo $flag['son'] == 'usr_index' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/index');?>">用户列表</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'usr_add' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/add');?>">新增用户</a>
                            </li>
                            <li class="<?php echo $flag['son'] == 'usr_recycle' ? 'active' : '';?>">
                                <a href="<?php echo U('Usr/recycle');?>">回收站</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="admin-bread">
                <span>您好，<?php echo session("NAME");?>(
                    <?php  if(session("state") == 1){ $t = "超级管理员"; }else if(session("state") == 2){ $t = "教师管理员"; }else if(session("state") == 3){ $t = "学生管理员"; } echo $t;?>)&nbsp;&nbsp;&nbsp;&nbsp;欢迎您的光临。</span>
                <ul class="bread">
                    <li><a href="<?php echo U('Admin/index');?>" class="icon-home"> 开始</a></li>
                    <?php if($titles['prt'] == null): else: ?>    
                    <li><a href="/bs/admin.php/<?php echo ($titles['prtLink']); ?>/index.html"><?php echo ($titles['prt']); ?></a></li><?php endif; ?>
                    <li><?php echo ($titles['son']); ?></li>
                </ul>
            </div>
        </div>
    </div>
    </header>
    
    <section>
<div class="admin">
    <div class="line-big">
        <div class="xm3">
            <div class="panel border-back">
                <div class="panel-body text-center">
                    <img src="/project/Public/Images/sex_a.jpg" width="120" class="radius-circle" /><br />
                    admin
                </div>
                <div class="panel-foot bg-back border-back">&nbsp;<br/>您好，<?php echo session("NAME"); ?><br/>&nbsp;</div>
            </div>
            <br />
            <div class="panel">
                <div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                    <li><span class="float-right badge bg-red"><?php echo ($CLists["usr"]); ?></span><span class="icon-user"></span> 用户</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["teacher"]); ?></span><span class="icon-file"></span> 教师</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["student"]); ?></span><span class="icon-shopping-cart"></span> 学生</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["message"]); ?></span><span class="icon-file-text"></span> 消息</li>
                    <li><span class="float-right badge bg-main"><?php echo ($CLists["gp"]); ?></span><span class="icon-database"></span> 毕设</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
            <div class="alert alert-yellow"><span class="close"></span><strong>注意：</strong>您有0条未读信息，<a href="#">点击查看</a>。</div>
            <div class="alert">
                <h4>课题管理系统介绍</h4>
                <p class="text-gray padding-top">课题管理系统，动态网站技术<br/>汇集教师信息、学生信息、课题信息以及其他与之相关的数据，方便管理员对数据实时进行管理</p>
                <?php if(session("state") != 3): ?>
                <a target="_blank" class="button bg-dot icon-user" href="<?php echo U('Teacher/index');?>"> 教师管理</a> 
                <?php endif; ?>
                <?php if(session("state") != 2): ?>
                <a target="_blank" class="button bg-main icon-file-text" href="<?php echo U('Student/index');?>"> 学生管理</a>
                <?php endif; ?>
                <?php if(session("state") == 1): ?>
                <a target="_blank" class="button border-main icon-code" href="<?php echo U('Design/index');?>"> 课题管理</a>
                <?php endif; ?>
            </div>
            <div class="panel">
                <div class="panel-head"><strong>系统信息</strong></div>
                <table class="table">
                    <tr><th colspan="2">服务器信息</th><th colspan="2">系统信息</th></tr>
                    <tr>
                        <td width="120" align="right">操作系统：</td>
                        <td><?php echo ($system['os']); ?></td>
                        <td width="120" align="right">Web服务器：</td>
                        <td><?php echo ($system['web_os']); ?></td>
                    </tr>
                    <tr>
                        <td align="right">主页：</td>
                        <td><a href="#" target="_blank"><?php echo ($system['domainname']); ?></a></td>
                        <td align="right">IP：</td>
                        <td><?php echo ($system['ip']); ?></td>
                    </tr>
                    <tr>
                        <td align="right">程序语言：</td>
                        <td><?php echo ($system['language']); ?></td>
                        <td align="right">语言版本：</td>
                        <td><a href="#" target="_blank"><?php echo ($system['php_version']); ?></a></td>
                    </tr>
                    <tr>
                        <td align="right">数据类型：</td>
                        <td><?php echo ($system['db_os']); ?></td>
                        <td align="right">数据库版本：</td>
                        <td><?php echo ($system['db_version']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</div>
</section>

    <footer>
        
    </footer>


</body>
</html>