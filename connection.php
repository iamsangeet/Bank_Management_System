<?php
//connection.php
$host="//localhost/XE";
$user="hr";
$password="hr";
////////////////////
//connect to the database
$link= oci_connect($user,$password,$host)
		or die("Connection not success");
if(!$link){
//echo "The connection has a problem";
}else{
//echo "The connection has been made";
}
?>



