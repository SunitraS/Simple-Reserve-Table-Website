<?php
session_start();
include('condb.php');

if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must login first";
    header('location: login.php');
}
if(isset($_GET['Logout'])){
    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');
}
?>
