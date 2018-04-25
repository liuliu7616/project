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
                <input type="button" class="button button-small border-green" value="新增学生" onclick="javascript:window.location.href='<?php echo U('Student/add');?>';" />
                <input type="button" class="button button-small border-blue" value="回收站" onclick="javascript:window.location.href='<?php echo U('Student/recycle');?>'" />
            </div>
            <div class="padding border-bottom">
                <form action="<?php echo U('Student/index');?>" class="form-inline">
                    <div class="form-group">
                        <div class="label"><label for="stuCard">学号</label></div>
                        <div class="field">
                            <input type="text" class="input" id="stuCard" name="stuCard" size="12" value="<?php echo isset($seachData['stuCard']) && !empty($seachData['stuCard']) ? $seachData['stuCard'] : '';?>" placeholder="学生学号" />
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="stuName">姓名</label></div>
                        <div class="field">
                            <input type="text" class="input" id="stuName" name="stuName" size="12" value="<?php echo isset($seachData['stuName']) && !empty($seachData['stuName']) ? $seachData['stuName'] : '';?>" placeholder="学生姓名" />
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="stuSex">学生性别</label></div>
                        <div class="field">
                            <select class="input" name="stuSex" id="stuSex">
                                <option value="">请选择</option> 
                                <option <?php echo $seachData['stuSex'] == 1 ? 'selected="selected"' : '' ;?> value="1">男</option>
                                <option <?php echo $seachData['stuSex'] == 2 ? 'selected="selected"' : '' ;?> value="2">女</option>
                            </select>
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="stuMajor">学生专业</label></div>
                        <div class="field">
                            <select class="input" name="stuMajor" id="stuMajor">
                                <option value="">请选择</option> 
                                <?php if(is_array($majorList)): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><option <?php echo $seachData['stuMajor'] == $index['majorId'] ? 'selected="selected"' : '' ;?> value="<?php echo ($index["majorId"]); ?>"><?php echo ($index["majorName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
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
                    <th width="140">学号</th>
                    <th width="140">姓名</th>
                    <th width="110">性别</th>
                    <th width="120">联系方式</th>
                    <th width="*">专业名称</th>
                    <th width="180">操作</th>
                </tr>
                <?php if(is_array($usrList)): $i = 0; $__LIST__ = $usrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["stuCard"]); ?></td>
                    <td><?php echo ($index["stuRealName"]); ?></td>
                    <td>
                        <?php echo $index['stuSex'] == 1 ? '男' : '女'; ?>
                    </td>
                    <td><?php echo ($index["stuPhone"]); ?></td>
                    <td><?php echo ($index["majorName"]); ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($index["stuId"]); ?>"/>
                        <a class="button border-yellow button-little dialogs" name="check" href="#" data-toggle="click" data-target="#checkdialog" data-mask="1" data-width="30%">查看</a>
                        <a class="button border-blue button-little" name="reset" href="#">重置密码</a>
                        <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">删除</a>
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

    <div id="checkdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>学生详情</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>学生学号：  <a class="stuCard" href="#"></a></p>
                    <p>真实姓名：  <a class="stuRealName" href="#"></a></p>
                    <p>学生专业：  <a class="majorName" href="#"></a></p>
                    <p>学生性别：  <a class="stuSex" href="#"></a></p>
                    <p>学生年龄：  <a class="stuAge" href="#"></a></p>
                    <p>联系方式：  <a class="stuPhone" href="#"></a></p>
                    <p>邮箱地址：  <a class="stuEmail" href="#"></a></p>
                </div>
            </div> 
        </div> 
    </div>

    <div id="mydialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>学生操作</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>是否确认要删除该学生？</p>
                    <p>O(∩_∩)O~~(为可恢复删除)</p>
                </div>
                <input type="button" class="button bg-main" value="删了吧" onclick="javascript:recycle();" />
                <button class="button bg-yellow" type="reset">反悔了</button>
            </div> 
        </div> 
    </div>
        

    <script>
        var ID = null;
        function recycle(){
            window.location.href = "<?php echo U('Student/toRecycle/id/" + ID +"');?>";
        }
        $(function(){
            $(".table a[name='check']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
               
                $.ajax({
                    url: "<?php echo U('Student/checkDetail');?>",
                    data: {
                        id: ID,
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){
                            for(var x in data.detail){
                                if(x == 'stuSex'){
                                    $(".dialog ." + x + "").html(data.detail[x] == 1 ? '男' : '女');
                                }else{
                                    $(".dialog ." + x + "").html(data.detail[x]);
                                }
                            }
                        }else{
                            return ;
                        }
                    }
                }); 
            });

            $(".table a[name='reset']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                window.location.href = "<?php echo U('Student/reset/id/" + id +"');?>";
            });

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