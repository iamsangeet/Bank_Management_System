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
$tmpname=$_FILES['branch_pic']['tmp_name'];
$original_name=$_FILES['branch_pic']['name'];
$newName="uploads/".date('yyyy_mm_dd_hh_ii_ss_').$original_name;
move_uploaded_file($tmpname,$newName);

//$branch_id = $_POST['branch_id'];
$location=$_POST['location'];
$no_of_employees = $_POST['no_of_employees'];
include_once "./connection.php";
$sql = "INSERT INTO branches "
        . "(branch_id, location, no_of_employees,branch_pic)"
        ." VALUES (seq_branch.nextval,:location,:no_of_employees,:branch_pic) ";
//echo "<br />". $sql;

//execute the query:
$statement = oci_parse($link, $sql);
//bind by name
//oci_bind_by_name($statement,':branch_id', $branch_id);
oci_bind_by_name($statement,':location', $location);
oci_bind_by_name($statement,':no_of_employees', $no_of_employees);
oci_bind_by_name($statement,':branch_pic', $newName);

oci_execute($statement);
$rows = oci_num_rows($statement);
//echo "The client has been registered ";
//close the connection
oci_close($link);
//echo "<br /> The connection has been closed ".$rows ;
header('location: fetch_data_branch.php');

?>
