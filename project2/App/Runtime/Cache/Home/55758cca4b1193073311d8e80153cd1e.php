<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>个人中心</title>
<style type="text/css">
body{
font-family:verdana;
 color:#0066CC;
 cursor:default;
}
.text{
margin-top:80px;
margin-left:50px;
text-align:left;
font-weight:100;
line-height:150%;
}
.text1{
margin-top:10px;
margin-left:50px;
text-align:left;
font-weight:100;
line-height:150%;
}
.uhome_main {

height:800px;
width:800px;
margin:0 auto;
/*
background-color:#99CC33;
*/
}
.id_name{
/*
background:#00FF99;
*/
width:40%;
height:40%;
float:left;
	       /*文字水平居中对齐*/
	/*text-align: center;border:1px solid green; 
	line-height: 200px;        /*设置文字行距等于div的高度
	   /*边框*/
	overflow:hidden;
}

.sex{
/*
background:#00FF99;
*/
width:60%;
float:right;
height:40%;
overflow:hidden;
}
.email{
/*
background:#00FF66;
*/
width:100%;
height:30%;
overflow:hidden;
}
.comment{
/*
background:#00FF33;
*/
width:100%;
height:20%;
overflow:hidden;
}
.change{
/*
background:#00FF00;
*/
width:100%;
height:10%;
overflow:hidden;
}
</style>
</head>
<?php $url1="http://".C('URLSET')."/index.php/Home/User"; $url2="http://".C('URLSET')."/index.php/Home/User/Change"; $url3="http://".C('URLSET')."/index.php/Home/User/SignView"; if($data['root']=="0") $temp="管理员"; else if($data['root']=="1") $temp="普通用户"; else if($data['root']=="2") $temp="黑名单"; ?>
<body style="background-color:#FBF4F4">
<h1 align = "center" >个人信息</h1>
<div class="uhome_main" align="center">
<!--
	<p align = "center" >个人信息</p>
	<p align = "center">I&nbspD:<?php echo ($data['id']); ?></p>
	<p align = "center">用户名:<?php echo ($data['username']); ?></p>
	
		<p align = "center">性别:<?php echo ($data['sex']); ?></p>
	<p align = "center">用户权限:<?php echo ($temp); ?></p>

	<p align = "center"><a href=<?php echo ($url3); ?>>签到次数:<?php echo ($signinnum); ?></a></p>
	
	<p align = "center">学院:<?php echo ($data['department']); ?></p>
	<p align = "center">E-mail:<?php echo ($data['e_mail']); ?></p>
	<p align = "center">QQ:<?php echo ((isset($data['qq']) && ($data['qq'] !== ""))?($data['qq']):'未填写'); ?></p>
	
	<p align = "center">发表恶意言论次数:<?php echo ($data['badtimes']); ?></p>
	<p align = "center" >*超过三次恶意评论将会被自动加入黑名单</p>
	
	<p align= "center"><a href=<?php echo ($url2); ?>>更改用户信息</a></p>
!-->
<hr style="height:1px;border:none;border-top:1px solid #999999;" />
<div class="id_name">
    <h2 class="text" style="border-color:#CC00FF; color:#0033FF;">用户名:&nbsp; <?php echo ($data['username']); ?>
	<br><br>
	ID:&nbsp;<?php echo ($data['id']); ?> </h2>
</div>
<div class="sex">

  <h2 class="text" style="border-color:#CC00FF; color:#0033FF;">
	性别:&nbsp;<?php echo ($data['sex']); ?>
	<br>
	用户权限:&nbsp;<?php echo ($temp); ?>
	<br>
	<a href=<?php echo ($url3); ?> style=" color:#0033FF;">签到次数:&nbsp;<?php echo ($signinnum); ?></a>
  </h2>
</div>

<div class="email">
<hr style="height:1px;border:none;border-top:1px solid #999999;" />
	<h2 class="text1" style=" color:#0033FF;">
		E-mail:&nbsp;<?php echo ($data['e_mail']); ?>
		<br>
		QQ:&nbsp;<?php echo ((isset($data['qq']) && ($data['qq'] !== ""))?($data['qq']):'未填写'); ?>
		<br>
		学院:&nbsp;<?php echo ($data['department']); ?>
		<br>
		学校:&nbsp;<?php echo ($data['school']); ?>
	</h2>
</div>

<div class="comment">
<hr style="height:1px;border:none;border-top:1px solid #999999;" />
	<h2 class="text1" style=" color:#0033FF;">
		发表恶意言论次数:&nbsp;<?php echo ((isset($data['badtimes']) && ($data['badtimes'] !== ""))?($data['badtimes']):'0'); ?>
	</h2>		
	<h2 class="text1" style=" color:#0033FF;">
		*超过三次恶意评论将会被自动加入黑名单
	</h2>
</div>
<div class="change">
<hr style="height:1px;border:none;border-top:1px solid #999999;" />
	<h2 align="center" style="font-weight:100">
		<a href=<?php echo ($url2); ?>>更改用户信息</a>
	</h2>
</div>
<!--

!-->
</div>
</body>
</html>