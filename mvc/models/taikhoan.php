<?php 
/**
 * 
 */
class taikhoan extends data
{
	public function add($post_request){		
		echo $this->InsertObject("taikhoan",$post_request);
	}


	function update($taikhoanPostData)
	{
		$key = $taikhoanPostData["tendangnhap"];
		return $this->updateObject('taikhoan',$taikhoanPostData,'tendangnhap',$key);
	}

	public function remove($key){		
		$result = $this->execute("DELETE FROM taikhoan WHERE tendangnhap = '$key'");		
		if($result){			
			return 1;	
		}
		return 0;
	}

	public function listAll(){
		$result = $this->execute("SELECT * FROM taikhoan");
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
		$result = $this->execute("SELECT * FROM taikhoan WHERE tendangnhap = '$key'");
		if($result){
			$taikhoan = $result->fetch_assoc();
			return json_encode($taikhoan);
		}
		return 0;
	}

	public function getLastID()
	{
		$result = $this->execute("SELECT `tendangnhap` FROM taikhoan ORDER BY `tendangnhap` DESC LIMIT 1");		
		if($result){
			$lastID = $result->fetch_assoc();
			return json_encode($lastID);
		}
		return 0;
	}

	public function isDuplicateAccount($tendangnhap)
	{
		$result = $this->execute("SELECT `tendangnhap` FROM taikhoan WHERE `tendangnhap`='$tendangnhap' LIMIT 1");
		if($result->num_rows > 0){
			return 1;
		}
		return 0;
	}	

	public function getListAccount()
	{
		$result = $this->execute("SELECT * FROM taikhoan");
		$list = [];
		if($result->num_rows > 0){
			while($taikhoan = $result->fetch_assoc()){
				unset($taikhoan['matkhau_hash']);	
				array_push($list,$taikhoan);
			}
			return json_encode($list);
		}
		return 0;
	}
	
	public function getAccountInfor($tendangnhap)
	{
		$result = $this->execute("SELECT * FROM taikhoan WHERE `tendangnhap`='$tendangnhap' LIMIT 1");
		if($result->num_rows > 0){
			$taikhoan = $result->fetch_assoc();
			unset($taikhoan['matkhau_hash']);
			return json_encode($taikhoan);
		}
		return 0;
	}

	
	public function checkLogin($loginInfor)
	{
		$tendangnhap = $loginInfor['tendangnhap'];
		$matkhau = $loginInfor['matkhau'];
		$result = $this->execute("SELECT * FROM taikhoan WHERE `tendangnhap`='$tendangnhap' LIMIT 1");
		if($result->num_rows > 0){
			$taikhoan = $result->fetch_assoc();
			$matkhau_hash = $taikhoan['matkhau_hash'];			
			if ( password_verify ( $matkhau , $matkhau_hash )) {
				/* future proof the password */

				$_SESSION['tendangnhap'] = $tendangnhap; // pass đã đúng cho user vào hệ thống
				unset($taikhoan['matkhau_hash']);

				if ( password_needs_rehash($matkhau_hash , PASSWORD_DEFAULT)) {
					/* recreate the hash */
					$rehashed_password = password_hash($matkhau, PASSWORD_DEFAULT );
					/* store the rehashed password in MySQL */
					$this->update(['tendangnhap'=>$tendangnhap,'matkhau_hash'=>$rehashed_password]);			
				}				
				return $tendangnhap;
				/* password verified, let the user in */
			}
			else {
				return null;
			}
		}
		return null;
	}
}
 ?>