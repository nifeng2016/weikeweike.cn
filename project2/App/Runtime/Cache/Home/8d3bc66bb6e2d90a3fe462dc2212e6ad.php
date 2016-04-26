<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2//public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2//public/js/bootstrap.min.js"></script>
    <?php $back="http://".C('URLSET')."/index.php/Home/AboutUs/index"; ?>
</head>

<body style="background-color: #F1F9EE">
    <div class="container" style="background-color: #F1F9EE">
        <h2 align="center" style="font-weight: 100">
           <?php echo ($det['title']); ?>
        </h2>

        <br>
        <br>
        <div class="row">
            <div class="col-md-2 col-md-offset-8">
                <h4 align="right" style="font-weight: 100">
                    发布日期:
                </h4>
            </div>
            <div class="col-md-2">
                <h4 style="font-weight: 200">
                    <?php echo ($det['date']); ?>
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-8">
                <h4 align="right" style="font-weight: 100">
                    发布人:
                </h4>
            </div>
            <div class="col-md-2">
                <h4 style="font-weight: 200">
                    <?php echo ($det['publisher']); ?>
                </h4>
            </div>
        </div>
        <br>
        <div class="row " style="height: 800px; background-color: chartreuse">
            <div class="col-sm-2" style="height: 800px; background-color: #FBF4F4"></div>
            <div class="col-sm-8" style="height: 800px; background-color: #FBF4F4">
                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">招聘职位: </h4>
                    </div>
                    <div class="col-sm-9">
                        <h4 style="font-weight: 100">
                            <?php echo ($det['position']); ?>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">待遇: </h4>
                    </div>
                    <div class="col-sm-9">
                        <h4 style="font-weight: 200">
                            <?php echo ($det['salary']); ?>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">工作地点: </h4>
                    </div>
                    <div class="col-sm-9">
                        <h4 style="font-weight: 100">
                            <?php echo ($det['place']); ?>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">职位简介: </h4>
                    </div>
                    <div class="col-sm-9">
                        <p style="font-weight: 100; line-height: 30px;">
                            <?php echo ($det['posdes']); ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">工作要求: </h4>
                    </div>
                    <div class="col-sm-9">
                        <p style="font-weight: 100; line-height: 30px;">
                            <?php echo ($det['work']); ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">工作单位简介: </h4>
                    </div>
                    <div class="col-sm-9">
                        <p style="font-weight: 100; line-height: 30px;">
                            <?php echo ($det['offides']); ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">联系人: </h4>
                    </div>
                    <div class="col-sm-9">
                        <h4 style="font-weight: 100">
                            <?php echo ($det['boss']); ?>
                        </h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <h4 align="right">联系方式: </h4>
                    </div>
                    <div class="col-sm-9">
                        <h4 style="font-weight: 200">
                            <?php echo ($det['tools']); ?>
                        </h4>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h4 align="center" style="font-weight: 100">
                    <a href=<?php echo ($back); ?>>返回</a>
                </h4>
            </div>
            <div class="col-sm-2" style="height: 800px; background-color: #FBF4F4"></div>
            </div>

    </div>
</body>
</html>