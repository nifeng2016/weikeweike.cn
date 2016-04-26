<?php
namespace Home\Controller;
use Think\Controller;
class ZZFWController extends Controller {
    public function index(){
    	$this->judge();
    	
    	$where['ID']=$_SESSION['id'];
    	$date=M('user')->where($where)->select();
    	$root=$date[0]['root'];
    	$this->assign("root", $root);
        
    	$zz_content   = M('zzfw')->where('id=0')->getField('ZC');
    	$this->assign('zz_content', $zz_content);
    	

    	$id=$_SESSION['id'];
    	$where['ID']=$id;
    	$data=M('user')->where($where)->select();
    	if($data[0]['username']==''||$data[0]['root']=='2'){
    		$this->error1();
    	}
    	$username=$data[0]['username'];
    	$this->assign('username',$username);
    	$this->assign('root',$username=$data[0]['root']);
    	$q    = M('questionnaire1');
    	
    	$count = $q->count();
    	$p     = getpage($count, 10);
    	$data =$q->limit($p->firstRow, $p->listRows)->select();
    	$this->assign('data',$data);
    	
    	
    	$this->display('ZengZhi/index');
    }
    
    public function EditZC(){
    	$this->display('ZengZhi/EditZC');
    }
    
    public function inEditZC(){
    	$content   = $_POST['editor'];
    	M('zzfw')->where('id=0')->setField('ZC',$content);
    	$this->index();
    }
    private function judge(){
    	$where['ID']=$_SESSION['id'];
    	$date=M('user')->where($where)->select();
    	$root=$date[0]['root'];
    	if($_SESSION['id']==""||$root==2){
    		$this->display('Error/error1');
    		die();
    	}
    }
}