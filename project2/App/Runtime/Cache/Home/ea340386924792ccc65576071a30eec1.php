<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>Main</title>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php $URLSET=C('URLSET'); $url1="http://".C('URLSET')."/index.php/Home/Main/Maindown"; session_start(); $totalnum=ShowMyCounter(); ?>

    <!--  引入文件 -->
    <script type="text/javascript" src="http://localhost/eclipse/project2//public/js/jquery-2.2.0.js">
    </script>
    <script type="text/javascript" src="http://localhost/eclipse/project2//public/js/bootstrap.min.js">
    </script>
    <link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="http://localhost/eclipse/project2//public/css/css_index.css" rel="stylesheet" type="text/css" />
    
<script type="text/javascript">
$(document).ready(function(){
    $(".a1").click(function(){
      var url1;
      if($(".a1").index(this)==0) url1="http://localhost/eclipse/project2//index.php/Home/Main/Maindown";
      else if($(".a1").index(this)==1)  url1="http://localhost/eclipse/project2//index.php/Home/Video/index";
      else if($(".a1").index(this)==2)  url1="http://localhost/eclipse/project2//index.php/Home/BBS";
      else if($(".a1").index(this)==3)  url1="http://localhost/eclipse/project2//index.php/Home/ZZFW/index";
      else if($(".a1").index(this)==4)  url1="http://localhost/eclipse/project2//index.php/Home/AboutUs/index";
      
         /* url1="http://localhost/eclipse/project2//index.php/Home/Search/";  */
      $("#iframepage").attr('src',url1);
      });
	  var btm =$(".input-group-addon");
	  btm.click(function(){
	      var txt = $("#sear").val();
	      if(!txt){
	        	alert("请输入搜索变量！")
	        	url1="http://localhost/eclipse/project2//index.php/Home/Main/Maindown";
	        	$("#iframepage").attr('src',url1);
	       }
	       else{
	        	url1="http://localhost/eclipse/project2//index.php/Home/Search/Searchinfo?txt="+txt;
	        	$("#iframepage").attr('src',url1);
	       }
	    });
    	
    });
</script>
<script type="text/javascript" language="javascript">   
function iFrameHeight() {   
var ifm= document.getElementById("iframepage");   
var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;   
if(ifm != null && subWeb != null) {
   ifm.height = subWeb.body.scrollHeight;
   ifm.width = subWeb.body.scrollWidth;
}   
}   
</script>
   
    <style>
        #sec .row{
            /*background-color: #5cb85c;*/
            height: 300px;
        }
        #tail .row{
            background-color: #DCDCDC;
            height: 100px;
        }
        #anocd {
            padding-top: 50px;
            text-align: center;
        }
        .string5{

            width:20%;
            float:right;
            height:20px;
            text-align:right;
        }
        
        .string1{
        
            width:25%;
            float:left;
            height:20px;
            text-align:left;
        
        
        }
        .string4{
        
            width:20%;
            float:right;
            height:20px;
            text-align:right;
        }
    </style>
    
    <script>
        function changeValue(){
            var state=document.getElementById("fp");
            if (state == 0){
                alert('good!');
            }
        }
    </script>
</head>
<body style="background-color:#ECF0F1">

    <!--  <input type="hidden" id="fp" value = 0 onchange="alert('bad');">-->
<div style="background-color:#DCDCDC">    
<div class="container" style='background-color: #DCDCDC'>
    <div style='height:150px; background-color: #DCDCDC'>
    	<br>
        <div class="row" style="background-color:#DCDCDC ;width:1200px;"> 
            <div class="col-md-3" style="background-color:#DCDCDC">
                <div align="center">
                    <a class="branding" href = "http://localhost/eclipse/project2/" title="微课">
                        <img src="http://localhost/eclipse/project2//public/images/data.png">

                        <br>
                        <h4>DATA 工作室</h4>
                    </a>
                </div>
            </div>
            <div class="col-md-8" style="height: 120px; style:background-color:#DCDCDC">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <br>
                        <br>
                        <div class="input-group">
                            <input id ="sear"  type="text" class="form-control">
                            <span class="input-group-addon">搜索</span>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                       <br>
                       <br>
                       <?php $login = "http://localhost/eclipse/project2/index.php/Home/User/Login"; $Regist = "http://localhost/eclipse/project2/index.php/Home/User/Regist"; $Userhome = "http://localhost/eclipse/project2/index.php/Home/User/UserHome"; $Exit = "http://localhost/eclipse/project2/index.php/Home/User/Exitlogin"; ?> 
                       <?php if($LoginName==''){ echo '<h4 style="font-weight: 100">'; echo '<a href='.$login.'>登录</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a href='.$Regist.'>注册</a>'; echo '</h4>'; } else { echo '<p style="font-weight: 100"> '; echo '<a href='.$Userhome.'>'.$LoginName.'</a>&nbsp;|&nbsp;<a href='.$Exit.'>退出登录</a>'; echo '</p>'; } ?>
                    </div>
                </div>
            </div>
        	<div class="col-md-1" style=' height:120px'>
        		<image src='http://localhost/eclipse/project2/public/images/qrcode.jpg' width='100px' height='100px'>
        	</div>
        </div>
    	
    </div>
</div>

</div>
 
 <nav class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-header">
                      <span class="nav-toggle-button collapse" data-target="#main-menu">
                          <span class="sr-only">Toggle Nav</span>
                          <i class="fa fa-bars"></i>
                      </span>
                </div>
                <div class="collapse navbar-collapse" id="main-menu">
                    <ul class="menu">
                        <li class="nav-current" role="presentation">
                            <h4><a class="a1">首页</a></h4>
                        </li>
                        <li class="nav-current" role="presentation">
                            <h4><a class="a1" >微课</a></h4>
                        </li>
                        <li class="nav-current" role="presentation">
                            <h4><a class="a1" >论坛</a></h4>
                        </li>
                        <li class="nav-current" role="presentation">
                            <h4><a class="a1" >增值服务</a></h4>
                        </li> 
                        <li class="nav-current" role="presentation">
                            <h4><a class="a1" >关于我们</a></h4>
                        </li>  
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <iframe src=<?php echo ($url1); ?> id="iframepage" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" onLoad="iFrameHeight()">
    </iframe>
</div>
<div id="tail">
	<br>
	<br>
	<br>	
	
	<div class='row' style='height:30px'>
		<div class='col-md-3'></div>
		<div class='col-md-6'>
			<div class='col-xs-2'>
				<br>
				<a href='http://www.baidu.com'>百度</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|
			</div>
			<div class='col-xs-2'><br><a href='http://www.baidu.com'>百度</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
			<div class='col-xs-2'><br><a href='http://www.baidu.com'>百度</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
			<div class='col-xs-2'><br><a href='http://www.baidu.com'>百度</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
			<div class='col-xs-2'><br><a href='http://www.baidu.com'>百度</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
			<div class='col-xs-2'><br><a href='http://www.baidu.com'>百度</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</div>
		</div>
		<div class='col-md-3'></div>
	</div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div id="anocd">
                <h4 style="font-weight: 200">版权所有 @DATA STUDIO</h4>
            </div>
        </div>
    </div>
</div>
</body>  
</html>