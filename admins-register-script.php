<?php

require "config/db.php";
// Getting form data from the user

if(isset($_POST['register_admin'])){
    $first_name = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $last_name = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    // $department = filter_var($_POST['department'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $admin_code = filter_var($_POST['admin_code'], FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   
    $validcodes = array(1111,2222,3333,4444,5555,6666);

   

    // validate values
    if(!$first_name) {
        $_SESSION["register"] = "Name is required";
    }elseif (!$last_name) {
        $_SESSION["register"] = "Last name is required";
    }elseif (!$email) {
        $_SESSION["register"] = "Email is required";
    }elseif (strlen($password) < 4 || strlen($cpassword) < 4) {
        $_SESSION["register"] = "Password must be 4 characters or more";
    }elseif($password !== $cpassword) {
        $_SESSION["register"] = "Passwords did not match";
    }elseif(!$admin_code) {
        $_SESSION["register"] = "Enter your admin code";
    } elseif(!in_array($admin_code,$validcodes)) {
        $_SESSION["register"] = "Enter a valid code";
    } 

    $select_query = "SELECT * FROM admins WHERE email = '$email' LIMIT 1";
    $select_query_result = mysqli_query($dbconnection,$select_query);
    if(mysqli_num_rows($select_query_result) > 0) {
        $_SESSION['register-user'] = "User already exists";
    }
    // redirect back to signup in case of any errors
    if (isset($_SESSION["register"])) {
        // pass data back to form
        $_SESSION['register-data'] = $_POST;
        header('Location: ' . ROOT_URL . 'admins_register.php');
        die();
    }else {

        $hashed = password_hash($cpassword,PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO admins (first_name,last_name,email,is_admin,admin_code,password) VALUES  ('$first_name','$last_name','$email',1,$admin_code,'$hashed')";
        $query_result = mysqli_query($dbconnection,$insert_query);

        // if(mysqli_error($dbconnection)) { 
        //     echo mysqli_error($dbconnection);
        // }
        if(!mysqli_error($dbconnection)) {
            $_SESSION['signup-success'] = "$first_name registered successfully";
            // redirect to login page with success message
            header('Location: admins-login.php');
            die();
        }
    }

}else {
    // if button wasnt clicked... return user to signup

    header('Location: ' . ROOT_URL . 'admins_register.php');
}
