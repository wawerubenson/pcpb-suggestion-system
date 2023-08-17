
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
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="style2.css" >
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
            <?php if(isset($_SESSION['user-id'])) : ?>
            <li> <a href="logout.php">Logout</a> </li>
            <?php else : ?>
            <li><a href="signin.php">Staff Login</a></li>
            <li><a href="admins-login.php">Admin Login</a></li>
            <?php endif ?>
          </ul>
        </nav>
      </header>

<div class="container mt-4">
  <form method="post" action="signin-script.php">

  <?php
               if(isset($_SESSION['signin'])): ?>
                <div class="alert__message error">
                <p> <?= $_SESSION['signin']; 
                unset($_SESSION['signin']);
                ?> </p>
                </div>
                <?php elseif(isset($_SESSION['edit-suggestion'])) : ?>
                  <div class="alert__message error">
                <p> <?= $_SESSION['edit-suggestion']; 
                unset($_SESSION['edit-suggestion']);
                ?> </p>
                </div>
                <?php endif ?>   
   <h1>Staff Login</h1>
   <label for="email"><b>Email</b></label>
   <input type="text" value="<?= $email ?>" placeholder="Enter Email" name="email" required>

   <label for="password"><b>Password</b></label>
   <input type="password" value="<?= $password ?>" placeholder="Enter Password" name="password" required>

   <button type="submit" class="btn btn-success" name="login">Login</button>
   <a href="register.php" class="createAccountLink">Create Account</a>
  </form>
 </div>

<?php //include "footer.php" ?>