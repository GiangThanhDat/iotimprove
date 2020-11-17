<?php 
/**
 * 
 */
require_once(CORE."data.php");
class collectController extends controller
{
	
	function __construct()
	{		
	}

	function receive(){		
		if(isset($_GET)){
			$data = $_GET;
			if(array_key_exists("url",$data)){
				unset($data['url']);
			}
			$data_keys = array_keys($data);
			$amount = count($data_keys);
			$data_string = "";
			$fileName = "receive.txt";
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			foreach ($data_keys as $key) {
				$time = date('Y-m-d H:i:s');
				$data_string =  $time ."=".$key."=".$data[$key]."\n";
				$dataString = $this->dataProcess($data_string);
				$myfile = fopen(FILES.$fileName, "a+");			
				fwrite($myfile, $dataString."\n");        
				fclose($myfile); 
				
			}
			if($amount != 0){
				$read = file(FILES.$fileName);
				$len = count($read);
				for ($i = $len-$amount; $i < $len; $i++) {
					echo $read[$i];	
				}
			}
		}
		$read = file(FILES.$fileName);
		// echo $this->dataProcess($read[count($read) - 1]);
		// echo $read[count($read)-1];
	}

	function store()
	{
		if(isset($_GET)){
			$data = $_GET;
			if(array_key_exists("url",$data)){
				unset($data['url']);
			}
			$data_keys = array_keys($data);
			$amount = count($data_keys);
			$data_string = "";
			$fileName = "receive.txt";
			date_default_timezone_set('Asia/Ho_Chi_Minh');
					
			$giatri = $this->model("giatri");
			foreach ($data_keys as $key) {
				$time = date('Y-m-d H:i:s');	
				$data_string =  $time ."=".$key."=".$data[$key]."\n";
				$dataString = $this->dataProcess($data_string);
				$dataObj = json_decode($dataString,true);
				$giatri->add($dataObj);	
				sleep(1);
			}
		}
	}

	// function load($ma_tram){
	// 	$dataObj = new data;
	// 	$getSensorMeasures = "SELECT DISTINCT `ma_cambien`, `ma_dailuong` FROM giatri WHERE  `ma_tram` = '$ma_tram'";
	// 	$number_of_sensors = "SELECT DISTINCT `ma_cambien` FROM `giatri` WHERE `ma_tram` = '$ma_tram'";	
	// 	$result = $dataObj->execute($getSensorMeasures);	
	// 	$result2 = $dataObj->execute($number_of_sensors);
		
	// 	$cambienObject = $this->model("cambien");

	// 	$listSensorMeasures = [];
	// 	$listSensorOfStation = [];

	// 	if($result2){
	// 		while ($row = $result2->fetch_assoc()) {
	// 			$sensorKey = $row['ma_cambien'];
	// 			array_push($listSensorOfStation,json_decode($cambienObject->getByKey($sensorKey),true));
	// 		}
	// 	}

	// 	if($result){
	// 		while ($row = $result->fetch_assoc()) {				
	// 			array_push($listSensorMeasures,$row);
	// 		}	

	// 		$nguoiquanlyObject = $this->model("nguoiquanly"); // mặc định vì phải có vì phải đang nhập mới sử dụng 
	// 		$tramquantracObject = $this->model("tramquantrac");
	// 		$donvido = $this->model("donvido");
	// 		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);
	// 		$tramquantracObj = $tramquantracObject->getByKey($ma_tram);
	// 		$donvidoList = $donvido->listAll();
	// 		//view			
	// 		$model = "tramquantrac";
	// 		$model_view = strtolower($model)."-view";		
	// 		$pages		= "detail";

	// 		$dataSend = [
	// 			"model-view"=>$model_view, // cambien-view
	// 			"model"		=>$model, // CamBien
	// 			"pages"		=>$pages,					
	// 			"nql_obj"   =>$nguoiquanlyObj,
	// 			"tram_obj"  =>$tramquantracObj,
	// 			"unitsList" =>$donvidoList,
	// 			"sensorsStationList" =>json_encode($listSensorOfStation),
 // 				"sensorMeasuresList"=>json_encode($listSensorMeasures)
	// 		];
			
	// 		$this->view("masterLayout",$dataSend);
	// 	}		
	// }

	function load($ma_tram){
		//prepare model		
		$cambienObject = $this->model("cambien");
		$giatri = $this->model("giatri");
		$nguoiquanlyObject = $this->model("nguoiquanly"); // mặc định vì phải có vì phải đang nhập mới sử dụng 
		$tramquantracObject = $this->model("tramquantrac");
		$donvido = $this->model("donvido");

		//get data from database
		$listSensorMeasures = $giatri->getSensorMeasureKeys($ma_tram);
		$listSensorOfStation = $giatri->getNumbersOfSensor($ma_tram);
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);
		$tramquantracObj = $tramquantracObject->getByKey($ma_tram);
		$donvidoList = $donvido->listAll();
		//view			
		$model = "tramquantrac";
		$model_view = strtolower($model)."-view";		
		$pages		= "detail";

		$dataSend = [
			"model-view"=>$model_view, // cambien-view
			"model"		=>$model, // CamBien
			"pages"		=>$pages,					
			"nql_obj"   =>$nguoiquanlyObj,
			"tram_obj"  =>$tramquantracObj,
			"unitsList" =>$donvidoList,
			"sensorsStationList" =>json_encode($listSensorOfStation),
			"sensorMeasuresList"=>json_encode($listSensorMeasures)
		];
		
		$this->view("masterLayout",$dataSend);

	}


	// function get($ma_tram,$ma_cambien,$ma_dailuong)
	// {
	// 	$getLatestVal = "SELECT `giatri`,`thoigian` FROM `giatri` WHERE `ma_tram` = '$ma_tram' AND `ma_cambien` = '$ma_cambien' AND `ma_dailuong` = '$ma_dailuong' ORDER BY thoigian DESC LIMIT 1";
	// 	$dataObj = new data;
	// 	$result = $dataObj->execute($getLatestVal);		
	// 	if($result->num_rows==1){
	// 		$val = $result->fetch_assoc();
	// 		$myVal = [
	// 			"val"=>$val['giatri'],
	// 			"time"=>$val['thoigian']
	// 		];
	// 		echo json_encode($myVal);
	// 	}else{
	// 		echo 'null';
	// 	}

	// 	//echo $this->model("giatri")->get($ma_tram,$ma_cambien,$ma_dailuong);
	// }

	function get($ma_tram,$ma_cambien,$ma_dailuong)
	{
		echo $this->model("giatri")->get($ma_tram,$ma_cambien,$ma_dailuong);
	}



	function addDL($ma_tram,$ma_cambien)
	{		
		$giatri = $this->model("giatri");
		$cambienObject = $this->model("cambien");
		$tramquantracObject = $this->model("tramquantrac");
		$nguoiquanlyObject = $this->model("nguoiquanly"); // mặc định vì phải có vì phải đang nhập mới sử dụng 
			
		//data
		$cambienObj = $cambienObject->getByKey($ma_cambien);
		$tramquantracObj = $tramquantracObject->getByKey($ma_tram);
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);
		$list = $giatri->getListMeasuresBySensor($ma_tram,$ma_cambien);

		$model = "dailuongdo";
		$model_view = strtolower($model)."-view";		
		$pages		= "add-form";
		$attachLists["donvido"] = $this->model("donvido")->listAll();
		$dataSend = [
			"model-view"=>$model_view, // cambien-view
			"model"		=>$model, // CamBien
			"pages"		=>$pages,					
			"nql_obj"   =>$nguoiquanlyObj,
			"cb_obj"	=>$cambienObj,
			"tram_obj"  =>$tramquantracObj,
			"listMeasuresBySensor"=>json_encode($list),
			"myList"=>json_encode($list),
			'attachLists'=>$attachLists
		];
		$this->view("masterLayout",$dataSend);
	
	}

	function addCB($ma_tram){
		//preare model
		$giatri = $this->model("giatri");
		$nguoiquanlyObject = $this->model("nguoiquanly"); // mặc định vì phải có vì phải đang nhập mới sử dụng 
		$tramquantracObject = $this->model("tramquantrac");

		//data		
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);
		$tramquantracObj = $tramquantracObject->getByKey($ma_tram);			
		$list = $giatri->getListSensorsByStation($ma_tram);

		$model = "cambien";
		$model_view = strtolower($model)."-view";		
		$pages		= "add-form";
		$dataSend = [
			"model-view"=>$model_view, // cambien-view
			"model"		=>$model, // CamBien
			"pages"		=>$pages,					
			"nql_obj"   =>$nguoiquanlyObj,				
			"tram_obj"  =>$tramquantracObj,
			"listSensorsByStation"=>json_encode($list),
			"myList"=>json_encode($list)
		];		
		$this->view("masterLayout",$dataSend);		
	}


	function editDL($ma_tram,$ma_dailuong)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && $ma_tram && $ma_dailuong){
			// print_r($_POST);
			$model = $this->model("dailuongdo");
			if(isset($_POST['key']) && isset($_POST['val'])){
				echo $model->edit($key,$_POST['key'],$_POST['val']);	
			}else{
				if(method_exists($model,"update"))
					$model->update($ma_dailuong,$_POST);					
				$this->load($ma_tram);
			}
		}
	}

	// function chart($ma_tram,$ma_cambien,$ma_dailuong)
	// {
	// 	$dataObj = new data;
	// 	$getSensorMeasures = "SELECT DISTINCT `ma_cambien`, `ma_dailuong` FROM giatri WHERE  `ma_tram` = '$ma_tram'";
	// 	$result = $dataObj->execute($getSensorMeasures);
	// 	$listSensorMeasures = [];
	// 	if($result){
	// 		while ($row = $result->fetch_assoc()) {				
	// 			array_push($listSensorMeasures,$row);
	// 		}
	// 	}
	// 	// thông tin mặc định cho một trang show
	// 	$model = "tramquantrac";
	// 	$model_view = strtolower($model)."-view";
	// 	$pages		= "chart-type";
	// 	$nguoiquanlyObject = $this->model("nguoiquanly");
	// 	$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);
	// 	$keys = ["ma_tram"=>$ma_tram,"ma_cambien"=>$ma_cambien,"ma_dailuong"=>$ma_dailuong];
	// 	$data = [
	// 		"model-view" =>$model_view, //cambien-view
	// 		"model"		 =>$model, //CamBien
	// 		"pages"		 =>$pages,
	// 		"keys"		 =>json_encode($keys),
	// 		"nql_obj"	 =>$nguoiquanlyObj,
 // 			"sensorMeasuresList"=>json_encode($listSensorMeasures)			
	// 	];
	// 	$this->view("masterLayout",$data);
	// }



	function chart($ma_tram,$ma_cambien,$ma_dailuong)
	{
		//prepare model
		$giatri = $this->model("giatri");
		$nguoiquanlyObject = $this->model("nguoiquanly");
		$nguoiquanlyObj = $nguoiquanlyObject->getByKey($_SESSION['taikhoan_nql'],$_SESSION['adm']);

		//data
		$listSensorMeasures = $giatri->getSensorMeasureKeys($ma_tram);

		// thông tin mặc định cho một trang show
		$model = "tramquantrac";
		$model_view = strtolower($model)."-view";
		$pages		= "chart-type";		
		$keys = ["ma_tram"=>$ma_tram,"ma_cambien"=>$ma_cambien,"ma_dailuong"=>$ma_dailuong];

		$data = [
			"model-view" =>$model_view, //cambien-view
			"model"		 =>$model, //CamBien
			"pages"		 =>$pages,
			"keys"		 =>json_encode($keys),
			"nql_obj"	 =>$nguoiquanlyObj,
 			"sensorMeasuresList"=>json_encode($listSensorMeasures)			
		];
		$this->view("masterLayout",$data);
	}

	//input string : 2020-07-28 15:36:40=1_1_1=123
	private function dataProcess($dataString){
		$row = explode("=",$dataString);		
		$time = $row[0];
		$keys = explode("_",$row[1]);
		$resultData = [];
		$resultData["thoigian"] = $row[0];
		$resultData["ma_tram"] = $keys[0];
		$resultData["ma_cambien"] = $keys[1];
		$resultData["ma_dailuong"] = $keys[2];
		$resultData["giatri"] = trim($row[2]);
		return json_encode($resultData);
	}
}	
?>
