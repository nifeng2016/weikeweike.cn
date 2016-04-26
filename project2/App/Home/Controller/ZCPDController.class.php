<?php
namespace Home\Controller;
use Think\Controller;
class ZCPDController extends Controller {
    public function index(){
        $this->display('ZCPD/zcpd_index');
    }
}