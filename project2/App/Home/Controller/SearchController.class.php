<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class SearchController extends Controller {
    public function index(){
        $this->judge();
        $this->Search();
    }
    public function Search() {
        $this->judge();
        $_SESSION['department'] = $_POST['department'];
        $_SESSION['sex'] = $_POST['sex'];
        $_SESSION['root'] = $_POST['root'];
        $this->display('Search/search1');
    }
    
    public function table() {
        $this->judge();
        if( $_SESSION['department']== 'ALL' && $_SESSION['sex']== 'ALL'&& $_SESSION['root'] =='ALL')
        {
            //$this->showUsers();
            $m = M('user');
            $count = $m->where($where)->count();
            $p = getpage($count,10  );//璋冪敤璁剧疆鍒嗛〉鍑芥暟锛屽湪Common/Common/function.php
            $list = $m->where($where)->order('id')->limit($p->firstRow, $p->listRows)->select();
            $this->assign('select', $list); // 璧嬪�兼暟鎹泦
            $this->assign('page', $p->show()); // 璧嬪�煎垎椤佃緭鍑�
            $this->display('Search/table');//table椤甸潰鍗曠嫭鏄剧ず鏂囦欢淇℃伅
        }
        else
        {
            //echo "hello";
            if ( $_SESSION['department']!='ALL')
                $where['DEPARTMENT']= $_SESSION['department'];
            if ($_SESSION['sex']!='ALL')
                $where['SEX']=$_SESSION['sex'];
            if ($_SESSION['root']!='ALL')
                $where['ROOT']=$_SESSION['root'];
            //$this->showUsers();
                $m = M('user');
                $count = $m->where($where)->count();
                $p = getpage($count,10);
                $list = $m->where($where)->order('id')->limit($p->firstRow, $p->listRows)->select();
                $this->assign('select', $list); // 璧嬪�兼暟鎹泦
                $this->assign('page', $p->show()); // 璧嬪�煎垎椤佃緭鍑�
                $this->display('Search/table');
        }
    }
   
    public function ChangeRoot($id1,$id2){
        $this->judge();
        $where['ID']=$id1;
        if($id2=="0"){
            $where1['ROOT']='0';
            $data=M('user')->where($where1)->count();
            if($data!=1){
                $dat['ROOT']='1';
                $date=M('user')->where($where)->data($dat)->save();
            }
            else{
            	echo("<script>alert('至少有一个管理员存在！')</script>");
            }
        }
        else if($id2==1){
            $where1['ROOT']='0';
            $data=M('user')->where($where1)->count();
            $dat['ROOT']='0';
            $dat['BADTIMES']='0';
            $date=M('user')->where($where)->data($dat)->save();
            
        }
        else if($id2==2){
            $dat['ROOT']='1';
            $dat['BADTIMES']='0';
            M('user')->where($where)->data($dat)->save();
            
            $where3['ID']=2;
            $data=M('user')->where($where3)->select();

            
            $username=$data[0]['username'];
            $where2['USERNAME']=$username;
            //dump($username);
            $dat1['CONDITION']=0;
            M('bbs1')->where($where2)->data($dat1)->save();
            M('bbs2')->where($where2)->data($dat1)->save();
        }
        $this->table();
    }
    
    public function Searchinfo($txt){
    	//**************************videos************************
    	$where['NAME']=array('like',array('%'.$txt.'%'),'OR');
    	$where['DESCPT']=array('like',array('%'.$txt.'%'),'OR');
    	$where['_logic']='OR';
    	$datavideos=M('lecture')->where($where)->select();
    	//dump($datavideos);
    	$this->assign('datavideos',$datavideos);
    	unset($where);
    
    	//**********************dongtai****************************
    	$where['TITLE']=array('like',array('%'.$txt.'%'),'OR');
    	$datadt1=M('dongtai1')->where($where)->select();
    	//dump($datadt1);
    	$this->assign('datadt1',$datadt1);
    	unset($where);
    	$where['CONTENT']=array('like',array('%'.$txt.'%'),'OR');
    	$tempdt2=M('dongtai2')->where($where)->select();
    	$cent=0;
    	for($i=0;$i<sizeof($tempdt2);$i++){
    		$bo=true;
    		for($j=0;$j<sizeof($datadt1);$j++){
    			if($tempdt2[$i]['tid']==$datadt1[$j]['id']){
    				$bo=false;
    				break;
    			}
    		}
    		if($bo==true){
    			$datadt2[$cent]=$tempdt2[$i];
    			$cent++;
    		}
    	}
    	//dump($datadt2);
    	unset($where);
    	$cent=0;
    	if($datadt2){
    		for($i=0;$i<sizeof($datadt2);$i++){
    			$where['ID']=$datadt2[$i]['tid'];
    			$data=M('dongtai1')->where($where)->select();
    			$datadt1add[$cent]=$data[0];
    			$cent++;
    		}
    	}
    	//dump($datadt1add);
    	$this->assign("dt1add",$datadt1add);
    	unset($where);
    
    	//******************hangye****************************
    	$where['TITLE']=array('like',array('%'.$txt.'%'),'OR');
    	$datahy1=M('hangye1')->where($where)->select();
    	//dump($datahy1);
    	$this->assign("datahy1",$datahy1);
    	unset($where);
    	$where['CONTENT']=array('like',array('%'.$txt.'%'),'OR');
    	$temphy2=M('hangye2')->where($where)->select();
    	$cent=0;
    	for($i=0;$i<sizeof($temphy2);$i++){
    		$bo=true;
    		for($j=0;$j<sizeof($datahy1);$j++){
    			if($datahy1[$j]['id']==$temphy2[$i]['tid']){
    				$bo=false;
    				break;
    			}
    		}
    		if($bo==true){
    			$datahy2[$cent]=$temphy2[$i];
    			$cent++;
    		}
    	}
    	//dump($datahy2);
    	unset($where);
    	$cent=0;
    	if($datahy2){
    		for($i=0;$i<sizeof($datahy2);$i++){
    			$where['ID']=$datahy2[$i]['tid'];
    			$data=M('hangye1')->where($where)->select();
    			$datahy1add[$cent]=$data[0];
    			$cent++;
    		}
    	}
    	//dump($datahy1add);
    	$this->assign("hy1add",$datahy1add);
    	unset($where);
    
    	//**************************hr*****************************
    	$where['TITLE']=array('like',array('%'.$txt.'%'),'OR');
    	$where['POSITION']=array('like',array('%'.$txt.'%'),'OR');
    	$where['SALARY']=array('like',array('%'.$txt.'%'),'OR');
    	$where['PLACE']=array('like',array('%'.$txt.'%'),'OR');
    	$where['POSDES']=array('like',array('%'.$txt.'%'),'OR');
    	$where['WORK']=array('like',array('%'.$txt.'%'),'OR');
    	$where['OFFIDES']=array('like',array('%'.$txt.'%'),'OR');
    	$where['BOSS']=array('like',array('%'.$txt.'%'),'OR');
    	$where['TOOLS']=array('like',array('%'.$txt.'%'),'OR');
    	$where['PUBLISHER']=array('like',array('%'.$txt.'%'),'OR');
    	$where['_logic']='OR';
    	$datahr=M('hr')->where($where)->select();
    	//dump($datahr);
    	unset($where);
    	$this->assign("datahr",$datahr);
    	//dump($txt);
    	$this->display('Search/info');
    }
    
   public function judge(){
       $where['ID']=$_SESSION['id'];
       $date=M('user')->where($where)->select();
       $root=$date[0]['root'];
       if($_SESSION['id']==""||$root!=0)     die();
   }
}