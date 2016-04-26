<?php
namespace Home\Controller;
use Think\Controller;
class GameController extends Controller {
  public function index() {
    $this->display('Game/cyhx');
  }
}