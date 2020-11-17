<?php 

/**
 * 
 */
class BaoMatController extends controller
{
	
	function __construct()
	{
					
	}

	function index(){
		$this->view("login");				
	}	

	function DangKy(){
		$this->view("register");
	}
	
	function DangXuat(){
		if (isset($_SESSION['tendangnhap'])) {
			unset($_SESSION['tendangnhap']);
		}
		$this->view("login");
	}


}