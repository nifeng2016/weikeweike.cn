<?php
namespace Home\Controller;
use Think\Controller;
class HangYeController extends Controller {
    
    public function index() {   
        $count = M('hangye1')->count();
        $p     = getpage($count, 10);
        $list  = M('hangye1')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page', $p->show());
        $this->display('HangYe/index');
    }
    
    public function detail($id) {
        $where['TID'] = $id;
        $content = M('hangye2')->where($where)->select();
        //dump($content);
        unset($where);
        $where['ID'] = $id;
        $tid = M('hangye1')->where($where)->getField('TITLE');
        $this->assign('content',$content[0]);
        $this->assign('tid',$tid);
        $this->display('HangYe/detail');
    }
    
    public function edit() {
        $this->display('HangYe/edit');
    }
    
    public function inEdit() {
        
        $title = $_POST['title'];
        $content = $_POST['editor'];
        
        $data=array(
                'TITLE' => $title,
                'TIME'  => date('Y-m-d H:i:s' ,time())
        );
        M('hangye1')->add($data);
        
        unset($data);
        $where['TITLE'] = $title;
        $tid = M('hangye1')->where($where)->getField('ID');
        
        $data=array(
            'TID'     => $tid,
            'CONTENT' => $content   
        );
        M('hangye2')->add($data);
        
        $this->index();
    }
}