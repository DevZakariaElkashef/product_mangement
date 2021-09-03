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
    // NAME
    if(required($name)){
        $errors[] = "name is required";
    }elseif(minVal($name,3)){
        $errors[] = "please type more than 3 chars";
    }
    elseif(maxVal($name,50)){
        $errors[] = "please type less than 50 chars";
    }

    // PRICE
    if(required($price)){
        $errors[] = "Price is required";
    }
    elseif(!numberVal($price)){
        $error[] = "Please Type Digit Value";
    }
    elseif($price <= 0){
        $error[] = "Price Can't Be Zero Or Less";
    }
    
    //QTY
    if(required($qty)){
        $errors[] = "Quantaty is required";
    }
    if(!numberVal($qty)){
        $error[] = "Please Type Digit Value";
    }
    if($qty <= 0){
        $error[] = "qtyQuantaty Can't Be Zero Or Less";
    }

    //CODE
    if(required($code)){
        $error[] = "Code Is Required";
    }


    if(empty($errors)){

        $sql = "UPDATE `products` SET `name` = '$name', `price` = $price, `qty` = $qty, `code` = '$code' WHERE `id` = $id ";
        if(DB_insert($sql)){
            $_SESSION['message'] = ['added sucsess'];
        }
        else{
            die("ERROR". mysqli_error($conn));
        }
    }
    else{

        SE_input('errors',$errors);

    }


    header("location:".URL.'products/index.php');



}