<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Error</title>
<style type="text/css">
body {
	margin:0;padding:0;
	font-family:verdana;
    color:#0066CC;
	background-color:#EDF2F1;
}
.main{
/*
background-color:#CCFF00;
*/
width:1000px;
height:800px;
margin:0 auto;
}
</style>
</head>
<body>
<div align="center" class="main">
	<?php if($name==''){ echo ("<h1 align='center' style='font-weight:100'>未登录！</h1>"); echo ("<h4 align='center' style='font-weight:100'>去右上角登录吧~</h4>"); } else if($root=='2'){ echo("<h2 align='center' style='font-weight:100'>该用户已被拉黑,请联系管理员！</h2>"); } else{ echo("<h1 align='center' style='font-weight:100'>对不起，您没有管理员权限！</h1>"); } ?>
</div>
</body>
</html>