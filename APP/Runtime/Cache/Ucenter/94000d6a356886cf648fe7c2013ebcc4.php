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
                    <li><a href="<?php echo U('Student/score');?>" class="lls <?php echo $state == 'choose-course' ? 'active' : '';?>">成绩</a></li>

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
    <form method="post" class="form-x" action="<?php echo U('Student/modifyInfo');?>">
        <div class="form-group">
            <div class="label"><label for="name">用户账号</label></div>
            <div class="field">
                <input type="text" class="input" id="name" name="name" size="50" placeholder="用户名称" data-validate="required:请填写新用户名称" value="<?php echo ($usrInfo['stuCard']); ?>" disabled="disabled" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="pwd">用户密码</label></div>
            <div class="field fieldme">
                <div class="input-group">
                    <span class="addon"><input name="chkPwd" type="checkbox" value="1" /></span>
                    <input type="password" class="input" name="pwd" size="50" value="<?php echo ($usrInfo['stuPwd']); ?>" placeholder="请输入原始密码" disabled="disabled" />
                </div>
            </div>
        </div>
        <div class="pwdPanel" style="padding-bottom: 10px; display:none;">
            <div class="form-group">
                <div class="label"><label for="pwd">新密码</label></div>
                <div class="field">
                    <input type="password" class="input" name="newpwd" size="50" value=" " placeholder="请输入新登陆密码，位数不小于 5" 
                    data-validate="required:请填写密码,length#>=5:密码长度不符合要求 (>5)"/>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="confirmpwd">确认密码</label></div>
                <div class="field">
                    <input type="password" class="input" name="confirmpwd" size="50" value=" " placeholder="再次确认新登陆密码"
                    data-validate="required:请填写确认密码,repeat#newpwd:两次输入的密码不一致" />
                </div>
            </div>  
        </div>
        <div class="form-group">
            <div class="label"><label for="realName">用户姓名</label></div>
            <div class="field">
                <input type="text" class="input" id="realName" name="realName" size="50" placeholder="用户姓名" data-validate="required:请填写用户姓名" value="<?php echo ($usrInfo['stuRealName']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="age">用户年龄</label></div>
            <div class="field">
                <input type="text" class="input" id="age" name="age" size="50" placeholder="用户年龄" data-validate="required:请填写用户年龄,number:用户年龄必须为整数" value="<?php echo ($usrInfo['stuAge']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label>用户性别</label></div>
            <div class="field">
                <div class="button-group radio"> 
                    <label class="button active">
                        <input name="sex" value="1" <?php echo $usrInfo['stuSex'] == 1 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-male"></span> 男
                    </label> 
                    <label class="button ">
                        <input name="sex" value="2" <?php echo $usrInfo['stuSex'] == 2 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-female"></span> 女
                    </label> 
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="phone">联系方式</label></div>
            <div class="field">
                <input type="text" class="input" id="phone" name="phone" size="50" placeholder="联系方式" data-validate="required:请填写用户联系方式,number:请填写正确的联系方式" value="<?php echo ($usrInfo['stuPhone']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="email">邮件地址</label></div>
            <div class="field">
                <input type="text" class="input" id="email" name="email" size="50" placeholder="邮件地址" data-validate="required:请填写邮件地址,email:请填写正确的邮件地址" value="<?php echo ($usrInfo['stuEmail']); ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="label"><label for="usr_lvl">专业方向</label></div>
            <div class="field">
                <select class="input" name="usr_lvl" id="usr_lvl" data-validate="required:请选择用户组">
                    <option value="">请选择</option> 
                    <?php if(is_array($majorList)): $i = 0; $__LIST__ = $majorList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$index): $mod = ($i % 2 );++$i;?><option value="<?php echo ($index["majorId"]); ?>" <?php echo $index['majorId'] == $usrInfo['stuMajor'] ? 'selected="selected"' : null;?> ><?php echo ($index["majorName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div> 
        
        <div class="form-button">
            <input type="hidden" name="usr_id" value="<?php echo ($usrInfo[stuId]); ?>"/> 
            <button class="button bg-main" type="submit">提交</button>
            <button class="button bg-yellow form-reset " type="reset">后退</button>  
        </div>                
    </form>   
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">郑少卓</a>构建   </p>
</div>

<script>
    $(function(){
        var t = $("input[name='pwd']").val();
        $(".pwdPanel input[name='newpwd']").val(t);
        $(".pwdPanel input[name='confirmpwd']").val(t);
        function monitor(mythis){
            
            if(mythis.is(':checked')){
                $(".pwd").html('修改密码');
                $("input[name='pwd']").val("");
                $("input[name='pwd']").attr('disabled', false);
                $(".pwdPanel").show();
                $(".pwdPanel input[name='newpwd']").val("");
                $(".pwdPanel input[name='confirmpwd']").val("");
            }else{
                $(".pwd").html('登陆密码');
                $("input[name='pwd']").val(t);
                $("input[name='pwd']").attr('disabled', true);
                $(".pwdPanel").hide();
                $(".pwdPanel input[name='newpwd']").val(t);
                $(".pwdPanel input[name='confirmpwd']").val(t);
            }
        }

        $(".fieldme input[type='checkbox']").click(function(){
            monitor($(this));
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