<?php 
/**
 * 
 */
class CamBienController extends controller
{
	

	function getListSensorsByStation($ma_tram)
	{
		$model = $this->model("cambien");		
		$result = $model->getListSensorsByStation($ma_tram);		
		echo json_encode($result);
	}

	function getLastID()
	{
		$model = $this->model("cambien");
		$result = $model->getLastID();
		echo $result;
	}

	function getByKey($key)
	{
		$model = $this->model("cambien");
		$result = $model->getByKey($key);
		echo $result;
	}

	function add()
	{
		$postdata = file_get_contents("php://input");		
		$ChiTietCamBien = json_decode($postdata,true);			
		$model = $this->model("cambien");	
		if(method_exists($model,"add")){
			echo $model->add($ChiTietCamBien);
		}
	}
	function update()
	{
		$postdata = file_get_contents("php://input");		
		$ChiTietCamBien = json_decode($postdata,true);			
		$model = $this->model("cambien");	
		if(method_exists($model,"update")){
			echo $model->update($ChiTietCamBien);
		}		
	}

	function remove($ma_camBien){
		$model = $this->model("cambien");
		if (method_exists($model,"remove")) {
			echo $model->remove($ma_camBien);
		}
	}


	function getNumberOfSensor($tendangnhap)
	{
		$model = $this->model("cambien");
		if (method_exists($model,"getNumberOfSensor")) {
			echo $model->getNumberOfSensor($tendangnhap);
		}
	}

	function getAllNumberOfSensor()
	{
		$model = $this->model("cambien");
		if (method_exists($model,"getAllNumberOfSensor")) {
			echo $model->getAllNumberOfSensor();
		}
	}
}
?>
