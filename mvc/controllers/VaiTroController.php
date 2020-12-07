<?php 

/**
 * 
 */
class VaiTroController extends controller
{
	
	function __construct()
	{
					
	}

	function getListRoles()
	{
		$model = $this->model("vaitro");
		if (method_exists($model,"listAll")) {
			echo $model->listAll();
		}
	}
	function update()
	{
		$postdata = file_get_contents("php://input");		
		$updateUser = json_decode($postdata,true);			
		$model = $this->model("vaitro");	
		if(method_exists($model,"update")){
			echo $model->update($updateUser);
		}
	}

	function add()
	{
		$postdata = file_get_contents("php://input");		
		$updateUser = json_decode($postdata,true);			
		$model = $this->model("vaitro");	
		if(method_exists($model,"add")){
			echo $model->add($updateUser);
		}
	}


	function remove($tendangnhap)
	{
		$model = $this->model("vaitro");
		if(method_exists($model,"remove")){
			echo $model->remove($tendangnhap);
		}
	}

	function getByKey($key)
	{
		$model = $this->model("vaitro");
		if(method_exists($model,"getByKey")){
			echo $model->getByKey($key);
		}
	}
	
}