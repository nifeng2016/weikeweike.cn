<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<?php $url1="http://".C('URLSET')."/index.php/Home/Questionnaire/SaveQ"; $url2="http://".C('URLSET')."/public/jquery/jquery-2.1.4.min.js"; $url3="http://".C('URLSET')."/index.php/Home/Questionnaire/View"; ?>
<style type="text/css">
body {
	margin:0;padding:0;
	font-family:verdana;
    color:#0066CC;
	background-image: url("http://localhost/eclipse/project2//public/images/bg.gif");
}
</style>
<script type="text/javascript" src="http://localhost/eclipse/project2//public/jquery/jquery-2.1.4.min.js">
</script>
<script type="text/javascript" src="http://localhost/eclipse/project2//public/jquery/ajaxfileupload.js">
</script>
<script type="text/javascript">


$(document).ready(function(){
	var imageid=0;
	var bo;
	var boolarray=new Array();
	$("#title").change(function(){
		var titlemain=$(this).val();
		if(titlemain=="")
		{			
			$("#p1").text("请输入标题名");
			$("#p1").css("color","blue");
			bo=0;
		}
		else{
		$.ajax({
	         url: "http://localhost/eclipse/project2//index.php/Home/Questionnaire/Checkname",
	         type: "POST",
	         data:{titlemain:titlemain},
	         //dataType: "json",
	         error: function(){
	             alert('Error loading XML document');
	         },
	         success: function(data,status){
	        	 if(data==0){
	     			$("#p1").css("color","red");
	     			$("#p1").text("标题名重复");
	     			bo=0;
	     		}
	     		else{
	     			$("#p1").css("color","green");
	     			$("#p1").text("标题名可用");
	     			bo=1;
	     		}
	         }
		});
		}
	});
	var sequence=0;
	var datamain=new Array();
	var radioid=1;
	$("#btn1").click(function(){
		sequence++;
		str="<li><p><input type='text'></p><input type='radio' id='1' name='"+radioid+"' /><input type='text'><input type='radio' id='2' name='"+radioid+"' /><input type='text' ><br/><input  type='button' class='add1' value='增加选项'> <input type='button' class='remove1' value='删除选项'><input id='"+sequence+"' type='button' class='save1' value='保存'><input type='button' class='deleteall1' value='删除'></li>";
		$("ol").append(str);
		radioid++;
		$(".add1").unbind("click");
		$(".remove1").unbind("click");
		$(".save1").unbind("click");
		$(".deleteall1").unbind("click");
		$(".add1").click(function(){
			var id2=$(this).prev().prev().prev().attr('name');			
			var num=parseInt($(this).prev().prev().prev().attr('id'));
			if(num<=4){
				num++;
				var str="<input type='radio' id='"+num+"'  name='"+id2+"'/><input type='text'>";
				$(this).prev().prev().after(str);
			}
		});
		$(".remove1").click(function(){
			var item1=$(this).prev().prev().prev();
			var num=parseInt($(this).prev().prev().prev().prev().attr('id'));
			if(num>=3){
			item1.remove();
			var item2=$(this).prev().prev().prev();
			item2.remove();
			}
		});
		$(".save1").click(function(){
			var item1=$(this).parent().find("p");
			var item2=item1.find("input");
			var data=new Array();
			data[0]="radio";
			var id=1;
			var bosave=0;
			data[id]=item2.val();
			if(item2.val()!='')
				bosave=1;
			id++;
			while(item1.next().next().val()!="增加选项"){
				item1=item1.next().next();
				data[id]=item1.val();
				if(data[id]=='')
					bosave=0;
				id++;
			}
			if(bosave==1){
			var realdata=new Array();
				for(var i=0;i<=6;i++){
					realdata[i]=data[i];
				}
				
					datamain[$(this).attr('id')]=realdata;
					boolarray[$(this).attr('id')]=1;
					$(this).prev().remove();
					$(this).prev().remove();
					$(this).remove();
			}
			else{
				boolarray[$(this).attr('id')]=0;
				alert("题目元素不能为空！");
			}
		});
		$(".deleteall1").click(function(){
			var data=new Array();
			datamain[$(this).prev().attr('id')]=data;
			boolarray[$(this).prev().attr('id')]=1;
			$(this).parent().remove();
		});
	});
	
	
	  $("#submit").click(function(){
		  var boall=bo;
		  for(var id=1;id<=sequence;id++){
			  boall=boall*boolarray[id];
			  }
		  if(boall=="1"){
		  var title=$("#title").val();
		  $.ajax({
		         url: "http://localhost/eclipse/project2//index.php/Home/Questionnaire/SaveQ",
		         type: "POST",
		         data:{title:title , datamain:datamain},
		         //dataType: "json",
		         error: function(){
		             alert('Error loading XML document');
		         },
		         success: function(data,status){
		        	 window.location.href="http://localhost/eclipse/project2//index.php/Home/Questionnaire/View";
		         }
			});
		  }
		  else{
			  alert('标题为空或者有题目未保存！')
		  }
	  });
	  
	  $("#btn2").click(function(){
			//alert('hello');
			sequence++;
			str="<li><p><input type='text'></p><input type='checkbox' id='1' name='"+radioid+"' /><input type='text'><input type='checkbox' id='2' name='"+radioid+"' /><input type='text' ><br/><input  type='button' class='add2' value='增加选项'> <input type='button' class='remove2' value='删除选项'><input id='"+sequence+"' type='button' class='save2' value='保存'><input type='button' class='deleteall2' value='删除'></li>";
			$("ol").append(str);
			radioid++;
			$(".add2").unbind("click");
			$(".remove2").unbind("click");
			$(".save2").unbind("click");
			$(".deleteall2").unbind("click");
			$(".add2").click(function(){
				var id2=$(this).prev().prev().prev().attr('name');			
				var num=parseInt($(this).prev().prev().prev().attr('id'));
				if(num<=4){
					num++;
					var str="<input type='checkbox' id='"+num+"'  name='"+id2+"'/><input type='text'>";
					$(this).prev().prev().after(str);
				}
			});
			$(".remove2").click(function(){
				var item1=$(this).prev().prev().prev();
				var num=parseInt($(this).prev().prev().prev().prev().attr('id'));
				if(num>=3){
				item1.remove();
				var item2=$(this).prev().prev().prev();
				item2.remove();
				}
			});
			$(".save2").click(function(){
				var item1=$(this).parent().find("p");
				var item2=item1.find("input");
				var data=new Array();
				data[0]="checkbox";
				var id=1;
				var bosave=0;
				data[id]=item2.val();
				if(data[id]!='')
					bosave=1;
				id++;
				while(item1.next().next().val()!="增加选项"){
					item1=item1.next().next();
					data[id]=item1.val();
					if(data[id]=='')
						bosave=0;
					id++;
				}
				if(bosave==1){
					var realdata=new Array();
					for(var i=0;i<=6;i++){
						realdata[i]=data[i];
					}
					
						datamain[$(this).attr('id')]=realdata;
						boolarray[$(this).attr('id')]=1;
						$(this).prev().remove();
						$(this).prev().remove();
						$(this).remove();
				}
				else{
					boolarray[$(this).attr('id')]=0;
					alert("题目元素不能为空！");
				}
				
			});
			$(".deleteall2").click(function(){
				var data=new Array();
				datamain[$(this).prev().attr('id')]=data;
				boolarray[$(this).prev().attr('id')]=1;
				$(this).parent().remove();
			});
		 });
		
	  $("#btn3").click(function(){
			sequence++;
			str="<li><p><input type='text'></p><input id='"+sequence+"' type='button' class='save3' value='保存'><input type='button' class='deleteall3' value='删除'></li>";
			$("ol").append(str);
			$(".save3").unbind("click");
			$(".deleteall3").unbind("click");
			
			$(".save3").click(function(){
				var item1=$(this).parent().find("p");
				var item2=item1.find("input");
				var data=new Array();
				var savebo=1;
				data[0]="textfield";
				var id=1;
				data[id]=item2.val();
				if(data[id]=='')
					savebo=0;
				id++;
				if(savebo==1){
					var realdata=new Array();
					for(var i=0;i<=6;i++){
						realdata[i]=data[i];
					}
					
					datamain[$(this).attr('id')]=realdata;
					boolarray[$(this).attr('id')]=1;
					$(this).remove();
				}
				else{
					boolarray[$(this).prev().attr('id')]=0;
					alert('题目元素不为空！');
				}
				
			});
			$(".deleteall3").click(function(){
				var data=new Array();
				datamain[$(this).prev().attr('id')]=data;
				boolarray[$(this).prev().attr('id')]=1;
				$(this).parent().remove();
			});
		});
		
	  $("#btn4").click(function(){
		  	imageid++;
			sequence++;
			//str="<li><p><input type='text'></p><input type='radio' id='1' name='"+radioid+"' /><div  ><form action= method='post' enctype='multipart/form-data'> <p ><input type='text' name='textfield' id='textfield' /> <input type='button'  value='浏览...' /> <input type='file' name='fileField' id='fileField' size='28' onChange='document.getElementById('textfield').value=this.value' /> <input type='submit' name='submit'  value='上传' /> </p></form> </div><input type='radio' id='2' name='"+radioid+"' /><input type='text' ><br/><input  type='button' class='add1' value='增加选项'> <input type='button' class='remove1' value='删除选项'><input id='"+sequence+"' type='button' class='save1' value='保存'><input type='button' class='deleteall1' value='删除'></li>";
			str="<li><p><input type='text'><div><input type='radio' id='1' name='"+radioid+"' />"+
			"<img id='img"+imageid+"' src='' width='100px' height='100px'/>"+
			"<br/>"+
			"<input type='file' id='appFile"+imageid+"' name='appFile"+imageid+"' />"+
			"<input type='button'  class='appFile' name='appFile"+imageid+"' value='上传'/>"+
			//"<input id='appFilename' style='color: green;border: 1px solid green;width:300px;' />"+  
			//"<input type='button' value='File' style='border: 1px solid green;width:80px;' /> "+
			"</div>"
			imageid++;
			str=str+"<div><input type='radio' id='2' name='"+radioid+"' />"+
			"<img id='img"+imageid+"' src='' width='100px' height='100px'/>"+
			"<br/>"+
			"<input type='file' id='appFile"+imageid+"' name='appFile"+imageid+"' />"+
			"<input type='button'  class='appFile' name='appFile"+imageid+"' value='上传'/>"+
			//"<input id='appFilename' style='color: green;border: 1px solid green;width:300px;' />"+  
			//"<input type='button' value='File' style='border: 1px solid green;width:80px;' /> "+
			"</div><br/><input  type='button' class='add4' value='增加选项'> <input type='button' class='remove4' value='删除选项'><input id='"+sequence+"' type='button' class='save4' value='保存'><input type='button' class='deleteall4' value='删除'></li>";
			
			$("ol").append(str);
			radioid++;
			
			
			$(".appFile").unbind("click");
			$(".add4").unbind("click");
			$(".save4").unbind("click");
			$(".delete4").unbind("click");
			$(".appFile").click(function(){
				var cl=$(this);
			    if($(this).prev().val() == ""){  
			        alert("请选择上传的文件!");
			    }
			    else{
				    $.ajaxFileUpload  
				    (  
				        {  
				        	url: "http://localhost/eclipse/project2//index.php/Home/Questionnaire/UploadIMG",
				        	type: "POST",
				            secureuri:false,
				            dataType: 'text',
				            data:{imagename:cl.prev().attr('id')},
				            fileElementId:cl.prev().attr('id'),
				            success: function (data, status)  
				            {  
				            	if(data=="0")
				            		alert("上传图片格式不合法！")
				            	else
				            		cl.prev().prev().prev().attr('src',data);
				            	
				            },  
				            error: function (data, status, e)  
				            {  
				            	alert("false");
				            }  
				        }  
				    );
			    }   
			});
			$(".add4").click(function(){
				imageid++;
				var it=$(this).prev().prev().find(':radio');
				var num=parseInt(it.attr('id'))+1;
				str="<div><input type='radio' id="+num+" name='"+it.attr('name')+"' />"+
			"<img id='img"+imageid+"' src='' width='100px' height='100px'/>"+
			"<br/>"+
			"<input type='file' id='appFile"+imageid+"' name='appFile"+imageid+"'/ >"+
			"<input type='button'  class='appFile' name='appFile"+imageid+"' value='上传'/>"+
			//"<input id='appFilename' style='color: green;border: 1px solid green;width:300px;' />"+  
			//"<input type='button' value='File' style='border: 1px solid green;width:80px;' /> "+
			"</div>"
			if(num<=5){
			$(".appFile").unbind("click");
			$(this).prev().prev().after(str);
				$(".appFile").click(function(){
					var cl=$(this);
				    if($(this).prev().val() == ""){  
				        alert("请选择上传的文件!");
				    }
				    else{
					    $.ajaxFileUpload  
					    (  
					        {  
					        	url: "http://localhost/eclipse/project2//index.php/Home/Questionnaire/UploadIMG",
					        	type: "POST",
					            secureuri:false,
					            dataType: 'text',
					            data:{imagename:cl.prev().attr('id')},
					            fileElementId:cl.prev().attr('id'),
					            success: function (data, status)  
					            {  
					            	if(data=="0")
					            		alert("上传图片格式不合法！")
					            	else
					            		cl.prev().prev().prev().attr('src',data);
					            	
					            },  
					            error: function (data, status, e)  
					            {  
					            	alert("false");
					            }  
					        }  
					    );
				    }   
				});
			}
			});
			$(".save4").click(function(){
				var it=$(this).prev().prev().prev().prev();
				var data=new Array();
				data[0]="imgradio";
				var id=2;
				var bosave=1;
				while(it.find("input").length!=1){
					data[id]=it.find("img").attr("src");
					if(data[id]=='')
						bosave=0;
					id++;
					it=it.prev();
				}
				id--;
				data[1]=it.find("input").val();
				if(data[1]=='')
					bosave=0;
				if(bosave==1){
					var realdata=new Array();
					for(var i=2;id>=2;i++,id--){
						realdata[i]=data[id];
					}
					realdata[0]=data[0];
					realdata[1]=data[1];			
					datamain[$(this).attr('id')]=realdata;
					boolarray[$(this).attr('id')]=1;
					$(this).prev().remove();
					$(this).prev().remove();
					$(this).remove();
				}
				else{
					boolarray[$(this).prev().attr('id')]=0;
					alert("题目元素不能为空！");
				}
			});
			
			$(".remove4").click(function(){
				var it=$(this).prev().prev().prev().find(':radio');
				var num=parseInt(it.attr('id'));
				if(num>=3){
				it.parent().remove();
				}
			});
			$(".deleteall4").click(function(){
				var data=new Array();
				datamain[$(this).prev().attr('id')]=data;
				boolarray[$(this).prev().attr('id')]=1;
				$(this).parent().remove();
			});
		});

	  $("#btn5").click(function(){
		  	imageid++;
			sequence++;
			//str="<li><p><input type='text'></p><input type='checkbox' id='1' name='"+radioid+"' /><div  ><form action= method='post' enctype='multipart/form-data'> <p ><input type='text' name='textfield' id='textfield' /> <input type='button'  value='浏览...' /> <input type='file' name='fileField' id='fileField' size='28' onChange='document.getElementById('textfield').value=this.value' /> <input type='submit' name='submit'  value='上传' /> </p></form> </div><input type='checkbox' id='2' name='"+radioid+"' /><input type='text' ><br/><input  type='button' class='add1' value='增加选项'> <input type='button' class='remove1' value='删除选项'><input id='"+sequence+"' type='button' class='save1' value='保存'><input type='button' class='deleteall1' value='删除'></li>";
			str="<li><p><input type='text'><div><input type='checkbox' id='1' name='"+radioid+"' />"+
			"<img id='img"+imageid+"' src='' width='100px' height='100px'/>"+
			"<br/>"+
			"<input type='file' id='appFile"+imageid+"' name='appFile"+imageid+"' />"+
			"<input type='button'  class='appFile' name='appFile"+imageid+"' value='上传'/>"+
			//"<input id='appFilename' style='color: green;border: 1px solid green;width:300px;' />"+  
			//"<input type='button' value='File' style='border: 1px solid green;width:80px;' /> "+
			"</div>"
			imageid++;
			str=str+"<div><input type='checkbox' id='2' name='"+radioid+"' />"+
			"<img id='img"+imageid+"' src='' width='100px' height='100px'/>"+
			"<br/>"+
			"<input type='file' id='appFile"+imageid+"' name='appFile"+imageid+"' />"+
			"<input type='button'  class='appFile' name='appFile"+imageid+"' value='上传'/>"+
			//"<input id='appFilename' style='color: green;border: 1px solid green;width:300px;' />"+  
			//"<input type='button' value='File' style='border: 1px solid green;width:80px;' /> "+
			"</div><br/><input  type='button' class='add5' value='增加选项'> <input type='button' class='remove5' value='删除选项'><input id='"+sequence+"' type='button' class='save5' value='保存'><input type='button' class='deleteall5' value='删除'></li>";
			
			$("ol").append(str);
			radioid++;
			
			
			$(".appFile").unbind("click");
			$(".add5").unbind("click");
			$(".save5").unbind("click");
			$(".delete5").unbind("click");
			$(".appFile").click(function(){
				var cl=$(this);
			    if($(this).prev().val() == ""){  
			        alert("请选择上传的文件!");
			    }
			    else{
				    $.ajaxFileUpload  
				    (  
				        {  
				        	url: "http://localhost/eclipse/project2//index.php/Home/Questionnaire/UploadIMG",
				        	type: "POST",
				            secureuri:false,
				            dataType: 'text',
				            data:{imagename:cl.prev().attr('id')},
				            fileElementId:cl.prev().attr('id'),
				            success: function (data, status)  
				            {  
				            	if(data=="0")
				            		alert("上传图片格式不合法！")
				            	else	
				            		cl.prev().prev().prev().attr('src',data);
				            	
				            },  
				            error: function (data, status, e)  
				            {  
				            	alert("false");
				            }  
				        }  
				    );
			    }   
			});
			$(".add5").click(function(){
				imageid++;
				var it=$(this).prev().prev().find(':checkbox');
				var num=parseInt(it.attr('id'))+1;
				str="<div><input type='checkbox' id="+num+" name='"+it.attr('name')+"' />"+
			"<img id='img"+imageid+"' src='' width='100px' height='100px'/>"+
			"<br/>"+
			"<input type='file' id='appFile"+imageid+"' name='appFile"+imageid+"'/ >"+
			"<input type='button'  class='appFile' name='appFile"+imageid+"' value='上传'/>"+
			//"<input id='appFilename' style='color: green;border: 1px solid green;width:300px;' />"+  
			//"<input type='button' value='File' style='border: 1px solid green;width:80px;' /> "+
			"</div>"
			if(num<=5){
			$(".appFile").unbind("click");
			$(this).prev().prev().after(str);
				$(".appFile").click(function(){
					var cl=$(this);
				    if($(this).prev().val() == ""){  
				        alert("请选择上传的文件!");
				    }
				    else{
					    $.ajaxFileUpload  
					    (  
					        {  
					        	url: "http://localhost/eclipse/project2//index.php/Home/Questionnaire/UploadIMG",
					        	type: "POST",
					            secureuri:false,
					            dataType: 'text',
					            data:{imagename:cl.prev().attr('id')},
					            fileElementId:cl.prev().attr('id'),
					            success: function (data, status)  
					            {  
					            	if(data=="0")
					            		alert("上传图片格式不合法！")
					            	else
					            		cl.prev().prev().prev().attr('src',data);
					            	
					            },  
					            error: function (data, status, e)  
					            {  
					            	alert("false");
					            }  
					        }  
					    );
				    }   
				});
			}
			});
			$(".save5").click(function(){
				var it=$(this).prev().prev().prev().prev();
				var data=new Array();
				data[0]="imgcheckbox";
				var id=2;
				var savebo=1;
				while(it.find("input").length!=1){
					data[id]=it.find("img").attr("src");
					if(data[id]=='')
						savebo=0;
					id++;
					it=it.prev();
				}
				id--;
				data[1]=it.find("input").val();
				if(data[1]=='')
					savebo=0;
				if(savebo==1){
					var realdata=new Array();
					for(var i=2;id>=2;i++,id--){
						realdata[i]=data[id];
					}
					realdata[0]=data[0];
					realdata[1]=data[1];			
					datamain[$(this).attr('id')]=realdata;
					boolarray[$(this).attr('id')]=1;
					$(this).prev().remove();
					$(this).prev().remove();
					$(this).remove();
				}
				else{
					boolarray[$(this).prev().attr('id')]=0;
					alert("题目元素不为空！");
				}
			});
			
			$(".remove5").click(function(){
				var it=$(this).prev().prev().prev().find(':checkbox');
				var num=parseInt(it.attr('id'));
				if(num>=3){
				it.parent().remove();
				}
			});
			$(".deleteall5").click(function(){
				var data=new Array();
				datamain[$(this).prev().attr('id')]=data;
				boolarray[$(this).prev().attr('id')]=1;
				$(this).parent().remove();
			});
		});
	});

</script>
<style type="text/css">
.main{
height:2000px;
/*
background-color:#FFFF00;
*/
width:1000px;
margin:0 auto;
}
</style>
</head>
<body>
	<div align="center" class="main">
	<h1 align="center" style="font-weight:100">新问卷</h1>
	<br/>
	<hr style="height:1px;border:none;border-top:1px solid #999999;" />
	<br/>
	<big>问卷标题:&nbsp;</big><input type="text" id="title"> <big id="p1" style="color:blue">&nbsp;请输入标题名</big><br/>
	<br/>
	<br/>
	<input type="button" id="btn1" value="单选题"><input type="button" id="btn2" value="多选题"><input type="button" id="btn3" value="填空题"><input type="button" id="btn4" value="图片单选题"><input type="button" id="btn5" value="图片多选题"><br/>
	<ol>
	</ol>
	<input type="button" id="submit" value="提交">
	</div>
</body>
</html>