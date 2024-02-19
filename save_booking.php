<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Booking Confirmation</title>
	<style>
		body {
			background-image: url("img/v5.jpg");
			background-attachment: fixed;
			color: black;
			font-size: 16px;
			font-family: 'Mali', sans-serif;
		}

		h1 {
			color: white;
			font-size: 34px;
			margin-top: 70px;
		}

		img {
			display: block;
			margin: 0 auto;
		}
	</style>
</head>

<body>
	<center>
		<h1>PromptPay</h1>
	</center>

</body>

</html>
<?php
//เรียกใช้งานไฟล์เชื่อมต่อฐานข้อมูล
require_once 'condb.php';
require_once("lib/PromptPayQR.php");

//print_r($_POST);

if (isset($_POST['table_id']) && isset($_POST['booking_name']) && isset($_POST['booking_date'])) {


	//ประกาศตัวแปรรับค่าจากฟอร์ม

	$booking_name = $_POST['booking_name'];
	$booking_date = $_POST['booking_date'];
	$booking_time = $_POST['booking_time'];
	$booking_person = $_POST['booking_person'];
	$booking_phone = $_POST['booking_phone'];
	$total_price = $booking_person * 179;
	$table_id = $_POST['table_id'];
	date_default_timezone_set('Asia/Bangkok');
	$dateCreate = date('Y-m-d H:i:s'); //วันที่บันทึก

	//insert booking
	mysqli_query($conn, "BEGIN");
	$sqlInsertBooking = "INSERT INTO tbl_booking values(null, '$table_id', '$booking_name', '$booking_date', '$booking_time', '$booking_person', '$booking_phone','$total_price', '$dateCreate')";
	$rsInsertBooking = mysqli_query($conn, $sqlInsertBooking);

	//การใช้ Transection ประกอบด้วย  BEGIN COMMIT ROLLBACK 


	//update table status
	$sqlUpdate = "UPDATE tbl_table SET table_status=1 WHERE id = $table_id"; //1=จอง
	$rsUpdate = mysqli_query($conn, $sqlUpdate);


	if ($rsInsertBooking && $rsUpdate) {
		$sql = "SELECT b.no 
		FROM tbl_booking b
		INNER JOIN tbl_table t ON b.table_id = t.id
		WHERE t.id = $table_id" ;
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo '<div style="background-color: white; margin-left: 25%; display:flex; justify-content:center; width:50%; font-size:20px; padding-top: 15px; padding-bottom: 15px; color: red; text-align: center;">
      	รหัสการจอง (ใช้สำหรับยืนยันการชำระเงิน): ' . $row['no'] . '</div>';

		$PromptPayQR = new PromptPayQR(); // new object

		$result = $conn->query("SELECT total_price FROM tbl_booking WHERE table_id = $table_id");

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$total_price = $row['total_price'];
		} else {
			$total_price = 0;
		}

		$PromptPayQR = new PromptPayQR(); // new object
		$PromptPayQR->size = 8; // Set QR code size to 8
		$PromptPayQR->id = '0962297415'; // PromptPay ID
		$PromptPayQR->amount = $total_price; // Set amount (not necessary)
		echo '<div style="display:flex;justify-content:center; ">
		<img style="background-color: #fff; margin-top: 40px; margin-bottom: 70px; padding: 20px;border-radius: 5px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);" src="' . $PromptPayQR->generate() . '" /></div>';

		$current_time = time();

		// Convert the record creation time to a Unix timestamp
		$dateCreate_timestamp = strtotime($dateCreate);

		// Calculate the time difference in seconds
		$time_diff_seconds = $current_time - $dateCreate_timestamp;

		// Check if the time difference is greater than 30 minutes (1800 seconds)
		if ($time_diff_seconds > 1800) {
			// Set the status_table to 0
			$resetTable = "UPDATE tbl_table SET table_status=0 WHERE id = $table_id";
			$tbUpdate = mysqli_query($conn, $resetTable);
		}

		//ตรรวจสอบถ้า 2 ตัวแปรทำงานได้ถูกต้องจะทำการบันทึก แต่ถ้าเกิดข้อผิดพลาดจะ Rollback คือไม่บันทึกข้อมูลใดๆ
		mysqli_query($conn, "COMMIT");

		echo '<div style="background-color: #fff; margin-left: 25%; font-size: 20px; color: #000; padding: 10px; margin-top: 10px; width:50%; text-align: center;">
		บันทึกข้อมูลการจองเรียบร้อยแล้ว <p>กรุณาชำระเงินภายใน 30 นาที เพื่อยืนยันการจอง</p><a href="test.php">อัพโหลดหลักฐานการโอน</a></div>';
	} else {
		mysqli_query($conn, "ROLLBACK");
		$msg = 'บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ  <a href="index.php"> กลับหน้าหลัก </a>';
	}

} //iset 
else {
	header("Location: index.php");
}

?>

