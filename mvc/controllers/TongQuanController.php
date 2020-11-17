<?php 
/**
 * 
 */
class TongQuanController extends controller
{
	function index()
	{		
		$data = [
			"component" => "TongQuanComponent",
			"pages" 	 => "TongQuanView",
		];		
		$this->view("baseView",$data);
	}

	// Api viết ở đây
	
}
?>
