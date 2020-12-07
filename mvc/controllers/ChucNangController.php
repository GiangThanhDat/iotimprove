<?php 

/**
 * 
 */
class ChucNangController extends controller
{
	
	function __construct()
	{
					
	}

	function getListTasks()
	{
		$model = $this->model("chucnang");
		if (method_exists($model,"listAll")) {
			echo $model->listAll();
		}
	}

	
	function getListTasksByRole($roleID)
	{
		$model = $this->model("chucnang");
		if (method_exists($model,"getListTasksByRole")) {
			echo $model->getListTasksByRole($roleID);
		}
	}

	function clearTaskFromRoleID($roleID)
	{
		$model = $this->model("chucnang");
		if (method_exists($model,"clearTaskFromRoleID")) {
			echo $model->clearTaskFromRoleID($roleID);
		}		
	}

	function update()
	{
		$postdata = file_get_contents("php://input");		
		$updateUser = json_decode($postdata,true);			
		$model = $this->model("chucnang");	
		if(method_exists($model,"update")){
			echo $model->update($updateUser);
		}
	}

	function add()
	{
		$postdata = file_get_contents("php://input");		
		$updateUser = json_decode($postdata,true);			
		$model = $this->model("chucnang");	
		if(method_exists($model,"add")){
			echo $model->add($updateUser);
		}
	}

	function addTaskFromRole()
	{
		$postdata = file_get_contents("php://input");		
		$updateUser = json_decode($postdata,true);			
		$model = $this->model("chucnang");	
		if(method_exists($model,"addTaskFromRole")){
			echo $model->addTaskFromRole($updateUser);
		}	
	}


	function remove($ma_chucnang)
	{
		$model = $this->model("chucnang");
		if(method_exists($model,"remove")){
			echo $model->remove($ma_chucnang);
		}
	}
	
}