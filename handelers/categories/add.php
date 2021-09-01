<?php 
include '../../app/config.php';
include '../../app/validation.php';
include '../../app/session.php';
include '../../app/database.php';
$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    $name = $_POST['name'];

    // validations 
    if(required($name)){
        $errors[] = "name is required";
    }elseif(minVal($name,3)){
        $errors[] = "please type more than 3 chars";
    }
    elseif(maxVal($name,50)){
        $errors[] = "please type less than 50 chars";
    }


    if(empty($errors)){
        $sql = "INSERT INTO categories(`name`) VALUES('$name')";
        if(DB_insert($sql)){
            $_SESSION['message'] = ['added sucsess'];
        }else{
            die("ERROR");
        }
    }else{

        SE_input('errors',$errors);

    }


    header("location:".URL.'categories/add.php');



}