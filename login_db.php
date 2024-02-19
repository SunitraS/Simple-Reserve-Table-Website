<?php
session_start();
$errors = array();
include('condb.php');

if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong Email or Password");
                $_SESSION['error'] = "Wrong Username or Password!";
                header("location: login.php");
        }
    }
    else {
        array_push($errors, "Email & Password is required");
        $_SESSION['error'] = "Email & Password is required";
        header("location: login.php");
    }
  }

?>