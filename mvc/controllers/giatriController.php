<?php 
/**
 * 
 */
class giatriController extends controller
{
	// function index()
	// {		
	// 	$data = [
	// 		"component" => "TongQuanComponent",
	// 		"pages" 	 => "TongQuanView",
	// 	];		
	// 	$this->view("baseView",$data);
	// }

	
	// Api viết ở đây
	public function getSensorByStationId($ma_tram)
	{
		$model = $this->model("giatri");		
		$result = $model->getSensorByStationId($ma_tram);		
		echo json_encode($result);
	}

	public function getDataSetFromTo($ma_tram,$ngayDau,$ngayCuoi)
	{
		$model = $this->model('giatri');
		$result = $model->getDataSetFromTo($ma_tram,$ngayDau,$ngayCuoi);		
		echo $result;
	}

	public function getDataSetByDate($ma_tram,$ngayXem)
	{
		$model = $this->model('giatri');
		$result = $model->getDataSetByDate($ma_tram,$ngayXem);		
		echo $result;
	}
	

	public function getLatesData($ma_cambien)
	{
		$model = $this->model('giatri');
		$result = $model->get($ma_cambien);		
		echo $result;
	}

	public function getDataSetFromUserByDate($tendangnhap,$ngayxem)
	{
		$model = $this->model('giatri');
		$result = $model->getDataSetFromUserByDate($tendangnhap,$ngayxem);		
		echo $result;
	}

	public function getDataSetFromAdminByDate($ngayxem)
	{
		$model = $this->model('giatri');
		$result = $model->getDataSetFromAdminByDate($ngayxem);		
		echo $result;
	}

	function thuthap()
	{
		if(isset($_GET)){
			$data = $_GET;
			if(array_key_exists("url",$data)){
				unset($data['url']);
			}
			var_dump($data);
			$data_keys = array_keys($data);
			$amount = count($data_keys);
			$data_string = "";
			// $fileName = "receive.txt";
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$time = date('Y-m-d H:i:s');
			// $time = date('Y-m-d H:i:s', strtotime($time . '+ 3 days'));			
			$giatri = $this->model("giatri");
			foreach ($data_keys as $key) {
				$data_string =  $time ."=".$key."=".$data[$key]."\n";
				var_dump($data_string);
				$dataString = $this->dataProcess($data_string);
				$dataObj = json_decode($dataString,true);
				$giatri->add($dataObj);				
			}
		}
	}

		//input string : 2020-07-28 15:36:40=1=123
					   //2020-11-15 08:15:03=2=26
	private function dataProcess($dataString){
		$row = explode("=",$dataString);		
		$time = $row[0];
		$resultData = [];
		$resultData["thoigian"] = $row[0];		
		$resultData["ma_cambien"] = $row[1];
		$resultData["giatri"] = trim($row[2]);
		return json_encode($resultData);
	}
}
?>
