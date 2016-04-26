<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2//public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2//public/js/bootstrap.min.js"></script>
    <?php $url2 = "http://".C('URLSET')."/index.php/Home/Video/uploadcls?name=".$lname; $url8 = "http://".C('URLSET')."/index.php/Home/Video/uploadappends?name=".$lname; $url5 = "http://".C('URLSET')."/index.php/Home/Video/index"; $up = "http://".C('URLSET')."/index.php/Home/Video/UpVideo?idx=".$idx."&lname=".$lname; $down = "http://".C('URLSET')."/index.php/Home/Video/DownVideo?idx=".$idx."&lname=".$lname; $maindown = "http://localhost/eclipse/project2/index.php/Home/Main/Maindown"; $class = "http://localhost/eclipse/project2/index.php/Home/Video/Showlecture"; ?>
    <style type="text/css">
        .test li{float: left; width: 250px}
        .pages a,.pages span {
            display:inline-block;
            padding:2px 5px;
            margin:0 1px;
            border:1px solid #f0f0f0;
            -webkit-border-radius:3px;
            -moz-border-radius:3px;
            border-radius:3px;
        }
        .pages a,.pages li {
            display:inline-block;
            list-style: none;
            text-decoration:none; color:#58A0D3;
        }
        .pages a.first,.pages a.prev,.pages a.next,.pages a.end{
            margin:0;
        }
        .pages a:hover{
            border-color:#50A8E6;
        }
        .pages span.current{
            background:#50A8E6;
            color:#FFF;
            font-weight:700;
            border-color:#50A8E6;
        }
    </style>
</head>
<body style="background-color: #F1F9EE">
<div class="container" >
    <br>
    <div class ='row'>
    	<div class='col-md-10'>
	        <a href=<?php echo ($maindown); ?>>首页</a>
	        &nbsp;>&nbsp;
	        <a href=<?php echo ($class); ?>>专题</a>
	        &nbsp;>&nbsp;
	        <a href="#"><?php echo ($lname); ?></a>
        </div>
        <div class='col-md-2'>
        	<?php $load = 'http://localhost/eclipse/project2/index.php/Home/Video/upv?lid='.$lid; ?>
        	<a align='right' href=<?php echo ($load); ?>>上传视频</a>
    	</div>
    </div>
    <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <video src=<?php echo ($urlvideo); ?> style="width: 100%; height: 400px" controls="controls"></video>
        </div>
        <div class="col-md-2"></div>
    </div>
    <br>
    <br>
    <div class="row">
        <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
        <li><h4 style="font-weight: 100">课程介绍</h4></li>
        <p><?php echo ($info['descpt']); ?></p>
    </div>

    <div class="row">
        <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
        <li><h4 style="font-weight: 100">主讲老师</h4></li>
        <h4><?php echo ($info['teacher']); ?></h4>
    </div>

    <div class="row">
        <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
        <li><h4 style="font-weight: 100">相关推荐</h4></li>
        <div class='test'>
        	<ul>
        		<?php if(is_array($xg)): $i = 0; $__LIST__ = $xg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xg): $mod = ($i % 2 );++$i;?><li>
        				<a href=<?php echo ($xg['url']); ?>>
        					<img src="/dev/images/1.jpg" width="200px" height="160px">
                    		<p><?php echo ($xg['name']); ?></p>
                    	</a>
        			</li><?php endforeach; endif; else: echo "" ;endif; ?>
        	</ul>
        </div>
    </div>

    <div class="row">
        <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
        <div class="container">
            <li><h4 style="font-weight: 100">讨论</h4></li>
            <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
				<div class="message-block">
	                <div class="row">
	                    <div class="col-md-2 "><h5><?php echo ($comment['uname']); ?></h5></div>
	                    
	                </div>
	                <div class="row">
	                    <div class="col-md-12">
	                        <?php echo ($comment['word']); ?>
	                    </div>
	                </div>
            	</div><?php endforeach; endif; else: echo "" ;endif; ?>
            <br>
            <br>
            <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
            <br />
            <div class="row leave-message">
                <div class="col-md-8 col-md-offset-1">
                <?php $ac = 'http://localhost/eclipse/project2/index.php/Home/Video/comment?lid='.$lid; ?>
                    <form method="post" action=<?php echo ($ac); ?>>
                        <div class="form-group">

                            <textarea rows="5" cols="120" id = 'box_message' name = 'words' placeholder="输入留言内容"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-1 col-md-offset-12">
                                <button type="submit" class="btn btn-default">发表</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			<br>
			<br>
        </div>

</div>


</div>



</body>
</html>