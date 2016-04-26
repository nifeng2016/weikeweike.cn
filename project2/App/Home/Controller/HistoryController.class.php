<?php
namespace Home\Controller;
use Think\Controller;
class HistoryController extends Controller {
    private $username;
    public function index() {
    	$this->judge();
    	        $list=M('history');
    	        $count 		  = $list->count();
    	        $p     		  = getpage($count, 10);
    	        $data  		  = $list->where($where)->limit($p->firstRow, $p->listRows)->select();
    	        $this->assign('data',$data);
    	        unset($where);
    	        $where['ID']=$_SESSION['id'];
    	        $date=M('user')->where($where)->select();
    	        $root=$date[0]['root'];
    	        $this->assign('root',$root);
    	        $this->assign('username',$this->username);
    	 $this->display('History/main');
    }
    public function main()
    {
        $this->judge();
        
//         $list=M('history');
//         $count 		  = $list->count();
//         $p     		  = getpage($count, 10);
//         $data  		  = $list->where($where)->limit($p->firstRow, $p->listRows)->select();
//         $this->assign('data',$data);
//         unset($where);
//         $where['ID']=$_SESSION['id'];
//         $date=M('user')->where($where)->select();
//         $root=$date[0]['root'];
//         $this->assign('root',$root);
//         $this->assign('username',$this->username);
        $this->redirect('AboutUs/index');
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
    
    public function view($id)
    {
        $this->judge();
        $where['ID']=$id;
        $data=M('history')->where($where)->select();
        dump($data);
        $this->assign('data',$data);
        $this->display('History/view');
    }
    public function change($id)
    {
        $this->judgeroot();
        $where['ID']=$id;
        $data=M('history')->where($where)->select();
        if($this->username!=$data[0]['username']){
            $this->assign('root',0);
            $this->assign('name','123');
            $this->display('Error/error1');
            die();
        }
        else{
            $this->assign('data',$data);
            $this->display('History/change');
        }
    }
    public function changein($id) {
        $this->judgeroot();
        $where['ID']=$id;
        $data=M('history')->where($where)->select();
        if($this->username!=$data[0]['username']){
            $this->assign('root',0);
            $this->assign('name','123');
            $this->display('Error/error1');
            die();
        }
        else{
            $qq=$_POST['qq'];
            $email=$_POST['email'];
            $text=$_POST['text'];
            $data=Array(
                'QQ'=>$qq,
                'EMAIL'=>$email,
                'TEXT'=>$text,
                'SRC'=>md5($_POST['appFile']).".jpg"
            );
            M('history')->where($where)->save($data);
            echo "<script type='text/javascript'>alert('Success !')</script>";
            //$this->view($id);
            $this->main();
        }
    }
    function delete($id) {
        $this->judgeroot();
        $where['ID']=$id;
        $data=M('history')->where($where)->select();
        if($this->username!=$data[0]['username']){
            $this->assign('root',0);
            $this->assign('name','123');
            $this->display('Error/error1');
            die();
        }
        else {
            M('history')->where($where)->delete();
            echo "<script type='text/javascript'>alert('Success !')</script>";
            $this->main($id);
        }
    }
    
    function add() {
        $this->judgeroot();
        
        $this->display('History/add');
    }
    
    function addin() {
    $this->judgeroot();
    	
        $where['NAME']=$_POST['name'];
        if(M('history')->where($where)->select()){
            echo "<script type='text/javascript'>alert('不能重复创建！')</script>";
             $this->display('History/add');
            
        }
        else{
            $data=array(
                'NAME'=>$_POST['name'],
                'QQ'=>$_POST['qq'],
                'EMAIL'=>$_POST['email'],
                'TEXT'=>$_POST['text'],
                'USERNAME'=>$this->username,
                'SRC'=>md5($_POST['appFile']).".jpg"
            );
            M('history')->add($data);
            echo "<script type='text/javascript'>alert('创建成功！')</script>";
            $this->main();
        }
    }
    
    public function UploadIMG(){
        $url= C('URLSET');
        $url1="http://".$url."/public/hist/";
        $name=$_POST['imagename'] ;
        $str= strstr($_FILES[$name]['name'],'.');
        $_FILES[$name]['name'] = md5($_FILES[$name]['name']).".jpg";
    
        if ($str == ".gif"||$str =='.jpg'||$str =='.png'||$str =='.bmp')
        {
            $dir = $_SERVER['DOCUMENT_ROOT'].'\public\hist/'.$_FILES[$name]['name'];
            //echo $dir;
            if(!move_uploaded_file($_FILES[$name]['tmp_name'],$dir))
            {
                $error = "failed";
                $msg = "move file failed";
                echo "上传存储失败";
            }
            else {
               echo $url1.$_FILES[$name]['name'];
            }
        }
        else {
            echo "0";
        }
    }
}