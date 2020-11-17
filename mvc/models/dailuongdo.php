	<?php 	
/**
 * 
 */
class dailuongdo extends data
{
	public function add($post_request){		
		echo $this->InsertObject("dailuongdo",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE dailuongdo SET `$column` = '$value' WHERE ma_dailuong = $key");
		// echo "UPDATE dailuongdo SET `$column` = '$value' WHERE ma_dailuong = $key";
		if($result){
			$result = $this->execute("SELECT * FROM dailuongdo WHERE ma_dailuong = $key");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	public function update($key,$post_request)
	{
		 $this->updateObject("dailuongdo",$post_request,"ma_dailuong",$key);
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM dailuongdo WHERE `ma_dailuong` = $key");		
		if($result){			
			return 1;
		}
		return 0;
	}		
	
	public function listAll(){
		$result = $this->execute("SELECT * FROM dailuongdo LEFT JOIN donvido ON(dailuongdo.ma_donvi=donvido.ma_donvi)");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,[
					"ma_dailuong"=>$row['ma_dailuong'],
					"ten_dailuong"=>$row['ten_dailuong'],
					"ten_donvi"=>$row['ten_donvi'],
					"nguon_tren"=>$row['nguon_tren'],
					"nguon_duoi"=>$row['nguon_duoi'],
					"mau"=>$row['mau']
				]);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function getByKey($key){
		$queryString = "SELECT * FROM dailuongdo LEFT JOIN donvido ON(dailuongdo.ma_donvi=donvido.ma_donvi) WHERE ma_dailuong = '$key'";
		$result = $this->execute($queryString);
		if($result){
			$dailuong = $result->fetch_assoc();
			return json_encode($dailuong);
		}
		return 0;
	}
}
 ?>