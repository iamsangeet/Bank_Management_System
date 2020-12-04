<?php
if(empty($_SESSION)) // if the session not yet started 
   session_start();

include_once 'connection.php'; //connect the connection page


if(!isset($_SESSION['uname'])) { //if not yet logged in
   header("Location: index.php");// send to login page
   exit;
} 
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
					<a href="index.html"><img src="images/logo2.png" alt="image"></a>
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

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
			
            <div id="home" class="parallax first-section" data-stellar-background-ratio="0.4" style="background-image:url('uploads/background.jpg');">
                <div class="container-fluid">
                    <div class="row">
						<div id="full-width" class="owl-carousel owl-theme">
							<div class="text-center item">
								<div class="col-md-8 col-md-offset-2 col-sm-1">
									<div class="big-tagline text-center">
										<h2><strong>SAB Bank Limited</strong><br>
										Kathmandu</h2>
										<p class="lead">You are richer than you think </p>
                                        <a href="fetch_data_branch.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">View Branches</a></br></br>
										<a href="fetch_data_customers.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">View Customers</a></br></br>
										<a href="fetch_data_employee.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">View Employees</a></br></br> 
                                        <a href="fetch_data_transaction.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">View Transactions</a></br></br>
                                        <a href="add_news.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">Add News</a></br></br>
                                    </div>
								</div>
							</div>
						</div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->
        </div>
    </div>
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