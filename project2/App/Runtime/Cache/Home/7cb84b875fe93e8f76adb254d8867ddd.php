<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2//public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2//public/js/bootstrap.min.js"></script>
	<?php $Post="http://".C('URLSET')."/index.php/Home/HR/post"; ?>
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
  	
  </style>
</head>
<body style=" background-color: #F1F9EE">
<div class="container" style=" background-color: #F1F9EE; height:800px;" >
	
    <br>
    <br>
    <h4 align="right" style="font-weight: 100">
    <?php if($root==0){ ?>
        <a href=<?php echo ($Post); ?>>发布招聘</a><?php } ?>
    </h4>
    
    <br>
    <br>
    <br>
    
    <table class="table">
        <thead>
            <tr>
                 <td class="col-sm-8">标题</td>
                 <td class="col-sm-2">发布日期</td>
                 <td class="col-sm-1">发布人</td>
                 <?php if($root==0){ ?>
            	<td class="col-sm-1">管理</td><?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($select)): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select): $mod = ($i % 2 );++$i; $detail="http://".C('URLSET')."/index.php/Home/HR/detail?id=".$select['id']; $delete="http://".C('URLSET')."/index.php/Home/HR/delete?id=".$select['id']; ?>
                <tr>
                    <td><a href=<?php echo ($detail); ?>><?php echo ($select['title']); ?></a></td>
					<td><?php echo ($select['date']); ?></td>
                	<td><?php echo ($select['publisher']); ?></td>	
                	<?php if($root==0){ ?>
                	<td><a href=<?php echo ($delete); ?>>删除</a></td><?php } ?>	
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td colspan="3" >
            	    <div class="pages" align="center">
            	            <?php echo ($page); ?>
            	    </div>
            	</td>  
            </tr>

        </tbody>
    </table>
    
</div>
	
    <br>
    <br>
</body>
</html>