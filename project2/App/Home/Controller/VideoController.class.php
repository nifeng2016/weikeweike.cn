<?php
namespace Home\Controller;
use Think\Controller;
class VideoController extends Controller {
	public function index() {//课程主页函数
		//$this->judge();
		//echo "hello index";
		$this->Showlecture();
		//$this->display('Videos/class');
	}
	
	public function Showlecture() {//显示课程主页lecture列表
		//$this->judge();
		$lec = M('lecture');
		$count = $lec->count();
		$p     = getpage($count, 10);
		$where['NAME'] != '';
		$list  = $lec->where($where)->limit($p->firstRow, $p->listRows)->select();
		//dump($list);
		$this->assign('select', $list);
		$this->assign('page', $p->show());
		$num = 0;
		unset($where);
		$where['ID']=$_SESSION['id'];
		$date=M('user')->where($where)->select();
		$username = $date[0]['username'];
		unset($where);
		$where['USERNAME']=$username;
		$userlectureid = M('userlecture')->where($where)->field('ID')->select();
		$this->assign('userlectureid',$userlectureid);
		//dump($p->show());
		$this->display('Videos/class');
	}
	
	public function ShowVideo($id) {//显示每个lecture的videos
		$this->judge();
		
		$this->assign('lid', $id);
		
		$uid = $_SESSION['id'];
		$where['UID'] = $uid;
		$where['LID'] = $id;
		$data=M('vu')->where($where)->select();
		if ($data == NULL) {
			$add = array(
				'UID' => $uid,
				'LID' => $id	
			);
			M('vu')->add($add);
		}
		unset($where);
		
		$l               = M('lecture');
		$where['ID']     = $id;
		$_SESSION['LID'] = $id;
		$lec_name        = $l->where($where)->getField('NAME');
		$lec_info        = $l->where($where)->select();
		$video           = M('videos');
		$where1['LEC']   = $lec_name;
	
		//课程列表
		$count         = $video->where($where1)->count();
		$p             = getpage($count, 5);
		$list          = $video->where($where1)->limit($p->firstRow, $p->listRows)->select();
	
		
		//var_dump($list);
	
		//课程：
		$this->assign('select', $list);
		$this->assign('page', $p->show());
	
		$this->assign('info', $lec_info[0]);
		
		unset($where1);
		unset($where);
		$where1['ID']     = $id;
		$where['CLASS'] = $l->where($where1)->getField('CLASS');
		$xg = $l->where($where)->select();
		$xg_arr = array();
		$cnt = 0;
		foreach ($xg as $data) {
			if ($data['id'] != $id && $cnt <3) {
				$a = array(
					'name' => $data['name'],
					'url'  => 'http://localhost/eclipse/project2/index.php/Home/Video/ShowVideo?id='.$data['id']
				);
				$xg_arr[$cnt] = $a;
				$cnt ++;
			}
		}
		//dump($where);
		
		$this->assign('xg', $xg_arr);
		//idx:
		$idx = 0;
		$this->assign('idx', $idx);
	
		$this->assign('lname',$lec_name);
		$this->assign('urlvideo',$list[0]['url']);
		
		//dump($list);
		unset($where);
		$where['LID'] = $id;
		$comment = M('leccom')->where($where)->select();
		$this->assign('comment', $comment);
		
		
		
		
		$num = 0;
		$this->display('Videos/classdetail');
	
	}
	
	
	public function SelectVideo($class) {
		
		$c;
		if ($class == 1) {	$c = '汽车维修';}
		if ($class == 2) {	$c = '电子技术';}
		if ($class == 3) {	$c = '机器人';}
		if ($class == 4) {	$c = '哲学';}
		if ($class == 5) {	$c = '医学';}
		
		
		$lec = M('lecture');
		if ($class == 0) {
			$where['ID'] != '';
		} else {
			$where['CLASS'] = $c;
		}
		
		$count = $lec->where($where)->count();
		$p     = getpage($count, 10);
		
		$list  = $lec->where($where)->limit($p->firstRow, $p->listRows)->select();
		//dump($c);
		//dump($list);
		$this->assign('select', $list);
		$this->assign('page', $p->show());
		$num = 0;
		unset($where);
		$where['ID']=$_SESSION['id'];
		$date=M('user')->where($where)->select();
		$username = $date[0]['username'];
		unset($where);
		$where['USERNAME']=$username;
		$userlectureid = M('userlecture')->where($where)->field('ID')->select();
		$this->assign('userlectureid',$userlectureid);
		//dump($p->show());
		$this->display('Videos/class');
		
	}
	
	
	
	
	
	public function PlayVideo($url, $num) {//播放每一节课
		$this->judge();
				
		$url_video = $url;
		$this->assign('url_video',$url);
		$videos = M('videos');
		$where['URL'] = $url_video;
		$lec = $videos->where($where)->getField('LEC');
		$lname = $videos->where($where)->getField('NAME');
	
		//$where1['LEC'] = $lec;
		//$list = $videos->where($where1)->order('id')->select();
		//$count = $videos->where($where1)->count();
	
		$idx   = $num;
	
		//要传入前端的参数
		$this->assign('idx',$idx);
		//$this->assign('lname',$lname);
		$this->assign('url_video',$url);
		/*****************************************************/
		$findIdByLec = M('lecture');
		$where['NAME'] = $lec;
		$id = $findIdByLec->where($where)->getField('ID');
		
		
		
		
		$l               = M('lecture');
		$where['ID']     = $id;
		$_SESSION['LID'] = $id;
		$lec_name        = $l->where($where)->getField('NAME');
		$lec_info        = $l->where($where)->select();
		$video           = M('videos');
		$where1['LEC']   = $lec_name;
		
		//课程列表
		$count         = $video->where($where1)->count();
		$p             = getpage($count, 5);
		$list          = $video->where($where1)->limit($p->firstRow, $p->listRows)->select();
		
		
		//var_dump($video);
		//dump($lec_info);
		//课程：
		$this->assign('select', $list);
		$this->assign('page', $p->show());
		
		
		$this->assign('info', $lec_info[0]);
		
		$this->assign('lname',$lec_name);
		$this->assign('urlvideo',$url);
		
		//dump($description);
		//$num = 0;
		
		$this->display('/Videos/classdetail');
	}
	
	public function Uploadtotal(){//渲染添加lecture的html页面
		//echo "hello";
		$this->judge();
		$this->display('Videos/uploadclass');
	}
	
	public function uploadcls($name){//上传一小节课程
		$this->judge();
		var_dump($name);
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0 ;// 设置附件上传大小
		$upload->exts      =     array();// 设置附件上传类型
		$upload->rootPath  =     'public/videos/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		//$upload->saveName  =     '';
		// 上传文件
		//$upload->saveName  =     iconv('gb2312', 'utf8', $upload->saveName );
		 
		$info   =   $upload->upload();
		//var_dump($upload->saveName);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			$this->success('上传成功！');
			foreach($info as $file){
				echo $file['savepath'].$file['savename'].$file['size'];
			}
			$file1 = M('videos');
			$url2 = "http://".C('URLSET')."/public/videos/";
	
			$data = array (
					'URL' => $url2.$file['savepath'].$file['savename'],
					'LEC'  => $name,
					'UPID' => $_SESSION['id'],
					'NAME' => $_POST['vname']
			);
			 
			$file1->add($data);
		}
	}
	
	public function uploadappends($name){//上传一节课的一个附件
		//echo "hey!~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
		$this->judge();
		var_dump($name);
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0 ;// 设置附件上传大小
		$upload->exts      =     array();// 设置附件上传类型
		$upload->rootPath  =     'public/appends/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		//$upload->saveName  =     '';
		// 上传文件
		//$upload->saveName  =     iconv('gb2312', 'utf8', $upload->saveName );
		 
		$info   =   $upload->upload();
		//var_dump($upload->saveName);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			$this->success('上传成功！');
			foreach($info as $file){
				echo $file['savepath'].$file['savename'].$file['size'];
			}
			$file1 = M('vappend');
			$url2 = "http://".C('URLSET')."/public/appends/";
	
			$data = array (
					'URL' => $url2.$file['savepath'].$file['savename'],
					'FNAME'  => $name,
					'NAME' => $_POST['vname'],
			);
			 
			$file1->add($data);
		}
	}
	
	public function UploadLecture(){//添加整个课程（名）
		$this->judge();
		$lec = M('lecture');
		if( $_POST['vname'] == "") {
			echo "<script type='text/javascript'>alert('课程名不能为空')</script>";
			$this->Uploadtotal();
		}
		else{
			$data = array(
					'NAME'   => $_POST['vname'],
					'CLASS'  => $_POST['vclass'],
					'TEACHER'=> $_POST['vteacher'],
					'DESCPT' => $_POST['description']
			);
			$lec->add($data);
			$this->Showlecture();
		}
	}
	
	public function delete_file($id){ //删除附件
		$this->judge();
		$where["ID"] = $id;//get鍒拌幏鍙栫殑ID
		$file1 = M('vappend');
		$route = $file1->where($where)->getField('URL');
		//var_dump($route);
		//echo "<br/>";
		$route = substr($route, 33);//鍒犲幓缁濆璺緞鐨勪俊鎭紝淇濈暀鐩稿璺緞锛屽洜涓簎nlink鍑芥暟鍙兘鍒犻櫎鐩稿璺緞
		//var_dump($route);
		$file1->where($where)->delete();
		unlink($route);
		$this->display('Videos/classdetail');
	}
	
	public function UpVideo($idx, $lname){//上一节
		
		
		//$idx --;
		//echo "idx";
		//dump ($idx);
		//dump($lname);
		$this->judge();
		$videos = M('videos');
		//$where['LEC'] = $lname;
		//$lec = $videos->where($where)->getField('LEC');				//课程名称
		//$lname = $videos->where($where)->getField('NAME');
		$where1['LEC'] = $lname;
		$list = $videos->where($where1)->order('id')->select();		//以id排序取出该lecture的所有video	
		$count = $videos->where($where1)->count();
		//         echo "hello up";
		//         dump($idx);
		//         dump($lname);
		//         dump($count);
		//		   PlayVideo($url)
		//dump($list);
		if ($idx == 0 ) {
			echo "<script type='text/javascript'>alert('已经是第一节课了~')</script>";
	
			//$lname     = $list[$idx]['name'];
			$url_video = $list[$idx]['url'];
			$this->assign('idx',$idx);
			$this->assign('lname',$lname);
			//$this->assign('url_video',$url_video);
			$this->PlayThisVideo($url_video, $idx);											
			//$this->display('/Videos/ShowVideos');
		} else {
			
			$idx--;
			$lname     = $list[$idx]['lec'];
			$url_video = $list[$idx]['url'];
			$this->assign('idx',$idx);
			$this->assign('lname',$lname);
			//$this->assign('url_video',$url_video);
			$this->PlayThisVideo($url_video, $idx);
			//$this->display('/Videos/ShowVideos');
		}
	}
	
	public function DownVideo($idx, $lname){//下一节
		//echo "idx";
		//dump ($idx);
		//dump($lname);
		
		$this->judge();
		$videos = M('videos');
		//$where['LEC'] = $lname;
		//$lec = $videos->where($where)->getField('LEC');
		//$lname = $videos->where($where)->getField('NAME');
		$where1['LEC'] = $lname;
		$list = $videos->where($where1)->order('id')->select();
		$count = $videos->where($where1)->count();
		//         echo "hello down";
		//         dump($idx);
		//         dump($lname);
		//         dump($count);
	
		if ($idx + 1 == $count ) {
			echo "<script type='text/javascript'>alert('已经是最后一节课了~')</script>";
			$url_video = $list[$idx]['url'];
			$this->assign('idx',$idx);
			$this->assign('lname',$lname);
			//$this->assign('url_video',$url_video);
			$this->PlayThisVideo($url_video, $idx);
				
		} else {
			$idx++;
			$lname     = $list[$idx]['lec'];
			$url_video = $list[$idx]['url'];
			$this->assign('idx',$idx);
			$this->assign('lname',$lname);
			//$this->assign('url_video',$url_video);
			$this->PlayThisVideo($url_video, $idx);
				
		}
	}
	
	public function PlayThisVideo($url, $idx){
		$this->judge();
		$url_video = $url;
	
		$this->assign('url_video',$url);
		$videos = M('videos');
		$where['URL'] = $url_video;
		$lec = $videos->where($where)->getField('LEC');
		//$lname = $videos->where($where)->getField('NAME');
	
		//$where1['LEC'] = $lec;
		//$list = $videos->where($where1)->order('id')->select();
		//$count = $videos->where($where1)->count();
	
		//$index = 0;
		//$idx   = $index;
	
		//要传入前端的参数
		$this->assign('idx',$idx);
		//$this->assign('lname',$lname);
		//$this->assign('url_video',$url);
		/*****************************************************/
		$findIdByLec = M('lecture');
		$where['NAME'] = $lec;
		$id = $findIdByLec->where($where)->getField('ID');
	
	
	
	
		$l               = M('lecture');
		$where['ID']     = $id;
		$_SESSION['LID'] = $id;
		$lec_name        = $l->where($where)->getField('NAME');
		$video           = M('videos');
		$where1['LEC']   = $lec_name;
	
		//课程列表
		$count         = $video->where($where1)->count();
		$p             = getpage($count, 5);
		$list          = $video->where($where1)->limit($p->firstRow, $p->listRows)->select();
	
		//附件列表
		$append		     = M('vappend');
		$where2['FNAME'] = $lec_name;
		$count2			 = $append->where($where2)->count();
		$p2				 = getpage($count2, 5);
		$list2			 = $append->where($where2)->limit($p2->firstRow, $p2->listRows)->select();
	
		//var_dump($video);
	
		//课程：
		$this->assign('select', $list);
		$this->assign('page', $p->show());
	
		//附件：
		$this->assign('select2', $list2);
		$this->assign('page2', $p2->show());
	
		//$this->assign('lname',$lec_name);
		$this->assign('urlvideo',$url);
		//................................	$idx在上面传输过
		//dump($description);
		$num = 0;
	
		$this->display('/Videos/classdetail');
	}
	
	public function AdduserLector($id){
	    $this->judge();
	    $where['ID']=$_SESSION['id'];
	    $date=M('user')->where($where)->select();
	    $username = $date[0]['username'];
	    unset($where);
	    $where['ID'] = $id;
	    $date = M('lecture')->where($where)->select();
	    if(!$date){
	        echo "<script>alert('非法操作！')</script>";
	        $this->Showlecture();
	        die;
	    }
	    $name = $date[0]['name'];
	    $where['NAME'] = $name;
	    $where['USERNAME'] = $username;
	    $date = M('userlecture')->where($where)->select();
	    if(!$date){
    	    $date = array(
    					'USERNAME'   => $username,
    					'ID' => $id,
    	                'NAME' => $name
    			);
    	    M('userlecture')->add($date);
    	    echo "<script>alert('已成功收藏此课程！')</script>";
	    }
	    else{
	        echo "<script>alert('非法操作！')</script>";
	    }
	    $this->Showlecture();
	}
	
	public function RmuserLector($id, $page){
	    $this->judge();
	    $where['ID']=$_SESSION['id'];
	    $date=M('user')->where($where)->select();
	    $username = $date[0]['username'];
	    unset($where);
	    $where['ID'] = $id;   
	    $where['USERNAME'] = $username;
	    $date = M('userlecture')->where($where)->select();
	    if($date){
	        $date = M('userlecture')->where($where)->delete();
	        echo "<script>alert('已将此课程移出收藏！')</script>";
	    }
	    else{
	        echo "<script>alert('非法操作！')</script>";
	    }
	    if ($page != 'user') {
	    	$this->Showlecture();
	    } else {
	    	$this->redirect('User/Userhome');
	    }
	}
	
	public function upv($lid){
		$where['ID'] = $lid;
		$name = M('lecture')->where($where)->getField('NAME');
		$this->assign('name', $name);
		
		$this->display('Videos/upvideo');
	}
	
	public function comment($lid){
		$uid   = $_SESSION['id'];
		$where['ID'] = $uid; 
		$name  = M('user')->where($where)->getField('USERNAME');
		$words = $_POST['words'];
		
		$a = array(
			'UNAME' => $name,
			'LID' 	=> $lid,
			'WORD'	=> $words
		);
		
		M('leccom')->add($a);
		$this->ShowVideo($lid);
	}
	
	public function judge(){
		$where['ID']=$_SESSION['id'];
		$date=M('user')->where($where)->select();
		$root=$date[0]['root'];
		if($_SESSION['id']==""||$root==2) {
			$this->display('Error/error1');
			die();
		}
	}
}