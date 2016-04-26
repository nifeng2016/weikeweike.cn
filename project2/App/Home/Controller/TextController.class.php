<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class TextController extends Controller {
	public function index(){
		$text = M('text')->getField('TEXT');
		$this->assign('text',$text);
		$this->display('Text/edit');
	}
	
	public function save() {
		
		$change = array(
				'TEXT' => $_POST['text'],
		);
		$where['ID'] =1;
		M('text')->where($where)->save($change);
		echo "<script type='text/javascript'>window.parent.location.href='http://localhost/eclipse/project2/'</script>";
		//$this->display('Main/Maindown');
	}
}