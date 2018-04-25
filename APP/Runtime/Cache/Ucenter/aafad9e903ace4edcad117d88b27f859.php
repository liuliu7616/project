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
    <link rel="stylesheet" href="/project/Public/Styles/css/me.css">
    <link rel="stylesheet" href="/project/Public/Styles/css/page.css">
    <script src="/project/Public/Styles/js/jquery.js"></script>
    <script src="/project/Public/Styles/js/pintuer.js"></script>
    <script src="/project/Public/Styles/js/respond.js"></script>

</head>
<body>
    <header>
        <div class="layout layout_top bg22 fixed-top">
            <p class="nav-p">
                欢迎您，<?php echo ($usrName); ?>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Student/loginout');?>">注销</a>
                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Student/index');?>">首页</a>
            </p>
        </div>
    </header>

    <section>
        <div class="line">
            <div class="xm2 bg22 contBox">
                <aside>
                <ul class="nav">
                    <li><a href="<?php echo U('Student/index');?>" class="lls <?php echo $state == 'index' ? 'active' : '';?>">登录信息</a></li>
                    <li><a href="<?php echo U('Student/person');?>" class="lls <?php echo $state == 'person' ? 'active' : '';?>">个人管理</a></li>
                    <li><a href="<?php echo U('Student/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">毕设列表</a></li>
                    <li><a href="<?php echo U('Student/detail');?>" class="lls <?php echo $state == 'detail' ? 'active' : '';?>">毕设详情</a></li>
                    <li><a href="<?php echo U('Student/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">消息管理</a></li>
                    <li><a href="<?php echo U('Student/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">毕设进度</a></li>
                    <li><a href="<?php echo U('Student/choose');?>" class="lls <?php echo $state == 'choose' ? 'active' : '';?>">毕设选题</a></li>    
                    <li><a href="<?php echo U('Student/choose_course');?>" class="lls <?php echo $state == 'choose-course' ? 'active' : '';?>">选择课程</a></li>

                </ul>
                </aside>
            </div>
            <div class="xm10 contBox">
                <div class="bread-me">
                    <ul class="bread bg">
                      <li><a href="<?php echo U('Student/index');?>" class="icon-home"> 首页</a></li>
                      <li><?php echo ($title); ?></li>
                    </ul>
                </div>

<div class="adminme">
    <div class="panel admin-panel">
        <div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <a class="button button-small border-green dialogs disabled" <?php echo $ff['thrId'] != null ? '' : 'disabled="disabled"';?> name="addmsg" href="#" data-toggle="click" data-target="#mymsgdialog" data-mask="1" data-width="50%">新增消息</a>
        </div>
        <table class="table table-hover">
            <tr>
                <th width="60">编号</th>
                <th width="140">信息时间</th>
                <th width="120">发信人</th>
                <th width="120">收信人</th>
                <th width="*">信息内容</th>
                <th width="100">操作</th>
            </tr>
            <?php if(is_array($adminList)): $i = 0; $__LIST__ = $adminList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr class="red">
                <td><?php echo ($index["msgId"]); ?></td>
                <td><?php echo (date("m-d i:m:s",$index["createTime"])); ?></td>
                <td>管理员</td>
                <td>所有学生</td>
                <td><?php echo ($index["msgContent"]); ?></td>
                <td>
                    <!-- <input type="hidden" name="id" value="<?php echo ($index["msgId"]); ?>"/> -->
                    <!-- <a class="button border-red button-little dialogs" name="del" href="#" data-toggle="click" data-target="#mydeldialog" data-mask="1" data-width="30%">删除</a> -->
                    无操作
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- 楼上是管理员的消息 -->
            <?php if(is_array($List)): $i = 0; $__LIST__ = $List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($index["msgId"]); ?></td>
                <td><?php echo (date("m-d i:m:s",$index["createTime"])); ?></td>
                <td>
                    <?php  if($index['msgFromId'] == $ff['thrId']){ echo $ff['thrRealName']; }else{ echo $usrName; } ?>
                </td>
                <td>
                    <?php  if($index['msgAccessId'] == $ff['thrId']){ echo $ff['thrRealName']; }else{ echo $usrName; } ?>
                </td>
                <td><?php echo ($index["msgContent"]); ?></td>
                <td>
                    <input type="hidden" name="id" value="<?php echo ($index["msgId"]); ?>"/>
                    <a class="button border-green button-little dialogs" name="del" href="#" data-toggle="click" data-target="#mydeldialog" data-mask="1" data-width="30%">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        <div class="panel-foot text-center">
            <?php echo ($page); ?>
        </div>
    </div>
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
</div>

<div id="mymsgdialog"> 
    <div class="dialog"> 
        <div class="dialog-head"> 
            <span class="close rotate-hover"></span> 
            <strong>新增消息</strong> 
        </div> 
        <div class="dialog-body">
            <form action="<?php echo U('Student/addMsg');?>" method="post">
                <div class="form-group">
                    <div class="label"><label for="receive">收信人：</label></div>
                    <div class="field">
                        <input type="hidden" id="receive" name="receive" value="<?php echo ($ff["thrId"]); ?>" />
                        <input type="text" class="input" disabled="disabeld" size="30" placeholder="收信人" value="<?php echo ($ff["thrRealName"]); ?>" />
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
<div id="mydeldialog"> 
    <div class="dialog"> 
        <div class="dialog-head"> 
            <span class="close rotate-hover"></span> 
            <strong>消息操作</strong> 
        </div> 
        <div class="dialog-body">
            <div class="form-group">
                <p>是否确认要删除该消息？</p>
            </div>
            <input type="button" class="button bg-main" value="果断的选择" onclick="javascript:del();" />
            <button class="button bg-yellow" type="reset">再考虑考虑</button>
        </div> 
    </div> 
</div>



<script>
    var ID = null;
    function del(){
        window.location.href = "<?php echo U('Student/delMsg/id/" + ID + "');?>";
    }
    $(function(){
        $(".table a[name='del']").click(function(){
            ID = $(this).parent().find("input[name='id']").val();
        });

    });
</script>


            </div>
        </div>
    </section>

    <footer>
        
    </footer>

    <script>
    	$(function(){
    		var tHeight = $("body").height();
    		$("section > .line .contBox").css('height', tHeight + 'px');
    	});
    </script>
</body>
</html>