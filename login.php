<?php include('condb.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Logging in</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantata+One">
    <link rel="stylesheet" href="lab_css.css">
    <style>
        form {
            height: 500px;
            width: 400px;
        }

        .signup {
            margin: 15px;
        }
    </style>
</head>

<body>
    <form action="login_db.php" method="post">
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
        <h1 align="center">Log In</h1>
        <hr><br>
        <div class="field">
            <input type="text" name="email" placeholder="Email" />
            <img src="img/1.png" width=30px height=30px>
        </div>
        <br>
        <div class="field">
            <input type="password" name="password" placeholder="Password" />
            <img src="img/2.png" width=30px height=30px>
        </div>
        <br><br><br>
        <div class="submit-btn">
            <input type="submit" name="login_user" value="signin" />
        </div>
        <hr>
        <div class="signup">
            Not a member?
            <a href="signup.php">Signup now</a>
        </div>
    </form>
</body>

</html>