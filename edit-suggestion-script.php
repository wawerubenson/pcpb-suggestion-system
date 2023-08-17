
<?php
include "config/db.php";
if (!isset($_SESSION['user-id'])) {
    header('Location: signin.php');
    die();
} 

    if (isset($_POST['edit_suggestion'])) {
        $suggestion_id = filter_var($_POST['suggestion_id'],FILTER_SANITIZE_NUMBER_INT);
        $department = filter_var($_POST['department'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        // validate values
        if (!$department || !$description ) {
            $_SESSION["edit-suggestion"] = "Invalid input $department";
        } 
        // redirect back to signup in case of any errors
        if (isset($_SESSION["edit-suggestion"])) {
            // pass data back to form
            $_SESSION['edit-suggestion-data'] = $_POST;
            header('Location: ' . ROOT_URL . 'signin.php');
            die();
        } else {
            // insert new users
            $update_query = "UPDATE suggestions SET department = '$department',description = '$description' WHERE id = $suggestion_id  LIMIT 1";
            $insert = mysqli_query($dbconnection, $update_query);
            if (!mysqli_error($dbconnection)) {
                $_SESSION["edit-suggestion-success"] = "Suggestion  edited successfully";
                header('Location: suggestion-history.php');
            }
        }
    } else {
        // if button wasnt clicked... return user to signup
        header('Location: edit-suggestion.php');
        die();
    }

