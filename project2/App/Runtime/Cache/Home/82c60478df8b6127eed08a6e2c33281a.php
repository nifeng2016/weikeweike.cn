<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $url2="http://".C('URLSET')."/index.php/Home/BBS/Creat1Next"; ?>
    <meta charset="UTF-8">
    <title>pull_Topic</title>

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
<body style="background-color: #EDF2F1;height:800px">
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <br>
            <form method="post" action=<?php echo ($url2); ?>>
                <div class="form-group">
                    <label for="p_title" class="sr-only">发表话题</label>
                    <input type="text" name="title" class="form-control" id="p_title" placeholder="话题名称">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="editor">text-main</label>
                    <textarea id="editor" name="editor" placeholder="在这里输入内容" autofocus></textarea>
                    <script type="text/javascript">
                        var editor = new Simditor({
                            textarea: $('#editor')
                        });
                    </script>
                    <!--<textarea rows="8" class="form-control" id="text_main" placeholder="在此处键入正文"></textarea>-->
                </div>

                <div class="row">
                    <div class="col-md-1 col-md-offset-10">
                        <button type="submit" class="btn btn-default btn-sm">提交</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>