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
	<script type="text/javascript">
		function tips(){
			alert('请联系管理员！\n QQ:460660934');
		}
		function changing(){
		    document.getElementById('checkpic').src="http://localhost/eclipse/project2/public/images/checkcode.php?"+Math.random();
		} 
	</script>
</head>
<body style="background-color:#F2F9FC">
	
    <div class="container">
    	<br>
    	<br>
        <div class="row">
            <h1 align="center" style="font-weight: 200">Login</h1>

            <div class="col-md-2"></div>
            <div class="col-md-8" style="background-color: silver">
                <br>
                <br>
                <br>
                <?php $login = "http://localhost/eclipse/project2/index.php/Home/User/Logins"; ?>
                <form class="col-xs-offset-3 form-horizontal" action=<?php echo ($login); ?> onsubmit="return validate_form(this)" method="post">
                    <div class="form-group">
                    <label for="inputUsername" class="col-xs-2 control-label">用户名:</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="inputUsername" name="Username" placeholder="Username">
                    </div>
                    <span style="color: red;"><h4>*</h4></span>
                </div>
                    <div class="form-group">
                    <label for="inputPassword" class="col-xs-2 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
                    <div class="col-xs-6">
                        <input type="password" class="form-control" id="inputPassword" name="Password" placeholder="Password">
                    </div>
                    <span style="color: red;"><h4>*</h4></span>
                </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-xs-2 control-label">验证码:</label>
                        <div class="col-xs-6">
                            <input type="text" class="form-control" id="checkcode" name="Checkcode" placeholder="">
                            <br>
                            <img id="checkpic" onclick="changing();" src='http://localhost/eclipse/project2/public/images/checkcode.php' width='80px' height='40px'/>
                        	看不清？点击图片换到下一张
   
                        </div>
                        <span style="color: red;"><h4>*</h4></span>
                    </div>
                <div class="form-group" >
                    <br>
                    <br>
                    <div class="col-xs-3">
                    </div>
                    <?php $Regist = "http://localhost/eclipse/project2/index.php/Home/User/Regist"; ?>
                    <div class="col-xs-3">
                        <button type="submit" class="btn btn-default">登录</button>
                    </div>
                    <div class="col-xs-6">
                    	<input class="btn btn-default" type=button value="注册" onclick="javascript:window.location.href='http://localhost/eclipse/project2/index.php/Home/User/Regist'">
                        <input class="btn btn-default" type=button value="忘记密码？" onclick="tips()">
                    </div>
                </div>
                    <br>
            </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>