<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert title here</title>

    <link href="http://localhost/eclipse/project2/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2/public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2/public/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F1F9EE; height:1000px">
    <br>
    <div class="container">
        <h3 style="font-weight: 100">课程:</h3>
        <br>
        <table class="table">
            <thead>
                <th class="col-sm-4">课程名称</th>
                <th class="col-sm-8">课程描述</th>
            </thead>
            <tbody>
                <?php if(is_array($datavideos)): $i = 0; $__LIST__ = $datavideos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $href="http://".C('URLSET')."/index.php/Home/Video/ShowVideo?id=".$vo['id'] ?>
                    <tr>
                        <td>
                            <a href=<?php echo ($href); ?>><?php echo ($vo['name']); ?></a>
                        </td>
                        <td>
                            <?php echo ($vo['descpt']); ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <br>
        <h3 style="font-weight: 100">人才招聘:</h3>
        <br>
        <table class="table">
            <thead>
                <th class="col-sm-6">标题</th>
                <th class="col-sm-3">发布时期</th>
                <th class="col-sm-3">发布者</th>
            </thead>
            <tbody>
                <?php if(is_array($datahr)): $i = 0; $__LIST__ = $datahr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $href="http://".C('URLSET')."/index.php/Home/HR/detail?id=".$vo['id'] ?>
                    <tr>
                        <td><a href=<?php echo ($href); ?>><?php echo ($vo['title']); ?></a></td>
                        <td><?php echo ($vo['date']); ?></td>
                        <td><?php echo ($vo['publisher']); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <h3 style="font-weight: 100">最新动态:</h3>
        <br>
        <table class="table">
            <thead>
            <th class="col-sm-4">标题</th>
            <th class="col-sm-8">发布时间</th>
            </thead>
            <tbody>
                <?php if($datadt1){ ?>
                <?php if(is_array($datadt1)): $i = 0; $__LIST__ = $datadt1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $href="http://".C('URLSET')."/index.php/Home/DongTai/detail?id=".$vo['id'] ?>
                    <tr>
                        <td><a href=<?php echo ($href); ?>><?php echo ($vo['title']); ?></a></td>
                        <td><?php echo ($vo['time']); ?></td>

                    </tr><?php endforeach; endif; else: echo "" ;endif; }if($dt1add){ ?>
                <?php if(is_array($dt1add)): $i = 0; $__LIST__ = $dt1add;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; $href="http://".C('URLSET')."/index.php/Home/DongTai/detail?id=".$vo1['id'] ?>
                    <tr>
                        <td><a href=<?php echo ($href); ?>><?php echo ($vo1['title']); ?></a></td>
                        <td><?php echo ($vo1['time']); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; } ?>
            </tbody>
        </table>

        <br>

        <h3 style="font-weight: 100">行业资讯:</h3>
        <br>
        <table class="table">
            <thead>
            <th class="col-sm-4">标题</th>
            <th class="col-sm-8">发布时间</th>
            </thead>
            <tbody>
            <?php if($datahy1){ ?>
            <?php if(is_array($datahy1)): $i = 0; $__LIST__ = $datahy1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $href="http://".C('URLSET')."/index.php/Home/HangYe/detail?id=".$vo['id'] ?>
                <tr>
                    <td><a href=<?php echo ($href); ?>><?php echo ($vo['title']); ?></a></td>
                    <td><?php echo ($vo['time']); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; }if($hy1add){ ?>
            <?php if(is_array($hy1add)): $i = 0; $__LIST__ = $hy1add;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; $href="http://".C('URLSET')."/index.php/Home/HangYe/detail?id=".$vo1['id'] ?>
                <tr>
                    <td><a href=<?php echo ($href); ?>><?php echo ($vo1['title']); ?></a></td>
                    <td><?php echo ($vo1['time']); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; } ?>
            </tbody>
        </table>

        <br>
    </div>
</body>
</html>