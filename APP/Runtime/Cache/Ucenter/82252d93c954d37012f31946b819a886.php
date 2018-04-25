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
<style>
    .mypanel-head{color: #444444; text-align: center;}
    .mypanel-body{background-color: #ffffff; color: #999999;}
</style>
<link rel="stylesheet" type="text/css" href="/project/Public/Plugins/datetimepicker/jquery.datetimepicker.css"/>
<div class="adminme">
    <?php if($info['planId'] == null): ?>
    <form method="post" class="form-x" action="<?php echo U('Student/addPlan');?>">
    <?php else: ?>
    <form method="post" class="form-x" action="#">
    <?php endif;?>
        <div class="collapse">
            <div class="panel active">
                <div class="panel-head mypanel-head"><h4>时间节点 ①</h4></div>
                <div class="panel-body mypanel-body">
                    <div class="form-group">
                        <div class="label"><label for="endtime1">截止时间</label></div>
                        <div class="field">
                            <input type="text" class="input input-auto" id="endtime1" name="endtime1" size="30" value="<?php echo $info['endtime1'] != null ? $info['endtime1'] : '';?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title1">标题</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title1" name="title1" size="50" placeholder="时间节点标题"  value="<?php echo $info['title1'] != null ? $info['title1'] : '';?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="other1">备注</label></div>
                        <div class="field">
                            <textarea class="input" id="other1" name="other1" rows="3" cols="30" placeholder="备注"><?php echo $info['other1'] != null ? $info['other1'] : '';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-head mypanel-head"><h4>时间节点 ②</h4></div>
                <div class="panel-body mypanel-body">
                    <div class="form-group">
                        <div class="label"><label for="endtime2">截止时间</label></div>
                        <div class="field">
                            <input type="text" class="input input-auto" id="endtime2" name="endtime2" size="30" value="<?php echo $info['endtime2'] != null ? $info['endtime2'] : '';?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title2">标题</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title2" name="title2" size="50" placeholder="时间节点标题"  value="<?php echo $info['title2'] != null ? $info['title2'] : '';?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="other2">备注</label></div>
                        <div class="field">
                            <textarea class="input" id="other2" name="other2" rows="3" cols="30" placeholder="备注"><?php echo $info['other2'] != null ? $info['other2'] : '';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-head mypanel-head"><h4>时间节点 ③</h4></div>
                <div class="panel-body mypanel-body">
                    <div class="form-group">
                        <div class="label"><label for="endtime3">截止时间</label></div>
                        <div class="field">
                            <input type="text" class="input input-auto" id="endtime3" name="endtime3" size="30" value="<?php echo $info['endtime3'] != null ? $info['endtime3'] : '';?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title3">标题</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title3" name="title3" size="50" placeholder="时间节点标题"  value="<?php echo $info['title3'] != null ? $info['title3'] : '';?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="other3">备注</label></div>
                        <div class="field">
                            <textarea class="input" id="other3" name="other3" rows="3" cols="30" placeholder="备注"><?php echo $info['other3'] != null ? $info['other3'] : '';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-head mypanel-head"><h4>时间节点 ④</h4></div>
                <div class="panel-body mypanel-body">
                    <div class="form-group">
                        <div class="label"><label for="endtime4">截止时间</label></div>
                        <div class="field">
                            <input type="text" class="input input-auto" id="endtime4" name="endtime4" size="30" value="<?php echo $info['endtime4'] != null ? $info['endtime4'] : '';?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title4">标题</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title4" name="title4" size="50" placeholder="时间节点标题"  value="<?php echo $info['title4'] != null ? $info['title4'] : '';?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="other4">备注</label></div>
                        <div class="field">
                            <textarea class="input" id="other4" name="other4" rows="3" cols="30" placeholder="备注"><?php echo $info['other4'] != null ? $info['other4'] : '';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-head mypanel-head"><h4>时间节点 ⑤</h4></div>
                <div class="panel-body mypanel-body">
                    <div class="form-group">
                        <div class="label"><label for="endtime5">截止时间</label></div>
                        <div class="field">
                            <input type="text" class="input input-auto" id="endtime5" name="endtime5" size="30" value="<?php echo $info['endtime5'] != null ? $info['endtime5'] : '';?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title5">标题</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title5" name="title5" size="50" placeholder="时间节点标题"  value="<?php echo $info['title5'] != null ? $info['title5'] : '';?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="other5">备注</label></div>
                        <div class="field">
                            <textarea class="input" id="other5" name="other5" rows="3" cols="30" placeholder="备注"><?php echo $info['other5'] != null ? $info['other5'] : '';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-head mypanel-head"><h4>时间节点 ⑥</h4></div>
                <div class="panel-body mypanel-body">
                    <div class="form-group">
                        <div class="label"><label for="endtime6">截止时间</label></div>
                        <div class="field">
                            <input type="text" class="input input-auto" id="endtime6" name="endtime6" size="30" value="<?php echo $info['endtime6'] != null ? $info['endtime6'] : '';?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title6">标题</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title6" name="title6" size="50" placeholder="时间节点标题"  value="<?php echo $info['title6'] != null ? $info['title6'] : '';?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="other6">备注</label></div>
                        <div class="field">
                            <textarea class="input" id="other6" name="other6" rows="3" cols="30" placeholder="备注"><?php echo $info['other6'] != null ? $info['other6'] : '';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-head mypanel-head"><h4>时间节点 ⑦</h4></div>
                <div class="panel-body mypanel-body">
                    <div class="form-group">
                        <div class="label"><label for="endtime7">截止时间</label></div>
                        <div class="field">
                            <input type="text" class="input input-auto" id="endtime7" name="endtime7" size="30" value="<?php echo $info['endtime7'] != null ? $info['endtime7'] : '';?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="title7">标题</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title7" name="title7" size="50" placeholder="时间节点标题"  value="<?php echo $info['title7'] != null ? $info['title7'] : '';?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="other7">备注</label></div>
                        <div class="field">
                            <textarea class="input" id="other7" name="other7" rows="3" cols="30" placeholder="备注"><?php echo $info['other7'] != null ? $info['other7'] : '';?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-button" style="margin-top: 20px;">
            <?php if($info['planId'] == null): ?>
            <button class="button bg-green form-submit " type="submit">提交</button>
            <button class="button bg-yellow form-reset " type="reset">重置</button>
            <?php else: ?>
            <button class="button bg-yellow form-button " type="button">No thing...</button>
            <?php endif;?>
        </div>
    </form>   
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
</div>
<script src="/project/Public/Plugins/datetimepicker/jquery.datetimepicker.js"></script>
<script>
    $('#endtime1').datetimepicker({
        mask:'9999/19/39 29:59'
    });
    $('#endtime2').datetimepicker({
        mask:'9999/19/39 29:59'
    });
    $('#endtime3').datetimepicker({
        mask:'9999/19/39 29:59'
    });
    $('#endtime4').datetimepicker({
        mask:'9999/19/39 29:59'
    });
    $('#endtime5').datetimepicker({
        mask:'9999/19/39 29:59'
    });
    $('#endtime6').datetimepicker({
        mask:'9999/19/39 29:59'
    });
    $('#endtime7').datetimepicker({
        mask:'9999/19/39 29:59'
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