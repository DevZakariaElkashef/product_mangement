<?php 
session_start();
include "../../app/validation.php";
include "../../app/database.php";
$errors = [];

if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];
    
    //validation

    //email
    if(required($email)){
        $errors[] = "Email Is Required";
    }
    elseif(!filter_email($email)){
        $errors[] = "Email Is Not Valid";
    }
    //password
    if(required($password)){
        $errors[] = "Password Is Required";
    }
    $password = sha1($password);

}

// echo $email;

$sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
     
if(mysqli_num_rows($result) == 1){
    if($row['type'] === 'admin'){
        $_SESSION['admin'] = $row['type'];
    }
}
else {
    $errors[] = "USER IS Not Defined";
}



if(empty($errors)){
    $_SESSION['user_email'] = $email;
    $_SESSION['user_password'] = $password;




    header("location:../../index.php");
} else{


    $_SESSION['errors'] = $errors;
    header("location:../../login.php");

}




