<?php
include('condb.php');

if(isset($_POST['submit'])) { 
    $bookID = $_POST['bookID'];
    $book_name = $_POST['book_name'];
    $total_price = $_POST['total_price'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
    $dateCreate = date('Y-m-d H:i:s');

    $image_size = getimagesize($_FILES['image']['tmp_name']); 
    if($image_size !== false) {

        if($image_size['mime'] == "image/jpeg" || $image_size['mime'] == "image/png" || $image_size['mime'] == "image/gif" ) {
            $sql = "INSERT INTO payment (bookID, book_name,total_price, slip, dateCreate) VALUES ('$bookID', '$book_name','$total_price', '$image', '$dateCreate')"; // Insert the image data into the database
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Image uploaded successfully.');window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Error uploading image: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>

<!-- HTML form to upload an image -->
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
    รหัสการจอง :
    <input type="text" name="bookID"><br><br>

    ชื่อบัญชี :
    <input type="text" name="book_name"><br><br>

    จำนวนเงิน :
    <input type="text" name="total_price"><br><br>

    สลิปการโอน :
    <input type="file" name="image">

    <input type="submit" value="Upload Image" name="submit">
</form>