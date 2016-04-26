<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
	<link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2//public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2//public/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #FBF4F4">
<div class="container">
    <div class="row">
        <h2 align="center" style="font-weight: 100">编辑</h2>
        <br>
        <br>
        <hr style="height:1px;border:none;border-top:1px solid #555555;" />
        <br>
        <br>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php $save = "http://localhost/eclipse/project2/index.php/Home/Text/save"; ?>
            <form method="post" action=<?php echo ($save); ?>>
            <textarea rows="6" type="text" class="form-control" name="text"><?php echo ($text); ?></textarea>
            <br>
            <br>
                <div align="center">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>

    </div>
</div>
</body>
</html>