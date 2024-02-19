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
    <title>นายตองหมูกระทะ</title>  
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
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-center">
				<img src="img/p8.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>นายตอง หมูกระทะ</strong></h1>
							<p class="m-b-40">นี่คือหมูกระทะในตำนานแห่งหลัง ม.ขอนแก่น เวอร์ชั่นล่าสุด!! บุฟเฟ่ต์หมูกระทะสุดฮอตของชาว มข. แบบคนเเน่นตลอดๆ.. 
								เเละที่เอามาฝากรอบนี้คือ..ร้านมีปรับโซนใหม่ พร้อมเนื้อดีเติมไม่อั้น!! ที่สำคัญเปิดถึงตี 4 ไปเล้ย!!  คนละ 179 บาท / รวมน้ำเเล้ว เเละไม่จำกัดเวลา</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="table.php">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-center">
				<img src="img\p5.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>นายตอง หมูกระทะ</strong></h1>
							<p class="m-b-40">นี่คือหมูกระทะในตำนานแห่งหลัง ม.ขอนแก่น เวอร์ชั่นล่าสุด!! บุฟเฟ่ต์หมูกระทะสุดฮอตของชาว มข. แบบคนเเน่นตลอดๆ.. 
								เเละที่เอามาฝากรอบนี้คือ..ร้านมีปรับโซนใหม่ พร้อมเนื้อดีเติมไม่อั้น!! ที่สำคัญเปิดถึงตี 4 ไปเล้ย!!  คนละ 179 บาท / รวมน้ำเเล้ว เเละไม่จำกัดเวลา</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="table.php">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="img/logo.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 ">
					<div class="inner-column">
						<h1>Welcome To <span>ร้าน นายตอง หมูกระทะ </span></h1>
						<h4>นี่คือหมูกระทะในตำนานแห่งหลัง ม.ขอนแก่น</h4>
						<p> รูปแบบร้านคือบุฟเฟ่ต์แบบตักเอง มีบาร์บุฟเฟ่ต์ ให้เลือกหยิบตามใจชอบ
							ตัวร้านเป็นแบบ open-air โต๊ะเยอะมาก อากาศถ่ายเทดี หอมฮ่ายๆ .. 🚗 เเละมีที่จอดรถนำเด้อออ </p>
						<p>ไลน์บุฟเฟ่ต์คือของแน่นมาก ทั้งของสด อาหารทานเล่นบอกเล่ยว่าเด็ด!! ประมาณนี้...</p>
						<p>🥓 หมูสไลด์ , สามชั้นสไลด์ , สันคอสไลด์ , เนื้อริบอายสไลด์ , เนื้อติดมันสไลด์ , หมูหมัก , ปลาหมึก , ลูกชิ้น และผักต่างๆ มีข้าวโพดชีสด้วย!!</p>
						<p>🍝 ของทานเล่นก็จะมี ยำ , ขนมจีนแกงเขียวหวาน , สปาเก็ตตี้ , ของทอดต่างๆ</p>
						<p>🍨 ของหวานก็มี น้ำแข็งไส , ไอศกรีม , ผลไม้</p>
						<p>🫕 น้ำจิ้มมี 4 สูตร หวาน , เปรี้ยว , แซ่บ , ซีฟู้ด</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="table.php">Reservation</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="img\p1.jpg">
							<img class="img-fluid" src="img\p1.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="img\p2.jpg">
							<img class="img-fluid" src="img\p2.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="img\p3.jpg">
							<img class="img-fluid" src="img\p3.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="img\p9.jpg">
							<img class="img-fluid" src="img\p9.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="img\p5.jpg">
							<img class="img-fluid" src="img\p5.jpg" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="img\p6.jpg">
							<img class="img-fluid" src="img\p6.jpg" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
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