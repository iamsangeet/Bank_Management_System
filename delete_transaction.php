<?php
session_start();
//connect to the server
include "./connection.php";
//fetch the data from the URL
$transaction_id = $_GET['transaction_id'];
//$old_transaction_id = $_POST['old_transaction_id'];//hidden element
$sql = "DELETE FROM transactions "
        . " WHERE transaction_id = :transaction_id ";
//parse the sql
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ":transaction_id", $transaction_id);
//execute the sql
oci_execute($statement);
$rows = oci_num_rows($statement);
if($rows>0){
    //success
    header('location: fetch_data_transaction.php');
}else{
     header('location: fetch_data_transaction.php?error=true');
}
//close the connection
oci_free_statement($statement);
oci_close($link);
?>
