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
        <form method="post">
        <div class="panel admin-panel">
            <div class="panel-head"><strong>内容列表</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
                <input type="button" class="button button-small border-yellow dialogs" value="批量恢复" name="recoversallbtn" href="#" data-toggle="click" data-target="#recoverdialog" data-mask="1" data-width="30%" />
                <input type="button" class="button button-small border-blue dialogs" value="批量清除" name="clearallbtn" href="#" data-toggle="click" data-target="#clearsdialog" data-mask="1" data-width="30%" />
                <div id="recoversdialog"> 
                    <div class="dialog"> 
                        <div class="dialog-head"> 
                            <span class="close rotate-hover"></span> 
                            <strong>学生批量恢复</strong> 
                        </div> 
                        <div class="dialog-body">
                            <p>是否确认要恢复以选中学生？</p>
                            <p>O(∩_∩)O~~(大不了再删除)</p>

                            <input type="button" class="button bg-main" value="全恢复" onclick="javascript:recoverall();" />
                        </div> 
                    </div> 
                </div>
                <div id="clearsdialog"> 
                    <div class="dialog"> 
                        <div class="dialog-head"> 
                            <span class="close rotate-hover"></span> 
                            <strong>学生批量清除</strong> 
                        </div> 
                        <div class="dialog-body">
                            <p>是否确认要清除以选中学生？</p>
                            <p>:( (为不可恢复删除)</p>

                            <input type="button" class="button bg-main" value="全清除" onclick="javascript:clearall();" />
                        </div> 
                    </div> 
                </div>
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="45">选择</th>
                    <th width="140">学号</th>
                    <th width="140">姓名</th>
                    <th width="110">性别</th>
                    <th width="120">联系方式</th>
                    <th width="*">专业名称</th>
                    <th width="180">操作</th>
                </tr>
                <?php if(is_array($usrList)): $i = 0; $__LIST__ = $usrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td>
                        <input type="checkbox" name="id" value="<?php echo ($index["id"]); ?>" />
                    </td>
                    <td><?php echo ($index["stuCard"]); ?></td>
                    <td><?php echo ($index["stuRealName"]); ?></td>
                    <td>
                        <?php echo $index['stuSex'] == 1 ? '男' : '女'; ?>
                    </td>
                    <td><?php echo ($index["stuPhone"]); ?></td>
                    <td><?php echo ($index["majorName"]); ?></td>
                    <td>
                        <input name='stuid' type="hidden" value="<?php echo ($index["stuId"]); ?>" />
                        <a class="button border-blue button-little dialogs" name="recover" href="#" data-toggle="click" data-target="#recoverdialog" data-mask="1" data-width="30%">恢复</a>
                        <a class="button border-yellow button-little dialogs" name="clear" href="#" data-toggle="click" data-target="#cleardialog" data-mask="1" data-width="30%">清除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            <div class="panel-foot text-center">
                page
            </div>
        </div>
        </form>
        <br />
        <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
    </div>
    <div id="cleardialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>学生操作</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>是否确认要清除该学生？</p>
                    <p>O__O"…~~(删了就没了)</p>
                </div>
        
                <input type="button" class="button bg-main" value="残忍的删除" onclick="javascript:clearr();" />
                <button class="button bg-yellow" type="reset">愉快的拒绝</button>
            </div> 
        </div> 
    </div>
    <div id="recoverdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>学生操作</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>是否确认要恢复该学生？</p>
                    <p>O(∩_∩)O~~(可以考虑考虑)</p>
                </div>
        
                <input type="button" class="button bg-main" value="那就恢复吧" onclick="javascript:recover();" />
                <button class="button bg-yellow" type="reset">再考虑考虑</button>
            </div> 
        </div> 
    </div>

    <script>
        var ID = null;
        function recover(){
            window.location.href = "<?php echo U('Student/recoverOne/id/" + ID + "');?>";
        }

        function clearr(){
            window.location.href = "<?php echo U('Student/clearOne/id/" + ID + "');?>";
        }

        $(function(){
            $(".table a[name='recover']").click(function(){
                ID = $(this).parent().find("input[name='stuid']").val();
            });

            $(".table a[name='clear']").click(function(){
                ID = $(this).parent().find("input[name='stuid']").val();
            });
        });
    </script>
</section>

    <footer>
        
    </footer>


</body>
</html>