<?php
session_start();
if(isset($_SESSION['uname'])){
	session_unset();
	session_destroy();
	header("Location: index.php");
}else{
	echo "you are an idiot";
}
?>