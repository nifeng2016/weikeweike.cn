<?php
namespace Home\Controller;
use Think\Controller;
class FileController extends Controller {  
    
   public function upload(){
       $this->judge();
       $upload = new \Think\Upload();// 瀹炰緥鍖栦笂浼犵被
       $upload->maxSize   =     0 ;// 璁剧疆闄勪欢涓婁紶澶у皬
       $upload->exts      =     array();// 璁剧疆闄勪欢涓婁紶绫诲瀷
       $upload->rootPath  =     'public/Uploads/'; // 璁剧疆闄勪欢涓婁紶鏍圭洰褰�
       $upload->savePath  =     ''; // 璁剧疆闄勪欢涓婁紶锛堝瓙锛夌洰褰�
       //$upload->saveName  =     '';
       // 涓婁紶鏂囦欢
       //$upload->saveName  =     iconv('gb2312', 'utf8', $upload->saveName );
       
       $info   =   $upload->upload();
       //var_dump($upload->saveName);
       if(!$info) {// 涓婁紶閿欒鎻愮ず閿欒淇d℃伅
           $this->error($upload->getError());
       }else{// 涓婁紶鎴愬姛
           $this->success('涓婁紶鎴愬姛锛�');
           foreach($info as $file){
               echo $file['savepath'].$file['savename'].$file['size'];
           }
           $file1 = M('file');
           $url2 = "http://".C('URLSET')."/public/Uploads/";
           $data = array (
               'ROUTE' => $url2.$file['savepath'].$file['savename'],
               'NAME'  => $file['name'],
               'SIZE'  => round($file['size']/1024).'KB',
           );
           
           $file1->add($data);
       }       
   }
   
   public function ShowFile() {
       $this->judge();
       $where['ID']=$_SESSION['id'];
       $data=M('user')->where($where)->select();
       $username=$data[0]['username'];
       $root=$data[0]['root'];
       unset($where);
       $file1 = M('file');
       $count = $file1->count();
       $p     = getpage($count, 10);
       $where['NAME'] != '';
       $list  = $file1->where($where)->limit($p->firstRow, $p->listRows)->select();
       //dump($list);
       $this->assign('select', $list);
       $this->assign('root', $root);
       $this->assign('page', $p->show());
       $this->display('File/ShowFile');

   }
   //涓嬭浇鏂囦欢
   //涓嬭浇鏂囦欢***鏆傛椂娌¤璋冪敤锛屼笅杞界敤瓒呴摼鎺ュ疄鐜�
   public function download_file($file1){
       $this->judge();
       if(is_file($file1)){
           $length = filesize($file1);
           $type = mime_content_type($file1);
           $showname =  ltrim(strrchr($file1,'/'),'/');
           header("Content-Description: File Transfer");
           header('Content-type: ' . $type);
           header('Content-Length:' . $length);
           if (preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT'])) { //for IE
               header('Content-Disposition: attachment; filename="' . rawurlencode($showname) . '"');
           } else {
               header('Content-Disposition: attachment; filename="' . $showname . '"');
           }
           readfile($file1);
           exit;
       } else {
           exit('鏂囦欢宸茶鍒犻櫎锛�');
       }
   }
   //鍒犻櫎鏂囦欢
   public function delete_file($id){
     $this->judge();
     $where["ID"] = $id;//get鍒拌幏鍙栫殑ID
     $file1 = M('file');
     $route = $file1->where($where)->getField('ROUTE');
     //var_dump($route);
     //echo "<br/>";
     $route = substr($route, 33);//鍒犲幓缁濆璺緞鐨勪俊鎭紝淇濈暀鐩稿璺緞锛屽洜涓簎nlink鍑芥暟鍙兘鍒犻櫎鐩稿璺緞
     //var_dump($route);
     $file1->where($where)->delete();
     unlink($route);
     $this->ShowFile();//鍐嶆杩涘叆椤甸潰
   }
   
   public function judge(){
       $where['ID']=$_SESSION['id'];
       $date=M('user')->where($where)->select();
       $root=$date[0]['root'];
       if($_SESSION['id']==""||$root==2)     die();
   }
}