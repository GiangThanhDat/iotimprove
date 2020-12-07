<?php 
/**
 * 
 */
class chucnang extends data
{
	public function add($post_request){		
		echo $this->InsertObject("chucnang",$post_request);
	}


	function update($chucnangPostData)
	{
		$key = $chucnangPostData["ma_chucnang"];
		return $this->updateObject('chucnang',$chucnangPostData,'ma_chucnang',$key);
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM chucnang WHERE ma_chucnang = '$key'");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function getListTasksByRole($roleID)
	{
		$result = $this->execute("SELECT * FROM vaitro_chucnang join chucnang ON(vaitro_chucnang.ma_chucnang = chucnang.ma_chucnang) WHERE `ma_vaitro` = '$roleID'");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,$row);
			}			
			return json_encode($list);
		}
		return 0;
	}


	public function clearTaskFromRoleID($roleID)
	{
		$query = "DELETE FROM vaitro_chucnang WHERE `ma_vaitro` = '$roleID'";
		echo $query;
		$result = $this->execute($query);
		if($result){
			return 1;
		}
		return 0;
	}

	public function addTaskFromRole($object)
	{
		$ma_vaitro = $object['ma_vaitro'];
		$ma_chucnang = $object['ma_chucnang'];
		$query = "INSERT INTO `vaitro_chucnang` (`ma_vaitro`,`ma_chucnang`) VALUES ('$ma_vaitro','$ma_chucnang')";
		echo $query;
		$result = $this->execute($query);
		if($result){
			return 1; // SUCCESS
		}
		return 0; // FAIL
	}



	public function listAll(){
		$result = $this->execute("SELECT * FROM chucnang");
		$list = [];
		if($result){
			while ($row = $result->fetch_assoc()) {
				array_push($list,$row);
			}			
			return json_encode($list);
		}
		return 0;
	}

	public function getByKey($key){
		$result = $this->execute("SELECT * FROM chucnang WHERE ma_chucnang = '$key'");
		if($result){
			$chucnang = $result->fetch_assoc();
			return json_encode($chucnang);
		}
		return 0;
	}

	public function getLastID()
	{
		$result = $this->execute("SELECT `ma_chucnang` FROM chucnang ORDER BY `ma_chucnang` DESC LIMIT 1");		
		if($result){
			$lastID = $result->fetch_assoc();
			return json_encode($lastID);
		}
		return 0;
	}
	
}
 ?>