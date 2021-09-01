hello world
<?php 
session_start();
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

}


if(empty($errors)){
    $_SESSION['user_email'] = $email;
    $_SESSION['user_password'] = $password;
        
    header("location:../../index.php");
} else{
    $_SESSION['errors'] = $errors;
    header("location:../../login.php");

}


function filter_email($email){
return filter_var($email, FILTER_VALIDATE_EMAIL);
}

