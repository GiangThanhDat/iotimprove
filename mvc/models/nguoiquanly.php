<?php 	
/**
 * 
 */
class nguoiquanly extends data
{

	private $model = [
		true =>"quantri_capcao",
		false=>"nguoiquanly"
	];
		private function imgProcess($imgInfor){
			$stt = true;
			if($imgInfor["size"] === 0)
				return false;
			$target_dir = "./public/img/upload/";
			$target_file = $target_dir . basename($imgInfor["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			// Check if image file is a actual image or fake image		
			$check = getimagesize($imgInfor["tmp_name"]);
			if($check !== false) {
				// echo "File is an image - " . $check["mime"] . ".</br>";
				$uploadOk = 1;
			} else {
				// echo "File is not an image.</br>";
				$uploadOk = 0;
			}	
	// Check if file already exists
			if (file_exists($target_file)) {
				// echo "file already exists.</br>";
				$uploadOk = 0;
			}

	// Check file size
			if ($imgInfor["size"] > 500000) {
				// echo "Sorry, your file is too large.</br>";
				$uploadOk = 0;
			}

	// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
			$uploadOk = 0;
			}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			// echo "Sorry, your file was not uploaded.</br>";			
		// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($imgInfor["tmp_name"], $target_file)) {
					// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</br>";	
				} else {
					// echo "Sorry, there was an error uploading your file.</br>";
				}
			}
			return $stt;
		}


		public function add($post_request){
			echo $this->InsertObject("nguoiquanly",$post_request);
		}

		// public function edit($key,$column,$value){		
		// 	$result = $this->execute("UPDATE nguoiquanly SET `$column` = '$value' WHERE email = $key");
		// 	// echo "UPDATE nguoiquanly SET `$column` = '$value' WHERE email = $key";
		// 	if($result){
		// 		$result = $this->execute("SELECT * FROM nguoiquanly WHERE email = $key");
		// 		$result = $result->fetch_assoc();
		// 		return json_encode($result);
		// 	}
		// 	return 0;
		// }

		public function update($key,$post_request){
			$imgInfor = $_FILES['fileToUpload'];	
			// var_dump($imgInfor);
			$email = $post_request['email'];
			$hoten_nql = $post_request['hoten_nql'];
			$ngaysinh_nql = $post_request['ngaysinh_nql'];
			$chitietdiachi_nql = $post_request['chitietdiachi_nql'];
			$ma_huyen = $post_request['ma_huyen'];
			$matkhau_nql = $post_request['matkhau_nql'];
			$taikhoan_nql = $post_request['taikhoan_nql'];	
			$sdt_nql = $post_request['sdt_nql'];
			$fb_link = $post_request['fb_link'];		
			$update_cmd = "UPDATE nguoiquanly SET
			`email`				='$email',
			`hoten_nql`			='$hoten_nql',
			`ngaysinh_nql`		='$ngaysinh_nql',
			`chitietdiachi_nql`	='$chitietdiachi_nql',
			`ma_huyen`			='$ma_huyen',			
			`matkhau_nql`		='$matkhau_nql',
			`sdt_nql`			='$sdt_nql',
			`fb_link`			='$fb_link' 
			WHERE `taikhoan_nql`='$key'";
			if ($this->imgProcess($imgInfor)) {
				$avatar_nql = basename($imgInfor['name']);
				$update_cmd = "UPDATE nguoiquanly SET
				`email`				='$email',
				`hoten_nql`			='$hoten_nql',
				`ngaysinh_nql`		='$ngaysinh_nql',
				`chitietdiachi_nql`	='$chitietdiachi_nql',
				`ma_huyen`			='$ma_huyen',
				`matkhau_nql`		='$matkhau_nql',
				`sdt_nql`			='$sdt_nql',
				`fb_link`			='$fb_link',
				`avatar_nql` 		='$avatar_nql'
				WHERE `taikhoan_nql`='$key'";
			}
			$result = $this->execute($update_cmd);
			// echo $update_cmd;
			if($result){
				$result = $this->execute("SELECT * FROM nguoiquanly WHERE `taikhoan_nql` = '$key'");				
				$result = $result->fetch_assoc();				
				return json_encode($result);
			}
			return 0;	
		}

		public function remove($key){		
			$result = $this->execute("DELETE FROM nguoiquanly WHERE `taikhoan_nql` = $key");		
			if($result){			
				return 1;
			}
			return 0;
		}		

		public function listAll(){
			$result = $this->execute("SELECT * FROM `nguoiquanly` LEFT JOIN `huyen` ON (`nguoiquanly`.`ma_huyen` = `huyen`.`ma_huyen`) LEFT JOIN `tinh_tp` ON (`huyen`.`ma_tinhtp` = `tinh_tp`.`ma_tinhtp`)");
			$list = [];
			if($result){
				while ($row = $result->fetch_assoc()) {
					array_push($list,[
						"email"=>$row['email'],
						"hoten_nql"=>$row['hoten_nql'],
						"ngaysinh_nql"=>$row['ngaysinh_nql'],
						"chitietdiachi_nql"=>($row['chitietdiachi_nql']. ", Huyện " . $row['ten_huyen'] . ", Tỉnh " . $row['ten_tinhtp'] ),					
						"matkhau_nql"=>$row['matkhau_nql'],
						"taikhoan_nql"=>$row['taikhoan_nql']
					]);
				}			
				return json_encode($list);
			}
			return 0;
		}

		public function getByKey($key,$ad=false){
			$queryString = "SELECT * FROM `".$this->model[$ad]."` LEFT JOIN `huyen` ON (`".$this->model[$ad]."`.`ma_huyen` = `huyen`.`ma_huyen`) LEFT JOIN `tinh_tp` ON (`huyen`.`ma_tinhtp` = `tinh_tp`.`ma_tinhtp`) WHERE taikhoan_nql = '$key'";
			// var_dump($queryString);
			$result = $this->execute($queryString);
			if($result){
				$nguoiquanly = $result->fetch_assoc();
				return json_encode($nguoiquanly);
			}
			return 0;
		}


		public function loginCheck($post_request, $ad=false){
			$taikhoan_nql = $post_request['taikhoan_nql'];
			$matkhau_nql = $post_request['matkhau_nql'];
			
			$check = "SELECT * 
					  FROM `".$this->model[$ad]."` 
					  WHERE `taikhoan_nql` = '$taikhoan_nql' 
					  AND `matkhau_nql` = '$matkhau_nql'";
					  // echo $check;					
			$result = $this->execute($check);
			if ($result->num_rows != 0 ) {
				$obj = $result->fetch_assoc();
				return $obj['taikhoan_nql'];
			}
			return false;
		}

		

		public function duplicateValidation($taikhoan_nql){
			$check = "SELECT * 
					  FROM `nguoiquanly` 
					  WHERE `taikhoan_nql` = '$taikhoan_nql'"; 
			$result = $this->execute($check);
			if($result->num_rows != 0 ){
				echo 1;
			}
			else{
				echo 0;
			}
		}
}


?>