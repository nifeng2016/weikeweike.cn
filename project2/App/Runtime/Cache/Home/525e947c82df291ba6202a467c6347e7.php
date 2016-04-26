<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style type="text/css">
.main{
/*
background-color:#00FF99;
*/
width:1000px;
height:800px;
margin:0 auto;
}
body {
	margin:0;padding:0;
	font-family:verdana;
    color:#0066CC;
	background-image: url("http://localhost/eclipse/project2//public/images/bg.gif");
}
</style>
</head>
<body>
<div align="center" class="main">
<h1 align="center" style="font-weight:100"><?php echo ($title[0]['name']); ?></h1>
<h2 align="center" style="font-weight:100"> Publisher: <?php echo ($title[0]['username']); ?></h2>
<hr style="height:1px;border:none;border-top:1px solid #999999;" />
	<?php $cnt = 1; $url1="http://".C('URLSET')."/index.php/Home/Questionnaire/SaveR?id=".$id; $flag = "aa".$cnt."[]"; ?>

<form method="post" action=<?php echo ($url1); ?>>
	<ol>
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li>
				<h3 align="center" style="font-weight:100">标题： <?php echo ($vo1['value1']); ?></h3>
				<?php if($vo1['type']=="radio" || $vo1['type']=="checkbox"){ ?>
					<input type=<?php echo ($vo1['type']); ?> value="A" name=<?php echo ($flag); ?> /><?php echo ($vo1['value2']); ?>
					<input type=<?php echo ($vo1['type']); ?> value="B" name=<?php echo ($flag); ?> /><?php echo ($vo1['value3']); ?>
					<?php if($vo1['value4']){ ?><input type=<?php echo ($vo1['type']); ?> value="C" name=<?php echo ($flag); ?> /><?php echo ($vo1['value4']); } ?>
					<?php if($vo1['value5']){ ?><input type=<?php echo ($vo1['type']); ?> value="D" name=<?php echo ($flag); ?> /><?php echo ($vo1['value5']); } ?>
					<?php if($vo1['value6']){ ?><input type=<?php echo ($vo1['type']); ?> value="E" name=<?php echo ($flag); ?> /><?php echo ($vo1['value6']); } ?>
				<?php }else if($vo1['type']=="textfield"){ ?>
					<input type=<?php echo ($vo1['type']); ?> name=<?php echo ($flag); ?> value=""/>
				<?php }else if($vo1['type']=="imgradio"){ ?>
					<input type='radio' value="A" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value2']); ?>'/>
					<input type='radio' value="B" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value3']); ?>'/>
					<?php if($vo1['value4']){ ?><input type='radio' value="C" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value4']); ?>'/><?php } ?>
					<?php if($vo1['value5']){ ?><input type='radio' value="D" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value5']); ?>'/><?php } ?>
					<?php if($vo1['value6']){ ?><input type='radio' value="E" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value6']); ?>'/><?php } ?>
					<?php }else if($vo1['type']=="imgcheckbox"){ ?>
					<input type='checkbox' value="A" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value2']); ?>'/>
					<input type='checkbox' value="B" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value3']); ?>'/>
					<?php if($vo1['value4']){ ?><input type='checkbox' value="C" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value4']); ?>'/><?php } ?>
					<?php if($vo1['value5']){ ?><input type='checkbox' value="D" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value5']); ?>'/><?php } ?>
					<?php if($vo1['value6']){ ?><input type='checkbox' value="E" name=<?php echo ($flag); ?> /><img width='100px' height='100px' src='<?php echo ($vo1['value6']); ?>'/><?php } ?>
					<?php }$cnt++; $flag = "aa".$cnt."[]"; ?>
				</php>
		</li><?php endforeach; endif; else: echo "" ;endif; ?> 
	</ol>
	<input type=hidden name="ct" value=<?php echo ($cnt); ?> />
	<input type="submit" value="提交">
</form>

</div>
	
</body>
</html>