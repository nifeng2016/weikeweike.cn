<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="最小高度,min-height,CSS hack" />
    <meta http-equiv="Description" content="最小高度可以设定一个BOX的最小高度，当其内
容较少时时，也能保持BOX的高度为一定ext)" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="author" content="forestgan" />
    <meta name="copyright" content="http://www.jb51.net" />
    <title>CSS布局中最小高度（min-height）</title>
    <style type="text/css">
        #wrap{
            /*width: 620px;*/
            /* margin: 2em auto; */
            font-size: 75%;}
        div.box10,div.box20{
            /*width: 300px;*/
            min-height: 800px;
            background: #EEE;
            /* margin-right: 20px;
             *//* float: left;
            text-align:left; */
        }
        p{padding: 1em; margin: 0;}
    </style>
    <?php $url="http://".C('URLSET')."/index.php/Home/History/add"; ?>
    <link href="http://localhost/eclipse/project2//public/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://localhost/eclipse/project2//public/jquery/jquery-2.2.0.js"></script>
    <script src="http://localhost/eclipse/project2//public/js/bootstrap.min.js"></script>

</head>
<body>
  <div id="wrap">
    <div class="box10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              	<br>
              	<br>
              	<br>
              	<br>
              	<br>
               <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $image = $vo['src']; $url2="http://".C('URLSET')."/index.php/Home/History/change?id=".$vo['id']; $url3="http://".C('URLSET')."/index.php/Home/History/delete?id=".$vo['id']; ?>
   
                  <div class="panel panel-default" style="">
                      <div class="panel-heading">
                          <h4><?php echo ($vo['name']); ?></h4>
                      </div>
                      <div class="panel-body" style="background-color:#f8f8f8">
                         <div class="row">
                             <div class="col-md-5">
                                 <img src=<?php echo ($image); ?> width="360px">
                             </div>
                             <div class="col-md-7">
                                  <!-- 王中昊是一个功臣,他为本网站的完成做出了卓越的贡献,他本人也是一个非常高产的工程师,他大一的时候曾经带领两个队友代表中山大学成功拿到ACM世界一等奖,
                                  大二的时候清华大学老师恳求他转入清华,承诺给他100w,但是被他毅然回绝,说:"我是中大国防,我骄傲!"之后成为中山大学广为流传的佳话!这个网站他做了三天,
                                  第一天睡了一天寻找灵感和思路;第二天烦躁觉得无聊订了英国的往返机票,到英国机场喂鸽子,然后再飞回来;回到寝室已到深夜,但是他想起他肩负的使命,他是要当火影
                                  和海贼王的男人,于是干劲十足的上床睡觉了,醒来的时候已经是第三天下午五点钟,他悠闲去吃了一碗猪脚饭,因为猪脚太少对老板大打出手,气魄和威猛可见一斑!回到寝室
                                  发现没时间写网站,就去淘宝花250块买了炉石40卡包.老板赠送了他一个网站,就是现在你们访问的!<br>
                                  神的世界你们不懂,传奇的人生不需要解释.... -->
                                  <h4><?php echo ($vo['text']); ?></h4>                                 <!-- 简介 -->
                             </div>
                         </div>
                      </div>
                      <div class="panel-footer" style="background-color:#f8f8f8">
                          <h4 style="font-weight:200">QQ:     <?php echo ($vo['qq']); ?></h4>
                          <h4 style="font-weight:200">E-mail: <?php echo ($vo['email']); ?></h4>
                          <?php if($root==0){ ?>
								<h4><a href='<?php echo ($url2); ?>'>修改</a> &nbsp;<a href='<?php echo ($url3); ?>'>删除</a></h4>
						  <?php } ?>
                      </div> 
                  </div><?php endforeach; endif; else: echo "" ;endif; ?> 
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <h4 align="center" style="font-weight: 100">
        <?php if($root==0){ ?>
          <a href="<?php echo ($url); ?>">添加</a><?php } ?>
        </h4>
    </div>
	</div>
  </div>
</body>
</html>