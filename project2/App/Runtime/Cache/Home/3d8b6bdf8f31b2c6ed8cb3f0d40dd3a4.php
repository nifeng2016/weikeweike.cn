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
    
    <link rel="stylesheet" type="text/css" href="http://localhost/dev/simditor/styles/simditor.css" />

    <script type="text/javascript" src="http://localhost/eclipse/project2/public/simditor-2.3.6/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/eclipse/project2/public/simditor-2.3.6/scripts/module.js"></script>
    <script type="text/javascript" src="http://localhost/eclipse/project2/public/simditor-2.3.6/scripts/hotkeys.js"></script>
    <script type="text/javascript" src="http://localhost/eclipse/project2/public/simditor-2.3.6/scripts/uploader.js"></script>
    <script type="text/javascript" src="http://localhost/eclipse/project2/public/simditor-2.3.6/scripts/simditor.js"></script>

</head>
<body style="background-color: #FBF4F4">
<br>

<div class="container" >
    <div class="row">

        <div class="col-md-3">
            <h2 style="font-weight: 100">增值服务</h2>
            <br>
        </div>
    </div>
    <div class="row"  style="height: 1000px; background-color: #F1F9EE">
        <div class="col-md-3">
            <ul id="myTab" class="nav nav-tabs nav-stacked" style="background-color: #BCC1C7; height: 1000px;">
                <li class="active"><a href="#a" data-toggle="tab">职称查询</a></li>
                <li><a href="#b" data-toggle="tab">问卷调查</a></li>
            </ul>
        </div>
        <div class="col-md-9" style="height: 1000px">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="a" style="background-color: #F1F9EE; height: 1000px">
					
                    <br>
                    <?php if ($root != NULL and $root == 0) { $des = "http://localhost/eclipse/project2/index.php/Home/ZZFW/EditZC"; ?>

                    <a href=<?php echo ($des); ?>><h4 align="right" >编辑</h4></a>
                    <br>
                    <?php } ?>
                    <?php echo $zz_content; ?>
                </div>
                <div class="tab-pane fade" id="b" style="background-color: #F1F9EE; height: 1000px">
                <?php $url10="http://".C('URLSET')."/index.php/Home/Questionnaire/Make"; ?>
                   <br><h4  style="font-weight:100" align="right"><a href=<?php echo ($url10); ?>>发布问卷</a></h4>
                   <br>
                   <div class="row">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="col-md-6">标题</th>
                    <th class="col-md-2">发布者</th>
                    <th class="col-md-2">查看结果</th>
                    <th class="col-md-2">删除</th>
                </tr>
                </thead>
                <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <?php $urlr="http://".C('URLSET')."/index.php/Home/Questionnaire/ViewR?id=".$vo['id']; $urlq="http://".C('URLSET')."/index.php/Home/Questionnaire/ViewQ?id=".$vo['id']; ?>
                                <td ><a href=<?php echo ($urlq); ?>><?php echo ($vo['name']); ?></a></td>
                                <td ><?php echo ($vo['username']); ?></td>
                                <td ><a href=<?php echo ($urlr); ?>>结果统计</a></td>
                                <td>
                                    <?php if($vo['username']==$username||$root=='0'){ $url2="http://".C('URLSET')."/index.php/Home/Questionnaire/Delete?id=".$vo['id']; ?>
                                    <a href=<?php echo ($url2); ?>>删除问卷</a>
                                        <?php } ?>
                                </td>   
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr >
                          <!--<td colspan="3" >&nbsp;<?php echo ($page); ?></td>-->
                             <td colspan="3" >
                            <div align="center">
                            	<?php $more = "http://localhost/eclipse/project2/index.php/Home/Questionnaire/view"; ?>
                                  <a href=<?php echo ($more); ?>>More</a>
                            </div></td>  
                        </tr>
                  </tbody>
            </table>
        </div>
        
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>