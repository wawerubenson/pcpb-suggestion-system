

<?php
session_start();

define('ROOT_URL','http://localhost/pcpb-suggestions-system/');

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";

$dbconnection = mysqli_connect($servername, $dbusername, $dbpassword);

mysqli_select_db($dbconnection, 'suggesstions_database');

if(!$dbconnection) {
    die("could not connect to database");
}
 ?>