
<?php
require "config/db.php";

if (isset($_POST['admin_login'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$email) {
        $_SESSION['signin'] = "Enter user email";
    } elseif (!$password) {
        $_SESSION['signin'] = "Enter password";
    } else {
        // fetch users from db
        $fetch_user = "SELECT * FROM admins WHERE email = '$email' LIMIT 1";
        $fetch_user_result = mysqli_query($dbconnection, $fetch_user);

        if (mysqli_num_rows($fetch_user_result) == 1) {
            // convert record into assoc array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            // compare password
            if (password_verify($password, $db_password)) {
                // set session for access control
                $_SESSION['user-id'] = $user_record['id'];
                header('Location: ' . ROOT_URL . 'admins.php');
                die();
                
            } else {
                $_SESSION['signin'] = "Check your password";
            }
        } else {
            $_SESSION['signin'] = "User not found. Try again";
        }
    }
    // redirect to signin page
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'admins-login.php');
        die();
    }
} else {
    header('Location: ' . ROOT_URL . 'admins-login.php');
}