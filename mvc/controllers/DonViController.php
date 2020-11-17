<?php 
/**
 * 
 */
class DonViController extends controller
{
	

	function getListSensorsByStation($ma_tram)
	{
		$model = $this->model("donvido");		
		$result = $model->getListSensorsByStation($ma_tram);		
		echo json_encode($result);
	}

	function getLastID()
	{
		$model = $this->model("donvido");
		$result = $model->getLastID();
		echo $result;
	}

	function getByKey($key)
	{
		$model = $this->model("donvido");
		$result = $model->getByKey($key);
		echo $result;
	}

	function getListAll()
	{
		$model = $this->model("donvido");
		$result = $model->listAll();
		echo $result;
	}

	function add()
	{
		$postdata = file_get_contents("php://input");		
		$ChiTietdonvido = json_decode($postdata,true);			
		$model = $this->model("donvido");	
		if(method_exists($model,"add")){
			echo $model->add($ChiTietdonvido);
		}
	}

	function update()
	{
		$postdata = file_get_contents("php://input");		
		$ChiTietdonvido = json_decode($postdata,true);			
		$model = $this->model("donvido");	
		if(method_exists($model,"update")){
			echo $model->update($ChiTietdonvido);
		}
	}
}
?>
