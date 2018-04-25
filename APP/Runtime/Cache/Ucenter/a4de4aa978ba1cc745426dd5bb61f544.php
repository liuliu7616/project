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
<div class="tab">
  	<div class="tab-head text-right">
    	<strong>学生进度列表</strong>
    	<span class="tab-more"></span>
    	<ul class="tab-nav">
    		<?php if(count($stuPlans) == 0): ?>
			<li class="active"><a href="#tab-no">温馨提示</a></li>
			<?php else: ?>
			<?php foreach($stuPlans as $k => $v): ?>
      		<li <?php echo $k == 0 ? 'class="active"' : '';?>><a href="#tab-<?php echo $v['planId'];?>"><?php echo $v['stuRealName'];?></a></li>
			<?php endforeach;?>
      		<?php endif; ?>
    	</ul>
  	</div>
  	<div class="tab-body">
  		<div class="tab-panel <?php echo count($stuPlans) == 0 ? 'active' : '';?>" id="tab-no">
			<p>暂时没学生提交进度安排</p>
  		</div>
  		<?php foreach($stuPlans as $k => $v): ?>
    	<div class="tab-panel <?php echo $k == 0 ? 'active' : '';?>" id="tab-<?php echo $v['planId'];?>">
    		<ul class="list-group">
    			<li>课题名称：<?php echo $v['gpTitle'];?></li>
			  	<li>选题学生：<?php echo $v['stuRealName']; ?></li>
			  	<li>确定时间：<?php echo date("Y-m-d h:i", $v['updateTime']); ?></li>
			  	<li>&nbsp;</li>
			  	<li style="text-align:center; color: red; ">进度安排</li>
			  	<?php if($v['title1'] != "" && $v['endtime1'] != ""): ?>
			  	<li>时间安排[①] ：选题确定&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime1']; ?></li>
			  	<li>安排名称[①] ：<?php echo $v['title1']; ?></li>
			  	<li>安排备注[①] ：<?php echo $v['other1']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title2'] != "" && $v['endtime2'] != ""): ?>
			  	<li>时间安排[②] ：<?php echo $v['endtime1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime2']; ?></li>
			  	<li>安排名称[②] ：<?php echo $v['title2']; ?></li>
			  	<li>安排备注[②] ：<?php echo $v['other2']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title3'] != "" && $v['endtime3'] != ""): ?>
			  	<li>时间安排[③] ：<?php echo $v['endtime2']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime3']; ?></li>
			  	<li>安排名称[③] ：<?php echo $v['title3']; ?></li>
			  	<li>安排备注[③] ：<?php echo $v['other3']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title4'] != "" && $v['endtime4'] != ""): ?>
			  	<li>时间安排[④] ：<?php echo $v['endtime3']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime1']; ?></li>
			  	<li>安排名称[④] ：<?php echo $v['title4']; ?></li>
			  	<li>安排备注[④] ：<?php echo $v['other4']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title5'] != "" && $v['endtime5'] != ""): ?>
			  	<li>时间安排[⑤] ：<?php echo $v['endtime4']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime5']; ?></li>
			  	<li>安排名称[⑤] ：<?php echo $v['title5']; ?></li>
			  	<li>安排备注[⑤] ：<?php echo $v['other5']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title6'] != "" && $v['endtime6'] != ""): ?>
			  	<li>时间安排[⑥] ：<?php echo $v['endtime5']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime6']; ?></li>
			  	<li>安排名称[⑥] ：<?php echo $v['title6']; ?></li>
			  	<li>安排备注[⑥] ：<?php echo $v['other6']; ?></li>
			  	<?php endif;?>
			  	<?php if($v['title7'] != "" && $v['endtime7'] != ""): ?>
			  	<li>时间安排[⑦] ：<?php echo $v['endtime6']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['endtime7']; ?></li>
			  	<li>安排名称[⑦] ：<?php echo $v['title7']; ?></li>
			  	<li>安排备注[⑦] ：<?php echo $v['other7']; ?></li>
			  	<?php endif;?>
			</ul>
    	</div>
    <?php endforeach;?>
  	</div>
</div>
<br/>
<br/>
 </div>
    </section>

    <footer>
        
    </footer>
</body>
</html>