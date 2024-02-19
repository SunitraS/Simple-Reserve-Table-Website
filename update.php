<?php 

    include_once('func.php');

    $updatedata = new DB_con();

    if (isset($_POST['update'])) {

        $userID = $_POST['userID'];
        $userFName = $_POST['userFName'];
        $userLName = $_POST['userLName'];
        $userPhone = $_POST['userPhone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = $updatedata->update($userID,$userFName, $userLName, $userPhone, $email, $password);
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
            $updateuser = new DB_con();
            $sql = $updateuser->fetchonerecord($userID);
            while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="userID" class="form-label">ID</label>
                <input type="text" class="form-control" name="userID"
                    value="<?php echo $row['userID']; ?>">
            </div>
            <div class="mb-3">
                <label for="userFName" class="form-label">First name</label>
                <input type="text" class="form-control" name="userFName" 
                    value="<?php echo $row['userFName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="userLName" class="form-label">Last name</label>
                <input type="text" class="form-control" name="userLName" 
                    value="<?php echo $row['userLName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="userPhone">Phone</label>
                <input type="text" class="form-control" name="userPhone"
                    value="<?php echo $row['userPhone']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" 
                    value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="mb-3" >
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" 
                    value="<?php echo $row['password']; ?>" required>
            </div>
            
            <?php } ?>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
</body>
</html>