
<?php
include "config/db.php";
if (!isset($_SESSION['user-id'])) {
    header('Location: signin.php');
    die();
  }
  
$current_user =  $_SESSION['user-id'];
$select_current = "SELECT * FROM users WHERE id = $current_user LIMIT 1";
$select_current_result = mysqli_query($dbconnection,$select_current);
$select_array = mysqli_fetch_assoc($select_current_result);

if(isset($_POST['submit_suggestion'])) {
    $category = filter_var($_POST['department'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['suggestion'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_id = $select_array['id'];
    $user_name = $select_array['first_name'];

    $insert_query = "INSERT INTO suggestions (user_id,user_name,department,description) VALUES ($user_id,'$user_name','$category','$description')";
    $insert_result = mysqli_query($dbconnection,$insert_query);

    if(!mysqli_errno($dbconnection)) {
        $_SESSION['suggestion-success'] = "Suggestion added successfully";
        header('Location: suggestion-history.php');
        die();
    }
} else {
    header('Location : index.php');
    die();
}