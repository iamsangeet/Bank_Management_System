<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<pre>";

print_r($_FILES);
echo "</pre>";
$tmpname=$_FILES['employee_pic']['tmp_name'];
$original_name=$_FILES['employee_pic']['name'];
$newName="uploads/".date('yyyy_mm_dd_hh_ii_ss_').$original_name;
move_uploaded_file($tmpname,$newName);

$branch_id = $_POST['branch_id'];
//$employee_id=$_POST['employee_id'];
$employee_name=$_POST['employee_name'];
$salary=$_POST['salary'];
$address = $_POST['address'];
$phone=$_POST['phone'];
include_once "./connection.php";
$sql = "INSERT INTO employee "
        . "(employee_id, employee_name, salary,address,phone,employee_pic,branch_id)"
        ." VALUES (seq_emp.nextval,:employee_name,:salary,:address,:phone,:employee_pic,:branch_id) ";
//echo "<br />". $sql;

//execute the query:
$statement = oci_parse($link, $sql);
//bind by name
oci_bind_by_name($statement,':branch_id', $branch_id);
oci_bind_by_name($statement,':employee_name', $employee_name);
oci_bind_by_name($statement,':salary', $salary);
oci_bind_by_name($statement,':address', $address);
oci_bind_by_name($statement,':phone', $phone);
oci_bind_by_name($statement,':employee_pic', $newName);

oci_execute($statement);
$rows = oci_num_rows($statement);
//echo "The client has been registered ";
//close the connection
oci_close($link);
//echo "<br /> The connection has been closed ".$rows ;
header('location: fetch_data_employee.php');

?>
