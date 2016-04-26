<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="http://localhost/eclipse/project2/public/css/bootstrap.min.css" rel="stylesheet">
  	<script src="http://localhost/eclipse/project2/public/jquery/jquery-2.2.0.js"></script>
  	<script src="http://localhost/eclipse/project2/public/js/bootstrap.min.js"></script>
	<?php $url2 = "http://".C('URLSET')."/index.php/Home/Video/uploadcls?name=".$lname; $url8 = "http://".C('URLSET')."/index.php/Home/Video/uploadappends?name=".$lname; $url5 = "http://".C('URLSET')."/index.php/Home/Video/index"; $up = "http://".C('URLSET')."/index.php/Home/Video/UpVideo?idx=".$idx."&lname=".$lname; $down = "http://".C('URLSET')."/index.php/Home/Video/DownVideo?idx=".$idx."&lname=".$lname; ?>
	<style type="text/css">
		.pages a,.pages span {
		    display:inline-block;
		    padding:2px 5px;
		    margin:0 1px;
		    border:1px solid #f0f0f0;
		    -webkit-border-radius:3px;
		    -moz-border-radius:3px;
		    border-radius:3px;
		}
		.pages a,.pages li {
		    display:inline-block;
		    list-style: none;
		    text-decoration:none; color:#58A0D3;
		}
		.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
		    margin:0;
		}
		.pages a:hover{
		    border-color:#50A8E6;
		}
		.pages span.current{
		    background:#50A8E6;
		    color:#FFF;
		    font-weight:700;
		    border-color:#50A8E6;
		}
	</style>
</head>
<body style="background-color: #F1F9EE">
<h2 align="center">
	hhh<?php echo $idx; ?>
	ahhhh
</h2>
<div class="container" style="background-color: #F1F9EE">
    <br>
    <br>
    <h4 align="right" style="font-weight: 100"><a href=<?php echo ($url5); ?>>返回课程选择页面</a></h4>
    <hr style="height:1px;border:none;border-top:1px solid #555555;" />
    <div class="row">
        <div class="col-md-1" style=" height :480px">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p><a href=<?php echo ($up); ?>>上一节</a></p>
        </div>
        <div class="col-md-10" style="height :480px;background-color: #F1F9EE" >
            <video src=<?php echo ($urlvideo); ?> width="100%" height="480px" controls="controls" >
            </video>
        </div>

        <div class="col-md-1" style="height :480px">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p><a href=<?php echo ($down); ?>>下一节</a></p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-4" style="background-color: #BAAFC9">

            <h4>上传视频</h4>
            <form action=<?php echo ($url2); ?> method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="className" class="control-label"><h4 style="font-weight: 100">课程名称:</h4></label>
                    <input type="text" class="form-control" name="vname" id="className" />
                    <br>
                    <input type="file" class="form-control" name="appends" />
                    <br>
                    <input type="submit" class="btn" value="提交" >
                </div>
            </form>
            <br>
            <br>
            <br>
            <h4>上传附件</h4>
            <form action=<?php echo ($url8); ?> method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fileName" class="control-label"><h4 style="font-weight: 100">附件名称:</h4></label>
                    <input type="text" class="form-control" name="vname" id="fileName" />
                    <br>
                    <input type="file" class="form-control" name="appends" />
                    <br>
                    <input type="submit" class="btn" value="提交" >
                </div>
            </form>
        </div>
        <div class="col-md-8" style="background-color: #EDF2F1; height: 540px;" >
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="col-md-5"><h4>课程目录</h4></th>
                </tr>
                </thead>
                <tbody>
                
                <?php if(is_array($select)): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): $mod = ($i % 2 );++$i;?><li style="list-style: none">
                        <?php $url1 = $video['url']; $url3 = "http://".C('URLSET')."/index.php/Home/Video/PlayVideo?url=".$url1."&num=".$num; $num ++; $fname = "第".$num."节：  ".$video['name']; ?>
                        <tr><td><h4 style="font-weight: 200"><a href=<?php echo ($url3); ?>><?php echo ($fname); ?></a></h4></td></tr>   
                    </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                <tr><td>  
                <div class="pages" align="center">
                  <?php echo ($page); ?>
                </div>
                </td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <br>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th class="col-md-8">文件名</th>
                <th class="col-md-4">操作</th>
            </tr>
            </thead>
            <tbody>
            	<?php if(is_array($select2)): $i = 0; $__LIST__ = $select2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$select2): $mod = ($i % 2 );++$i;?><tr>
                    <td >&nbsp;<?php echo ($select2['name']); ?></td>
					<td >&nbsp;
                   		<a href = <?php echo ($select2["url"]); ?> >下载 </a> &nbsp;
                   		<?php $url2 = "http://".C('URLSET')."/index.php/Home/Video/delete_file?id=".$select2['id'];if($root=="0"){ ?>
                   		<a href="<?php echo ($url2); ?>">删除</a>
                   
                   		<?php } ?>
                	</td>	
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr >
                  <!--<td colspan="3" >&nbsp;<?php echo ($page); ?></td>-->
           		     <td colspan="3" >
            	    <div class="pages" align="center">
            	            <?php echo ($page2); ?>
            	    </div>
            	    </td>  
            	</tr>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>