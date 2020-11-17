<?php 
/**
 * 
 */
class dashboardController extends controller
{
	function index($lim = 10)
	{		
		$data = [
			"model-view" => "dashboard-view",
			"pages" 	 => "index",
			"nql_obj"	 => $this->model("nguoiquanly")->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']),
			"generalLoad"=> $this->model("giatri")->generalLoad($lim)
		];
		// print_r($data);
		$this->view("masterLayout",$data);
	}
}
?>
