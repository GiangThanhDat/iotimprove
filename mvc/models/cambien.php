<?php 
/**
 * 
 */
class cambien extends data
{
	

	public function add($post_request){		
		echo $this->InsertObject("cambien",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE cambien SET `$column` = '$value' WHERE ma_cambien = $key");
		// echo "UPDATE cambien SET `$column` = '$value' WHERE ma_cambien = $key";
		if($result){
			$result = $this->execute("SELECT * FROM cambien WHERE ma_cambien = '$key'");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	function update($CamBienPostData)
	{
		$key = $CamBienPostData["ma_cambien"];
		return $this->updateObject('cambien',$CamBienPostData,'ma_cambien',$key);
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM cambien WHERE ma_cambien = $key");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM cambien");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,["ma_cambien"=>$row['ma_cambien'],"ten_cambien"=>$row['ten_cambien']]);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM cambien JOIN donvido ON(cambien.ma_donvi = donvido.ma_donvi) WHERE ma_cambien = '$key'");
		if($result){
			$cambien = $result->fetch_assoc();
			return json_encode($cambien);
		}
		return 0;
	}

	public function getLastID()
	{
		$result = $this->execute("SELECT `ma_cambien` FROM cambien ORDER BY `ma_cambien` DESC LIMIT 1");		
		if($result){
			$lastID = $result->fetch_assoc();
			return json_encode($lastID);
		}
		return 0;
	}

	public function getListSensorsByStation($ma_tram)
	{
		$query  = "SELECT * FROM cambien WHERE `ma_tram` = '$ma_tram'";		
		$result = $this->execute($query);	
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc())  {
				$sensorKey = $row['ma_cambien'];
				array_push($list,json_decode($this->getByKey($sensorKey),true));
			}
			return $list;
		}		
		return 0;
	}


	public function getListByStationCode($ma_tram)
	{
		$number_of_sensors = "SELECT DISTINCT `ma_cambien` FROM `giatri` WHERE `ma_tram` = '$ma_tram'";	
		$result = $this->execute($number_of_sensors);	
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				$sensorKey = $row['ma_cambien'];
				array_push($list,json_decode($this->getByKey($sensorKey),true));
			}
			return $list;
		}
		return 0;		
	}
}
 ?>