<?php
// Establish database connection
require_once 'condb.php';

if (isset($_POST['submit'])) { // Check if the form was submitted
  $bookID = $_POST['bookID'];
  $book_name = $_POST['book_name'];
  $total_price = $_POST['total_price'];
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); // Get the image data and add slashes to handle special characters
  date_default_timezone_set('Asia/Bangkok');
  $dateCreate = date('Y-m-d H:i:s'); // Get the current date and time

  $image_size = getimagesize($_FILES['image']['tmp_name']); // Get the image size

  // Check if the file is an actual image or fake image
  if ($image_size !== false) {
    // Allow certain file formats
    if ($image_size['mime'] == "image/jpeg" || $image_size['mime'] == "image/png" || $image_size['mime'] == "image/gif") {
      $sql = "INSERT INTO payment (bookID, book_name,total_price, slip, dateCreate) VALUES ('$bookID', '$book_name', '$image', '$dateCreate')";
      if (mysqli_query($conn, $sql)) {
        echo "Image uploaded successfully.";
      } else {
        echo "Error uploading image: " . mysqli_error($conn);
      }
    } else {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
  } else {
    echo "File is not an image.";
  }
}
?>

<style>
  form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    font-family: Arial, sans-serif;
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"],
  input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    font-size: 16px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  form p {
    font-size: 14px;
    margin-top: 10px;
    margin-bottom: 0;
  }
</style>
<br>
<center>
  <h1>อัพโหลดหลักฐานการโอน</h1>
</center>
<hr>
<br><br><br>
<form action="" method="post" enctype="multipart/form-data">
  <label for="slip">สลิปการโอน : </label>
  <input type="file" name="slip" id="slip">
  <br>
  <label for="bookID">รหัสการจอง : </label>
  <input type="text" name="bookID" id="bookID">
  <br>
  <label for="book_name">ชื่อบัญชี :</label>
  <input type="text" name="book_name" id="book_name">
  <br>
  <label for="total_price">จำนวนเงิน -:</label>
  <input type="text" name="total_price" id="total_price">
  <br>
  <input type="submit" value="Submit Payment">
</form>