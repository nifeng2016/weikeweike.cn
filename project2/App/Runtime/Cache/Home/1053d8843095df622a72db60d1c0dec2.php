<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

   
    <script type="text/javascript" src="http://localhost/eclipse/project2/public/js/jquery-2.2.0.js">
    </script>
    <script type="text/javascript" src="http://localhost/eclipse/project2//public/js/bootstrap.min.js">
    </script>
    <link href="http://localhost/eclipse/project2/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/eclipse/project2/public/css/css_index.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="http://localhost/dev/simditor/styles/simditor.css" />
</head>
<style>
    .test li{
        list-style: none;
        height: 50px;
    }
</style>
<body style="background-color: #FBF4F4">
<br>

<div class="container" >
    <div class="row">

        <div class="col-md-3">
            <h2 style="font-weight: 100">我的微课</h2>
            <br>
        </div>
    </div>
    <div class="row"  style="height: 1000px; background-color: #F1F9EE">
        <div class="col-md-3">
            <ul id="myTab" class="nav nav-tabs nav-stacked" style="background-color: #BCC1C7; height: 1000px;">
                <li class="active"><a href="#a" data-toggle="tab">基本资料</a></li>
                <li><a href="#b" data-toggle="tab">我的课程</a></li>
                <li><a href="#c" data-toggle="tab">学习记录</a></li>
                <li><a href="#d" data-toggle="tab">我的讨论</a></li>
                <li><a href="#e" data-toggle="tab">我的视频</a></li>
            </ul>
        </div>
        <div class="col-md-9" style="height: 1000px">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="a" style="background-color: #F1F9EE; height: 1000px">
                    <br>
                        <div class="test">
                          <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h5 align="right">用户名:</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <h5><?php echo ($data['username']); ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h5 align="right">注册时间:</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <h5><?php echo ($data['rtime']); ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row" >
                                            <div class="col-xs-2">
                                                <h5 align="right">最后在线时间:</h5>
                                            </div>
                                            <div class="col-xs-8">
                                                <h5><?php echo ($data['lastonline']); ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h5 align="right">签到次数:</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <h5><?php echo ($signnum); ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h5 align="right">上传视频数:</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <h5>To be continue!</h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <h5 align="right">帖子数:</h5>
                                            </div>
                                            <div class="col-sm-9">
                                                <h5><?php echo ($bbs1num); ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <br>
                                    <br>
                                    <p align="center"><a href="#">密码修改</a></p>
                                </ul>

                        </div>

                </div>
                <div class="tab-pane fade" id="b" style="background-color: #F1F9EE; height: 1000px">
                    <div class="container">
                        
                        <br>
                        <br>
                        <h3 style="font-weight: 100">我收藏的课程:</h3>
                            <br>
                            <ul>
	                            <?php if(is_array($mylecture)): $i = 0; $__LIST__ = $mylecture;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $href="http://".C('URLSET')."/index.php/Home/Video/ShowVideo?id=".$vo['id']; $quxiao="http://".C('URLSET')."/index.php/Home/Video/RmuserLector?id=".$vo['id'].'&page=user'; ?>
									<li>
										<div class='col-xs-8'>
											<a href=<?php echo ($href); ?>><?php echo ($vo['name']); ?></a>
										</div>
										<div class='col-xs-4'>
											<a href=<?php echo ($quxiao); ?>>取消收藏</a>
										</div>
										
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="c" style="background-color: #F1F9EE; height: 1000px">
                    <div class="container">
                        <br>
                        <br>
                        <h3 style="font-weight: 100">我学习过的课程:</h3>
                        <ul>
                             <?php if(is_array($learned)): $i = 0; $__LIST__ = $learned;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$learned): $mod = ($i % 2 );++$i; $shanchu = 'http://localhost/eclipse/project2/index.php/Home/User/dellec?name='.$learned['lname']; ?>
									<li>
										<div class='col-xs-8'>
											<a href=<?php echo ($learned['lurl']); ?>><?php echo ($learned['lname']); ?></a>
										</div>
										<div class='col-xs-4'>
											<a href=<?php echo ($shanchu); ?>>删除记录</a>
										</div>
										
									</li><?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="d" style="background-color: #F1F9EE; height: 1000px">
                    <div class="container">
                        <br>
                        <br>
                        <h3 style="font-weight: 100">我参与过的讨论:</h3>
                        <ul>
                            <br>
                            <br>
                            <li>

                                <h4>发表过:</h4>
                                <br>
                                <ul>
                                	<?php if(is_array($bbs1)): $i = 0; $__LIST__ = $bbs1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bbs1): $mod = ($i % 2 );++$i;?><li>
                                    		<a href="#"><?php echo ($bbs1['title']); ?></a>
                                    	</li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    
                                </ul>
                            </li>
                            <br>
                            <br>
                            <br>
                            <li>

                                <h4>评论过:</h4>
                                <br>
                                <ul>
                                    <?php if(is_array($bbs2)): $i = 0; $__LIST__ = $bbs2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bbs2): $mod = ($i % 2 );++$i;?><li>
                                    		<a href="#"><?php echo ($bbs2['title']); ?></a>
                                    	</li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="e" style="background-color: #F1F9EE; height: 1000px">
                    <div class="container">
                        <br>
                        <br>
                        <h3 style="font-weight: 100">我上传过的课程:</h3>
                        <ul>
                           <?php if(is_array($upfront)): $i = 0; $__LIST__ = $upfront;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $uplo='http://localhost/eclipse/project2/index.php/Home/Video/ShowVideo?id='.$vo['leid']; ?>
									<li>
										<div class='col-xs-8'>
											<a href=<?php echo ($uplo); ?>><?php echo ($vo['name']); ?></a>
										</div>
										
										
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>