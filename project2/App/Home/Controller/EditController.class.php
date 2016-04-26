<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class EditController extends Controller {
    public function index() {
        $list   = M('info')->select();
        $count  = M('info')->count();
        $this->assign('info', $list);
        $this->display('Edit/Edit'); //主编辑页面
    }
    
    public function change($id) {
        $where['ID'] = $id;
        $name = md5($_POST['appFile']);
        $src  = "http://localhost/eclipse/project2/public/edit/".$name.'.jpg';
        $change = array(
                'TITLE' => $_POST['title'],
                'SRC'   => $src
        );
        M('info')->where($where)->save($change);
        $this->index();
    }
    
    public function add_in() {
        $this->display('Edit/add');
    }
    
    public function add() {
        $name = md5($_POST['appFile']);
        $src  = "http://localhost/eclipse/project2/public/edit/".$name.'.jpg';
        $change = array(
                'TITLE' => $_POST['title'],
                'SRC'   => $src
        );
        M('info')->add($change);
        $this->index();
    }
    
    public function delete($id) {
        $where['ID'] = $id;
        M('info')->where($where)->delete();
        $this->index();
    }
    
    public function UploadIMG(){
        $url= C('URLSET');
        $url1="http://".$url."/public/edit/";
        $name=$_POST['imagename'] ;
        $str= strstr($_FILES[$name]['name'],'.');
        $_FILES[$name]['name'] = md5($_FILES[$name]['name']).".jpg";
    
        //echo $str;
        if ($str == ".gif"||$str =='.jpg'||$str =='.png'||$str =='.bmp')
        {
            $dir = $_SERVER['DOCUMENT_ROOT'].'\public\edit/'.$_FILES[$name]['name'];
            echo $dir;
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