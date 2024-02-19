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
            <th>#</th>
            <th>Table </th>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Person</th>
            <th>Phone</th>
            <th>Price</th>
            <th>Date Create</th>
        </thead>

        <tbody>
            <?php 

                include_once('func.php');
                $fetchdata = new booking();
                $sql = $fetchdata->fetchdata();
                while($row = mysqli_fetch_array($sql)) {

            ?>

                <tr>
                    <td><?php echo $row['no']; ?></td>
                    <td><?php echo $row['table_id']; ?></td>
                    <td><?php echo $row['booking_name']; ?></td>
                    <td><?php echo $row['booking_date']; ?></td>
                    <td><?php echo $row['booking_time']; ?></td>
                    <td><?php echo $row['booking_person']; ?></td>
                    <td><?php echo $row['booking_phone']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['dateCreate']; ?></td>
                    
                    <td><a href="bookDel.php?del=<?php echo $row['no']; ?>" class="btn btn-danger">Delete</a></td>
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