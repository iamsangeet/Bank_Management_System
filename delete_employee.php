<?php
session_start();
//connect to the server
include "./connection.php";
//fetch the data from the URL
$employee_id = $_GET['employee_id'];

$sql = "DELETE FROM employee "
        . " WHERE employee_id = :employee_id ";
//parse the sql
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ":employee_id",$employee_id);
//execute the sql
oci_execute($statement);
$rows = oci_num_rows($statement);
if($rows>0){
    //success
    header('location: fetch_data_employee.php');
}else{
     header('location: fetch_data_employee.php?error=true');
}
//close the connection
oci_free_statement($statement);
oci_close($link);
?>
