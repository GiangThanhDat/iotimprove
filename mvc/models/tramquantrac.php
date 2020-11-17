

<?php 
/**
 * 
 */
class tramquantrac extends data
{

	public function add($post_request){		
		echo $this->InsertObject("tramquantrac",$post_request);
	}

	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE tramquantrac SET `$column` = '$value' WHERE ma_tram = '$key'");
		// echo "UPDATE tramquantrac SET `$column` = '$value' WHERE ma_tram = $key";
		if($result){
			$result = $this->execute("SELECT * FROM tramquantrac WHERE ma_tram = '$key'");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	function update($ChiTietTQT)
	{
		$key = $ChiTietTQT["ma_tram"];
		return $this->updateObject('tramquantrac',$ChiTietTQT,'ma_tram',$key);
	}

	public function getLastID()
	{
		$result = $this->execute("SELECT `ma_tram` FROM tramquantrac ORDER BY `ma_tram` DESC LIMIT 1");		
		if($result){
			$lastID = $result->fetch_assoc();
			return json_encode($lastID);
		}
		return 0;
	}


	public function remove($key){		
		$result = $this->execute("DELETE FROM tramquantrac WHERE ma_tram = '$key'");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM tramquantrac");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,[
					"ma_tram"=>$row['ma_tram'],
					"ten_tram"=>$row['ten_tram'], 
					"vi_do" => $row['vi_do'],
					"kinh_do" => $row['kinh_do'],
					"taikhoan_quanly"=>$row['taikhoan_quanly']
				]);
			}			
			return json_encode($list);	
		}
		return 0;
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM tramquantrac");
		if($result){
			$tramquantrac = $result->fetch_assoc();
			return json_encode($tramquantrac);
		}
		return 0;
	}

	public function getStationsByUser($tendangnhap)
	{
		$result = $this->execute("SELECT * FROM tramquantrac WHERE `taikhoan_quanly` = '$tendangnhap'");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,$row);				
			}			
			return json_encode($list);	
		}
		return 0;
	}
}
 ?>