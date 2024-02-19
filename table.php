<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'condb.php';
//query
$query = "SELECT * FROM tbl_table ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BookingTable</title>

	<meta name="description" content="Source code generated using layoutit.com">
	<meta name="author" content="LayoutIt!">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mali">
	<link href="csstable/bootstrap.min.css" rel="stylesheet">
	<link href="csstable/style.css" rel="stylesheet">
	

	<style>
		body {
			font-size: 15px;
			font-family: 'Mali', sans-serif;
			line-height: 1.80857;
		}

		.txt {
			font-family: 'Mali', sans-serif;
			font-size: 32px
		}

	</style>

</head>

<body>
	<div class="container-fluid">
		<center>
			<h1 class="txt">แผนผังจองโต๊ะ</h1>
		</center>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-1">
						<button type="button" value="Rotated text" id="rotate1"
							class="btn btn-block disabled btn-info bar1">
							BAR
						</button>
						<?php
						foreach ($result as $row) {
							if ($row['id'] <= 3) {
								if ($row['table_status'] == 0) { //ว่าง
									echo '<a href="booking.php?id=' . $row["id"] . '&act=booking" class="btn btn-success b1" target="_blank">' . $row['table_name'] . '</a>';
								} else { //ถูกจอง
									echo '<a href="#" class="btn btn-secondary disabled b1" target="_blank">' . $row['table_name'] . '</a>';
								}
							}
						}
						?>

					</div>
					<!-- cashier -->
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12">

								<button type="button" class="btn btn-block disabled btn-info cash">
									CASHIER
								</button>
							</div>
						</div>
						<!-- bar water -->
						<div class="row">
							<div class="col-md-12">

								<button type="button" value="Rotated text" id="rotate"
									class="btn disabled btn-info bar">
									BAR
								</button>
							</div>
						</div>
						<div class="row">
							<?php foreach ($result as $row) {
								if ($row['id'] > 3 and $row['id'] <= 9) {
									if ($row['table_status'] == 0) { //ว่าง
										echo '<div class="col-md-6" >';
										echo '<a href="booking.php?id=' . $row["id"] . '&act=booking"class="btn btn-success b2" target="_blank">' . $row['table_name'] . '</a></div>';
									} else { //ถูกจอง
										echo '<div class="col-md-6">';
										echo '<a href="#" class="btn btn-secondary disabled b2" target="_blank">' . $row['table_name'] . '</a></div>';
									}
								}
							} ?>
						</div>

					</div>
					<div class="col-md-8">

						<button type="button" class="btn btn-block disabled btn-info bar-water">
							BAR
						</button>
						<div class="row">
							<?php foreach ($result as $row) {
								if ($row['id'] > 9 and $row['id'] <= 39)
									if ($row['table_status'] == 0) { //ว่าง
										echo '<div class="col-md-2" >';
										echo '<a href="booking.php?id=' . $row["id"] . '&act=booking"class="btn btn-success b2" target="_blank">' . $row['table_name'] . '</a></div>';
									} else { //ถูกจอง
										echo '<div class="col-md-2">';
										echo '<a href="#" class="btn btn-secondary disabled b2" target="_blank">' . $row['table_name'] . '</a></div>';
									}
							} ?>
						</div>
								
						<br><br><br>
						<button type="button" class="btn disabled btn-block btn-danger exit">
							EXIT
						</button>
						
					</div>
				</div>
				<p>*เขียว = ว่าง, เทา = ไม่ว่าง</p>
				<a href="index.php">
					<button type="button" class="btn btn-danger exit">BACK</button>
				</a>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>

</body>

</html>