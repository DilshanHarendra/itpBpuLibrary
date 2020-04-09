<?php
class User{
	private $lid;
	private $sid;
	private static $user=null;
	
private function __construct($lid,$sid){
		$this ->$lid=$lid;
		$this ->$sid=$sid;
	}
public static function getInstance(){
	if($user==null){
		$user=  new User();
	}
	
	return($user);
		
}
	public function getLid(){
		return($lid);
	}
	public function getSid(){
		return($sid);
	}
	
	
}



?>