<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>Title</title> 
    <script type="text/javascript" src="http://localhost/eclipse/project2/public/js/jquery-2.2.0.js">
    </script>
    <script type="text/javascript" src="http://localhost/eclipse/project2//public/js/bootstrap.min.js">
    </script>
    <link href="http://localhost/eclipse/project2/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/eclipse/project2/public/css/css_index.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color:#ECF0F1">

<!--  <input type="hidden" id="fp" value = 0 onchange="alert('bad');">-->

	<br>
	<br>
    <div class="row" >
    	<div class="col-sm-1"></div>
    	<div class="col-sm-10">
        <div id="myCarousel" class="carousel slide" style="width: 100%;" >
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row">
                    <img src="/dev/images/4.jpg" alt="First slide" style="width: 100%">
                </div>
            </div>
            <div class="item">
                <div class="row">

                        <a href="http://www.baidu.com">
                            <img src="/dev/images/2.jpg" alt="First slide" style="width: 100%">
                        </a>

                </div>
            </div>
            <div class="item">
                <div class="row">
                        <img src="/dev/images/3.jpg" alt="First slide" style="width: 100%">

                </div>
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next">&rsaquo;</a>
    </div>
    </div>
        <div class="col-sm-1"></div>
	</div>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="row">
   <div class="col-md-5">
       <div class="panel panel-default" >
           <div class="panel-heading">
               <div class="row">
                   <div class="col-sm-4">
                       <h4>最新动态</h4>
                   </div>
                   <div class="col-sm-8">
                   <?php $DongTai = "http://localhost/eclipse/project2/index.php/Home/DongTai/index" ?>
                        <p align="right"><a href=<?php echo ($DongTai); ?>>更多</a></p>
                   </div>
               </div>
           </div>
           <div class="panel-body" >
                <ul>
                    <?php if(is_array($dt)): $i = 0; $__LIST__ = $dt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dt): $mod = ($i % 2 );++$i; $addt ='http://localhost/eclipse/project2/index.php/Home/DongTai/detail?id='.$dt['id']; ?>
                    	<li>
                    		<a href=<?php echo ($addt); ?>><?php echo ($dt['title']); ?></a>
                    	</li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
           </div>
       </div>
   </div>
   <div class="col-sm-7">
       <div class="panel panel-default">
           <div class="panel-heading">
               <div class="row">
                   <div class="col-sm-3">
                       <h4>行业资讯</h4>
                   </div>
                   <div class="col-sm-9">
                   	   <?php $HangYe = "http://localhost/eclipse/project2/index.php/Home/HangYe/index" ?>
                       <p align="right"><a href=<?php echo ($HangYe); ?>>更多</a></p>
                   </div>
               </div>
           </div>
           <div class="panel-body" >
                <ul>
                   <?php if(is_array($hy)): $i = 0; $__LIST__ = $hy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hy): $mod = ($i % 2 );++$i; $hydt ='http://localhost/eclipse/project2/index.php/Home/HangYe/detail?id='.$hy['id']; ?>
                    	<li>
                    		<a href=<?php echo ($hydt); ?>><?php echo ($hy['title']); ?></a>
                    	</li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
           </div>
       </div>
   </div>
	</div>
</div>

</body>

</html>