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
        <form method="post" class="form-x" action="<?php echo U('Usr/addusr');?>">
            <div class="form-group">
                <div class="label"><label for="name">用户账号</label></div>
                <div class="field">
                    <input type="text" class="input" id="name" name="name" size="50" placeholder="用户名称" data-validate="required:请填写新用户名称" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="pwd">用户密码</label></div>
                <div class="field">
                    <input type="password" class="input" id="pwd" name="pwd" size="50" placeholder="用户密码，位数不小于 5" data-validate="required:请填写密码,length#>=5:密码长度不符合要求 (>5)" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="comfirmpwd">确认密码</label></div>
                <div class="field">
                    <input type="password" class="input" id="comfirmpwd" name="comfirmpwd" size="50" placeholder="用户密码，位数不小于 5" data-validate="required:请填写确认密码,repeat#pwd:两次输入的密码不一致" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="name">真实姓名</label></div>
                <div class="field">
                    <input type="text" class="input" id="realname" name="realname" size="50" placeholder="真实姓名" data-validate="required:请填写用户真实姓名" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>用户性别</label></div>
                <div class="field">
                    <div class="button-group radio"> 
                        <label class="button active">
                            <input name="sex" value="1" checked="checked" type="radio"> 男
                        </label> 
                        <label class="button">
                            <input name="sex" value="2" type="radio"> 女
                        </label> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="age">用户年龄</label></div>
                <div class="field">
                    <input type="text" class="input" id="age" name="age" size="50" placeholder="用户年龄" data-validate="required:请填写用户年龄,number:用户年龄必须为整数" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="phone">联系方式</label></div>
                <div class="field">
                    <input type="text" class="input" id="phone" name="phone" size="50" placeholder="联系方式" data-validate="number:请填写正确的联系方式" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="email">邮件地址</label></div>
                <div class="field">
                    <input type="text" class="input" id="email" name="email" size="50" placeholder="请填写邮件地址" data-validate="email:请填写正确的邮件地址" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="address">家庭住址</label></div>
                <div class="field">
                    <input type="text" class="input" id="address" name="address" size="50" placeholder="请填写用户住址，建议在20字以内"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>用户组别</label></div>
                <div class="field">
                    <select class="input" name="state" id="state" data-validate="required:请填写选择正确用户组">
                        <option value="">请选择</option> 
                        <option value="1">超级管理员</option>
                        <option value="2">教师管理员</option>
                        <option value="3">学生管理员</option>
                    </select>
                </div>
            </div>
            <div class="form-button">
                <button class="button bg-main" type="submit">提交</button>
                <button class="button bg-yellow form-reset " type="reset">重设</button>
            </div>
        </form>  
        <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
    </div>
</section>

    <footer>
        
    </footer>


</body>
</html>