<?php
session_start();
include('condb.php');

if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must login first";
    header('location: login.php');
}
if(isset($_GET['Logout'])){
    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Yamifood Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mali">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
	<!-- Start header -->
	<header class="top-navbar" >
		<nav class="navbar navbar-expand-lg navbar-light bg-light" >
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="img/lg.jpg" width="60px" height="60px" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.php">Special</a></li>
						<li class="nav-item"><a class="nav-link" href="table.php">Reservation</a></li>
						<li class="nav-item"><a class="nav-link" href="login.php">Log Out</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		
	</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
					<h2>Special</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".Fresh">Fresh</button>
							<button data-filter=".Dessert">Dessert</button>
							<button data-filter=".Other">Other</button>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row special-list">
				<div class="col-lg-4 col-md-6 special-grid Fresh">
					<div class="gallery-single fix">
						<img src="img/b1.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Fresh">
					<div class="gallery-single fix">
						<img src="img/b3.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Fresh">
					<div class="gallery-single fix">
						<img src="img/b3.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Fresh">
					<div class="gallery-single fix">
						<img src="img/b6.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Dessert">
					<div class="gallery-single fix">
						<img src="img/b9.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Other">
					<div class="gallery-single fix">
						<img src="img/p8.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Dessert">
					<div class="gallery-single fix">
						<img src="img/p7.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Dessert">
					<div class="gallery-single fix">
						<img src="img/b10.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Other">
					<div class="gallery-single fix">
						<img src="img/v5.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid Other">
					<div class="gallery-single fix">
						<img src="img/v4.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>

				<div class="col-lg-4 col-md-6 special-grid Other">
					<div class="gallery-single fix">
						<img src="img/v5.jpg" class="img-fluid" alt="Image">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							088 721 7889
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<a href="https://www.facebook.com/profile.php?id=100058705015623">
						<i class="fa fa-facebook"></i>
					</a>
					<div class="overflow-hidden">
						<h4>Facebook</h4>
						<p class="lead">
							นายตอง หมูกระทะ
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<a href="https://goo.gl/maps/rk6U1u7ZAxvQvH2j6">
						<i class="fa fa-map-marker"></i>
					</a>
					<div class="overflow-hidden">
						<p class="lead">
							ซอยครูพรม ตำบลศิลา อำเภอเมืองขอนแก่น
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none; background-color:black;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>