<?php 
/**
 * 
 */
class NhanSuController extends controller
{
	function index()
	{		
		$data = [
			"component" => "NhanSuComponent",
			"pages" 	 => "NhanSuView",
		];
		$this->view("baseView",$data);
	}


	function CaNhan()
	{		
		$data = [
			"component" => "NhanSuComponent",
			"pages" 	 => "ThongTinCaNhanView",
		];
		$this->view("baseView",$data);
	}
	
	function PhanQuyen()
	{		
		$data = [
			"component" => "NhanSuComponent",
			"pages" 	 => "PhanQuyenView",
		];
		$this->view("baseView",$data);
	}
	
}
?>
