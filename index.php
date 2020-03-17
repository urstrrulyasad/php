<?php
include 'includes/commanFunctions.php';

$classObj = new commanFunctions();

$connection =  $classObj->connectDB();
$pk = array('userID' => 1 );
$data = array("firstname"=>"asad",
	"lastname"=>"qazi",
	"mobile"=>"9423235708"
);
$tableName = "users";

$query = $classObj->buildQuerySignUp($data,$connection,$tableName);
echo $query."<br>";
$userInput = array(
'userName'=>'asad',
'password'=>'password'
);
$query = $classObj->chekLogin($userInput,$tableName,$connection);
echo $query;
?>