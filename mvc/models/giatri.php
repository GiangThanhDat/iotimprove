<<<<<<< HEAD
<?php 
/**
 * 
 */
class giatri extends data
{
	public function add($post_request){		
		echo $this->InsertObject("giatri",$post_request);
	}

	public function getDataSetFromTo($ma_tram,$ngayDau,$ngayCuoi)
	{
		$QUERY = "SELECT `giatri`.`ma_cambien`,`giatri`,DATE(`thoigian`) as `thoigian`
		FROM `giatri` JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien` ) 
		WHERE `cambien`.`ma_tram` = '$ma_tram' 
		AND DATE(`thoigian`) BETWEEN DATE('$ngayDau') AND DATE('$ngayCuoi')";

		$result = $this->execute($QUERY);	
		$list = [];
		if($result){			
			while ($row = $result->fetch_assoc()) {
				array_push($list,$row);
			}
			return json_encode($list);
		}
		return 0;
	}

	public function getDataSetByDate($ma_cambien,$ngayXem)
	{
		$QUERY = "SELECT `giatri`.`ma_cambien`,`giatri`,TIME(`thoigian`) as time
		FROM `giatri` JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien` ) 
		WHERE `giatri`.`ma_cambien` = '$ma_cambien' 
		AND DATE(`thoigian`) = Date('$ngayXem')";
		// echo $QUERY;
		$result = $this->execute($QUERY);	
		$list = [];
		if($result){			
			while ($row = $result->fetch_assoc()) {
				array_push($list,$row);
			}
			return json_encode($list);
		}
		return 0;
	}

	
	

	public function get($ma_cambien)
	{
		$getLatestVal = "SELECT * FROM `giatri` WHERE `ma_cambien` = '$ma_cambien' ORDER BY thoigian DESC LIMIT 1";
		$result = $this->execute($getLatestVal);		
		if($result->num_rows==1){
			$val = $result->fetch_assoc();
			echo json_encode($val);
		}else{
			echo 'null';
		}		
	}
	

	public function getLastRecord()
	{
		$load = "SELECT `tramquantrac`.`ten_tram`,
		`cambien`.`ten_cambien`,
		`dailuongdo`.`ten_dailuong`,
		`giatri`,
		`donvido`.`ten_donvi`, 
		`thoigian`
		FROM `giatri` JOIN `tramquantrac` ON(`giatri`.`ma_tram` = `tramquantrac`.`ma_tram`)
		LEFT JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien`) 
		LEFT JOIN `dailuongdo` ON (`giatri`.`ma_dailuong` = `dailuongdo`.`ma_dailuong`) 
		LEFT JOIN donvido ON (`dailuongdo`.`ma_donvi` = `donvido`.`ma_donvi`) 
		ORDER BY `giatri`.`thoigian` 
		DESC LIMIT 1";
		$result = $this->execute($load);		 
		
		$list = [];
		if ($result) {	
			while ($row = $result->fetch_assoc()) {
				array_push($list, $row);
			}		 	
			return json_encode($list);
		}
		return false;
	}

	public function generalLoad()
	{
		$load = "SELECT `tramquantrac`.`ten_tram`,
		`cambien`.`ten_cambien`,
		`dailuongdo`.`ten_dailuong`,
		`giatri`,
		`donvido`.`ten_donvi`, 
		`thoigian`
		FROM `giatri` JOIN `tramquantrac` ON(`giatri`.`ma_tram` = `tramquantrac`.`ma_tram`)
		LEFT JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien`) 
		LEFT JOIN `dailuongdo` ON (`giatri`.`ma_dailuong` = `dailuongdo`.`ma_dailuong`) 
		LEFT JOIN donvido ON (`dailuongdo`.`ma_donvi` = `donvido`.`ma_donvi`) 
		ORDER BY `giatri`.`thoigian` 
		DESC";
		$result = $this->execute($load);		 
		
		$list = [];
		if ($result) {	
			while ($row = $result->fetch_assoc()) {
				array_push($list, $row);
			}		 	
			return json_encode($list);
		}
		return false;
	}

	public function monthFilter($month=1)
	{
		$load = "SELECT `tramquantrac`.`ten_tram`,
		`cambien`.`ten_cambien`,
		`dailuongdo`.`ten_dailuong`,
		`giatri`,
		`donvido`.`ten_donvi`, 
		`thoigian`
		FROM `giatri` JOIN `tramquantrac` ON(`giatri`.`ma_tram` = `tramquantrac`.`ma_tram`)
		LEFT JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien`) 
		LEFT JOIN `dailuongdo` ON (`giatri`.`ma_dailuong` = `dailuongdo`.`ma_dailuong`) 
		LEFT JOIN donvido ON (`dailuongdo`.`ma_donvi` = `donvido`.`ma_donvi`) 
		WHERE MONTH(`thoigian`) = '$month'
		ORDER BY `giatri`.`thoigian` DESC";
		$result = $this->execute($load);		 
		$list = [];
		if ($result) {	
			while ($row = $result->fetch_assoc()) {
				array_push($list, $row);
			}		 	
			return json_encode($list);
		}
		return false;
	}

	public function dateFilter($myDate)
	{
		$load = "SELECT `tramquantrac`.`ten_tram`,
		`cambien`.`ten_cambien`,
		`dailuongdo`.`ten_dailuong`,
		`giatri`,
		`donvido`.`ten_donvi`, 
		`thoigian`
		FROM `giatri` JOIN `tramquantrac` ON(`giatri`.`ma_tram` = `tramquantrac`.`ma_tram`)
		LEFT JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien`) 
		LEFT JOIN `dailuongdo` ON (`giatri`.`ma_dailuong` = `dailuongdo`.`ma_dailuong`) 
		LEFT JOIN donvido ON (`dailuongdo`.`ma_donvi` = `donvido`.`ma_donvi`) 
		WHERE DATE(`thoigian`) = '$myDate'
		ORDER BY `giatri`.`thoigian` DESC";	
		$result = $this->execute($load);		 
		$list = [];
		if ($result) {	
			while ($row = $result->fetch_assoc()) {
				array_push($list, $row);
			}		 	
			return json_encode($list);
		}
		return false;		
	}

	
}
?>
=======
<?php 
/**
 * 
 */
class giatri extends data
{
	public function add($post_request){		
		echo $this->InsertObject("giatri",$post_request);
	}

	public function getSensorMeasureKeys($ma_tram)
	{
		$getSensorMeasures = "SELECT DISTINCT `ma_cambien`, `ma_dailuong` FROM giatri WHERE  `ma_tram` = '$ma_tram'";
		$result = $this->execute($getSensorMeasures);	
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {				
				array_push($list,$row);
			}
			return $list;
		}	
		return 0;
	}

	public function getNumbersOfSensor($ma_tram)
	{
		$number_of_sensors = "SELECT DISTINCT `ma_cambien` FROM `giatri` WHERE `ma_tram` = '$ma_tram'";	
		$result = $this->execute($number_of_sensors);	
		$list = [];
		require_once(MODElS."cambien.php");
		$cambienObject = new cambien;
		if($result){
			while ($row = $result->fetch_assoc()) {
				$sensorKey = $row['ma_cambien'];
				array_push($list,json_decode($cambienObject->getByKey($sensorKey),true));
			}
			return $list;
		}
		return 0;		
	}
	public function getNumbersOfMeasure($ma_tram,$ma_cambien)
	{
		$number_of_measures = "SELECT DISTINCT `ma_dailuong` FROM giatri WHERE `ma_tram` = '$ma_tram' AND `ma_cambien` = '$ma_cambien'";		
		$result = $this->execute($number_of_measures);
		require_once(MODElS."dailuongdo.php");
		$dailuongObject = new dailuongdo;
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {			
				$measureKey = $row['ma_dailuong'];
				array_push($list,json_decode($dailuongObject->getByKey($measureKey),true));
			}
			return $list;
		}
		return 0;
	}
	
	public function get($ma_tram,$ma_cambien,$ma_dailuong)
	{
		$getLatestVal = "SELECT `giatri`,`thoigian`,`nguon_tren`,`nguon_duoi`,`mau` FROM `giatri` JOIN `dailuongdo` on(`giatri`.`ma_dailuong` = `dailuongdo`.`ma_dailuong`) WHERE `ma_tram` = '$ma_tram' AND `ma_cambien` = '$ma_cambien' AND `giatri`.`ma_dailuong` = '$ma_dailuong' ORDER BY thoigian DESC LIMIT 1";
		$dataObj = new data;
		$result = $dataObj->execute($getLatestVal);		
		if($result->num_rows==1){
			$val = $result->fetch_assoc();
			$myVal = [
				"val"	=>$val['giatri'],
				"time"	=>$val['thoigian'],
				"max"	=>$val['nguon_tren'],
				"min"	=>$val['nguon_duoi'],
				"mau"	=>$val['mau']
			];
			echo json_encode($myVal);
		}else{
			echo 'null';
		}		
	}
	
	public function getListSensorsByStation($ma_tram)
	{
		require_once(MODElS."cambien.php");
		$cambienObject = new cambien;	
		$number_of_sensors = $this->getNumbersOfSensor($ma_tram);
		$list = [];
		if($number_of_sensors){
			foreach ($number_of_sensors as $row) {
				$sensorKey = $row['ma_cambien'];
				array_push($list,json_decode($cambienObject->getByKey($sensorKey),true));
			}
			return $list;
		}		
		return 0;
	}

	public function getListMeasuresBySensor($ma_tram,$ma_cambien)
	{
		$number_of_measures = $this->getNumbersOfMeasure($ma_tram,$ma_cambien);
		$list = [];
		require_once(MODElS."dailuongdo.php");
		$dailuongObject = new dailuongdo;
		foreach ($number_of_measures as $row) {
			$measureKey = $row['ma_dailuong'];
			array_push($list,json_decode($dailuongObject->getByKey($measureKey)));
		}
		return $list;
	}


	public function remove_DL($ma_tram,$ma_cambien,$ma_dailuong)
	{
		$remove_DL_string = "DELETE FROM giatri WHERE `ma_tram`='$ma_tram' and `ma_cambien`='$ma_cambien' and `ma_dailuong`='$ma_dailuong'";
		$result = $this->execute($remove_DL_string);
		if($result){
			return 1;
		}
		return 0;
	}


	public function remove_CB($ma_tram,$ma_cambien)
	{
		$remove_CB_string = "DELETE FROM giatri WHERE `ma_tram`='$ma_tram' and `ma_cambien`='$ma_cambien'";
		$result = $this->execute($remove_CB_string);
		if($result){
			return 1;
		}
		return 0;
	}

	public function generalLoad($lim)
	{
		$load = "SELECT `tramquantrac`.`ten_tram`,
		`cambien`.`ten_cambien`,
		`dailuongdo`.`ten_dailuong`,
		`giatri`,
		`donvido`.`ten_donvi`, 
		`thoigian`
		FROM `giatri` JOIN `tramquantrac` ON(`giatri`.`ma_tram` = `tramquantrac`.`ma_tram`)
		 LEFT JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien`) 
		 LEFT JOIN `dailuongdo` ON (`giatri`.`ma_dailuong` = `dailuongdo`.`ma_dailuong`) 
		 LEFT JOIN donvido ON (`dailuongdo`.`ma_donvi` = `donvido`.`ma_donvi`) 
		 ORDER BY `giatri`.`thoigian` 
		 DESC LIMIT $lim";
		 $result = $this->execute($load);		 
		 $list = [];
		 if ($result) {	
		 	while ($row = $result->fetch_assoc()) {
		 	    array_push($list, $row);
		 	}		 	
		 	return json_encode($list);
		 }
		 return false;
	}


	
}
?>
>>>>>>> e9a1e4ca34a4ba28b6435b771e0b9be7f2858f01
