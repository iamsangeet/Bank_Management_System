<?php
session_start();
//connect to the server
include "./connection.php";
//fetch the data from the URL
$account_no = $_GET['account_no'];
//$old_account_no = $_POST['old_account_no'];//hidden element
$sql = "DELETE FROM customers "
        . " WHERE account_no= :account_no ";
//parse the sql
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ":account_no", $account_no);
//execute the sql
oci_execute($statement);
$rows = oci_num_rows($statement);
if($rows>0){
    //success
    header('location: fetch_data_customers.php');
}else{
     header('location: fetch_data_customers.php?error=true');
}
//close the connection
oci_free_statement($statement);
oci_close($link);
?>
