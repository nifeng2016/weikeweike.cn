<?php
namespace Home\Controller;
use Think\Controller;
class BBSController extends Controller {
    public function index(){
        $this->judge();
        $where['ID']=$_SESSION['id'];
        $data=M('user')->where($where)->select();
        $username=$data[0]['username'];
        $root=$data[0]['root'];
        unset($where);
        
        $where['CONDITION']=0;
        $count = M('bbs1')->where($where)->count();
        $p     = getpage($count, 10);
        $data=M('bbs1')->where($where)->limit($p->firstRow, $p->listRows)->select();
        $this->assign('data',$data);
        $this->assign('root',$root);
        $this->assign('username',$username);
        
        $this->assign('page', $p->show());
        $this->display('BBS/index');
    }
    
    public function Creat1(){
        $this->judge();
        $this->display('BBS/creat1');
    }
   
    public function Creat1Next(){
        $this->judge();
        $title=$_REQUEST['title'];
        $words=$_REQUEST['editor'];
        if($title==''){
            echo "<script type='text/javascript'>alert('title can not be empty')</script>";
            $this->Creat1();
        }
        else if($words==''){
             echo "<script type='text/javascript'>alert('words can not be empty')</script>";
            $this->Creat1();
        }
        else {
           
            $id=$_SESSION['id'];
            $where['ID']=$id;
            $data=M('user')->where($where)->select();
            $name=$data[0]['username'];
            $time=date('Y-m-d H:i:s' ,time());
            $data=array(    
               'TITLE'      => $title,
               'USERNAME'   => $name,
               'LASTTIME'   => $time,
               'CONDITION'  => 0,
               'REPLY'      => 0,
               'VIEW'       => 1,
               'CONTENT'    => $words
            );
            M('bbs1')->add($data);
            
            // $where1['TITLE']=$title;
            // $data=M('bbs1')->where($where1)->select();
            // $fid=$data[0]['id'];
            // $data=array(
            //     'FID'        => $fid,
            //     'USERNAME'   => $name,
            //     'WORDS'      => $words,
            //     'TIME'       => $time,
            // );
            // M('bbs2')->add($data);
            $this->index();
        }
    }
    
    public function Creat2($id){
        $this->judge();
        $this->assign('id1',$id);
        $where['ID']=$_SESSION['id'];
        $data=M('user')->where($where)->select();
        $username=$data[0]['username'];
        $root=$data[0]['root'];
        $this->assign('username',$username);
        $this->assign('root',$root);
        $fid=$id;
        $this->assign('id',$id);
        
        $where1['ID']=$id;
        $data=M('bbs1')->where($where1)->select();

        $title   = $data[0]['title'];
        $name    = $data[0]['username'];
        $content = $data[0]['content'];

        unset($where1);
        $where1['USERNAME'] = $name;
        $topuser = M('user')->where($where1)->select();
        //dump($topuser);


        $this->assign('title',$title);
        $this->assign('topuser',$topuser[0]);
        $this->assign('content',$content);

        $where2['FID']=$fid;
        $where2['CONDITION']=0;
        $data=M('bbs2')->where($where2)->select();
        
        $userdata= array();
        $users = array();
        $cnt = 0;
        foreach ($data as $value) {
            $where3['USERNAME'] = $value['username'];
            $temp = M('user')->where($where3)->select();
            $temp = $temp[0];
            unset($where);
            $where["USERNAME"]=$value['username'];
            $bbs1 = M('bbs1')->where($where)->select();
            $bbs1num=sizeof($bbs1);
            
            $a = array(
            	'ID'     => $temp['id'],
            	'NAME'   => $temp['username'],
            	'ONLINE' =>	$temp['lastonline'],
            	'TIEZI'	 => $bbs1num,
            	'WORDS'  => $value['words']	
            );
            $userdata[$cnt] = $a;
            $cnt++;
        }
        
        $count=count($userdata);
        $Page=getpage($count,10);
        $list=array_slice($userdata,$Page->firstRow,$Page->listRows);
        //dump($Page);
      	$this->assign('page',$Page->show());
      //dump($userdata);
// 		dump($data);
		
// 		import("ORG.Util.Page"); //导入分页类
		
		//$p     = getpage($count, 10);
        //$data=M('bbs1')->where($where)->limit($p->firstRow, $p->listRows)->select();
		
		$this->assign('userdata',$list);
        $this->display('BBS/BBSin');
        
        /*
         * 
        $where['CONDITION']=0;
        $count = M('bbs1')->where($where)->count();
        $p     = getpage($count, 10);
        $data=M('bbs1')->where($where)->limit($p->firstRow, $p->listRows)->select();
        $this->assign('data',$data);
        $this->assign('root',$root);
        $this->assign('username',$username);
        
        $this->assign('page', $p->show());
         */
    }
    
    public function Creat2Next($id){
        $this->judge();
        $fid=$id;
        $id=$_SESSION['id'];
        $where['ID']=$id;
        $data=M('user')->where($where)->select();
        $name=$data[0]['username'];
        $time=date('Y-m-d H:i:s' ,time());
        $words=$_REQUEST['words'];
        if($words==''){
            echo "<script type='text/javascript'>alert('words can not be empty')</script>";
            $this->Creat2($fid);
        }
        else{
            $data=array(
                'FID'   => $fid,
                'USERNAME'   => $name,
                'WORDS'     =>$words,
                'TIME'        => $time,
            );
            M('bbs2')->add($data);
            $this->Creat2($fid);
        }
    }
    
    public function Delete2($id){
        $this->judge();
        $where['ID']=$_SESSION['id'];
        $data=M('user')->where($where)->select();
        $username=$data[0]['username'];
        $root=$data[0]['root'];
        unset($where);
        $where['ID']=$id;
        if($root!=0)          
            $where['USERNAME']=$username;
        $data=M('bbs1')->where($where)->select();
        $uname=$data[0]['username'];
        if($data){
            M('bbs1')->where($where)->delete();
            unset($where);
            $fid=$id;
            $where['FID']=$fid;
            M('bbs2')->where($where)->delete();
        }
        unset($where);
        if($root==0&&$uname!=$username){            
           $this->badtime($uname);
        }
        $this->index();
    }
    
    public function Delete1($id1,$id2){
        $this->judge();
        $where['ID']=$_SESSION['id'];
        $data=M('user')->where($where)->select();
        $username=$data[0]['username'];
        $root=$data[0]['root'];
        if($root!=0)
            $where['USERNAME']=$username;
        $where['FID']=$id1;
        $where['ID']=$id2;
        $data=M('bbs2')->where($where)->select();
        $uname=$data[0]['username'];
        M('bbs2')->where($where)->delete();
        if($root==0&&$uname!=$username){
            $this->badtime($uname);
        }
        $this->Creat2($id1);
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
    
    public function badtime($uname){
        $where['USERNAME']=$uname;
        $data=M('user')->where($where)->select();
        $badtimes=$data[0]['badtimes']+1;
        $dat['BADTIMES']=$badtimes;
        M('user')->where($where)->data($dat)->save();
        if($badtimes==4){
              unset($dat);
              $dat['ROOT']='2';
              M('user')->where($where)->data($dat)->save();
              $dat2['CONDITION']=1;
              M('bbs1')->where($where)->data($dat2)->save();
              M('bbs2')->where($where)->data($dat2)->save();
        }
    }
}   