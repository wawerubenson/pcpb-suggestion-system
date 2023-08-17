

<?php

require "config/db.php";

if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    // echo $id;
    $query = "SELECT * FROM suggestions WHERE id = $id";
    $query_result = mysqli_query($dbconnection,$query);
    $user = mysqli_fetch_assoc($query_result);

    // delete the user
    $query_delete = "DELETE FROM suggestions WHERE id = $id LIMIT 1";
    $delete_result = mysqli_query($dbconnection,$query_delete);
    if(mysqli_errno($dbconnection)) {
        $_SESSION['delete-suggestion-error'] = "Could not delete that suggestion ";
    } else {
        $_SESSION['delete-suggestion-success'] = "Suggestion deleted successfully";
    }
}

header('location: ' . ROOT_URL . 'suggestion-history.php');
die();