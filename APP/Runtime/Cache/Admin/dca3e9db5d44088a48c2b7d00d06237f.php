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
          <!--   <div class="panel-head">
                <input type="button" class="button button-small border-blue" value="回收站" onclick="javascript:window.location.href='<?php echo U('Design/recycle');?>'" />
            </div> -->
            <div class="padding border-bottom">
                <form action="<?php echo U('Selectcourse/addcourse');?>" class="form-inline">
                    <div class="form-group">
                        <div class="label"><label for="cId">课程号</label></div>
                        <div class="field">
                            <input type="text" class="input" id="cId" name="cId" size="12" value="<?php echo isset($seachData['gpThrId']) && !empty($seachData['gpThrId']) ? $seachData['gpThrId'] : '';?>" placeholder="课程号" />
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="stuCard">学号</label></div>
                        <div class="field">
                            <input type="text" class="input" id="stuCard" name="stuCard" size="12" value="<?php echo isset($seachData['gpContent']) && !empty($seachData['gpContent']) ? $seachData['gpContent'] : '';?>" placeholder="学号" />
                        </div>
                    </div>
                    &nbsp;
                    <!--
                    <div class="form-group">
                        <div class="label"><label for="state">课题状态</label></div>
                        <div class="field">
                            <select class="input" name="state" id="state">
                                <option value="">请选择</option>
                                <option <?php echo $seachData['state'] == -1 ? 'selected="selected"' : '' ;?> value="-1">待审核</option>
                                <option <?php echo $seachData['state'] == 1 ? 'selected="selected"' : '' ;?> value="1">已审核</option>
                                <option <?php echo $seachData['state'] == 3 ? 'selected="selected"' : '' ;?> value="3">已选定</option>
                            </select>
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <div class="label"><label for="gpSHState">课题方向</label></div>
                        <div class="field">
                            <select class="input" name="gpSHState" id="gpSHState">
                                <option value="">请选择</option>
                                <option <?php echo $seachData['gpSHState'] == 1 ? 'selected="selected"' : '' ;?> value="1">软件方向</option>
                                <option <?php echo $seachData['gpSHState'] == 2 ? 'selected="selected"' : '' ;?> value="2">硬件方向</option>
                            </select>
                        </div>
                    </div>-->
                    &nbsp;
                    &nbsp;
                    <div class="form-button">
                        <button class="button bg-green" type="submit">添加</button>
                    </div>
                </form>
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="80">课程号</th>
                    <th width="110">课程名</th>
                    <th width="110">学号</th>
                    <th width="110">姓名</th>
                    <th width="80">指导老师</th>
                    <th width="140">操作</th>
                </tr>
                <?php if(is_array($bsList)): $i = 0; $__LIST__ = $bsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["cId"]); ?></td>
                    <td><?php echo ($index["cName"]); ?></td>
                    <td><?php echo ($index["stuCard"]); ?></td>
                    <td><?php echo ($index["stuRealName"]); ?></td>
                    <td><?php echo ($index["thrRealName"]); ?></td>
                    <td style="display:none"><?php echo ($index["stuId"]); ?></td>
                    <td>
                        <?php if($index["status"] == 00): ?>未选中
                         <?php elseif($index["status"] == 01): ?>
                            已选中<?php endif; ?> 
                    </td>
                     <td>
                        <input type="hidden" name="cid" value="<?php echo ($index["cId"]); ?>"/>
                        <input type="hidden" name="stuid" value="<?php echo ($index["stuId"]); ?>"/>
                   <!--     <a class="button border-blue button-little dialogs" name="check" href="#" data-toggle="click" data-target="#checkdialog" data-mask="1" data-width="50%">查看</a>
                        <?php if($index["state"] == 0): ?><a class="button border-red button-little dialogs" name="shenhe" href="#" data-toggle="click" data-target="#myshenhe" data-mask="1" data-width="30%">审核</a> -->
                        <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">删除</a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div class="panel-foot text-center">
                <div class ="green-black"><?php echo ($page); ?></div>
            </div>
        </div>
        <br />
        
    </div>

     <div id="checkdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>课题详情</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>课题编号：  <a class="gpId" href="#"></a></p>
                    <p>课题内容：  <a class="gpContent" href="#"></a></p>
                    <p>课题目的：  <a class="gpAim" href="#"></a></p>
                    <p>课题要求：  <a class="gpRequest" href="#"></a></p>
                    <p>必备知识：  <a class="gpMust" href="#"></a></p>
                    <p>提交形式：  <a class="gpFormal" href="#"></a></p>
                    <p>课题方向：  <a class="gpSHState" href="#"></a></p>
                    <p>其　　他：  <a class="gpOthers" href="#"></a></p>
                    <p>指导老师：  <a class="thrRealName" href="#"></a></p>
                </div>
            </div> 
        </div> 
    </div>

    <div id="mydialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>课题操作</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <p>是否确认要删除该选课？</p>
                    <p>O(∩_∩)O~~(为可恢复删除)</p>
                </div>
                <input type="button" class="button bg-main" value="删了吧" onclick="javascript:del();" />
                <button class="button bg-yellow" type="reset">反悔了</button>
            </div> 
        </div> 
    </div>

    <div id="myshenhe"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>课题审核</strong> 
            </div> 
            <div class="dialog-body">
                    <div class="form-group">
                        <p>该课题尚未进行审核，请审核：</p>
                    </div>
                    <br/>
                    <br/>
                    <div class="form-button">
                        <input type="button" class="button bg-main" value="审核通过" onclick="javascript:shenhe(1);" />
                        <input type="button" class="button bg-blue" value="未通过审核" onclick="javascript:shenhe(-1);" />
                        <button class="button bg-yellow" type="reset">再考虑考虑</button>
                    </div>
            </div> 
        </div> 
    </div>
        

    <script>
        var ID = null;
        var CID=null,STUID=null;
        function del(){
            //window.location.href = "<?php echo U('Design/cycGP/id/" + ID +"');?>";
            // alert("<?php echo U('Design/cycCourse/cId/" +CID +"/stuId/"+STUID+"');?>");
            window.location.href = "<?php echo U('Design/cycCourse/cid/" +CID +"/stuid/"+STUID+"');?>";
        }
        function shenhe(flag){
            window.location.href = "<?php echo U('Design/SH/id/" + ID +"/flag/" + flag + "');?>";
        }
        $(function(){
            $(".table a[name='check']").click(function(){
                //ID = $(this).parent().find("input[name='id']").val();                
                CID = $(this).parent().find("input[name='cid']").val();                
                STUID = $(this).parent().find("input[name='stuid']").val();


               
                $.ajax({
                    url: "<?php echo U('Design/checkGP');?>",
                    data: {
                        id: ID,

                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){
                            for(var x in data.detail){
                                if(x == 'gpSHState'){
                                    $(".dialog ." + x + "").html(data.detail[x] == 1 ? '软件方向' : '硬件方向');
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

            $(".table a[name='delete']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                ID = id;
                var cId = $(this).parent().find("input[name='cid']").val();                
                var stuId = $(this).parent().find("input[name='stuid']").val();
                CID=cId;
                STUID=stuId;
            });
            $(".table a[name='shenhe']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                ID = id;
                var cId = $(this).parent().find("input[name='cid']").val();                
                var stuId = $(this).parent().find("input[name='stuid']").val();
                CID=cId;
                STUID=stuId;
            });

        });
    </script>
</section>

    <footer>
        
    </footer>


</body>
</html>