<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="最小高度,min-height,CSS hack" />
    <meta http-equiv="Description" content="最小高度可以设定一个BOX的最小高度，当其内
容较少时时，也能保持BOX的高度为一定ext)" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="author" content="forestgan" />
    <meta name="copyright" content="http://www.jb51.net" />
    <title>CSS布局中最小高度（min-height）</title>
    <style type="text/css">
        #wrap{
            /*width: 620px;*/
            /* margin: 2em auto; */
            /*font-size: 75%;*/}
        div.box10,div.box20{
            /*width: 300px;*/
            min-height: 800px;
            /*background: #EEE;*/
            /* margin-right: 20px;
             *//* float: left;
            text-align:left; */
        }
        p{padding: 1em; margin: 0;}
    </style>
  <?php $URLSET=C('URLSET'); $url3="http://".C('URLSET')."/index.php/Home/Main/Maindown"; ?>
  <style type="text/css">
  	
  	.pages a,.pages span {
	    display:inline-block;
	    padding:2px 5px;
	    margin:0 1px;
	    border:1px solid #f0f0f0;
	    -webkit-border-radius:3px;
	    -moz-border-radius:3px;
	    border-radius:3px;
	    text-decoration:none;
	}
	.pages a,.pages li {
	    display:inline-block;
	    list-style: none;
	    text-decoration:none; 
	    color:#58A0D3;
	}
	.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
	    margin:0;
	    text-decoration:none;
	}
	.pages a:hover{
	    border-color:#50A8E6;
	    text-decoration:none;
	}
	.pages span.current{
	    background:#50A8E6;
	    color:#FFF;
	    font-weight:700;
	    border-color:#50A8E6;
	    text-decoration:none;
  	}
  	 .test li{float: left; width: 100px}
  </style>
  <link href="http://localhost/eclipse/project2/public/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://localhost/eclipse/project2/public/jquery/jquery-2.2.0.js"></script>
  <script src="http://localhost/eclipse/project2/public/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F1F9EE">

  <div id="wrap">
    <div class="box10">
  <div class="container" style=" background-color:#F1F9EE;">
  		
        <br>
        <div class='row'>
  			<div class="col-md-2 col-md-offset-10">
  			<br>
  			<h4 >
        		<a href = 'http://localhost/eclipse/project2/index.php/Home/Video/Uploadtotal'>添加新课程</a>
        	</h4>
        	</div>
        </div>
        <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
    <div class="row">
        <?php $class0 = "http://".C('URLSET')."/index.php/Home/Video/SelectVideo?class=0"; $class1 = "http://".C('URLSET')."/index.php/Home/Video/SelectVideo?class=1"; $class2 = "http://".C('URLSET')."/index.php/Home/Video/SelectVideo?class=2"; $class3 = "http://".C('URLSET')."/index.php/Home/Video/SelectVideo?class=3"; $class4 = "http://".C('URLSET')."/index.php/Home/Video/SelectVideo?class=4"; $class5 = "http://".C('URLSET')."/index.php/Home/Video/SelectVideo?class=5"; ?>
        
        <div class="col-md-2">
            <ul>
                <li><h4><a href=<?php echo ($class0); ?>>全部</a></h4></li>
            </ul>
        </div>
        
        <div class="col-md-2"><h4><a href=<?php echo ($class1); ?>>汽车维修</a></h4></div>
        <div class="col-md-2"><h4><a href=<?php echo ($class2); ?>>电子技术</a></h4></div>
        <div class="col-md-2"><h4><a href=<?php echo ($class3); ?>>机器人</a></h4></div>
        <div class="col-md-2"><h4><a href=<?php echo ($class4); ?>>哲学</a></h4></div>
        <div class="col-md-2"><h4><a href=<?php echo ($class5); ?>>医学</a></h4></div>
    </div>
        
        <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr>
        
        <?php if(is_array($select)): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lec): $mod = ($i % 2 );++$i;?><li style="list-style: none">
                <div class="media">
    <?php $num ++; $fname = $lec['name']; $desc = $lec['descpt']; $url2 = "http://".C('URLSET')."/index.php/Home/Video/ShowVideo?id=".$lec['id']; $url3 = "http://".C('URLSET')."/index.php/Home/Video/AdduserLector?id=".$lec['id']; $bo=true; for($i=0;$i<sizeof($userlectureid);$i++){ if($userlectureid[$i]['id']==$lec['id']){ $url3 = "http://".C('URLSET')."/index.php/Home/Video/RmuserLector?id=".$lec['id'].'&page=video'; $bo=false; break; } } ?>
        <div class="media-left">
            <a href=<?php echo ($url2); ?>>
                <img class="media-object" src="http://localhost/eclipse/project2/public/images/class.jpg" height="200px" width='200px' alt="...">
            </a>
        </div>
        <div class="media-body">
            <div style="height: 180px">
                <h4 class="media-heading"><a href=<?php echo ($url2); ?>><?php echo ($fname); ?></a></h4>
                <br>
                <?php echo ($desc); ?>
            </div>
            <div style="height:20px">
                <div class="col-md-10" >
                    <a href=<?php echo ($url2); ?>>在线学习</a>
                </div>
                 <div class="col-md-2">
                            <?php if($bo==true){ ?>
                            <a href=<?php echo ($url3); ?>>收藏</a>
                            <?php }else{ ?>
                            <a href=<?php echo ($url3); ?>>取消收藏</a>
                            <?php } ?>
                </div>
            </div>
        </div>
</div>
            </li>
            
            <hr style="height:1px;border:none;border-top:1px solid #BDB76B;"></hr><?php endforeach; endif; else: echo "" ;endif; ?>   
        
		<div class="pages" align="center">
		  <?php echo ($page); ?>
		</div>
  </div>
	</div>
  </div>	
</body>
</html>