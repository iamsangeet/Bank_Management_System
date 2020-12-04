<?php
if(empty($_SESSION)) // if the session not yet started 
   session_start();

include_once 'connection.php'; //connect the connection page


if(!isset($_SESSION['uname'])) { //if not yet logged in
   header("Location: index.php");// send to login page
   exit;
} 

$branch_id = $_GET['branch_id'];

//prepare the SQL statement
$sql = "SELECT * FROM branches WHERE branch_id = :branch_id ";
$statement = oci_parse($link, $sql);
oci_bind_by_name($statement, ":branch_id", $branch_id);
//execute it
oci_execute($statement);
$data = oci_fetch_assoc($statement);
//print_r($data);

//close the connection
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
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
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
                    <li><a class="active" href="adminbank.html">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="news.php">News</a></li>
                     <?php if (isset($_SESSION['uname'])) { ?>
                <li><a href="logout.php">Log Out</a></li>
                <?php }?>
                </ul>
            </div>
        </div>
        
        <!-- End Sidebar-wrapper -->

        <div class="container">
    <form class="well form-horizontal" method="post" action="process_edit_branch.php" enctype="multipart/form-data">
    <fieldset>
        <legend><h3>
        Update Branch Information
            </h3></legend>
        
        <div class="form-group">
        <label class="col-md-4 control-label">Branch ID</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                <input type="number" name="branch_id" class= "form-control" value="<?php echo $data['BRANCH_ID'];?>" readonly>
                </div>
            </div>
        </div>
    
    
        <div class="form-group">
        <label class="col-md-4 control-label">Location</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <input type="text" name="location" class= "form-control" value="<?php echo $data['LOCATION'];?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Number of employees</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="number" name="no_of_employees" class= "form-control" value="<?php echo $data['NO_OF_EMPLOYEES'];?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label class="col-md-4 control-label">Branch Photo</label>
            <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                <input type="file" name="branch_pic" id="branch_pic" class= "form-control" value="<?php echo $data['BRANCH_PIC']; ?>">
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
        <input type="hidden" name="old_branch_id" value="<?php echo $data['BRANCH_ID']; ?>" />
                <input type="hidden" name="old_file_name" value="<?php echo $data['BRANCH_PIC']; ?>" />
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
