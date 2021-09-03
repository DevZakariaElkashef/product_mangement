<?php 
include '../../app/config.php';
include '../../app/validation.php';
include '../../app/session.php';
include '../../app/database.php';
$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    foreach($_POST as $key => $value){
        $$key = trim(filter_var($value,FILTER_SANITIZE_STRING));
    }
    // validations
    // name
    if(required($fname) && required($lname) ){
        $errors[] = "name is required";
    }elseif(minVal($fname,3) && minVal($lname,3) ){
        $errors[] = "please type more than 3 chars";
    }
    elseif(maxVal($fname,20) && maxVal($lname,20) ){
        $errors[] = "please type less than 50 chars";
    }

    //email

    if(required($email)){
        $errors[] = "Email Is Requierd";
    }

    elseif(!filter_email($email)){
        $errors[] = "Email Is Not Valid";
    }

    //password

    if(required($password)){
        $errors[] = "Password Is Requierd";
    }
    
    $password = sha1($password);

    



    if(empty($errors)){
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `type`) VALUES('$fname','$lname', '$email', '$password', '$type')";
        if(DB_insert($sql)){
            $_SESSION['message'] = ['added sucsess'];
        }else{
            die("ERROR");
        }
    }else{
        
        SE_input('errors',$errors);
        
    }
    
    header("location:".URL.'users/add.php');
    // header("location:".URL.'users/index.php');




}