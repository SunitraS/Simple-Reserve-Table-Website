<?php include('condb.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantata+One">
    <link rel="stylesheet" href="lab_css.css">
    <style>
        form {
            height: 620px;
            width: 400px;
        }

        form img {
            float: right;
        }

        .gender {
            font-size: 20px;
            margin: 10px;
        }

        .check {
            margin: 10px;
            margin-bottom: 30px;
            font-size: 14px;
            margin-left: 70%;

        }
    </style>
</head>

<body>
    <form action="signup_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <a href="login.php" target="_blank"><img src="img/c.png" width="20px" height="20px"></a>
        <h1>Register Member</h1>
        <hr><br>
        <div class="field">
            <input type="text" name="fname" placeholder="First name">
        </div>
        <br>
        <div class="field">
            <input type="text" name="lname" placeholder="Last name">
        </div><br>
        <div class="field">
            <input type="email" name="email" placeholder="Email">
        </div><br>
        <div class="field">
            <input type="password" name="password" placeholder="Password">
        </div><br>
        <div class="field">
            <input type="tel" name="phone" placeholder="Phone" pattern="[0-9]{10}">
        </div>
        <br><br>
        <div class="submit-btn">
            <input type="submit" name="reg_user" value="signup">
        </div>
    </form>
</body>

</html>