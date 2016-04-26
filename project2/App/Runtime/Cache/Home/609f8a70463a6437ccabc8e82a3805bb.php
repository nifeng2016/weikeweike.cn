<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
        <link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2//public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2//public/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="http://localhost/eclipse/project2//public/jquery/jquery-2.1.4.min.js">
    </script>
    <script type="text/javascript" src="http://localhost/eclipse/project2//public/jquery/ajaxfileupload.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".appFile").click(function(){
                var cl=$(this);
                if($(this).prev().val() == ""){
                    alert("请选择上传的文件!");
                }
                else{
                    $.ajaxFileUpload
                    (
                            {
                                url: "http://localhost/eclipse/project2//index.php/Home/History/UploadIMG",
                                type: "POST",
                                secureuri:false,
                                dataType: 'text',
                                data:{imagename:cl.prev().attr('id')},
                                fileElementId:cl.prev().attr('id'),
                                success: function (data, status)
                                {
                                    if(data=="0")
                                        alert("上传图片格式不合法！")
                                    else{
                                        alert(data);
                                        cl.prev().prev().prev().attr('src',data);
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
    <script language="javascript">
    //    var textobj=document.getElementById('des');
	//        textobj.innerHTML="<?php echo ($data[0]['text']); ?>";
    //  textobj.innerHTML="123321";
    </script>
	<?php  $url1="http://".C('URLSET')."/index.php/Home/History/changein?id=".$data[0]['id']; $url2="http://".C('URLSET')."/public/hist/".$data[0]['src']; ?>
	
</head>
<body style="background-color: #EDF2F1">
    <div class="container">
        <div class="row">
            <h2 align="center">更改信息</h2>
            <br>
            <br>
            <hr style="height:1px;border:none;border-top:1px solid #555555;" />
            <br>
            <br>
            <br>
            <form class=" col-xs-offset-2 form-horizontal" action=<?php echo ($url1); ?> method="post">
                <div class="col-xs-offset-3">
                    <img id='img' src='' width='180px' height='192px'/>

                    <input type='file' id='appFile' name='appFile' />
                    <br/>
                    <input type='button' class='appFile' name='appFile' value='上传'/>
                </div>
                <br>
                <br>
                <br>

                <div class="form-group">
                    <label for="name" class="col-xs-2 control-label">姓名:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo ($data[0]['name']); ?>"
                        disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="qq" class="col-xs-2 control-label">QQ:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="qq" name="qq" value="<?php echo ($data[0]['qq']); ?>" >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email" class="col-xs-2 control-label">E-mail:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo ($data[0]['email']); ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="des" class="col-xs-2 control-label"><p align="right">个人简介: </p></label>
                    <div class="col-sm-8">
                        <textarea rows="3"  class="form-control" id="des" name="text"><?php echo ($data[0]['text']); ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <br>
                    <br>
                    <div class="col-xs-offset-4 col-xs-4">
                        <button type="submit" class="btn btn-default">更改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>