<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<?php $url1="http://".C('URLSET')."/index.php/Home/Search/index"; $url2="http://".C('URLSET')."/index.php/Home/Main/Maindown"; $url3="http://".C('URLSET')."/index.php/Home/Search/Table"; ?>
<meta charset="UTF-8">
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
<script language="javascript">

function editable(select1){

   if(select1.value == ""){

      var newvalue = prompt("请输入","其他");

      if(newvalue){

         addSelected(select1,newvalue,newvalue);

      }

   }

}

function addSelected(fld1,value1,text1){

    if (document.all)    {

            var Opt = fld1.document.createElement("OPTION");

            Opt.text = text1;

            Opt.value = value1;

            fld1.options.add(Opt);

            Opt.selected = true;

    }else{

            var Opt = new Option(text1,value1,false,false);

            Opt.selected = true;

            fld1.options[fld1.options.length] = Opt;

    }

}

</script>
<title>Search</title>
<style type="text/css">
body{
font-family:verdana;
 color:#0066CC;
 cursor:default;
}
</style>
<link href="http://".C('URLSET')."/public/mypage.css" rel="stylesheet" type="text/css"/>
</head>
	
<body>
<h1 align = "center">查询页面</h1>

<div align="center">
<form name="Search" action = <?php echo ($url1); ?> method="post">
性别 :
<select name="sex">
	<option value="ALL">全部</option>
	<option value="男">男</option>
    <option value="女">女</option>
</select>

院系:
  <select name="department" onChange="editable(this);">
  	<option value="ALL">全部</option>
    <option value="信息科学与技术学院">信息科学与技术学院</option>
    <option value="数据科学与计算机学院">数据科学与计算机学院</option>
    <option value="移动信息工程学院">移动信息工程学院</option>
	<option value="">请输入</option>
  </select>
 权限:
  <select name="root">
  	<option value="ALL">全部</option>
    <option value="0">管理员</option>
    <option value="1">普通用户</option>
    <option value="2">黑名单</option>
  </select>
<p align="center"><input type="submit" value="查询"></p>

</form>
</div>
<iframe src=<?php echo ($url3); ?> id="iframepage" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" onLoad="iFrameHeight()">
	</iframe>

<hr />


</body>
</html>