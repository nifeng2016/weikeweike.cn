<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $time=date('Y-m-d' ,time());
        $id=$_SESSION['id'];
        $where['TIME']=$time;
        $signnum=M('signin')->where($where)->count();
        if($id!='')
        {
            $where['ID']=$id;
            $data=M('user')->where($where)->select();
            C('LoginName',$data[0]['username']);
            $root=$data[0]['root'];
            $this->assign('root',$root);
            unset($where);
            $where['TIME']=$time;
            $where['USERID']=$id;
            $data=M('signin')->where($where)->select();
            unset($where);
            if($data)
                $signid=1;
            else
                $signid=0;           
        }
        $this->assign('LoginName',C('LoginName'));
        $this->assign('signid',$signid);
        $this->assign('signnum',$signnum);        
        
		
		
		$this->display('Main/index');
		
		
		
    }
    
    public function Login(){
        $this->assign('LoginName',C('LoginName'));
        session_start(); 
        $this->display('User/login');
    }
    
	public function Logins(){
        $name      = $_POST['Username'];
        $password  = md5($_POST['Password']);
        $checkcode =  md5($_POST['Checkcode']);
        if ($name == "" || $_POST['Password'] == ""){ 
            echo "<script type='text/javascript'>alert('用户名或密码为空')</script>";
            $this->Login();
        } else if($checkcode != $_SESSION["verification"]) {
        	echo "<script type='text/javascript'>alert('验证码错误！')</script>";
        	$this->Login();
        }
        else {
        	
            $where['USERNAME']= $name;
            $where['PASSWORD']=$password;
            $data=M('user')->where($where)->select();
            if($data){    
                C('LoginName',$name);
                $where['USERNAME']= $name;
                $getid = M('user')->where($where)->getField('ID');
                $_SESSION['id'] = $getid;
                echo "<script type='text/javascript'>alert('用户: ".$name."登录成功')</script>";
                echo "<script type='text/javascript'>window.parent.location.href='http://localhost/eclipse/project2/'</script>";
                $time = date('Y-m-d H:i:s' ,time());
                M('user')->where($where)->setField('LASTONLINE',$time);
            }
            else{
                 //echo $_POST['UserName'];
                 //echo $_POST['PassWord'];
            echo "<script type='text/javascript'>alert('用户名或密码错误!')</script>";
            $this->Login();
            }
            //R('Main/index');
            //$this->UserHome();
        }
    }
    public function Maindown(){
        $this->display('Main/Maindown');
    }
    public function Regist() {
        $this->display('User/regist');
    }
    
    public function Regists() {
        $name       = $_POST['Username'];
        $password   = $_POST['Password'];
        $sex        = $_POST['Sex'];
        $ensure     = $_POST['Ensure'];
        $department = $_POST['Department'];
        $email      = $_POST['Email'];
        $school     = $_POST['School'];
        $qq         = $_POST['QQ'];
 
            $data=M('user')->where("username='".$name."'")->select();
            if($data) {
                echo "<script type='text/javascript'>alert('用户名已存在！')</script>";
                $this->Regist();
            } else if ($password != $ensure) {
            	echo "<script type='text/javascript'>alert('两次输入的密码不同！')</script>";
            	$this->Regist();
            	
            }
            else {
					
                    $password   = md5($_POST['Password']);
                    $user = M('user');
					$where['id'] != 0;
					$count = $user->where($where)->count();
					$id = 300000000 + $count;
                    $data=array(
    					'RTIME'	     => date('Y-m-d H:i:s' ,time()),
                        'USERNAME'   => $name,
                        'PASSWORD'   => $password,
                        'SEX'        => $sex,
                        'DEPARTMENT' => $department,
                        'ID'         => $id,
                        'SCHOOL'     => $school,
                        'E_MAIL'     => $email,
                        'QQ'         => $qq,
                    	'LASTONLINE' => date('Y-m-d H:i:s' ,time())
                    );
                    M('user')->add($data);
                    C('LoginName',$name);
                    $_SESSION['id']=$id;
                    
                    echo "<script type='text/javascript'>alert('用户： ".$name."注册成功！\\n ID： ".$id."')</script>";
                    echo "<script type='text/javascript'>window.parent.location.href='http://localhost/eclipse/project2/'</script>";
                    
                }
            }
    
    public function Exitlogin(){
        $tempname=C('LoginName');
        C('LoginName','');
        echo "<script type='text/javascript'>alert('用户：".$tempname." 退出登录成功！')</script>";
        unset($_SESSION['id']);
        session_destroy();
        $this->index();
        
    }
    
public function UserHome() {
    	$this->judge();
        //echo $_SESSION["id"];

        //$iipp=$_SERVER["REMOTE_ADDR"];
        //echo $iipp;
        
        
        if($_SESSION['id']=="")
            die();
        //基本信息
        $where['ID'] = $_SESSION["id"];
        $data = M('user')->where($where)->select();
        $data=$data[0];
        $username = $data['username'];
//         dump($data);
        unset($where);
        //签到次数
        $where['USERID']=$_SESSION["id"];
        $signinnum=M('signin')->where($where)->count();
        unset($where);
        //帖子数
        $where["USERNAME"]=$username;
        $bbs1 = M('bbs1')->where($where)->select();
        $bbs1num=sizeof($bbs1);
        $bbs2 = M('bbs2')->distinct(true)->where($where)->field('FID')->select();
        $bbs2num=0;
        $count=0;
        for($i=0;$i<sizeof($bbs2);$i++){
            $bo=true;
            for($j=0;$j<sizeof($bbs1);$j++){
                if($bbs2[$i]['fid']==$bbs1[$j]['id']){
                    $bo=false;
                    break;
                }
            }
            if($bo==true){
                $bbs2real[$count]=$bbs2[$i]['fid'];
                $count++;
            }
        }
        unset($where);
        if($bbs2real){
            $k=0;
            for($i=0;$i<sizeof($bbs2real);$i++){
                $where['ID'] = $bbs2real[$i];
                $bbstemp = M('bbs1')->where($where)->select();
                $bbs2realname[$k]=$bbstemp[0];
                $k++;
            }
        }
        //我的课程
        unset($where);
        $where["USERNAME"]=$username;
        $mylecture = M('userlecture')->where($where)->select();
        //输出操作
        //echo '基本资料:<br/>';
        //echo '基本信息:';
        //dump($data);
        //echo '签到次数:';
        //dump($signinnum);
        //echo '<hr/>上传视频数:<br/><hr/>';
        //echo '帖子数:<br/>发表帖子数:'.$bbs1num."<br/>参与帖子数:".$count;
        //http://localhost/project2.1/index.php/Home/Video/ShowVideo?id={$id}     
        //echo '<hr/>我的课程:';
        $whereuid['uid'] = $_SESSION['id'];
        $vu = M('vu')->where($whereuid)->select();
        $learned = array();
        $cnt = 0;
       
        //dump($vu);
        foreach ($vu as $value) {
        	unset($where);
        	$where['ID'] = $value['lid']; 
        	$name = M('lecture')->where($where)->getField('NAME');
        	//echo 'where';
        	//dump($where);
        	//dump($name);
        	
        	$a = array(
        		'lname' => $name,	
        		'lurl'	=> "http://localhost/eclipse/project2/index.php/Home/Video/ShowVideo?id=".$value['lid']
        	);
        	$learned[$cnt] = $a;
        	unset($name);
        	$cnt ++;
        }
        
        
        
        unset($where);
        $where['UPID'] = $_SESSION['id'];
        $uper = M('videos')->where($where)->select();
        
        
        unset($where);
        $upfront = array();
        $cnt = 0;
        foreach ($uper as $value) {
        	$where['NAME'] = $value['lec'];
        	
        	$leid = M('lecture')->where($where)->getField('ID');
        	$upfront[$cnt] = array (
        			'name' => $value['lec'],
        			'leid' => $leid
        	);
        	$cnt ++;
        }
        $this->assign('upfront', $upfront);
        
        //dump($upfront);
        //echo 'dada';
        //dump($learned);
        
        //dump($mylecture);
        $this->assign("mylecture",$mylecture);
        //echo '<hr/>学习纪录:<br/>';
        //http://localhost/project2.1/index.php/Home/BBS/Creat2?id={$id}
        //echo '<hr/>我的讨论:<br/>发表讨论:';
        //dump($bbs1);
        $this->assign("bbs1",$bbs1);
        //echo '参与讨论:';
        //dump($bbs2realname);
        $this->assign("bbs2",$bbs2realname);
        //echo '<hr/>我的视频:<br/>';
        
        $this->assign('data',$data);
        $this->assign('signnum',$signinnum);
        $this->assign('bbs1num',$bbs1num);
        $this->assign('count',$count);
        $this->assign('learned',$learned);
        $this->display('User/NewUserHome');
    }
    
    public function Change() {
        if($_SESSION['id']=="")
            die();
        $where['ID'] = $_SESSION["id"];
        $data = M('user')->where($where)->select();
        $data=$data[0];
        $this->assign("data",$data);
        $this->display('User/ChangeInfo');
    }
    
    public function ChangeInfo() {
        $sex        = $_POST['Sex'];
        $department = $_POST['Department'];
        $email      = $_POST['Email'];
        $qq         = $_POST['Qq'];
        if($email==''){
            echo "<script type='text/javascript'>alert('Empty')</script>";
            $this->UserHome();
        }
        else{
            $where['ID'] = $_SESSION["id"];
            $data=array(
                        'SEX'        => $sex,
                        'DEPARTMENT' => $department,
                        'E_MAIL'     => $email,
                        'QQ'         => $qq
                    );
            $data = M('user')->where($where)->save($data);        
            $data = M('user')->where($where)->select();
            $data=$data[0];
            $this->assign("data",$data);
            echo "<script type='text/javascript'>alert('Success !')</script>";
            $this->UserHome();
        }
    }
        
    
    public function PassW(){
        $this->display("User/ChangePassword");
    }
    
	public function ChangeP() {
        $oldpassword=md5($_REQUEST['user']);
        $password1=$_REQUEST['pass'];
            $where['ID'] = $_SESSION["id"];
            $where['PASSWORD']=$oldpassword;
            $data=M('user')->where($where)->select();
            if($data){
                $data['PASSWORD']=md5($password1);
                if(md5($password1)==$oldpassword){
                    echo "<script type='text/javascript'>alert('新密码与旧密码不能相同！')</script>";
                    $this->PassW();
                }
                else{
                    $data = M('user')->where($where)->save($data);
                    echo "<script type='text/javascript'>alert('密码更改成功！')</script>";
                    $this->index();
                }
            }
            else {
                echo "<script type='text/javascript'>alert('旧密码输入错误！')</script>";
                $this->Exitlogin();
            }
    }
    
    
    public function Signin(){
        $id=$_SESSION['id'];
        $time=date('Y-m-d' ,time());
        $where['TIME']=$time;
        $where['USERID']=$id;
        $data=M('signin')->where($where)->select();
        if(!$data){
            $data=array(        
                'USERID'   => $id,
                'TIME'   => $time        
            );
            M('signin')->add($data);
        }
        $this->index();
    }
    
    public function SignView(){
        $id=$_SESSION['id'];
        $where['USERID']=$id;
        $data=M('signin')->where($where)->select();
        $this->assign("data",$data);
        $this->display('User/SignView');
    }
	
    public function dellec($name) {
    	
    	$where['NAME'] = $name;
    	$id = M('lecture')->where($where)->getField('ID');
    	unset($where);
    	$where['LID'] = $id;
    	$where['UID'] = $_SESSION['id'];
    	M('vu')->where($where)->delete();
    	$this->UserHome();
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

}



