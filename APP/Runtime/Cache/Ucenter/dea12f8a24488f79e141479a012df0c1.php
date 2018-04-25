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
    <form method="post">
        <div class="panel admin-panel">
            <table class="table table-hover">
                <tr>
                    <th width="60">编号</th>
                    <th width="120">课题方向</th>
                    <th width="140">课题标题</th>
                    <th width="*">课题内容</th>
                    <th width="140">指导老师</th>
                    <th width="120">操作</th>
                </tr>
                <?php if(is_array($meGpList)): $i = 0; $__LIST__ = $meGpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($index["gpId"]); ?></td>
                    <td>
                        <?php echo $index['gpSHState'] == 1 ? '软件方向' : '硬件方向'; ?>
                    </td>
                    <td><?php echo ($index["gpTitle"]); ?></td>
                    <td><?php echo ($index["gpContent"]); ?></td>
                    <td><?php echo ($index["thrRealName"]); ?></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($index["gpId"]); ?>"/>
                        <?php if($index['sstate'] == 1): ?><a class="button border-green button-little dialogs" name="tuixuan" href="#" data-toggle="click" data-target="#mydialog" data-mask="1" data-width="30%">退选</a>
                        <?php elseif($index['sstate'] == 2): ?>
                        <a class="button border-green button-little" href="javascript:window.location.href='<?php echo U('Student/detail');?>'">已确定</a>
                        <?php elseif($index['sstate'] == 3): ?>
                        <a class="button border-red button-little dialogs" name="shanchu" href="#" data-toggle="click" data-target="#myshanchudialog" data-mask="1" data-width="30%">删除(已放弃)</a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
           <!--  <div class="panel-foot text-center">
                page
            </div> -->
        </div>
    </form>  
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
                <p>是否确认要退选该课题？</p>
                <p>O(∩_∩)O~~</p>
            </div>
            <input type="button" class="button bg-main" value="果断的选择" onclick="javascript:tuixuan();" />
            <button class="button bg-yellow" type="reset">再考虑考虑</button>
        </div> 
    </div> 
</div>
<div id="myshanchudialog"> 
    <div class="dialog"> 
        <div class="dialog-head"> 
            <span class="close rotate-hover"></span> 
            <strong>课题操作</strong> 
        </div> 
        <div class="dialog-body">
            <div class="form-group">
                <p>是否要删除该课题？(留着也没用)</p>
                <p>O(∩_∩)O~~</p>
            </div>
            <input type="button" class="button bg-main" value="- 删 - " onclick="javascript:shanchu();" />
            <button class="button bg-yellow" type="reset">再考虑考虑</button>
        </div> 
    </div> 
</div>
<script>
    var ID = null;
    function tuixuan(){
        window.location.href = "<?php echo U('Student/tuixuan/id/" + ID + "');?>";
    }
    function shanchu(){
        window.location.href = "<?php echo U('Student/shanchu/id/" + ID + "');?>";
    }
    $(function(){
        $(".table a[name='tuixuan']").click(function(){
            ID = $(this).parent().find("input[name='id']").val();
        });
        $(".table a[name='shanchu']").click(function(){
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