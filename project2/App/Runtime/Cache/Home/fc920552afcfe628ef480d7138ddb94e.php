<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="http://localhost/eclipse/project2/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2/public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/eclipse/project2//public/jquery/jquery-2.1.4.min.js">
	</script>
	<script type="text/javascript" src="http://localhost/eclipse/project2//public/jquery/ajaxfileupload.js">
	</script>
	<script type="text/javascript">
        $(document).ready(function(){
            $(".appFile").click(function(){
            	
            	var cl=$(this);
                if($(this).prev().prev().val() == ""){
                    alert("请选择上传的文件!");
                }
                else{
                    
                    $.ajaxFileUpload
                    (
                            {
                                url: "http://localhost/eclipse/project2/index.php/Home/Edit/UploadIMG",
                                type: "POST",
                                secureuri:false,
                                dataType: 'text',
                                data:{imagename:cl.prev().prev().attr('id')},
                                fileElementId:cl.prev().prev().attr('id'),
                                success: function (data, status)
                                {
                                    if(data=="0")
                                        alert("上传图片格式不合法！");
                                    else{
                                    	alert(data);
                                        cl.prev().prev().prev().prev().attr('src',data);
                                    }
                                },
                                error: function (data, status, e)
                                {
                                    alert("false");
                                }
                            }
                    );
                }
            });
        });
    </script>
    <?php $add = "http://localhost/eclipse/project2/index.php/Home/Edit/add"; ?>
</head>
<body style="background-color: #FBF4F4; height: 1000px">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 style="font-weight: 100" align="center">d加</h2>
            <br>
            <hr style="height:1px;border:none;border-top:1px solid #555555;" />
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-md-3" style="background-color: #FBF4F4">
                </div>
                <div class="col-md-6">
                    <form action=<?php echo ($add); ?> method="post" style= "margin-left:50px" >
                        <img src="" height="200px" >
                        <input type='file' id='appFile' name='appFile' />
                        <br/>
                        <input type='button' class='appFile' name='appFile' value='上传'/>
                        <br>
                        <br>
                        <br>
                        <input class="form-control" name="title" placeholder="标题">
                        <br>
                        <br>
                        <br>
                        <p>
                            <button type="submit" class="btn btn-default">保存</button>
                        </p>
                    </form>
                </div>
                <div class="col-md-3" style="background-color: #FBF4F4">
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>