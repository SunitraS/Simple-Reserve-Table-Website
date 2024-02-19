<?php
session_start();
$errors = array();
include('condb.php');

if (isset($_POST['reg_user'])) {
    $userFName = mysqli_real_escape_string($conn, $_POST['fname']);
    $userLName = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $userPhone = mysqli_real_escape_string($conn, $_POST['phone']);

    $user_check_query = "SELECT * FROM customer WHERE email = '$email' LIMIT 1 ";

    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) { // if user exists
        if ($result['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $sql = "INSERT INTO customer (userFName,userLName,email,password,userPhone) VALUES ('$userFName','$userLName','$email','$password','$userPhone')";

        mysqli_query($conn, $sql);

        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }else{
        header('location: register.php');
    }
}
