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
            <h2 style="font-weight: 100">关于我们</h2>
            <br>
        </div>
    </div>
    <div class="row"  style="height: 1000px; background-color: #F1F9EE">
        <div class="col-md-3">
            <ul id="myTab" class="nav nav-tabs nav-stacked" style="background-color: #BCC1C7; height: 1000px;">
                <li class="active"><a href="#a" data-toggle="tab">简介</a></li>
                <li><a href="#b" data-toggle="tab">人才招聘</a></li>
                <li><a href="#c" data-toggle="tab">功勋墙</a></li>
                <li><a href="#d" data-toggle="tab">联系我们</a></li>
            </ul>
        </div>
        <div class="col-md-9" style="height: 1000px">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="a" style="background-color: #F1F9EE; height: 1000px">
                    
                        <br>
                        <?php if ($root != NULL and $root == 0) { $des = "http://localhost/eclipse/project2/index.php/Home/AboutUs/inEditDes"; ?>
                        		
                        		<a href=<?php echo ($des); ?>><h4 align="right" >编辑</h4></a>
                        		<br>
                        	<?php } ?>
                    <!-- <form action="#">
                        <textarea id="editor" placeholder="这里输入内容" autofocus></textarea>
                        <script>
                            var editor = new Simditor({
                                textarea: $('#editor')
                            });
                        </script>
                        <br>
                        <button class="btn btn-default" type="submit">提交</button>
                    </form> -->
                    <?php echo $DES; ?>
                </div>
                <div class="tab-pane fade" id="b" style="background-color: #F1F9EE; height: 1000px">
                	<?php $Post="http://".C('URLSET')."/index.php/Home/HR/post"; ?>
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
					            	            <?php $more = "http://localhost/eclipse/project2/index.php/Home/HR/index"; ?>
					            	            <p align="right"><a href=<?php echo ($more); ?>>More</a></p>
					            	    </div>
					            	</td>  
					            </tr>
					
					        </tbody>
					    </table>
					    
					
                </div>
                <div class="tab-pane fade" id="c" style="background-color: #F1F9EE; height: 1000px">
                	
				        <div class="row">
				            <div class="col-xs-12">
				              	<h4 align="right" style="font-weight: 100">
						        <?php $url="http://".C('URLSET')."/index.php/Home/History/add"; $more="http://".C('URLSET')."/index.php/Home/History/index" ?>
						        <a href=<?php echo ($more); ?>>更多</a>&nbsp;&nbsp;
						        <?php if ($root != NULL and $root == 0) { ?>
						          <a href="<?php echo ($url); ?>">添加</a><?php } ?>
						        </h4>
				               <?php if(is_array($hs_data)): $i = 0; $__LIST__ = $hs_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $image = $vo['src']; $url2="http://".C('URLSET')."/index.php/Home/History/change?id=".$vo['id']; $url3="http://".C('URLSET')."/index.php/Home/History/delete?id=".$vo['id']; ?>
				   
				                  <div class="panel panel-default" style="">
				                      <div class="panel-heading">
				                          <h4><?php echo ($vo['name']); ?></h4>
				                      </div>
				                      <div class="panel-body" style="background-color:#f8f8f8">
				                         <div class="row">
				                             <div class="col-xs-5">
				                                 <img src=<?php echo ($image); ?> width="260px">
				                             </div>
				                             <div class="col-xs-7">
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
				                          <?php if ($root != NULL and $root == 0) { ?>
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
				        
				    
                </div>
                <div class="tab-pane fade" id="d" style="background-color: #F1F9EE; height: 1000px">
                	  
                        <br>
                        <?php if ($root != NULL and $root == 0) { $des = "http://localhost/eclipse/project2/index.php/Home/AboutUs/inEditConn"; ?>
                        		
                        		<a href=<?php echo ($des); ?>><h4 align="right" >编辑</h4></a>
                        		<br>
                        	<?php } ?>
                    <?php echo $CONN; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>