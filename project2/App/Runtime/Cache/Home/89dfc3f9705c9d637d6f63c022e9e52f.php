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
                    <?php dump($root); if ($root != NULL and $root == 0) { $des = "http://localhost/eclipse/project2/index.php/Home/AboutUs/inEditDes"; ?>

                    <a href=<?php echo ($des); ?>><h4 align="right" >编辑</h4></a>
                    <br>
                    <?php } ?>
                    <?php echo $DES; ?>
                </div>
                <div class="tab-pane fade" id="b" style="background-color: #F1F9EE; height: 1000px">
                    <br>
                    <h4 align="right" style="font-weight: 100">
                        <?php if ($root != NULL and $root == 0) { ?>
                        <a href=<?php echo ($Post); ?>>发布招聘</a><?php } ?>
                    </h4>

                    <table class="table">
                        <thead>
                        <tr>

                            <td class="col-sm-6">标题</td>
                            <td class="col-sm-3">发布日期</td>
                            <td class="col-sm-2">发布人</td>
                            <?php if ($root != NULL and $root == 0) { ?>
                            <td class="col-sm-2">管理</td><?php } ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($hr_select)): $i = 0; $__LIST__ = $hr_select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hr_select): $mod = ($i % 2 );++$i; $detail="http://".C('URLSET')."/index.php/Home/HR/detail?id=".$hr_select['id']; $delete="http://".C('URLSET')."/index.php/Home/HR/delete?id=".$hr_select['id']; ?>
                            <tr>
                                <td><a href=<?php echo ($detail); ?>><?php echo ($hr_select['title']); ?></a></td>
                                <td><?php echo ($hr_select['date']); ?></td>
                                <td><?php echo ($hr_select['publisher']); ?></td>
                                <?php if ($root != NULL and $root == 0) { ?>
                                <td><a href=<?php echo ($delete); ?>>删除</a></td><?php } ?>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                        <tr>

                            <td colspan="3" >
                                <br>
                                <br>
                                <div class="pages" align="justify">
                                    <?php echo ($hr_page); ?>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>