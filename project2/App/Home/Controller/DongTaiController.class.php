<?php
namespace Home\Controller;
use Think\Controller;
class DongTaiController extends Controller {
	public function index() {	
		$count = M('dongtai1')->count();
		$p     = getpage($count, 10);
		$list=M('dongtai1')->limit($p->firstRow, $p->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page', $p->show());
		$this->display('DongTai/index');
	}
	
	public function detail($id) {
		$where['TID'] = $id;
		$content = M('dongtai2')->where($where)->select();
		//dump($content);
		unset($where);
		$where['ID'] = $id;
		$tid = M('dongtai1')->where($where)->getField('TITLE');
		$this->assign('content',$content[0]);
		$this->assign('tid',$tid);
		$this->display('DongTai/detail');
	}
	
	public function edit() {
		$this->display('DongTai/edit');
	}
	
	public function inEdit() {
		
		$title = $_POST['title'];
		$content = $_POST['editor'];
		
		$data=array(
				'TITLE' => $title,
				'TIME'  => date('Y-m-d H:i:s' ,time())
		);
		M('dongtai1')->add($data);
		
		unset($data);
		$where['TITLE'] = $title;
		$tid = M('dongtai1')->where($where)->getField('ID');
		
		$data=array(
			'TID'     => $tid,
			'CONTENT' => $content	
		);
		M('dongtai2')->add($data);
		
		$this->index();
	}
}