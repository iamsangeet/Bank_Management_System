<?php
session_start();
//connect to the database
include './connection.php';
//fetch the data from the form
$old_account_no = $_POST['old_account_no'];//hidden element
//$old_branch_id=$_POST['old_branch_id'];

$branch_id= $_POST['branch_id'];
$account_name=$_POST['account_name'];
$balance=$_POST['balance'];
$address=$_POST['address'];
$phone=$_POST['phone'];
//prepare the sql statement UPDATE
$sql = "UPDATE customers "
        . " SET account_name= :new_account_name,"
        . " balance= :new_balance ,"
        . "address= :new_address,"
        ."phone= :new_phone,"
        ."branch_id=:new_branch_id"
        . " WHERE account_no = :old_account_no";
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ':new_branch_id', $branch_id);
oci_bind_by_name($statement, ':new_account_name', $account_name);
oci_bind_by_name($statement, ':new_balance', $balance);
oci_bind_by_name($statement, ':new_phone',$phone);
oci_bind_by_name($statement, ':new_address',$address);
oci_bind_by_name($statement, ":old_account_no",$old_account_no );
//echo $sql;
//die();
//execute
oci_execute($statement);
//free the resources
$rows = oci_num_rows($statement);
if($rows > 0){
    //success
    header('location: fetch_data_customers.php');
}else{
    header('location: fetch_data_customers.php?error=could not modify');
}
//close the connection
oci_free_statement($statement);
oci_close($connection);
//redirect to the fetch_data.php

?>