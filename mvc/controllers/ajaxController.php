<?php 
/**
 * 
 */
class ajaxController extends controller
{

	/*method for model*/

	function add($modelName){
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){
			$model = $this->model("$modelName");
			echo $model->add($_POST);
		}
	}

	function edit($modelName, $key){
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && $key){
			// print_r($_POST);
			$model = $this->model($modelName);
			if(isset($_POST['key']) && isset($_POST['val'])){
				echo $model->edit($key,$_POST['key'],$_POST['val']);	
			}else{
				if(method_exists($model,"update"))
					$model->update($key,$_POST);
				$controller;
				require_once "adminController.php";
				$adminController = new adminController;
				$adminController->edit($modelName, $key);
			}
		}
	}

	function update()
	{		
		$method = $_SERVER['REQUEST_METHOD'];
		if ('PUT' === $method) {
			echo (file_get_contents('php://input'));
		}
	}

	function del($modelName, $key){
		if($modelName && $key){
			$model = $this->model("$modelName");
			echo $model->remove($key);	
		}else
			echo 0;
	}

	function giatri_del($ma_tram,$ma_cambien,$ma_dailuong=[])
	{
		$giatri = $this->model("giatri");
		if ($ma_dailuong != []) {
			echo $giatri->remove_DL($ma_tram,$ma_cambien,$ma_dailuong);
		}else{
			echo $giatri->remove_CB($ma_tram,$ma_cambien);
		}
	}

	function getListByFK($modelName, $FK){
		if($modelName){
			$model = $this->model($modelName);
			echo $model->listFkey($FK);
		}
	}

	function register(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$nguoiquanlyObj = $this->model("nguoiquanly");
			echo $nguoiquanlyObj->add($_POST);
		}	
	}

	function validation(){
		if($_SERVER['REQUEST_METHOD'] === "POST"){
			$taikhoan_nql = $_POST['taikhoan_nql'];
			echo $this->model("nguoiquanly")->duplicateValidation($taikhoan_nql);
		}
	}	
<<<<<<< HEAD


	function generalLoad()
	{
		echo $this->model("giatri")->generalLoad($lim);
	}

=======
	
	function generalLoad($lim = 30)
	{
		echo $this->model("giatri")->generalLoad($lim);
	}
	
>>>>>>> e9a1e4ca34a4ba28b6435b771e0b9be7f2858f01
	function login(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$nguoiquanlyObj = $this->model("nguoiquanly");
			if(isset($_POST['adminitrator']) && $_POST['adminitrator'] == "on"){	
				unset($_POST['adminitrator']);
				$taikhoan_nql = $nguoiquanlyObj->loginCheck($_POST,true);
				$_SESSION['adm'] = true;
				if ($taikhoan_nql != false) {	
					if(!array_key_exists("taikhoan_nql", $_SESSION)){
						$_SESSION['taikhoan_nql'] = $taikhoan_nql;				
						echo $taikhoan_nql;
					}
				}else{
					echo 0;
				}						
			}else{
				$taikhoan_nql = $nguoiquanlyObj->loginCheck($_POST);		
				$_SESSION['adm'] = false;
				if ($taikhoan_nql != false) {	
					if(!array_key_exists("taikhoan_nql", $_SESSION)){
						$_SESSION['taikhoan_nql'] = $taikhoan_nql;				
						echo $taikhoan_nql;
					}
				}else{
					echo 0;
				}		
			}	
		}
	}

	function getModelListAll($model)
	{
		$model = $this->model($model);
		echo $model->listAll();
	}

	
	function monthFilter($month=1)
	{
		echo $this->model("giatri")->monthFilter($month);
	}


	function dateFilter($myDate = 1)
	{
		echo $this->model("giatri")->dateFilter($myDate);
	}

	

}
?>
