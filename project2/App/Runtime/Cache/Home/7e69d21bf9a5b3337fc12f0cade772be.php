<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<h1 align="center">view</h1>
<?php $url2="http://".C('URLSET')."/public/hist/".$data[0]['src']; ?>
<div align="center">
	<img id='img' src='<?php echo ($url2); ?>' width='100px' height='100px'/>
</div>
</body>
</html>