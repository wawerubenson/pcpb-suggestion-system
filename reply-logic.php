
<?php

require "config/db.php";
// Getting form data from the user

if(isset($_POST['send_reply'])){
    $sugg_id =filter_var($_POST['suggestion_id'], FILTER_SANITIZE_NUMBER_INT);
    $user_id =filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

    $username = filter_var($_POST['user_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $role = filter_var($_POST['role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $admin_name = filter_var($_POST['user_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reply = filter_var($_POST['reply'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  
        $insert_query = "INSERT INTO replies (sugg_id,user_id,user_name,department,description,admin_name,reply) VALUES ($sugg_id,$user_id,'$username','$department','$description','$admin_name','$reply')";
        $query_result = mysqli_query($dbconnection,$insert_query);

        if(mysqli_error($dbconnection)) {
            echo mysqli_error($dbconnection);
        }

        if(!mysqli_error($dbconnection)) {
            $_SESSION['reply-success'] = "Suggestion for $username replied successfully";
            // redirect to login page with success message
            header('Location: admins.php');
            die();

        }

} else {
    header('Location: reply.php');
    die();
}    


