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

	public function getDataSetFromUserByDate($taikhoanNql,$ngayXem)
	{
		$QUERY = "SELECT `giatri`.`ma_cambien`,`giatri`,`thoigian` 
		FROM `giatri` JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien` ) JOIN tramquantrac ON(`tramquantrac`.`ma_tram` = `cambien`.`ma_tram`) 
		WHERE `tramquantrac`.`taikhoan_quanly` = '$taikhoanNql' AND DATE(`thoigian`) = DATE('$ngayXem')";
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

	public function getDataSetFromAdminByDate($ngayXem)
	{
		$QUERY = "SELECT `giatri`.`ma_cambien`,`giatri`,`thoigian`,`ten_cambien`,`ten_tram`,`ten_donvi`
		FROM `giatri` JOIN `cambien` ON(`giatri`.`ma_cambien` = `cambien`.`ma_cambien` )
		JOIN donvido ON(`cambien`.`ma_donvi` = `donvido`.`ma_donvi`)
		JOIN tramquantrac ON(`tramquantrac`.`ma_tram` = `cambien`.`ma_tram`) 
		WHERE DATE(`thoigian`) = DATE('$ngayXem') ORDER BY `giatri`.`ma_cambien`";
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
