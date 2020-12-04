<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     
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
.hero-image {
  background-image: url("uploads/background.jpg");
  background-color: #cccccc;
  height: 700px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  background-blend-mode: multiply;
}
.hero-text {
  text-align: center;
  position: absolute;
  
  top: 0%;
  left: 29%;
  color: white;
}
.login-box{
    width: 320px;
    height: 350px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 65%;
    left: 60%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}
.avatar{
    width: 100px;
    height: 100px;
    border-radius: 10%;
    position: absolute;
    top: -40px;
    left: calc(50% - 50px);
}
.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}


.login-box a{
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}

</style>


</head>
<body class="bank_management">

    <!-- LOADER -->
    <div id="preloader">
        <div class="cube-wrapper">
		  <span class="loading" data-name="Loading">Bank Loading</span>
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">

        <!-- Sidebar-wrapper -->
        <div id="sidebar-wrapper">
			<div class="side-top">
				<div class="logo-sidebar">
					<a href="index.php"><img src="images/logo2.png" alt="image"></a>
				</div>
				<ul class="sidebar-nav">
					<li><a class="active" href="index.php">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="news.php">News</a></li>
				</ul>
			</div>
        </div>
        <!-- End Sidebar-wrapper -->


<div class="hero-image">
  <div class="hero-text">
    <p style="font-size:45px" color="white"><b>SAB Bank Limited</b></p>
    <p style="font-size:40px"><b>Kathmandu</b></p>
    <p style="font-size:20px"><b>You are richer than you think</b></p>
  </div>
</div>

    <div class="login-box">
    <img src="images/avatar.png" class="avatar">
        <h7>Admin Login</h7>
            <form method="post" action="process_login.php">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required="username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required="password">
            <input type="submit" name="submit" value="Login" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">    
            </form>
        </div>
								
            
    </div><!-- end wrapper -->

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