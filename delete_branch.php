<?php
session_start();
//connect to the server
include "./connection.php";
//fetch the data from the URL
$branch_id = $_GET['branch_id'];
$sql = "DELETE FROM branches "
        . " WHERE branch_id = :branch_id ";
//parse the sql
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ":branch_id", $branch_id);
//execute the sql
oci_execute($statement);
$rows = oci_num_rows($statement);
if($rows>0){
    //success
    header('location: fetch_data_branch.php');
}else{
     header('location: fetch_data_branch.php?error=true');
}
//close the connection
oci_free_statement($statement);
oci_close($link);
?>
