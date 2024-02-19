<?php 

    include_once('func.php');

    $updatedata = new booking();

    if (isset($_POST['update'])) {

        $no = $_POST['$no'];
        $booking_name = $_POST['booking_name'];
	    $booking_date = $_POST['booking_date'];
	    $booking_time = $_POST['booking_time'];
	    $booking_person = $_POST['booking_person'];
	    $booking_phone = $_POST['booking_phone'];
	    $total_price = $booking_person * 179;
	    $table_id = $_POST['table_id'];
	    date_default_timezone_set('Asia/Bangkok');
	    $dateCreate = date('Y-m-d H:i:s'); //วันที่บันทึก

        $sql = $updatedata->update($no,$table_id, $booking_name, $booking_date, $booking_time, $booking_person, $booking_phone, $total_price, $dateCreate);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='adminCus.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1 class="mt-5">Update Page</h1>
        <hr>
        <?php 

            $userID = $_GET['id'];
            $updateuser = new booking();
            $sql = $updateuser->fetchonerecord($userID);
            while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="no" class="form-label">No</label>
                <input type="text" class="form-control" name="no"
                    value="<?php echo $row['no']; ?>">
            </div>
            <div class="mb-3">
                <label for="table_id" class="form-label">Table</label>
                <input type="text" class="form-control" name="table_id"
                    value="<?php echo $row['table_id']; ?>">
            </div>
            <div class="mb-3">
                <label for="booking_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="booking_name" 
                    value="<?php echo $row['booking_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="booking_date" class="form-label">Date</label>
                <input type="text" class="form-control" name="booking_date" 
                    value="<?php echo $row['booking_date']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="booking_time">Time</label>
                <input type="text" class="form-control" name="booking_time"
                    value="<?php echo $row['booking_time']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="booking_person">Person</label>
                <input type="text" class="form-control" name="booking_person" 
                    value="<?php echo $row['booking_person']; ?>" required>
            </div>
            <div class="mb-3" >
                <label for="booking_phone">Phone</label>
                <input type="text" class="form-control" name="booking_phone"
                    value="<?php echo $row['booking_phone']; ?>" required>
            </div>
            <div class="mb-3" >
                <label for="total_price">Price</label>
                <input type="text" class="form-control" name="total_price"
                    value="<?php echo $row['total_price']; ?>" required>
            </div>
            
            <?php } ?>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
</body>
</html>