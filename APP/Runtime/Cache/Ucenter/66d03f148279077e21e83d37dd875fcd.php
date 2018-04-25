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
    <form method="post" class="form-x" action="#">
         <div class="form-group">
            <div class="label"><label for="name">毕设编号</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="毕设编号"  value="<?php echo ($meDetail["gpId"]); ?>" disabled="disabled" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="name">毕设题目</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="毕设题目" value="<?php echo ($meDetail["gpTitle"]); ?>" disabled="disabled" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="pwd">毕设目的</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="毕设目的"><?php echo ($meDetail["gpAim"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">毕设内容</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="毕设内容"><?php echo ($meDetail["gpContent"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">毕设要求</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="毕设要求"><?php echo ($meDetail["gpRequest"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">必备知识</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="必备知识"><?php echo ($meDetail["gpMust"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">其他</label></div>
            <div class="field">
                <textarea class="input" rows="3" cols="30" placeholder="其他"><?php echo ($meDetail["gpOthers"]); ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">提交形式</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="提交形式"  value="<?php echo ($meDetail["gpFormal"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="phone">指导老师</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="指导老师"  value="<?php echo ($meDetail["thrRealName"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="email">联系方式</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="联系方式" value="<?php echo ($meDetail["thrPhone"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">邮件地址</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="邮件地址"  value="<?php echo ($meDetail["thrEmail"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="address">办公地点</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="办公地点" value="<?php echo ($meDetail["thrAddress"]); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">研究方向</label></div>
            <div class="field">
                <input type="text" class="input" size="50" placeholder="研究方向"  value="<?php echo ($meDetail["thrStudy"]); ?>" />
            </div>
        </div>

        <div class="form-button">
            <button class="button bg-yellow form-reset " type="reset">后退</button>  
        </div>                
    </form>   
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
</div>


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