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
                        <li><a href="<?php echo U('Teacher/add');?>" class="lls <?php echo $state == 'add' ? 'active' : '';?>">新增毕设</a></li>
                        <li><a href="<?php echo U('Teacher/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">毕设列表</a></li>
                        <li><a href="<?php echo U('Teacher/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">消息管理</a></li>
                        <li><a href="<?php echo U('Teacher/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">进度管理</a></li>
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
        <form method="post">
            <div class="panel admin-panel">
                <div class="panel-head"><strong>内容列表</strong></div>
                <div class="padding border-bottom">
                    <input type="button" class="button button-small border-green" value="新增毕设" onclick="javascript:window.location.href='<?php echo U('Teacher/add');?>';" />
                </div>
                <table class="table table-hover">
                    <tr>
                        <th width="80">课题编号</th>
                        <th width="110">课题名称</th>
                        <th width="*">课题内容</th>
                        <th width="160">必备知识</th>
                        <th width="140">操作</th>
                        <th width="90">状态</th>
                    </tr>
                    <?php if(is_array($bsList)): $i = 0; $__LIST__ = $bsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($index["gpId"]); ?></td>
                        <td><?php echo ($index["gpTitle"]); ?></td>
                        <td><?php echo ($index["gpContent"]); ?></td>
                        <td><?php echo ($index["gpMust"]); ?></td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>"/>
                            <a class="button border-yellow button-little dialogs" name="check" href="#" data-toggle="click" data-target="#checkdialog" data-mask="1" data-width="50%">查看</a>
                            <?php if($index["state"] < 2): ?><a class="button border-blue button-little" name="modify" href="#">修改</a>
                            <a class="button border-green button-little dialogs" name="delete" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">删除</a><?php endif; ?>
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>"/>
                            <?php if($index["state"] == -1): ?><a class="button border-black button-little">未通过</a>
                            <?php elseif($index["state"] == 0): ?>
                            <a class="button border-black button-little">待审核</a>
                            <?php elseif($index["state"] == 1): ?>
                            <a class="button border-black button-little">已通过</a>
                            <?php elseif($index["state"] == 2): ?>
                            <a class="button border-black button-little badge-corner dialogs" name="detail" href="#" data-toggle="click" data-target="#detaildialog" data-mask="1" data-width="60%">详情<span class="badge bg-red"><?php echo ($index["count"]); ?></span></a>
                            <?php elseif($index["state"] == 3): ?>
                            <a class="button border-yellow button-little dialogs" name="chkusr" href="#" data-toggle="click" data-target="#chkusrdialog" data-mask="1" data-width="30%">已确认</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                <div class="panel-foot text-center">
                    <!-- 分页 -->
                </div>
            </div>
        </form>  
        <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
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
                    <p>其　　他：  <a class="gpOthers" href="#"></a></p>
                    <p>课题方向：  <a class="gpSHState" href="#"></a></p>
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
                    <p>是否确认要删除该课题？</p>
                    <p>O(∩_∩)O~~(为可恢复删除.恢复联系管理员)</p>
                </div>
                <input type="button" class="button bg-main" value="删了吧" onclick="javascript:del();" />
                <button class="button bg-yellow" type="reset">反悔了</button>
            </div> 
        </div> 
    </div>
        
    <div id="chkusrdialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>学生详情</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group form-me">
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

    <div id="detaildialog"> 
        <div class="dialog"> 
            <div class="dialog-head"> 
                <span class="close rotate-hover"></span> 
                <strong>课题详情</strong> 
            </div> 
            <div class="dialog-body">
                <div class="form-group">
                    <table class="table tableme"> 
                    </table>
                </div>
            </div> 
        </div> 
    </div>

    <script>
        var ID = null;
        function del(){
            window.location.href = "<?php echo U('Teacher/delGP/id/" + ID +"');?>";
        }

        function confirm(stlId){
            window.location.href = "<?php echo U('Teacher/confirm/id/" + stlId + "');?>";
        }
        $(function(){
            $(".table a[name='check']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
               
                $.ajax({
                    url: "<?php echo U('Teacher/checkGP');?>",
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

            $(".table a[name='chkusr']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
               
                $.ajax({
                    url: "<?php echo U('Teacher/chkStuInfo');?>",
                    data: {
                        id: ID,
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){
                            for(var x in data.detail){
                                if(x == 'stuSex'){
                                    $(".form-me ." + x + "").html(data.detail[x] == 1 ? '男' : '女');
                                }else{
                                    $(".form-me ." + x + "").html(data.detail[x]);
                                }
                            }
                        }else{
                            return ;
                        }
                    }
                }); 
            });

            $(".table a[name='detail']").click(function(){
                ID = $(this).parent().find("input[name='id']").val();
               
                $.ajax({
                    url: "<?php echo U('Teacher/checkStuList');?>",
                    data: {
                        id: ID,
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){

                            var str = "<tr><th>学生姓名</th><th>联系方式</th><th>邮件地址</th><th>专业方向</th><th>选定时间</th><th>操作</th></tr><tr>";
                            for(var x in data.stuList){
                                var tmp = data.stuList[x];
                                var stlId = null;
                                str = "<tr>" + str;
                                for(var y in tmp){
                                    if(y == "stlId"){
                                        stlId = tmp[y];
                                    }else{
                                        str += "<td>" + tmp[y] + "</td>";
                                    }
                                }
                                str = str + "<td><a class='button border-blue button-little' name='modify' href='javascript:confirm(" + stlId +")'>确认</a></td></tr>";
                            }
                            $(".tableme").html(str);
                            str = "";

                        }else{
                            $(".tableme").html("<tr><th style='text-align:center;'>该课题暂无学生选择</th></tr>");
                            return ;
                        }
                    }
                }); 
            });

            $(".table a[name='modify']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                window.location.href = "<?php echo U('Teacher/modifyGP/id/" + id +"');?>";
            });

            $(".table a[name='delete']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                ID = id;
            });

        });
    </script>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>