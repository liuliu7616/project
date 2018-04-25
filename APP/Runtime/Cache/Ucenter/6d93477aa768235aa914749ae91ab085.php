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
<html>
  <head>
    <style type="text/css">
      body {
        margin: 0px;
        padding: 0px;
      }
      #container {
        width : 600px;
        height: 384px;
        margin: 8px auto;
      }
      #chart {
        width : 600px;
        height: 384px;
        margin: 8px auto;
      }
    </style>
  </head>
  <body>
  <!--  <div id="container"></div> -->
    <div id="chart"></div>
    <!--[if IE]>
    <script type="text/javascript" src="/static/lib/FlashCanvas/bin/flashcanvas.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/project/Public/Styles/js/flotr2.min.js"></script>
    <script type="text/javascript">
   
    
    (function basic_radar(container) {

  // Fill series s1 and s2.
  var
    s1 = { label : '平均值', data : [[0, 41], [1, 80], [2, 85], [3, 75], [4, 93], [5, 90], [6,91], [7,70], [8,80]] },
     s2 = { label : '个人', data : [[0, <?php echo ($scorelist[0]["score"]); ?>], [1, <?php echo ($scorelist[1]["score"]); ?>], [2, <?php echo ($scorelist[2]["score"]); ?>], [3, <?php echo ($scorelist[3]["score"]); ?>], [4, <?php echo ($scorelist[4]["score"]); ?>], [5, <?php echo ($scorelist[5]["score"]); ?>], [6,<?php echo ($scorelist[6]["score"]); ?>], [7,<?php echo ($scorelist[7]["score"]); ?>], [8,<?php echo ($scorelist[8]["score"]); ?>]] },
    graph, subject;
//var test=<?php echo ($scorelist["sId"]); ?>;
  // Radar Labels
  subject = [
    [0, "语文"],
    [1, "数学"],
    [2, "英语"],
    [3, "历史"],
    [4, "物理"],
    [5, "生物"],
    [6, "政治"],
    [7, "地理"],
    [8, "化学"]
  ];
   
    
  // Draw the graph.
  graph = Flotr.draw(container, [ s1, s2 ], {
    radar : { show : true}, 
    grid  : { circular : true, minorHorizontalLines : true}, 
    yaxis : { min : 30, max : 100, minorTickFreq : 5}, 
    xaxis : { ticks : subject}
  });
})(document.getElementById("chart"));
        
        
    </script>
  </body>
</html>

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