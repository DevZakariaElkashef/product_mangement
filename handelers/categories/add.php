<?php 
include '../../app/config.php';
include '../../app/validation.php';
include '../../app/session.php';
include '../../app/database.php';
$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])){

    $name = $_POST['name'];

    // validations 
    if(is_requiredVal($name)){
        $errors[] = "name is required";
    }elseif(!is_minValue($name,3)){
        $errors[] = "please type more than 3 chars";
    }
    elseif(!is_maxValue($name,50)){
        $errors[] = "please type less than 50 chars";
    }


    if(empty($errors)){
        $sql = "INSERT INTO categories(`name`) VALUES('$name')";
        if(DB_insert($sql)){
            SE_input('success',"Added Success");
        }else{
            die("Adsfasdfasfd");
        }
    }else{

        SE_input('errors',$errors);

    }


    header("location:".URL.'categories/add.php');



}