<?php
namespace Home\Controller;
use Think\Controller;
class AboutUsController extends Controller {
	public function index() {
		
		//first div
		$content = M('about')->getField('DES');
		$this->assign('DES',$content);
		
		//second div		
    	$where['ID']=$_SESSION['id'];
        $hr_date=M('user')->where($where)->select();
        $root=$hr_date[0]['root'];
        $this->assign("root",$root);
        unset($where);
        $hr = M('hr');
        $hr_count        = $hr->count();
        $hr_p            = getpage($hr_count, 10);
        $where['ID'] != '';
        $hr_list         = $hr->where($where)->limit($hr_p->firstRow, $hr_p->listRows)->select();
        $this->assign('hr_select', $hr_list);
        $this->assign('hr_page', $hr_p->show());  
        unset($where);	
		
        //third div
        $hs_list=M('history');
        $hs_count 		  = $hs_list->count();
        $hs_p     		  = getpage($hs_count, 10);
        $hs_data  		  = $hs_list->where($where)->limit($hs_p->firstRow, $hs_p->listRows)->select();
        $this->assign('hs_data',$hs_data);
        unset($where);
        $this->assign('hs_username',$this->username);
        
        
        //forth div
        $connect = M('about')->getField('CONN');
		$this->assign('CONN',$connect);
		
		
		
		$this->display('AboutUs/index');
	}
	public function inEditDes() {
		$this->display('AboutUs/EditDes');
	}
	public function EditDes() {
		
		$content   = $_POST['editor'];
		M('about')->where('id=0')->setField('DES',$content);
		$this->index();
	}
	
	public function inEditConn() {
		$this->display('AboutUs/EditConn');
	}
	public function EditConn() {
	
		$content   = $_POST['editor'];
		M('about')->where('id=0')->setField('CONN',$content);
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