<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bbs</title>
    <link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2//public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2//public/js/bootstrap.min.js"></script>

    <style>
        .bbs-main-profile [class*="col-"]{
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: #eee;
            background-color: rgba(86,61,124,.15);
            border: 1px solid #ddd;
            border: 1px solid rgba(86,61,125,.2);
            text-overflow: ellipsis;
        }
        .bbs-main-profile .row:hover{
            background: #ddd;
        }
        .bbs-main-profile .col_inblock {
            float:left;
        }
        .bbs-main-bottom {
            font-size: 0.8em;;
        }
        .bbs-main-bottom [class*="col-"]{
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .bbs-main-top .row{
            padding-top: 10px;;
            padding-bottom: 10px;
        }
    </style>
    <?php $url1="http://".C('URLSET')."/index.php/Home/Main/Maindown"; $url2="http://".C('URLSET')."/index.php/Home/BBS/Creat1"; ?>

</head>
<body style="background-color:#EDF2F1; height:800px">
    <div class="container">
        <br><br><br>
        <div class="bbs-main-top">
            <div class="row">
                <div class="col-md-1">
                    <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='http://localhost/eclipse/project2/index.php/Home/BBS/Creat1';">发表新帖</button>
                </div>
                <div class="col-md-2 col-md-offset-7">
                    
                </div>
                <div class="col-md-2">
                    <h6 style="text-align: center">本论坛访问量：<b>$sign</b></h6>
                </div>
            </div>
        </div>
        <div class="bbs-main-profile">
            <div class="row" id="bbs-nav-main">
                <div class="col-md-5">标题</div>
                <div class="col-md-2">作者</div>
                <div class="col-md-2">回复&nbsp;/&nbsp;查看</div>
                <div class="col-md-2">最后回复</div>
                <?php if($vo['username']==$username||$root=="0") echo "<div class='col-md-1'>删除</div> "; ?>
            </div>

            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $url3="http://".C('URLSET')."/index.php/Home/BBS/Creat2?id=".$vo['id']; $url4="http://".C('URLSET')."/index.php/Home/BBS/Delete2?id=".$vo['id']; ?>
                <div class="row">
                    <div class="col-md-5"><a href=<?php echo ($url3); ?>><?php echo ($vo['title']); ?></a></div>
                    <div class="col-md-2">
                        <div class="col_inblock"><?php echo ($vo['username']); ?></div>
                        
                    </div>
                    <div class="col-md-2"><?php echo ($vo['reply']); ?>&nbsp;/&nbsp;<?php echo ($vo['view']); ?></div>
                    <div class="col-md-2">
                        <div class="col_inblock"><small><?php echo ($vo['lasttime']); ?></small></div>
                    </div>
                    <div class="col-md-1">
                        <?php if($vo['username']==$username||$root=="0") echo "<div class='col_inblock'><a href='$url4'>删除</a></div>"; ?>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>


        </div>
        <br />
        <div class="bbs-main-bottom">
            <div class="row">
                <div align="center">
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>