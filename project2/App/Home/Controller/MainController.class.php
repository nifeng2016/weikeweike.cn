<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends Controller {
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
        $this->assign('root',$root);
        $this->display('Main/index');
    }
    
	public function Maindown(){
        //  之前的工作
        $where['ID']=$_SESSION['id'];
        $data=M('user')->where($where)->select();
        $root=$data[0]['root'];
        $LoginName=$data[0]['username'];
        $this->assign('root',$root);
        $this->assign("LoginName",$LoginName);
        
        //图片滚动墙的工作
        $image = M('info')->select();
        $this->assign('images', $image);
        
        //最新动态
        $dt = array();
        $cnt = 0;
        $dtall = M('dongtai1')->select();
        for ($cnt = 0; $cnt < 5; $cnt ++) {
        	$dt[$cnt]  = $dtall[$cnt];
        }
        //dump($dt);
        $this->assign('dt', $dt);
        //行业资讯
        
        $hy = array();
        $cnt = 0;
        $hyall = M('hangye1')->select();
        for ($cnt = 0; $cnt < 5; $cnt ++) {
        	$hy[$cnt]  = $hyall[$cnt];
        }
        //dump($hy);
        $this->assign('dt', $dt);
        $this->assign('hy', $hy);
        //编辑文字的工作
        $description = M('text')->getField('TEXT');
        $this->assign('description', $description);
        $this->display('Main/Maindown');
    }
    
    public function error1(){
        $id=$_SESSION['id'];
        $where['ID']=$id;
        $data=M('user')->where($where)->select();
        $username=$data[0]['username'];
        $this->assign('name',$username);
        $this->assign('root',$data[0]['root']);
        $this->display('Error/error1');
        die();
    }
}
    