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
    if($password){
        $password = sha1($password);
        $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `password` = '$password',  `type` = '$type' WHERE `id` = $id ";
    }
    elseif(!$password){
        $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `type` = '$type' WHERE `id` = $id ";

    }

    



    if(empty($errors)){
        if(DB_insert($sql)){
            $_SESSION['message'] = ['added sucsess'];
        }elseif(!DB_insert($sql)){
            die("ERROR". mysqli_error($conn));
        }
    }else{
        
        SE_input('errors',$errors);
        
    }
    
    header("location:".URL.'users/index.php');




}