<?php
if(empty($_SESSION)) // if the session not yet started 
   session_start();

include_once 'connection.php'; //connect the connection page


if(!isset($_SESSION['uname'])) { //if not yet logged in
   header("Location: index.php");// send to login page
   exit;
} 
//fetch the data from the URL
$employee_id= $_GET['employee_id'];

//prepare the SQL statement
$sql = "SELECT * FROM EMPLOYEE WHERE employee_id = :employee_id ";
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ":employee_id", $employee_id);
//execute it
oci_execute($statement);
$data = oci_fetch_assoc($statement);

//print_r($data);

//close the connection
oci_free_statement($statement);
//for branch id information
$sql = "SELECT * FROM branches ";
//parse the statement
$statement = oci_parse($link, $sql);
//execute the sql
oci_execute($statement);
$data1 = array();
while($row = oci_fetch_assoc($statement)){
    array_push($data1, $row);
}
//free the statement
oci_free_statement($statement);
oci_close($link);



?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Bank Management System</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo_transparent.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logo_transparent.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    

</head>
<body class="bank_management">

    <!-- LOADER -->
    

    <div id="wrapper">

        <!-- Sidebar-wrapper -->
        <div id="sidebar-wrapper">
            <div class="side-top">
                <div class="logo-sidebar">
                    <a href="index.php"><img src="images/logo2.png" alt="image"></a>
                </div>
                <ul class="sidebar-nav">
                    <li><a class="active" href="adminbank.php">Home</a></li>
                    <li><a href="about.<?php  ?>">About Us</a></li>
                    <li><a href="news.php">News</a></li>
                     <?php if (isset($_SESSION['uname'])) { ?>
                <li><a href="logout.php">Log Out</a></li>
                <?php }?>
                </ul>
            </div>
        </div>
        
        <!-- End Sidebar-wrapper -->

        <div class="container">
    <form class="well form-horizontal" method="post" action="process_edit_employee.php" enctype="multipart/form-data">
    <fieldset>
        <legend><h3>
        Update Employee Information
            </h3></legend>
       <div class="form-group">
        <label class="col-md-4 control-label">Employee ID</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="number" name="employee_id" class= "form-control" value="<?php echo $data['EMPLOYEE_ID'];?>" readonly>
                </div>
            </div>
        </div> 
        <div class="form-group">
        <label class="col-md-4 control-label">Branch ID</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <select name="branch_id" required>
                
                <option value="" selected disabled style="font-weight: bold;" >Select Branch ID</option>
                <?php foreach($data1 as $key=>$value){?>
                <li><option><?php echo $value['BRANCH_ID']; ?></option>
            <?php }?>
        </select>
                </div>
            </div>
        </div>
       
    
        <div class="form-group">
        <label class="col-md-4 control-label">Employee Name</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="employee_name" class= "form-control" value="<?php echo $data['EMPLOYEE_NAME'];?>" required>
                </div>
            </div>
        </div>
         <div class="form-group">
        <label class="col-md-4 control-label">Salary</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-eur"></i></span>
                <input type="number" name="salary" class= "form-control" value="<?php echo $data['SALARY'];?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Address</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" name="address" class= "form-control" value="<?php echo $data['ADDRESS'];?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Phone</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="number" name="phone" class= "form-control" value="<?php echo $data['PHONE'];?>" required>
                </div>
            </div>
        </div>
       <div class="form-group">
        <label class="col-md-4 control-label">Picture</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                <input type="file" name="employee_pic" id="employee_pic" class= "form-control" value="<?php echo $data['EMPLOYEE_PIC']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
        <label class="col-md-4 control-label">
            </label>
            <div class="col=md-4">
            <button type="submit" class="btn btn-warning">Update<span class="glyphicon glyphicon-send"></span></button>
            </div>
        </div>
        <input type="hidden" name="old_employee_id" value="<?php echo $data['EMPLOYEE_ID']; ?>" />
        <input type="hidden" name="old_file_name" value="<?php echo $data['EMPLOYEE_PIC']; ?>" />
        <!--<input type="hidden" name="old_branch_id" value="<?php echo $data1['BRANCH_ID']; ?>" />-->
        </fieldset>    
        </form>
    </div>


<script src="js/jquery1.js"></script>
<script src="js/bootstrap1.js"></script>

            
            
 <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    (function($) {
        "use strict";
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        smoothScroll.init({
            selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
            selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
            speed: 500, // Integer. How fast to complete the scroll in milliseconds
            easing: 'easeInOutCubic', // Easing pattern to use
            offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
            callback: function ( anchor, toggle ) {} // Function to run after scrolling
        });
    })(jQuery);
    </script>

</body>
</html>
