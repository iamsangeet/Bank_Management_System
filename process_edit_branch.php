<?php
session_start();
//connect to the database
include './connection.php';
//fetch the data from the form
$old_branch_id = $_POST['old_branch_id'];//hidden element
$old_file_name=$_POST['old_file_name'];

$tmpname = $_FILES['branch_pic']['tmp_name'];
$original_name=$_FILES['branch_pic']['name'];
$newName="uploads/".date('yyyy-mm-dd-hh-ii-ss').$original_name;
move_uploaded_file($tmpname, $newName);
//deleting
unlink($old_file_name);

//$branch_id= $_POST['branch_id'];
$location= $_POST['location'];
$no_of_employees=$_POST['no_of_employees'];
//prepare the sql statement UPDATE
$sql = "UPDATE branches "
        . " SET location = :new_location,"
        . "no_of_employees= :new_no_of_employees,"
        ."branch_pic= :new_branch_pic"
        . " WHERE branch_id = :old_branch_id";
$statement = oci_parse($link, $sql);
//oci_bind_by_name($statement, ':new_branch_id', $branch_id);
oci_bind_by_name($statement, ':new_location', $location);
oci_bind_by_name($statement, ':new_no_of_employees', $no_of_employees);
oci_bind_by_name($statement, ':new_branch_pic', $newName);
oci_bind_by_name($statement, ':old_branch_id',$old_branch_id );
//echo $sql;
//die();
//execute
oci_execute($statement);
//free the resources
$rows = oci_num_rows($statement);
if($rows > 0){
    //success
    header('location: fetch_data_branch.php');
}else{
    header('location: fetch_data_branch.php?error=could not modify');
}
//close the connection
oci_free_statement($statement);
oci_close($connection);
//redirect to the fetch_data.php

?>