<?php 
require "config/db.php";
session_destroy();
header('Location: signin.php' );
die();

?>