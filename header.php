<?php include "config/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <!-- <link rel="stylesheet" href="style2.css" > -->
  <script src="https://use.fontawesome.com/577ccac0e9.js"></script>
  <!-- <link rel="stylesheet" href="style2.css" > -->
  <title><?= $current_page ?></title>

</head>

<body>
  <?php if(isset($_SESSION['user-id'])) : ?>
  <div class="sub-header">
    <?php

    $current_user = $_SESSION['user-id']; 
    $select_user = "SELECT * FROM users WHERE id = $current_user LIMIT 1";
    $select_user_result = mysqli_query($dbconnection, $select_user);

    $select_array = mysqli_fetch_assoc($select_user_result);
    ?>


    <?php if (isset($_SESSION['user-id'])): ?>
      
      <p class="nav-item">logged in as
        <?= $select_array['first_name'] ?>  
       
      </p>
      <p> <a class="nav-link" href="logout.php">Logout</a> </p>
    <?php else: ?>
      <p class="nav-item"><a class="nav-link" href="signin.php">Login</a></p>
    <?php endif ?>
    <!-- <p>Logged in as </p> -->
  </div>
  <?php endif ?>

  <nav class="navbar navbar-expand-lg  header-nav">
    <div class="logo">
      <img src="img/download.jpg" alt="">
    <a class="navbar-brand mr-5 " href="index.php">PCPB <br> Suggestion System</a>
    </div>
    <!-- <div class="mr-auto"></div> -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-5" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="suggestion-history.php">My Suggestions <span class="count">1</span> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="suggestion-history.php"> Replies <span class="count">1</span> </a>
        </li>

        <?php
        //if(isset($_SESSION['user-id'])) : ?>
      <?php
        // $select_sms = "SELECT * FROM replies WHERE user_id = $current_user";
        // $sms_ress = mysqli_query($dbconnection,$select_sms);
        // if(mysqli_num_rows($sms_ress) > 0 ) : ?>
      <?php  
        //  $count = mysqli_num_rows($sms_ress);
         //if($count > 0) :
          ?>

          <!-- <li class="nav-item">
          <a class="nav-link" href="notifications.php">Notifications (<?= $count ?>)</a>
          </li> -->

          <?php //endif ?>
          <?php //endif ?>
          <?php //endif ?>
        

        <?php if (isset($_SESSION['user-id'])): ?>
          <li> <a class="nav-link" href="logout.php">Logout</a> </li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="signin.php">Login/register</a></li>
        <?php endif ?>

      </ul>
    </div>
  </nav>