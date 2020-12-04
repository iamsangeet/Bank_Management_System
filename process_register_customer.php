<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<pre>";

$branch_id = $_POST['branch_id'];
//$account_no=$_POST['account_no'];
$account_name=$_POST['account_name'];
$balance=$_POST['balance'];
$address = $_POST['address'];
$phone=$_POST['phone'];
include_once "./connection.php";
$sql = "INSERT INTO customers "
        . "(account_no, account_name, balance,address,phone,branch_id)"
        ." VALUES (seq_account.nextval,:account_name,:balance,:address,:phone,:branch_id) ";
//echo "<br />". $sql;

//execute the query:
$statement = oci_parse($link, $sql);
//bind by name
oci_bind_by_name($statement,':branch_id', $branch_id);
oci_bind_by_name($statement,':account_name', $account_name);
oci_bind_by_name($statement,':balance', $balance);
oci_bind_by_name($statement,':address', $address);
oci_bind_by_name($statement,':phone', $phone);

oci_execute($statement);
$rows = oci_num_rows($statement);
//echo "The client has been registered ";
//close the connection
oci_close($link);
//echo "<br /> The connection has been closed ".$rows ;
header('location: fetch_data_customers.php');

?>
