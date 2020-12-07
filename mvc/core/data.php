<?php

class data
{
	
	private $connect;
	
	function __construct()
	{
		$this->connect = new mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME) or die("Connect failed: %s\n". $connect->error);
		// var_dump($this);
		$this->connect->query("SET NAMES 'UTF8'");		
	}

	public function execute($query_string){
		// echo $query_string;
		$result = $this->connect->query($query_string);
		if($result){
			return $result;
		}else
			return null;
	}

	public function getConnect(){
		return $this->connect;
	}
	public	function CloseCon(){
 		$this->connect->close();
 	}

 	protected function getInsertStatement($model,$post_request){
 		$keys = array_keys($post_request); 		
 		$columns = "(";
 		$values  = "(";
 		$length = count($keys);
 		for ($i=0; $i < $length-1; $i++) { 
 			$key = $keys[$i];
 			$value = $post_request[$key];
 			$columns .= "`".$key."`,";
 			$values .= "'". $value."',";
 		}
 		$columns .= "`".$keys[$length-1]."`)";
 		$values .= "'".$post_request[$keys[$length-1]]."')";
 		return "INSERT INTO `$model` ".$columns." VALUES ".$values;
 	}

 	protected function getUpdateStatement($model,$post_request, $keyName,$val)
 	{
 		$keys = array_keys($post_request);
 		$len = count($keys);
 		$column = "";
 		$value  = "";
 		$result = "UPDATE `$model` SET ";
 		for ($i = 0; $i < $len - 1; $i++) {
 			$key = $keys[$i];
 			$column = "`".$key."`";
 			$value = "'$post_request[$key]'"; 			
 			$result .= $column . "=" . $value . ",";
 		}
 		$end = $keys[$len-1];
 		$result .= "`".$end."`"."='".$post_request[$end] . "' WHERE `$keyName` = '$val'";
 		return $result;
 	}


 	protected function updateObject($model,$post_request,$keyName,$val)
 	{

 		$updateStatement = $this->getUpdateStatement($model,$post_request,$keyName,$val);
 		echo $updateStatement;

 		 $updateStatement = $this->getUpdateStatement($model,$post_request,$keyName,$val);
//  		echo $updateStatement;
		$result = $this->execute($updateStatement);
		if($result){
			return 1; // SUCCESS
		}
		return 0; // FAIL
 	}


 	public function InsertObject($model,$post_request){
 		$insertStatement = $this->getInsertStatement($model,$post_request);
 		// echo $insertStatement;
		$result = $this->execute($insertStatement);
		if($result){
			return 1; // SUCCESS
		}
		return 0; // FAIL
 	}

 }
