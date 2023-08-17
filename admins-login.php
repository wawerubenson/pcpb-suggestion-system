<?php
include "config/db.php";
// include "header.php";


$email = $_SESSION['signin-data']['email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;


unset($_SESSION['signin-data']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <script src="https://use.fontawesome.com/577ccac0e9.js"></script>
    <title>Sign in</title>

</head>

<body>
    <header>
         <div class="logo">
      <img src="img/download.jpg" alt="">
    <a class="navbar-brand mr-5 " href="index.php">PCPB <br> Suggestion System</a>
    </div>
        
        <nav>
            <ul>
                <?php if (isset($_SESSION['user-id'])): ?>
                    <li> <a href="logout.php">Logout</a> </li>
                <?php else: ?>
                    <li><a href="signin.php">Staff Login</a></li>
            <li><a href="admins-login.php">Admin Login</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </header>

    <div class="container mt-4">
        <form method="post" action="admins-login-script.php">

           
            <h1>Admins Login</h1>
            <?php
            if (isset($_SESSION['signup-success'])): ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['signup-success'];
                        unset($_SESSION['signup-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['edit-suggestion'])): ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['edit-suggestion'];
                        unset($_SESSION['edit-suggestion']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <label for="email"><b>Email</b></label>
            <input type="text" value="<?= $email ?>" placeholder="Enter Email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" value="<?= $password ?>" placeholder="Enter Password" name="password" required>

            <button type="submit" class="btn btn-success" name="admin_login">Login</button>
            <a href="admins_register.php" class="createAccountLink">Create Account</a>
        </form>
    </div>

    <?php //include "footer.php" ?>