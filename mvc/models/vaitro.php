<?php 
/**
 * 
 */
class vaitro extends data
{
	public function add($post_request){		
		echo $this->InsertObject("vaitro",$post_request);
	}


	function update($vaitroPostData)
	{
		$key = $vaitroPostData["ma_vaitro"];
		return $this->updateObject('vaitro',$vaitroPostData,'ma_vaitro',$key);
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM vaitro WHERE ma_vaitro = '$key'");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM vaitro");
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
		$result = $this->execute("SELECT * FROM vaitro WHERE ma_vaitro = '$key'");
		if($result){
			$vaitro = $result->fetch_assoc();
			return json_encode($vaitro);
		}
		return 0;
	}

	public function getLastID()
	{
		$result = $this->execute("SELECT `ma_vaitro` FROM vaitro ORDER BY `ma_vaitro` DESC LIMIT 1");		
		if($result){
			$lastID = $result->fetch_assoc();
			return json_encode($lastID);
		}
		return 0;
	}
	
}
 ?>