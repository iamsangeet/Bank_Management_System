<?php
session_start();
include './connection.php'; //connect the connection page; //connect the connection page
  

$username=$_POST['username'];
$password=$_POST['password'];
//check if the username entered is in the database.
$sql= "SELECT * FROM admins";
//parse the statement
$statement=oci_parse($link,$sql);
//execute the statement
oci_execute($statement);
$data=array();
while($row=oci_fetch_assoc($statement)){
  array_push($data,$row);
}

foreach($data as $key=>$value){
  if($value['USERNAME']==$username && $value['PASSWORD']==$password){
  	$_SESSION['uname']=$username;
    header('location:adminbank.php');
    break;
  }else{
    echo "Invalid username and password.";
    header('location:index.php?Invalid username and password');
  }
}
//free statement
oci_free_statement($statement);
//close connection
oci_close($link);

?>