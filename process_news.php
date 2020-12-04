<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<pre>";

$story = $_POST['story'];
include_once "./connection.php";
$sql = "INSERT INTO news "
        . "(news_id,story,published_date)"
        ." VALUES (seq_news.nextval,:story,SYSDATE)";
//echo "<br />". $sql;

//execute the query:
$statement = oci_parse($link, $sql);
//bind by name
oci_bind_by_name($statement,':story', $story);

oci_execute($statement);
$rows = oci_num_rows($statement);
//echo "The client has been registered ";
//close the connection
oci_close($link);
//echo "<br /> The connection has been closed ".$rows ;
header('location: news.php');

?>
