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
                    <li><a href="<?php echo U('Student/person');?>" class="lls <?php echo $state == 'person' ? 'active' : '';?>">个人管理</a></li> <!--
                    <li><a href="<?php echo U('Student/bslist');?>" class="lls <?php echo $state == 'bslist' ? 'active' : '';?>">毕设列表</a></li>
                    <li><a href="<?php echo U('Student/detail');?>" class="lls <?php echo $state == 'detail' ? 'active' : '';?>">毕设详情</a></li>
                    <li><a href="<?php echo U('Student/msg');?>" class="lls <?php echo $state == 'msg' ? 'active' : '';?>">消息管理</a></li>
                    <li><a href="<?php echo U('Student/plan');?>" class="lls <?php echo $state == 'plan' ? 'active' : '';?>">毕设进度</a></li>
                    <li><a href="<?php echo U('Student/choose');?>" class="lls <?php echo $state == 'choose' ? 'active' : '';?>">毕设选题</a></li>    
                    <li><a href="<?php echo U('Student/choose_course');?>" class="lls <?php echo $state == 'choose-course' ? 'active' : '';?>">选择课程</a></li> -->
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
  
       .container {
        width : 600px;
        height: 384px;
        margin: 8px auto;
      }
      .downPaper{
        width : 100px;
        height: 38px;
        margin-left: 500px;
        background-color: #5CACEE; 
       
      }
      .fathersinglechar{
        text-align:center; 
       
      }
      .downA{
        display:none;
      }
 
    form { 
        width: 100%; 
        height: 38px;
        padding: 18px 20px 0;
        margin-bottom: 18px;
        background: #4f84b8 url(/project/Public/Images/box-grad.png) repeat-x 0 0;
        border-radius: 10px; 
        -webkit-border-radius: 10px; 
        -moz-border-radius: 10px; 
        -khtml-border-radius: 10px;
        box-shadow: 0 5px 12px rgba(0,0,0,.4); 
        -webkit-box-shadow: 0 5px 12px rgba(0,0,0,.4); 
        -moz-box-shadow: 0 5px 12px rgba(0,0,0,.4);
        -khtml-box-shadow: 0 5px 12px rgba(0,0,0,.4); 
         }
    </style>
  </head>
  <body>
  <!--  <div id="container"></div> -->
    <div id="chart" class="container"></div>
    <div>
    <form>
        <label>单项科目</label>  
        语文<input type="radio" name="subjectradio" class="radiosubject" value="1" checked="checked"/>  
        数学<input type="radio" name="subjectradio" class="radiosubject" value="2"/>  
        英语<input type="radio" name="subjectradio" class="radiosubject" value="3"/>  
        物理<input type="radio" name="subjectradio" class="radiosubject" value="4"/>
        化学<input type="radio" name="subjectradio" class="radiosubject" value="5"/>  
        生物<input type="radio" name="subjectradio" class="radiosubject" value="6"/>  
        政治<input type="radio" name="subjectradio" class="radiosubject" value="7"/>
        历史<input type="radio" name="subjectradio" class="radiosubject" value="8"/>  
        地理<input type="radio" name="subjectradio" class="radiosubject" value="9"/>  
    </form>  
    
     
  </div> 
  <div class="fathersinglechar"  ">
        <div  id="subject" class="container"></div>
        <button class ="downPaper" onclick="downloadpaper('downpaper')"> 下载试卷</button>
        <a  class="downA" id="downpaper" download="chinese.jpg" href="/project/Public/paper/<?php echo ($chineseScore[0]["paperUrl"]); ?>"></a>
    </div>
    <form >
        <label>所在班级位置情况 </label>  
        全部人数<input type="radio" id="defaultsubjectnum" name="subjectnumradio" class="radiosubjectnum" value="11" checked="checked"/>  
        去掉后5%<input type="radio" name="subjectnumradio" class="radiosubjectnum" value="12"/>  
        去掉后10%<input type="radio" name="subjectnumradio" class="radiosubjectnum" value="13"/>
    </form>
  
    <div  id="subject_number" class="container"></div>
    
     
    <!--[if IE]>
    <script type="text/javascript" src="/static/lib/FlashCanvas/bin/flashcanvas.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/project/Public/Styles/js/flotr2.min.js"></script>
    <script type="text/javascript" src="/project/Public/Styles/js/echarts.min.js"></script>
    <script type="text/javascript" src="/project/Public/Styles/js/jquery.js"></script>
    <script type="text/javascript">
        function downloadpaper(downloadid){

            document.getElementById(downloadid).click();
        }
    </script>
<script type="text/javascript">
 $(function(){
        var local=10;
        var total=50;
        var title2= "语文";
   
      $(".radiosubject").click(function(){
        var container_chart='chart_subject';
        if($(this).val()==1){
            var downloadname="语文试卷.jpg";
            var downloadUrl="<?php echo ($chineseScore[0]["paperUrl"]); ?>";
            var text= '个人语文成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgChinese[0]["AVG(part1)"]); ?>, <?php echo ($avgChinese[0]["AVG(part2)"]); ?>, <?php echo ($avgChinese[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($chineseScore[0]["part1"]); ?>, <?php echo ($chineseScore[0]["part2"]); ?>, <?php echo ($chineseScore[0]["part3"]); ?>];
            title2="语文";
            total=<?php echo ($chinesetotal); ?>;  
            local=<?php echo ($chineselocal); ?>;
        }
        else if($(this).val()==2){
            var downloadname="数学试卷.jpg";
            var downloadUrl="<?php echo ($mathScore[0]["paperUrl"]); ?>";
            var text= '个人数学成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgMath[0]["AVG(part1)"]); ?>, <?php echo ($avgMath[0]["AVG(part2)"]); ?>, <?php echo ($avgMath[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($mathScore[0]["part1"]); ?>, <?php echo ($mathScore[0]["part2"]); ?>, <?php echo ($mathScore[0]["part3"]); ?>];
            total=<?php echo ($mathtotal); ?>;  
            local=<?php echo ($mathlocal); ?>;
            title2="数学";
        }else if($(this).val()==3){
            var downloadname="英语试卷.jpg";
            var downloadUrl="<?php echo ($englishScore[0]["paperUrl"]); ?>";
            var text= '个人英语成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgEnglish[0]["AVG(part1)"]); ?>, <?php echo ($avgEnglish[0]["AVG(part2)"]); ?>, <?php echo ($avgEnglish[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($englishScore[0]["part1"]); ?>, <?php echo ($englishScore[0]["part2"]); ?>, <?php echo ($englishScore[0]["part3"]); ?>];
            total=<?php echo ($englishtotal); ?>;  
            local=<?php echo ($englishlocal); ?>;
            title2="英语";

        }else if($(this).val()==4){
            var downloadname="物理试卷.jpg";
            var downloadUrl="<?php echo ($physicalScore[0]["paperUrl"]); ?>";
            var text= '个人物理成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgPhysical[0]["AVG(part1)"]); ?>, <?php echo ($avgPhysical[0]["AVG(part2)"]); ?>, <?php echo ($avgPhysical[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($physicalScore[0]["part1"]); ?>, <?php echo ($physicalScore[0]["part2"]); ?>, <?php echo ($physicalScore[0]["part3"]); ?>];
            total=<?php echo ($physicaltotal); ?>;  
            local=<?php echo ($physicallocal); ?>;
            title2="物理";

        }else if($(this).val()==5){
            var downloadname="化学试卷.jpg";
            var downloadUrl="<?php echo ($chemicalScore[0]["paperUrl"]); ?>";
            var text= '个人化学成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgChemical[0]["AVG(part1)"]); ?>, <?php echo ($avgChemical[0]["AVG(part2)"]); ?>, <?php echo ($avgChemical[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($chemicalScore[0]["part1"]); ?>, <?php echo ($chemicalScore[0]["part2"]); ?>, <?php echo ($chemicalScore[0]["part3"]); ?>];
            total=<?php echo ($chemicaltotal); ?>;  
            local=<?php echo ($chemicallocal); ?>;
            title2="化学";

        }else if($(this).val()==6){
            var downloadname="生物试卷.jpg";
            var downloadUrl="<?php echo ($biologyScore[0]["paperUrl"]); ?>";
            var text= '个人生物成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgBiology[0]["AVG(part1)"]); ?>, <?php echo ($avgBiology[0]["AVG(part2)"]); ?>, <?php echo ($avgBiology[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($biologyScore[0]["part1"]); ?>, <?php echo ($biologyScore[0]["part2"]); ?>, <?php echo ($biologyScore[0]["part3"]); ?>];
            total=<?php echo ($biologytotal); ?>;  
            local=<?php echo ($biologylocal); ?>;
            title2="生物";

        }else if($(this).val()==7){
            var downloadname="政治试卷.jpg";
            var downloadUrl="<?php echo ($politicsScore[0]["paperUrl"]); ?>";
            var text= '个人政治成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgPoliticals[0]["AVG(part1)"]); ?>, <?php echo ($avgPoliticals[0]["AVG(part2)"]); ?>, <?php echo ($avgPoliticals[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($politicsScore[0]["part1"]); ?>, <?php echo ($politicsScore[0]["part2"]); ?>, <?php echo ($politicsScore[0]["part3"]); ?>];
            total=<?php echo ($politicstotal); ?>;  
            local=<?php echo ($politicslocal); ?>;
            title2="政治";

        }else if($(this).val()==8){
            var downloadname="历史试卷.jpg";
            var downloadUrl="<?php echo ($historyScore[0]["paperUrl"]); ?>";
            var text= '个人历史成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgHistory[0]["AVG(part1)"]); ?>, <?php echo ($avgHistory[0]["AVG(part2)"]); ?>, <?php echo ($avgHistory[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($historyScore[0]["part1"]); ?>, <?php echo ($historyScore[0]["part2"]); ?>, <?php echo ($historyScore[0]["part3"]); ?>];
            total=<?php echo ($historytotal); ?>;  
            local=<?php echo ($historylocal); ?>;
            title2="历史";

        }else if($(this).val()==9){
            var downloadname="地理试卷.jpg";
            var downloadUrl="<?php echo ($geographyScore[0]["paperUrl"]); ?>";
            var text= '个人地理成绩分析';
            var data_direction_title=['第一部分', '第二部分', '第三部分'];
            var data_full_score=[30, 40, 30];
            var data_avgsubject=[<?php echo ($avgGeography[0]["AVG(part1)"]); ?>, <?php echo ($avgGeography[0]["AVG(part2)"]); ?>, <?php echo ($avgGeography[0]["AVG(part3)"]); ?>];
            var data_score=[<?php echo ($geographyScore[0]["part1"]); ?>, <?php echo ($geographyScore[0]["part2"]); ?>, <?php echo ($geographyScore[0]["part3"]); ?>];
            total=<?php echo ($geographytotal); ?>;  
            local=<?php echo ($geographylocal); ?>;
            title2="地理";

        }
        drawchart(text,data_direction_title,data_full_score,data_avgsubject,data_score);
        document.getElementById("downpaper").href="/project/Public/paper/"+downloadUrl;
        document.getElementById("downpaper").download=downloadname ;
        
        drawnumber(100*local/total ,title2);
        document.getElementById("defaultsubjectnum").click();
        
      });
        $(".radiosubjectnum").click(function(){
            if($(this).val()==11){
                drawnumber(100*local/total,title2);
            }
            else if($(this).val()==12){
                drawnumber(100*local/(total-total*0.05),title2);
            }
            else if($(this).val()==13){
                drawnumber(100*local/(total-total*0.10),title2);
            }

        });
 });
</script>

<script type="text/javascript">
 function drawchart(text_title,datatext,datafullscore,dataavg,datascore){
    var chart = document.getElementById('subject');      
    var mychart = echarts.init(chart); 
    option =null; 
    var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: text_title
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: datatext//['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: datafullscore//[30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: dataavg//[<?php echo ($avgChinese[0]["AVG(part1)"]); ?>, <?php echo ($avgChinese[0]["AVG(part2)"]); ?>, <?php echo ($avgChinese[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: datascore//[<?php echo ($chineseScore[0]["part1"]); ?>, <?php echo ($chineseScore[0]["part2"]); ?>, <?php echo ($chineseScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);

 }

}  
function drawnumber(thevalue,title2){
    var dom = document.getElementById("subject_number");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
     title: {
        text: title2+"成绩排名"
    },
    tooltip : {
        formatter: "{a} <br/>{b} : {c}%"
    },
    toolbox: {
        feature: {
            restore: {},
            saveAsImage: {}
        }
    },
    series: [
        {
            name: '班级',
            type: 'gauge',
            detail: {formatter:'{value}%'},
            data: [{value: thevalue.toFixed(2), name: '排名'}]
        }
    ]
};
/*
setInterval(function () {
    option.series[0].data[0].value = (50).toFixed(2) - 0;
    myChart.setOption(option, true);
},2000);*/
;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
} 
       
</script>
<script type="text/javascript">
    var text= '个人语文成绩分析';
    var data_direction_title=['第一部分', '第二部分', '第三部分'];
    var data_full_score=[30, 40, 30];
    var data_avgsubject=[<?php echo ($avgChinese[0]["AVG(part1)"]); ?>, <?php echo ($avgChinese[0]["AVG(part2)"]); ?>, <?php echo ($avgChinese[0]["AVG(part3)"]); ?>];
    var data_score=[<?php echo ($chineseScore[0]["part1"]); ?>, <?php echo ($chineseScore[0]["part2"]); ?>, <?php echo ($chineseScore[0]["part3"]); ?>]; 
    drawchart(text,data_direction_title,data_full_score,data_avgsubject,data_score);
    var local=<?php echo ($chineselocal); ?>;
    var total=<?php echo ($chinesetotal); ?>;
    drawnumber(100*local/total,"语文");

</script>

<script type="text/javascript">
var dom = document.getElementById("chart");
var myChart = echarts.init(dom);
var app = {};
option = null;
option = {
    title: {
        text: '个人成绩总体分析'
    },
    tooltip: {},
    legend: {
        data: ['平均值（average）', '个人值（person）']
    },
    radar: {
        // shape: 'circle',
        name: {
            textStyle: {
                color: '#fff',
                backgroundColor: '#999',
                borderRadius: 3,
                padding: [3, 5]
           }
        },
        indicator: [
           { name: '语文（Chinese）', max: 100},
           { name: '数学（Math）', max: 100},
           { name: '英语（English）', max: 100},
           { name: '物理（Physical）', max: 100},
           { name: '化学（chemical）', max: 100},
           { name: '生物（Biology）', max: 100},           
           { name: '政治（politics）', max: 100},
           { name: '历史（History）', max: 100},
           { name: '地理（geography）', max: 100},
        ]
    },
    series: [{
        name: '平均  vs 个人值（Average vs Personal）',
        type: 'radar',
        // areaStyle: {normal: {}},
        data : [
            {
                value : [<?php echo ($avgChinese[0]["AVG(score)"]); ?>, <?php echo ($avgMath[0]["AVG(score)"]); ?>, <?php echo ($avgEnglish[0]["AVG(score)"]); ?>, <?php echo ($avgPhysical[0]["AVG(score)"]); ?>, <?php echo ($avgChemical[0]["AVG(score)"]); ?>, <?php echo ($avgBiology[0]["AVG(score)"]); ?>, <?php echo ($avgPoliticals[0]["AVG(score)"]); ?>, <?php echo ($avgHistory[0]["AVG(score)"]); ?>, <?php echo ($avgGeography[0]["AVG(score)"]); ?>],
                name : '平均值（average）'
            },//[0, <?php echo ($scorelist[0]["score"]); ?>],[1, <?php echo ($scorelist[1]["score"]); ?>],[2, <?php echo ($scorelist[2]["score"]); ?>]
             {
                value : [<?php echo ($scorelist[0]["score"]); ?>, <?php echo ($scorelist[1]["score"]); ?>, <?php echo ($scorelist[2]["score"]); ?>, <?php echo ($scorelist[3]["score"]); ?>, <?php echo ($scorelist[4]["score"]); ?>, <?php echo ($scorelist[5]["score"]); ?>, <?php echo ($scorelist[6]["score"]); ?>, <?php echo ($scorelist[7]["score"]); ?>, <?php echo ($scorelist[8]["score"]); ?>],
                name : '个人值（person）'
            }
        ]
    }]
};;
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}
</script>
<!--
<script type="text/javascript">
       var chart = document.getElementById('chartMath');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人数学成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgMath[0]["AVG(part1)"]); ?>, <?php echo ($avgMath[0]["AVG(part2)"]); ?>, <?php echo ($avgMath[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($mathScore[0]["part1"]); ?>, <?php echo ($mathScore[0]["part2"]); ?>, <?php echo ($mathScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>
<script type="text/javascript">
       var chart = document.getElementById('chartEnglish');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人英语成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgEnglish[0]["AVG(part1)"]); ?>, <?php echo ($avgEnglish[0]["AVG(part2)"]); ?>, <?php echo ($avgEnglish[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($englishScore[0]["part1"]); ?>, <?php echo ($englishScore[0]["part2"]); ?>, <?php echo ($englishScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>

<script type="text/javascript">
       var chart = document.getElementById('chartPhysics');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人物理成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgPhysical[0]["AVG(part1)"]); ?>, <?php echo ($avgPhysical[0]["AVG(part2)"]); ?>, <?php echo ($avgPhysical[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($physicalScore[0]["part1"]); ?>, <?php echo ($physicalScore[0]["part2"]); ?>, <?php echo ($physicalScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>
<script type="text/javascript">
       var chart = document.getElementById('chartChemical');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人化学成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgChemical[0]["AVG(part1)"]); ?>, <?php echo ($avgChemical[0]["AVG(part2)"]); ?>, <?php echo ($avgChemical[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($chemicalScore[0]["part1"]); ?>, <?php echo ($chemicalScore[0]["part2"]); ?>, <?php echo ($chemicalScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>
<script type="text/javascript">
       var chart = document.getElementById('chartBiology');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人生物成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgBiology[0]["AVG(part1)"]); ?>, <?php echo ($avgBiology[0]["AVG(part2)"]); ?>, <?php echo ($avgBiology[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($biologyScore[0]["part1"]); ?>, <?php echo ($biologyScore[0]["part2"]); ?>, <?php echo ($biologyScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>
<script type="text/javascript">
       var chart = document.getElementById('chartPolitics');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人政治成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgPoliticals[0]["AVG(part1)"]); ?>, <?php echo ($avgPoliticals[0]["AVG(part2)"]); ?>, <?php echo ($avgPoliticals[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($politicsScore[0]["part1"]); ?>, <?php echo ($politicsScore[0]["part2"]); ?>, <?php echo ($politicsScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>
<script type="text/javascript">
       var chart = document.getElementById('chartHistory');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人历史成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgHistory[0]["AVG(part1)"]); ?>, <?php echo ($avgHistory[0]["AVG(part2)"]); ?>, <?php echo ($avgHistory[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($historyScore[0]["part1"]); ?>, <?php echo ($historyScore[0]["part2"]); ?>, <?php echo ($historyScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>
<script type="text/javascript">
       var chart = document.getElementById('chartGeography');      
var mychart = echarts.init(chart); 
 option =null; 
var posList = [
    'left', 'right', 'top', 'bottom',
    'inside',
    'insideTop', 'insideLeft', 'insideRight', 'insideBottom',
    'insideTopLeft', 'insideTopRight', 'insideBottomLeft', 'insideBottomRight'
];
var app={};
 app.configParameters = {
    rotate: {
        min: -90,
        max: 90
    },
    align: {
        options: {
            left: 'left',
            center: 'center',
            right: 'right'
        }
    },
    verticalAlign: {
        options: {
            top: 'top',
            middle: 'middle',
            bottom: 'bottom'
        }
    },
    position: {
        options: echarts.util.reduce(posList, function (map, pos) {
            map[pos] = pos;
            return map;
        }, {})
    },
    distance: {
        min: 0,
        max: 100
    }
};

 app.config = {
    rotate: 90,
    align: 'left',
    verticalAlign: 'middle',
    position: 'insideBottom',
    distance: 15,
    onChange: function () {
        var labelOption = {
            normal: {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            }
        };
        echart.setOption({
            series: [{
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }, {
                label: labelOption
            }]
        });
    }
};


var labelOption = {
    normal: {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};

 option = {
    title: {
        text: '个人地理成绩分析'
    },

    color: ['#003366',  '#4cabce', '#e5323e'],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['满分', '平均分', '个人得分']
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        left: 'right',
        top: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            magicType: {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    xAxis: [
        {
            type: 'category',
            axisTick: {show: false},
            data: ['第一部分', '第二部分', '第三部分']
        }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
    series: [
        {
            name: '满分',
            type: 'bar',
            barGap: 0,
            label: labelOption,
            data: [30, 40, 30]
        },
        {
            name: '平均分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($avgGeography[0]["AVG(part1)"]); ?>, <?php echo ($avgGeography[0]["AVG(part2)"]); ?>, <?php echo ($avgGeography[0]["AVG(part3)"]); ?>]
        },
        {
            name: '个人得分',
            type: 'bar',
            label: labelOption,
            data: [<?php echo ($geographyScore[0]["part1"]); ?>, <?php echo ($geographyScore[0]["part2"]); ?>, <?php echo ($geographyScore[0]["part3"]); ?>]
        }
    ]
}; ; 
if (option && typeof option === "object") {
    mychart.setOption(option, true);
}          
</script>-->

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