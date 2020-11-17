<?php 
/**
 * 
 */
class donvido extends data
{
	public function add($post_request){		
		echo $this->InsertObject("donvido",$post_request);
	}
	public function edit($key,$column,$value){
		$result = $this->execute("UPDATE donvido SET `$column` = '$value' WHERE ma_donvi = $key");
		// echo "UPDATE donvido SET `column` = '$value' WHERE ma_donvi = $key";
		if($result){
			$result = $this->execute("SELECT * FROM donvido WHERE ma_donvi = $key");
			$result = $result->fetch_assoc();
			return json_encode($result);
		}
		return 0;
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM donvido WHERE ma_donvi = $key");		
		if($result){			
			return 1;	
		}
		return 0;
	}	

	public function getLastId()
	{
		$result = $this->execute("SELECT `ma_donvi` FROM donvido ORDER BY `ma_donvi` DESC LIMIT 1");
		if($result){
			$lastID = $result->fetch_assoc();
			return json_encode($lastID);
		}
		return 0;
	}

	function update($DonViPostData)
	{
		$key = $DonViPostData["ma_donvi"];
		return $this->updateObject('donvido',$DonViPostData,'ma_donvi',$key);
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM donvido");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,["ma_donvi"=>$row['ma_donvi'],"ten_donvi"=>$row['ten_donvi']]);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM donvido WHERE ma_donvi = '$key'");		
		if($result){
			$donvi = $result->fetch_assoc();
			// print_r($donvi);
			return json_encode($donvi);
		}
		return 0;
	}
}
 ?>