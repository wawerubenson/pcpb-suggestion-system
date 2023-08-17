<?php

require "config/db.php";
// Getting form data from the user

if (isset($_POST['register_user'])) {
    $first_name = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $last_name = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $role = filter_var($_POST['role'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    // validate values
    if (!$first_name) {
        $_SESSION["register"] = "Name is required";
    } elseif (!$last_name) {
        $_SESSION["register"] = "Last name is required";
    } elseif (!$email) {
        $_SESSION["register"] = "Email is required";
    } elseif (strlen($password) < 4 || strlen($cpassword) < 4) {
        $_SESSION["register"] = "Password must be 4 characters or more";
    } elseif ($password !== $cpassword) {
        $_SESSION["register"] = "Passwords did not match";
    }

    $select_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $select_query_result = mysqli_query($dbconnection, $select_query);

    if ($select_query_result) {
        if (mysqli_num_rows($select_query_result) > 0) {
            $_SESSION['register-user'] = "User already exists";
            // echo "hello";
        }
    }

    // redirect back to signup in case of any errors
    if (isset($_SESSION["register"])) {
        // pass data back to form
        // echo "hello";
        $_SESSION['register-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'register.php');
        die();
    } else {
        $hashed = password_hash($cpassword, PASSWORD_DEFAULT);
        // echo "before";
        $insert_query = "INSERT INTO users (first_name,last_name,email,password) VALUES  ('$first_name','$last_name','$email','$hashed')";

        // echo "after";

        $query_result = mysqli_query($dbconnection, $insert_query);

        echo mysqli_error($dbconnection);
        // header('Location: signin.php');
        if (!mysqli_error($dbconnection)) {
            echo "hello";
            $_SESSION['signup-success'] = "$first_name registered successfully";
            // redirect to login page with success message
            header('Location: signin.php');
            // die();
        }
    }
} else {
    // if button wasnt clicked... return user to signup
    echo "hello";

    header('Location: ' . ROOT_URL . 'register.php');
}
