<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
     <script type="text/javascript" src="http://localhost/eclipse/project2//public/js/bootstrap.min.js">
    </script>
    <link href="http://localhost/eclipse/project2/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
</head>
<body style="height:1000px; background-color:#EDF2F1">
<div class="container">
    <br>
    <h4 align="right"><a href="http://localhost/eclipse/project2/index.php/Home/HangYe/edit"> 发布信息</a></h4>
</div>
<div class="container">
    <div class="row">
	    
	        <table class="table table-bordered table-striped">
	            <thead>
	            	<tr>
		                <th class="col-md-8">内容</th>
		                <th class="col-md-4">发布时间</th>
		            </tr>
	            </thead>
	            <tbody>
		            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; $url = "http://localhost/eclipse/project2/index.php/Home/HangYe/detail?id=".$list['id']; ?>
			            <tr>
			                <td><a href=<?php echo ($url); ?>><?php echo ($list['title']); ?></a></td>
			                <td><?php echo ($list['time']); ?></td>
			            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	            </tbody>
	        </table>
	    	<div align="center">
		       	<?php echo ($page); ?>
		    </div>
    </div>
</div>
</body>
</html>