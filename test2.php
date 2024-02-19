<div class="container">
    <h1 class="mt-5">Admin Page</h1>
    <a href="adminCus.php" class="btn btn-success">Customer Page</a>
    <a href="adminBook.php" class="btn btn-success">Booking Page</a>
    <a href="test2.php" class="btn btn-success">Slip Page</a>
    <hr>
    <br>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from payment table
$sql = "SELECT * FROM payment";
$result = mysqli_query($conn, $sql);

// Display the data in a table format
echo '<div class="container">';
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Booking ID</th>';
echo '<th>Book Name</th>';
echo '<th>Total Price</th>';
echo '<th>Date</th>';
echo '<th>Slip</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.$row['payID'].'</td>';
    echo '<td>'.$row['bookID'].'</td>';
    echo '<td>'.$row['book_name'].'</td>';
    echo '<td>'.$row['total_price'].'</td>';
    echo '<td>'.$row['dateCreate'].'</td>';
    echo '<td><img src="data:image/jpeg;base64,'.base64_encode($row['slip']).'" alt="Slip" style="width:100px;height:100px;" data-toggle="modal" data-target="#myModal'.$row['payID'].'"></td>';
    echo '</tr>';
    // Modal to show full picture when clicked
    echo '<div class="modal fade" id="myModal'.$row['payID'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel'.$row['payID'].'" aria-hidden="true">';
    echo '<div class="modal-dialog modal-lg" role="document">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title" id="myModalLabel'.$row['payID'].'">Transaction ID: '.$row['payID'].'</h5>';
    echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    echo '<span aria-hidden="true">&times;</span>';
    echo '</button>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['slip']).'" alt="Slip" style="max-width:100%;">';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>