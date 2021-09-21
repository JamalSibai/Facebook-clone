<!-- 
THEME: Aviato | E-commerce template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/aviato-e-commerce-template/
DEMO: https://demo.themefisher.com/aviato/
GITHUB: https://github.com/themefisher/Aviato-E-Commerce-Template/

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->
<?php
include "connection.php";
session_start();
 
if(!$_SESSION["id"]){
    header("location:login.php");
}

$query = "SELECT * 
from  users
WHERE  id = ? ";
$stmt = $connection->prepare($query);
$stmt->bind_param('s', $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result ->fetch_assoc();
////////

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Aviato | E-commerce template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/edit_profile.js"></script>

</head>

<body id="body">




<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Facebook</h1>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section class="user-dashboard page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="list-inline dashboard-menu text-center">
			<li><a href="profile-details.php" class="active">Profile Details</a></li>
			<li><a href="dashboard.php">Find Friends</a></li>
			<li><a href="notifications.php" >Notifications</a></li>
			<li><a href="friends.php">Friends</a></li>
			<li><a href="php/logout.php">logout</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media">
            <div class="pull-left text-center" href="#!">
              <img class="media-object user-img" src="images/avater.jpg" alt="Image">
              
            </div>
            <div class="media-body">
              <ul class="user-profile-list" id = "show_edit">
                <li><span>Full Name:</span><?= $row["name"]?></li>
                <li><span>Email:</span><?= $row["email"]?></li>
                <li><span>Phone:</span><?= $row["phone"]?></li>
				<li><span>Gender:</span><?= $row["gender"]?></li>
              </ul>
			  
            </div>
          </div>
        </div>
      </div>
    </div>
	<div class = "text-center" style="padding: 10px;">
	<button type = "button" class="btn btn-main btn-large btn-round-full " id = "edit_profile_btn" >Edit Profile</button>
	</div>
  </div>
</section>

<section class="signin-page account" >
	<div class="container" id="popup" hidden >
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="block text-center">
				<button class = "close-button"></button>
			<h2 class="text-center">Edit Expense</h2>
			<form class="text-left clearfix" action="php\login.php" method="POST"  >
				<div class="form-group" id = "all_form" >
					
				</div>
				<div class="form-group">
				<input type="text" class="form-control"  placeholder="name" name="name" id="name_add_edit" >
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="phone" name="phone" id = "phone_add_edit" >
				</div>
				<div class="form-group">
					<select class="form-control" required  name="gender" placeholder="gender" id = "gender_edit" >
						<option class="form-control" >Male</option>
						<option class="form-control" >Female</option>													
					</select>
				</div>
				<div class="text-center">
				<button type="button" class="btn btn-main text-center" id = "button_id_edit" >Edit</button>
				</div>
			</form>
			
			</div>
		</div>
	</div>
</section>

<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com/themefisher">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/themefisher">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://www.twitter.com/themefisher">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="https://www.pinterest.com/themefisher/">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="contact.html">CONTACT</a>
					</li>
					<li>
						<a href="shop.html">SHOP</a>
					</li>
					<li>
						<a href="pricing.html">Pricing</a>
					</li>
					<li>
						<a href="contact.html">PRIVACY POLICY</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></p>
			</div>
		</div>
	</div>
</footer>
    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>