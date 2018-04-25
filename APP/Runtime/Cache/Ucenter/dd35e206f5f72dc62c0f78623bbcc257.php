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
        <form method="post" class="form-x" action="<?php echo U('Teacher/modifyInfo');?>">
            <div class="form-group">
                <div class="label"><label for="name">登陆账号</label></div>
                <div class="field">
                    <input type="text" class="input" name="usrname" size="50" value="<?php echo ($usrDetail['thrName']); ?>" disabled="disabled" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label class="oldpwd" for="oldpwd">登录密码</label></div>
                <div class="field fieldme">
                    <div class="input-group">
                        <span class="addon"><input name="chkPwd" type="checkbox" value="1" /></span>
                        <input type="password" class="input" name="oldpwd" size="50" value="<?php echo ($usrDetail['thrPwd']); ?>" placeholder="请输入原始密码" disabled="disabled" />
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
                    <div class="label"><label for="pwd">确认密码</label></div>
                    <div class="field">
                        <input type="password" class="input" name="confirmpwd" size="50" value=" " placeholder="再次确认新登陆密码"
                        data-validate="required:请填写确认密码,repeat#newpwd:两次输入的密码不一致" />
                    </div>
                </div>  
            </div>
            <div class="form-group">
                <div class="label"><label for="name">真实姓名</label></div>
                <div class="field">
                    <input type="text" class="input" name="realName" size="50" placeholder="真实姓名" data-validate="required:请填写真实姓名" value="<?php echo ($usrDetail['thrRealName']); ?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="age">用户年龄</label></div>
                <div class="field">
                    <input type="text" class="input" name="age" size="50" placeholder="用户年龄" data-validate="required:请填写用户年龄,number:用户年龄必须为整数" value="<?php echo ($usrDetail['thrAge']); ?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label>用户性别</label></div>
                <div class="field">
                    <div class="button-group radio"> 
                        <label class="button active">
                            <input name="sex" value="1" <?php echo $usrDetail['thrSex'] == 1 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-male"></span> 男
                        </label> 
                        <label class="button ">
                            <input name="sex" value="2" <?php echo $usrDetail['thrSex'] == 2 ? 'checked="checked"' : null; ?> type="radio"><span class="icon icon-female"></span> 女
                        </label> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="phone">联系方式</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkPhone" type="checkbox" value="1"  <?php echo $usrDetail['showState'][0] == 1 ? 'checked="checked"' : null; ?>/></span>
                        <input type="text" class="input" name="Phone" size="50" placeholder="联系方式，勾选则学生可见" value="<?php echo ($usrDetail['thrPhone']); ?>" data-validate="required:请填写联系方式" />
                      </div>
                    </div>
                </div>
            <div class="form-group">
                <div class="label"><label for="email">邮件地址</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkEmail" type="checkbox" value="1"  <?php echo $usrDetail['showState'][1] == 1 ? 'checked="checked"' : null; ?> /></span>
                        <input type="text" class="input" name="Email" size="50" placeholder="邮件地址，勾选则学生可见" value="<?php echo ($usrDetail['thrEmail']); ?>"
                        data-validate="required:请填写邮件地址"/>
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="address">办公地址</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkAddress" type="checkbox" value="1"  <?php echo $usrDetail['showState'][2] == 1 ? 'checked="checked"' : null; ?> /></span>
                        <input type="text" class="input" name="Address" size="50" placeholder="办公地址，勾选则学生可见" value="<?php echo ($usrDetail['thrAddress']); ?>" data-validate="required:请填写办公地址" />
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label"><label for="usr_lvl">研究方向</label></div>
                <div class="form-group">
                    <div class="field">
                      <div class="input-group">
                        <span class="addon"><input name="chkStudy" type="checkbox" value="1"  <?php echo $usrDetail['showState'][3] == 1 ? 'checked="checked"' : null; ?> /></span>
                        <input type="text" class="input" name="Study" size="50" placeholder="研究方向，勾选则学生可见" value="<?php echo ($usrDetail['thrStudy']); ?>" data-validate="required:请填写研究方向"/>
                      </div>
                    </div>
                </div>
            </div> 
             <div class="form-group">
                <div class="label"><label for="age">所教课程</label></div>
 <!--                  
                <div class="field">
                    <input type="text" class="input" name="age" size="50"  value="<?php echo ($usrDetail['thrAge']); ?>" />
                </div> -->

                <div class="field">        
                    <select type="text" class="input" name="TeachingCourse" >
                      <option value = 1>语文</option>
                      <option value = 2>数学</option>
                      <option value = 3>英语</option>
                      <option value = 4>物理</option>
                      <option value = 5>化学</option>
                      <option value = 6>生物</option>
                      <option value = 7>政治</option>
                      <option value = 8>历史</option>
                      <option value = 8>地理</option>
                    </select>
                </div>
            </div>
               <div class="form-group">
                <div class="label"><label for="fullNum">课容量</label></div>
                <div class="field">
                    <input type="text" class="input" name="fullNum" size="50" placeholder="课容量" data-validate="required:请填写课容量,number:课容量必须为正整数" value="" />
                </div>
            </div>
            
            <div class="form-button">
                <input type="hidden" name="usrId" value="<?php echo ($usrDetail['thrId']); ?>"/> 
                <button class="button bg-main" type="submit">提交</button>
                <button class="button bg-yellow " type="button">后退</button>  
            </div>                
        </form>   
       
</div>
        
    <script>
        $(function(){
            var t = $("input[name='oldpwd']").val();
            $(".pwdPanel input[name='newpwd']").val(t);
            $(".pwdPanel input[name='confirmpwd']").val(t);
            function monitor(mythis){
                
                if(mythis.is(':checked')){
                    $(".oldpwd").html('修改密码');
                    $("input[name='oldpwd']").val("");
                    $("input[name='oldpwd']").attr('disabled', false);
                    $(".pwdPanel").show();
                    $(".pwdPanel input[name='newpwd']").val("");
                    $(".pwdPanel input[name='confirmpwd']").val("");
                }else{
                    $(".oldpwd").html('登陆密码');
                    $("input[name='oldpwd']").val(t);
                    $("input[name='oldpwd']").attr('disabled', true);
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
    </section>

    <footer>
        
    </footer>
</body>
</html>