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
                        <li><a href="<?php echo U('Teacher/add');?>" class="lls <?php echo $state == 'add' ? 'active' : '';?>">新增毕设</a></li>
                        <li><a href="<?php echo U('Teacher/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">毕设列表</a></li>
                        <li><a href="<?php echo U('Teacher/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">消息管理</a></li>
                        <li><a href="<?php echo U('Teacher/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">进度管理</a></li>
                        <li><a href="<?php echo U('Teacher/edit_score');?>" class="lls <?php echo $state == 'edit_score' ? 'active' : '';?>">成绩录入</a></li>
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
 <!--       <form method="post">-->
            <div class="panel admin-panel">
                <div class="panel-head"><strong>成绩录入列表</strong></div>
            <!--    <div class="padding border-bottom">
                    <input type="button" class="button button-small border-green" value="新增毕设" onclick="javascript:window.location.href='<?php echo U('Teacher/add');?>';" />
                </div>-->
                <table class="table table-hover">
                    <tr>
                        <th width="80">学号</th>
                        <th width="110">姓名</th>
                        <th width="110">成绩</th>
                        <th width="160">试卷是否上传</th>
                        <th width="140">录入成绩</th>
                        <th width="90">上传试卷</th>
                    </tr>
                    <?php if(is_array($scoreList)): $i = 0; $__LIST__ = $scoreList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($index["stuCard"]); ?></td>
                        <td><?php echo ($index["stuRealName"]); ?></td>
                        <td>
                            <input type="hidden" name="stuid" value="<?php echo ($index["stuId"]); ?>"/>
                            <input type="hidden" name="cid" value="<?php echo ($index["cId"]); ?>"/>                        
                            <input type=text name="score" onblur="checkscore(this)" value="<?php echo ($index["score"]); ?>">
                            <input type="hidden" name="score_back" value="<?php echo ($index["score"]); ?>"/>
                        </td>
                      
                        <td>
                            <?php if($index["paperUrl"] == NULL): ?><a class="button border-black button-little">未上传</a>
                            <?php else: ?>
                            <a class="button border-black button-little">已上传</a><?php endif; ?>
                        </td>
                          <td> 
                            <input type="hidden" name="cid" value="<?php echo ($index["cId"]); ?>"/>                             
                            <a class="button border-yellow button-little dialogs" name="save_score" href="#"  data-mask="1"  onclick="javascript:savescore()" data-width="50%">保存成绩</a>

                        </td>
                        <td>
                            <form name="uploadform" action="uploadfile" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="stuid" value="<?php echo ($index["stuId"]); ?>"/>
                                <input type="hidden" name="cid" value="<?php echo ($index["cId"]); ?>"/>
                                <input type="file" name='uploadfile' /> 
                                <input type="submit" value="确认上传" />
                            <!--   <a class="button border-yellow button-little dialogs" name="uploadfile" href="#"  data-mask="1"   data-width="50%">确认上传</a> -->
                            </form>
                            
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                
                <div class="panel-foot text-center">
                <div class ="green-black"><?php echo ($page); ?></div>
            </div>
            </div>
    <!--    </form>  -->
        
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
        
        function checkscore(ob) {
            var old_value= $(ob).next().val();
            

            var value = ob.value;
            if(value)
             if(!(value.match(/^\d+(?:\.\d{1,2})?$/)&& value>=0 && value<=100 )){
                alert("输入的值必须为0-100的数字且最多有两位小数");
                ob.value=old_value;

             }
        
        
        }
    </script>

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

            $(".table form[name='uplaodform']").click(function(){
                
            });

            $(".table a[name='delete']").click(function(){
                var id = $(this).parent().find("input[name='id']").val();
                ID = id;
            });
            $(".table a[name='save_score']").click(function(){
                var cid = $(this).parent().prev().prev().find("input[name='cid']").val();
                var stuid = $(this).parent().prev().prev().find("input[name='stuid']").val();
                var score = $(this).parent().prev().prev().find("input[name='score']").val();
                window.location.href = "<?php echo U('Teacher/savescore/cid/" + cid +"/stuid/"+stuid+"/score/"+score+"');?>";
               // alert("<?php echo U('Teacher/savescore/cid/" + cid +"/stuid/"+stuid+"/score/"+score+"');?>");
            });
            
            $(".table a[name='uploadfile']").click(function(){
                var cid = $(this).parent().prev().prev().prev().find("input[name='cid']").val();
                var stuid = $(this).parent().prev().prev().prev().find("input[name='stuid']").val(); 
                //var file = $(this).parent().find("input[name='uploadfile']").val();
                alert(stuid);
                var form = $(this).parent().find();
                //new FormData(document.getElementById("myForm"));

            //    window.location.href = "<?php echo U('Teacher/savescore/cid/" + cid +"/stuid/"+stuid+"/score/"+score+"');?>";
            
                 $.ajax({
                    url: "<?php echo U('Teacher/uploadfile');?>",
                    data: {
                        cId: cid,
                        stuId: stuid,
                        data_form:form,
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(data){
                        if(data.state == true){
                            alert("post success");
                        }else{
                            return ;
                        }
                    }
                }); 
               // alert("<?php echo U('Teacher/savescore/cid/" + cid +"/stuid/"+stuid+"/score/"+score+"');?>");
            });


        });
    </script>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>