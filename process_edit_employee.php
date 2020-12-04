<?php
session_start();
//connect to the database
include './connection.php';
//fetch the data from the form
$old_employee_id = $_POST['old_employee_id'];//hidden element
$old_file_name=$_POST['old_file_name'];

$tmpname = $_FILES['employee_pic']['tmp_name'];
$original_name=$_FILES['employee_pic']['name'];
$newName="uploads/".date('yyyy-mm-dd-hh-ii-ss').$original_name;
move_uploaded_file($tmpname, $newName);
//deleting
unlink($old_file_name);

$branch_id=$_POST['branch_id'];
$employee_name=$_POST['employee_name'];
$salary=$_POST['salary'];
$address=$_POST['address'];
$phone=$_POST['phone'];
//prepare the sql statement UPDATE
$sql = "UPDATE employee "
        . " SET employee_name= :new_employee_name,"
        . " salary= :new_salary ,"
        . "address= :new_address,"
        ."phone= :new_phone,"
        ."branch_id=:new_branch_id,"
        ."employee_pic= :new_employee_pic"
        . " WHERE employee_id = :old_employee_id";
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ':new_branch_id', $branch_id);
oci_bind_by_name($statement, ':new_employee_name', $employee_name);
oci_bind_by_name($statement, ':new_salary', $salary);
oci_bind_by_name($statement, ':new_employee_pic', $newName);
oci_bind_by_name($statement, ':new_phone',$phone);
oci_bind_by_name($statement, ':new_address',$address);
oci_bind_by_name($statement, ":old_employee_id",$old_employee_id );
//echo $sql;
//die();
//execute
oci_execute($statement);
//free the resources
$rows = oci_num_rows($statement);
if($rows > 0){
    //success
    header('location: fetch_data_employee.php');
}else{
    header('location: fetch_data_employee.php?error=could not modify');
}
//close the connection
oci_free_statement($statement);
oci_close($connection);
//redirect to the fetch_data.php

?>