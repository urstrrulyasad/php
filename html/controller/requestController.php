<?php
 include '../../includes/commanFunctions.php';


 if ($_POST['pageRequest']=="signup") {
 	unset($_POST['pageRequest']);
 	$data =$_POST; 
 	
	$classObj = new commanFunctions();

	$connection =  $classObj->connectDB();
 	$tableName = "users";
 	$query = $classObj->buildQuerySignUp($data,$connection,$tableName);
 	//echo $query;die;
 	if ($query) {
 		echo "User Created Successfully";
 	}else{
 		echo "Error";
 	}
 }


 if ($_POST['pageRequest']=="addproduct") {
 	unset($_POST['pageRequest']);
 	$data =$_POST; 
 	$file = $_FILES;
 	// print_r($file);die;
	$classObj = new commanFunctions();

	$connection =  $classObj->connectDB();
 	$tableName = "tb_product";
 	$query = $classObj->buildInsertProduct($data,$connection,$tableName,$file);
 	//echo $query;die;
 	if ($query) {
 		echo "Product Added Successfully";
 	}else{
 		echo "Error";
 	}
 }
?>