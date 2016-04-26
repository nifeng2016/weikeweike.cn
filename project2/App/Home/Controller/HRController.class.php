<?php
namespace Home\Controller;
use Think\Controller;
class HRController extends Controller {
    public function index(){
    	$this->judge();
    	$where['ID']=$_SESSION['id'];
    	$date=M('user')->where($where)->select();
    	$root=$date[0]['root'];
    	$this->assign("root",$root);
    	unset($where);
    	$hr = M('hr');
    	$count 		  = $hr->count();
    	$p     		  = getpage($count, 10);
    	$where['ID'] != '';
    	$list  		  = $hr->where($where)->limit($p->firstRow, $p->listRows)->select();
    	$this->assign('select', $list);
    	//dump($list);
    	$this->assign('page', $p->show());
    	$this->display('HR/HR_index');
    }
    
    public function post(){
    	$this->judgeroot();
    	$this->display('HR/post_hr');
    }
    
    public function detail($id){
    	$this->judge();
    	$hr = M('hr');
    	$where['ID'] = $id;
    	$det = $hr->where($where)->select();
    	$this->assign('det', $det[0]);
    	$this->display('HR/detail');
    }
    
    public function delete($id){
    	$this->judgeroot();
    	$hr = M('hr');
    	$where['ID'] = $id;
    	$hr->where($where)->delete();
    	$this->index();
    }
    
    
    public function upload(){
    	$this->judgeroot();
    	$tit	   = $_POST['Title'];
    	$pos       = $_POST['Pos'];
    	$sal       = $_POST['Salary'];
    	$pla       = $_POST['Place'];
    	$des       = $_POST['Des'];//职位简介
    	$com       = $_POST['Comm'];
    	$off       = $_POST['Offi'];//工作单位简介
    	$cont      = $_POST['Contact'];
    	$con       = $_POST['ConnWay'];
    	
    	//dump($_SESSION['id']);
    	$id 	     = $_SESSION['id'];
    	$where['ID'] = $id;
    	$uname       = M('user')->where($where)->getField('USERNAME');
    	
    	$data=array(
    			'TITLE'		 => $tit,
    			'POSITION'   => $pos,
    			'SALARY'     => $sal,
    			'PLACE'      => $pla,
    			'POSDES'     => $des,
    			'WORK'       => $com,
    			'OFFIDES'	 => $off,
    			'BOSS'       => $cont,
    			'TOOLS'      => $con,
    			'PUBLISHER'  => $uname,
    			'DATE'		 => date('Ymd')
    	);
    	
    	M('hr')->add($data);
    	echo "<script type='text/javascript'>alert('发布成功！')</script>";
    	$this->index();
    }
    
    private function judge(){
    	$where['ID']=$_SESSION['id'];
    	$date=M('user')->where($where)->select();
    	$root=$date[0]['root'];
    	$name=$date[0]['username'];
    	$this->username=$date[0]['username'];
    	if($_SESSION['id']==""||$root==2){
    		$this->assign('root',$root);
    		$this->assign('name',$name);
    		$this->display('Error/error1');
    		die();
    	}
    }
    
    private function judgeroot(){
    	$where['ID']=$_SESSION['id'];
    	$date=M('user')->where($where)->select();
    	$root=$date[0]['root'];
    	$name=$date[0]['username'];
    	$this->username=$date[0]['username'];
    	if($_SESSION['id']==""||$root!=0){
    		$this->assign('root',$root);
    		$this->assign('name',$name);
    		$this->display('Error/error1');
    		die();
    	}
    }
}