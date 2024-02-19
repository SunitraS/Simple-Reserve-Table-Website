<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
    <h1 class="mt-5">Admin Page</h1>
    <a href="adminCus.php" class="btn btn-success">Customer Page</a>
    <a href="adminBook.php" class="btn btn-success">Booking Page</a>
    <a href="test2.php" class="btn btn-success">Slip Page</a>
    <hr>
    <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
        </thead>

        <tbody>
            <?php 

                include_once('func.php');
                $fetchdata = new DB_con();
                $sql = $fetchdata->fetchdata();
                while($row = mysqli_fetch_array($sql)) {

            ?>

                <tr>
                    <td><?php echo $row['userID']; ?></td>
                    <td><?php echo $row['userFName']; ?></td>
                    <td><?php echo $row['userLName']; ?></td>
                    <td><?php echo $row['userPhone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    
                    <td><a href="update.php?id=<?php echo $row['userID']; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete.php?del=<?php echo $row['userID']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>

            <?php 

                }
            ?>
        </tbody>
    </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>