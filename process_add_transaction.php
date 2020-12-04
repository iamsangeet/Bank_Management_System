<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<pre>";

//$employee_id = $_POST['employee_id'];
//$account_no=$_POST['account_no'];
$type=$_POST['type'];
$amount=$_POST['amount'];
$account_no = $_POST['account_no'];
$employee_id=$_POST['employee_id'];
include_once "./connection.php";
$sql = "INSERT INTO transactions "
        . "(transaction_id,type,amount,performed_date,account_no,employee_id)"
        ." VALUES (seq_transaction.nextval,:type,:amount,SYSDATE,:account_no,:employee_id)";
//echo "<br />". $sql;

//execute the query:
$statement = oci_parse($link, $sql);
//bind by name
oci_bind_by_name($statement,':type', $type);
oci_bind_by_name($statement,':account_no', $account_no);
oci_bind_by_name($statement,':amount', $amount);
oci_bind_by_name($statement,':employee_id', $employee_id);

oci_execute($statement);
$rows = oci_num_rows($statement);
//echo "The client has been registered ";
//close the connection
oci_close($link);
//echo "<br /> The connection has been closed ".$rows ;
header('location: fetch_data_transaction.php');

?>
