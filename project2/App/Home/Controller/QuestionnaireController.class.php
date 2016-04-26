<?php
namespace Home\Controller;
use Think\Controller;
class QuestionnaireController extends Controller {
   
     public function view() {
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
        $this->assign('page',$p->show());
        $this->display('Questionnaire/view');
    }
    
    public function viewQ($id){
        $uid=$_SESSION['id'];
        $where['ID']=$uid;
        $data=M('user')->where($where)->select();
        if($data[0]['username']==''||$data[0]['root']=='2'){
            $this->error1();
        }
        unset($where);
        $where['FID']=$id;
        $data=M('questionnaire2')->where($where)->select();
        $where1['ID']=$id;
        $title=M('questionnaire1')->where($where1)->select();
        $this->assign('data',$data);
        $this->assign('title',$title);
        $this->assign('id',$id);
        $this->display('Questionnaire/viewQ');
    }
    
    public function viewR($id){
        $uid=$_SESSION['id'];
        $where2['ID']=$uid;
        $data=M('user')->where($where2)->select();
        $username=$data[0]['username'];
        $where['FID']=$id;
        $data1=M('questionnaire2')->where($where)->select();
        $where1['ID']=$id;
        $title=M('questionnaire1')->where($where1)->select();
        if($username!=$title[0]['username']||$data[0]['root']=='2')
            $this->error1();
        $this->assign('id',$id);
        $this->assign('data',$data1);
        $this->assign('title',$title);
        unset($where);
        $d = M('questionnaire3');
        $where['FID'] = $id;
        $data = $d->where($where)->select();
        $i=1;
        $count = Array();
        foreach ($data1 as $val){
            $count1=Array();
            $k=$val['sequence'];
            $str = 'prob'.$k;
            if($val['type']!='textfield'){
                foreach ($data as $val1){
                    if (strstr($val1[$str],"A"))
                        $count1[1]++;
                    if (strstr($val1[$str],"B"))
                        $count1[2]++;
                    if (strstr($val1[$str],"C"))
                        $count1[3]++;
                    if (strstr($val1[$str],"D"))
                        $count1[4]++;
                    if (strstr($val1[$str],"E"))
                        $count1[5]++;
                }
            }
            else{
                $j=0;
                foreach ($data as $val1){
                   $count1[$j]= $val1[$str];
                   $j++;
                }
            }
            $count[$i]=$count1;
            $i++;
        }
        $this->assign('count',$count);
        
        $this->display('Questionnaire/viewR');
    }
    
    public function saveR($id){ //fid
        //从前端获取到数据
        $data = array();
        $dataall = array(
            'FID'   => $id,
        );
        //echo "gellw";
        $cnt = 1;
        $flag = "aa".$cnt;
        //dump($flag);
        $bo =0;
        while($_POST[$flag] != "") {
          if($_POST[$flag][0] == '') {
             $bo = 1;
            break;
          }
           $data[$cnt] = $_POST[$flag];
           $str="";
           //dump($data[$cnt]);
           $i =0;
           while ($data[$cnt][$i]!=""){
               $str=$str.$data[$cnt][$i];
               $i++;
           }
           //dump($str);
           //$a = serialize($data[$cnt]);
           //echo "hebbo";
           //dump( unserialize($a));
           $index = 'PROB'.$cnt;
           $dataall[$index] = $str;
           $cnt++;   
           $flag = "aa".$cnt;
        }
        
        if ($cnt < $_POST['ct'] || $bo == 1) {
            echo "<script type='text/javascript'>alert('没有填写完整，请点击浏览器上方的页面返回！')</script>";
            
        }else{
            // dump($dataall);
            $q3 = M('questionnaire3');
             $q3->add($dataall);
             echo "<script type='text/javascript'>alert('提交成功！')</script>";
             $this->view();
                //dump($_POST['aaa']);
            //把数据做成数组传到数据库
        }
    }
    
    public function make()
    {
        $uid=$_SESSION['id'];
        $where['ID']=$uid;
        $data=M('user')->where($where)->select();
        if($data[0]['username']==''||$data[0]['root']=='2'){
            $this->error1();
        }
        $this->display('Questionnaire/make');
    }
    
    public function Checkname()
    {
        $titlemain=$_POST["titlemain"];
        $where['NAME']=$titlemain;
        $data=M('questionnaire1')->where($where)->select();
        if($data)
            echo "0";
        else echo "1";
    }
    
    public function SaveQ()
    {
        $datamain=$_POST["datamain"];
        $title=$_POST["title"];
        $id=$_SESSION['id'];
        if($id!='')
        {
            $where['ID']=$id;
            $data=M('user')->where($where)->select();
            $username=$data[0]['username'];
        }
       $data=array(
        
            'NAME'   => $title,
            'USERNAME'   => $username
        
        );        
        M('questionnaire1')->add($data);
        $id=M('questionnaire1')->where($data)->select();
        $fid=$id[0]['id'];
        $numid=1;
        foreach ($datamain as $da)
        {
           if($da){
               $data=array();
               $data['FID']=$fid;
               $data['TYPE']=$da[0];
               $data['SEQUENCE']=$numid;
               $numid++;
               $data['VALUE1']=$da[1];
               $data['VALUE2']=$da[2];
               $data['VALUE3']=$da[3];
               $data['VALUE4']=$da[4];
               $data['VALUE5']=$da[5];
               $data['VALUE6']=$da[6];
               M('questionnaire2')->add($data);
            }
        }
    }
    
    public function UploadIMG(){
        $url= C('URLSET');
        $url1="http://".$url."/public/ques/";
        $name=$_POST['imagename'] ;
        $str= strstr($_FILES[$name]['name'],'.');
        $_FILES[$name]['name'] = md5($_FILES[$name]['name']).".jpg";

       // echo $str;
        if ($str == ".gif"||$str =='.jpg'||$str =='.png'||$str =='.bmp')
        {
            $dir = $_SERVER['DOCUMENT_ROOT'].'\public\ques/'.$_FILES[$name]['name'];
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
    
    public function Delete($id){
        $uid=$_SESSION['id'];
        $where2['ID']=$uid;
        $data=M('user')->where($where2)->select();
        $username=$data[0]['username'];
        $where['FID']=$id;
        $data1=M('questionnaire2')->where($where)->select();
        $where1['ID']=$id;
        $title=M('questionnaire1')->where($where1)->select();
        if($username!=$title[0]['username']&&$data[0]['root']!='0')
            $this->error1();
        M('questionnaire1')->where($where1)->delete();
        M('questionnaire2')->where($where)->delete();
        M('questionnaire3')->where($where)->delete();
        $this->View();
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