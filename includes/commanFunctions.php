<?php


class commanFunctions
{
	
	function connectDB(){

		$connection = mysqli_connect("localhost","root","","ONLINESHOPPING");
		return $connection;
	}

	function buildQueryInsert($data,$connection,$tableName){

		$query = "INSERT INTO ".$tableName ;
		$dataCount = count($data);

		$columnNames = "(";
		$columnValues = "VALUES (";
		$i=1;
		foreach ($data as $key => $value) {

			
			$columnNames .= $key." ";
			$columnValues .= "'".$value."'";
			if($i<$dataCount){
			$columnNames .= ",";
			$columnValues .= ",";	
			}
			$i++;
		}
		
		$columnNames .= ")";
		$columnValues .= ")";
		$query .=" ".$columnNames."  ".$columnValues."";
		
		return $query; 
	}

	function buildQUeryUpdate($tableName,$pk,$data,$connection){

		$pkCount = count($pk);
		$query  = "UPDATE ".$tableName . " SET ";
		foreach ($data as $key => $value) {
			$query  .= $key ." = '" .$value ."' ";
		}

		$query .= " WHERE ";
		if($pkCount>1){
			
			$count = 1;

			foreach ($pk as $key => $value) {
				if ($count>$pkCount) {
				$query .="AND";	
				}
				$query .= $key ." = ".$value;

				$count++;

			}	

		}else{

			foreach ($pk as $key => $value) {
			
			$query .= $key." = ".$value;

			}
		}

	return $query;
		

	}

	function buildDeleteQuery($pk,$tableName,$connection){


		$query = "DELETE FROM ". $tableName ." WHERE ";
		foreach ($pk as $key => $value) {
			$query .=  $key . "=" . $value;
		}
		return $query;
	}


	function uploadImage($files,$path){
		if(!is_dir($path)){
			mkdir($path,0755,true);
		}
		$path .="/".$files['product_image']['name'];
		$endPath = move_uploaded_file($files['product_image']['tmp_name'], $path);
		return $endPath ;
	}



	function sessionCreate($userID){
		session_start();
		$_SESSION['userID'] = $userID; 
	}


	function chekLogin($userInput,$tableName,$connection){

		$query = "SELECT * FROM ". $tableName ." WHERE ";
		$i=0;
		foreach ($userInput as $key => $value) {
			if ($i>0) {
				$query .= " AND ";
			}
			$query .= $key . " = ".$value;

			$i++;
		}
		return $query;
		$executeQuery = mysqli_query($connection,$query);

		$status = mysqli_num_rows($executeQuery);
		if ($status>0) {
			return true;
		}else{
			return false;
		}


	}

	function genrateUserID($tableName,$columnName,$connection){
		$query ='SELECT  '.$columnName.' FROM '.$tableName.' ORDER BY '.$columnName.' DESC LIMIT 1';
		$result = mysqli_query($connection,$query);
		
		$resultCount = mysqli_num_rows($result);

		if($resultCount> 0){
			
			while($row  = mysqli_fetch_assoc($result)){
				$userID =	++$row[$columnName];
			}
		 
		}else{
			
			$userID = 'USER001';
		}
		return $userID;
	}


	function buildQuerySignUp($data,$connection,$tableName){
		$pkColumn = 'userid';
		$query = "INSERT INTO ".$tableName ;
		$getUserID = $this->genrateUserID($tableName,$pkColumn,$connection);
		
		$columnNames = "(".$pkColumn .",status,";

		$columnValues = "VALUES ('".$getUserID."' ,'Y', ";
		$i=1;
		$dataCout = count($data);
		foreach ($data as $key => $value) {
			
			$columnNames .= $key." ";
			$columnValues .= "'".$value."'";
			if($i<$dataCout){
			$columnNames .= ",";
			$columnValues .= ",";	
			}
			$i++;
		}
		
		$columnNames .= ")";
		$columnValues .= ")";
		$query .=" ".$columnNames."  ".$columnValues." " ;
		//return $query;
	
	$result = mysqli_query($connection,$query);
	return $result;
	}



	function genrateProductID($tableName,$columnName,$connection){
		$query ='SELECT  '.$columnName.' FROM '.$tableName.' ORDER BY '.$columnName.' DESC LIMIT 1';
		$result = mysqli_query($connection,$query);
		
		$resultCount = mysqli_num_rows($result);

		if($resultCount> 0){
			
			while($row  = mysqli_fetch_assoc($result)){
				$userID =	++$row[$columnName];
			}
		 
		}else{
			
			$userID = 'PRD001';
		}
		return $userID;
	}



	function buildInsertProduct($data,$connection,$tableName,$file){
		$pkColumn = 'product_id';
		$query = "INSERT INTO ".$tableName ;
		$getProductID = $this->genrateProductID($tableName,$pkColumn,$connection);
		
		$columnNames = "(".$pkColumn .",";

		$columnValues = "VALUES ('".$getProductID."' , ";
		$i=1;
		$dataCout = count($data);
		foreach ($data as $key => $value) {
			
			$columnNames .= $key." ";
			
				$columnValues .= "'".$value."'";
			
			if($i<$dataCout){
			$columnNames .= ",";
			$columnValues .= ",";	
			}
			$i++;
		}

		if (count($file)>0) {


				$path='../../images';
				$finale_path = ",'";
				$finale_path .=$path."/".$file['product_image']['name'];
				$finale_path .= "'";
				$imgpath =$this->uploadImage($file,$path);
				$columnNames .= ',product_image';			
				$columnValues .= $finale_path;
			}
		
		$columnNames .= ")";
		$columnValues .= ")";
		$query .=" ".$columnNames."  ".$columnValues." " ;
		//return $query;
	
	$result = mysqli_query($connection,$query);
	return $result;
	}

}