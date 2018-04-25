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
        <div class="panel admin-panel">
          <div class="panel-head">
                <a class="button button-small border-green dialogs disabled" name="addmsg" href="#" data-toggle="click" data-target="#mymsgdialog" data-mask="1" data-width="50%">新增消息</a>
            </div>
            <div class="padding border-bottom">
                <form action="<?php echo U('Msg/index');?>" class="form-inline">
                    <div class="form-group">
                        <div class="label"><label for="keys">关键字</label></div>
                        <div class="field">
                            <input type="text" class="input" id="keys" name="keys" size="12" value="<?php echo isset($seachData['keys']) && !empty($seachData['keys']) ? $seachData['keys'] : '';?>" placeholder="关键字" />
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="receive">发送者</label></div>
                        <div class="field">
                            <select class="input" name="receive" id="receive">
                                <option value="">请选择</option>
                                <option <?php echo $seachData['receive'] == 1 ? 'selected="selected"' : '' ;?> value="1">管理员</option>
                                <option <?php echo $seachData['receive'] == 2 ? 'selected="selected"' : '' ;?> value="2">指导老师</option>
                                <option <?php echo $seachData['receive'] == 3 ? 'selected="selected"' : '' ;?> value="3">学生</option>
                            </select>
                        </div>
                    </div>
                    &nbsp;
                    &nbsp;
                    <div class="form-button">
                        <button class="button bg-green" type="submit">检索</button>
                    </div>
                </form>
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="80">消息编号</th>
                    <th width="100">发信人</th>
                    <th width="100">收信人</th>
                    <th width="*">信息内容</th>
                    <th width="140">发送时间</th>
                    <th width="80">操作</th>
                </tr>
                <?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["msgId"]); ?></td>
                    <td><?php echo ($index["msgFromId"]); ?></td>
                    <td><?php echo ($index["msgAccessId"]); ?></td>
                    <td><?php echo ($index["msgContent"]); ?></td>
                    <td><?php echo (date("m-d i:m:s",$index["createTime"])); ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($index["msgId"]); ?>"/>
                        <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">删除</a>
                        </if>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            <div class="panel-foot text-center">
                <div class ="green-black"><?php echo ($page); ?></div>
            </div>
        </div>
        <br />
        <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
    </div>

    <div id="mydialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>课题操作</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>是否确认要删除该消息？</p>
                    <p>O(∩_∩)O~~(为不可恢复删除)</p>
                </div>
                <input type="button" class="button bg-main" value="删了吧" onclick="javascript:del();" />
                <button class="button bg-yellow" type="reset">反悔了</button>
            </div> 
        </div> 
    </div>

    <div id="mymsgdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>新增消息</strong> 
            </div> 
            <div class="dialog-body">
                <form action="<?php echo U('Msg/addMsg');?>" method="post">
                    <div class="form-group">
                        <div class="label"><label for="receive">收信人：</label></div>
                        <div class="field">
                            <select class="input" name="receive" id="receive">
                                <option value="1">所有人</option>
                                <option value="2">所有教师</option>
                                <option value="3">所有学生</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="content">信息内容：</label></div>
                        <div class="field">
                            <textarea class="input" rows="3" name="content" id="content" cols="30" placeholder="信息内容"></textarea>
                        </div>
                    </div>
                    <div class="form-button">
                        <input type="submit" class="button bg-main" value="Send ..." />
                        <button class="button bg-yellow" type="reset">刷新</button>
                    </div>
                </form>
            </div> 
        </div> 
    </div>

    <script>
        var ID = null;
        function del(){
            window.location.href = "<?php echo U('Msg/delMsg/id/" + ID +"');?>";
        }
        $(function(){

            $(".table a[name='delete']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                ID = id;
            });
        });
    </script>
</section>

    <footer>
        
    </footer>


</body>
</html>