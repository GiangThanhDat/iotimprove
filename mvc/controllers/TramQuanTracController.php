<?php 
/**
 * 
 */
class TramQuanTracController extends controller
{
	function index()
	{		
		$data = [
			"component" => "TramQuanTracComponent",
			"pages" 	 => "TramQuanTracView",
		];		
		$this->view("baseView",$data);
	}

	function update()
	{
		$postdata = file_get_contents("php://input");		
		$ChiTietTQT = json_decode($postdata,true);	
		$model = $this->model("tramquantrac");	
		if(method_exists($model,"update")){
			echo $model->update($ChiTietTQT);
		}
	}

	function ListAll()
	{
		$model = $this->model("tramquantrac");
		if (method_exists($model,"listAll")) {
			echo $model->listAll();
		}
	}

	function getLastID()
	{
		$model = $this->model("tramquantrac");
		$result = $model->getLastID();
		echo $result;
	}

	function getStationsByUser($tendangnhap)
	{
		$model = $this->model("tramquantrac");
		if (method_exists($model,"getStationsByUser")) {
			echo $model->getStationsByUser($tendangnhap);
		}
	}

	function add()
	{
		$postdata = file_get_contents("php://input");		
		$PostData = json_decode($postdata,true);			
		$model = $this->model("tramquantrac");	
		if(method_exists($model,"add")){
			echo $model->add($PostData);
		}
	}

}
?>
