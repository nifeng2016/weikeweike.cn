<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>注册</title>
<h1 align = "center">用户信息修改页面</h1>
<style type="text/css">

.box {
/*
background-color:#003399;
*/

height:20px;
padding: 6px 12px;
/*
display: block;
width: 100%;
font-size: 14px;
	*/
}
.form-control {
	display: block;
	width: 100%;
	height: 20px;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.428571429;
	color: #555555;
	vertical-align: middle;
	background-color: #ffffff;
	border: 1px solid #cccccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	-webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.form-control:focus {
	border-color: #66afe9;
	outline: 0;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
} 
body{
font-family:verdana;
 color:#0066CC;
 cursor:default;
}
.main{
/*
background-color:#CCFF00;
*/
width:800px;
height:500px;
margin:0 auto;
}

.text{

font-weight:100;
line-height:150%;
}
</style>
</head>
<body>
<?php $url1="http://".C('URLSET')."/index.php/Home/User/ChangeInfo"; $url2="http://".C('URLSET')."/index.php/Home/User/index"; ?>
<div class="main">
	<h3 align= "right" class="text"> <span style="color:#FF0000">*</span>为必填项</h3>
	<hr  style="height:0;border:none;border-top:3px groove skyblue;" />
	<form align = "center", name="login" action=<?php echo ($url1); ?> method="post">
	<table align = "center">
	  <tbody>
		<tr >
		  <td>
		  <div class="box">
		  
		      <label>I&nbspD &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		  </td>
		       <td>
					  <?php echo ($data['id']); ?>
			  </lable>
		  </td>
		</div>
		  
					
		</tr>
		<tr>
		  <td>
		    <div class="box">
			<label>用户名 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					  </td>
		  <td>
					  <?php echo ($data['username']); ?>
			  </lable>
		  </td>
		  </div>
		</tr>
		<tr>
		  <td>
		  <div class="box">
		  <label>性别<span style="color:#FF0000">*</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>
		  <td> <input type="radio" name="Sex" value="男" checked>男
			   <input type="radio" name="Sex" value="女">女</lable>
		  </td>
		  </div>
		</tr>
	
		<tr>
		  <td>
		  <div class="box">
		  
		  <label>院系<span style="color:#FF0000">*</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
		  <td>  <select name="Department" style="width:300px">
		<option value="信息科学与技术学院">信息科学与技术学院</option>
		<option value="数据科学与计算机学院">数据科学与计算机学院</option>
		<option value="移动信息工程学院">移动信息工程学院</option>
	  </select>
	</lable>
		  </td>
		</div>
		</tr>
		<tr>
			<td>
			<div class="box">
		  
			 <label>学校<span style="color:#FF0000">*</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			</td>
			 <td>
					  <input name="Email" type="text" class="form-control" value=<?php echo ($data['school']); ?>>
				 </lable>	
			</td>
		</div>
		</tr>
		<tr>
			<td>
			<div class="box">
		  
			 <label>E-mail<span style="color:#FF0000">*</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			</td>
			 <td>
					  <input name="Email" type="text" class="form-control" value=<?php echo ($data['e_mail']); ?>>
				 </lable>	
			</td>
		</div>
		</tr>
		<tr>
			<td>
			<div class="box">
		  
				<label>QQ &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			</td>
			 <td>
					  <input name="Qq" type="text" class="form-control"  value=<?php echo ($data['qq']); ?>>
				 </lable>	
			</td>
		</div>
		</tr>
	
	
	
	  </tbody>
	</table>
	<br>
	<p align="center"><input type="submit" value="更改" style="display:block;width:120px;height:35px;color:white;font-size:24px;background:#BBB5F9;border-radius:5px;" align="middle"></p>
	</form>	
</div>
</body>
</html>