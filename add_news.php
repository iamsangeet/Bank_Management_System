<?php

if(empty($_SESSION)) // if the session not yet started 
   session_start();

include_once 'connection.php'; //connect the connection page


if(!isset($_SESSION['uname'])) { //if not yet logged in
   header("Location: index.php");// send to login page
   exit;
} 
$sql = "SELECT * FROM employee ";
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
//for customer
$sql="SELECT * FROM customers";
//parse the statement
$statement=oci_parse($link,$sql);
//execute the sql
oci_execute($statement);
$data2=array();
while($row=oci_fetch_assoc($statement)){
    array_push($data2,$row);
}
//free the statement
oci_free_statement($statement);
//close the connection
oci_close($link);

//echo "<pre>";
//print_r($data);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    
<style> 
input[type=text] {
  width: 100%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
}
</style>
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
    <form class="well form-horizontal" method="post" action="process_news.php" enctype="multipart/form-data">
    <fieldset>
        <legend><h3>
        Lets Provide Some Good News
            </h3></legend>     
<input type="text" name="story" placeholder="Enter some news...." required>
</div>
        <div class="form-group">
        <label class="col-md-4 control-label">
            </label>
            <div class="col=md-4">
            <button type="submit" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">Add</button>
            </div>
        </div>
    </fieldset>
</form>
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
