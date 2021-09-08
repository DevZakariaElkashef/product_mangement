<?php
include '../../app/config.php';
include '../../app/validation.php';
include '../../app/session.php';
include '../../app/database.php';
$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    foreach ($_POST as $key => $value) {
        $$key = trim(filter_var($value, FILTER_SANITIZE_STRING));
    }

    // validations
    // NAME
    if (required($name)) {
        $errors[] = "name is required";
    } elseif (minVal($name, 3)) {
        $errors[] = "please type more than 3 chars";
    } elseif (maxVal($name, 50)) {
        $errors[] = "please type less than 50 chars";
    } else{

        $_SESSION['product_name'] = $name;
    }

    // PRICE
    if (required($price)) {
        $errors[] = "Price is required";
    } elseif (!numberVal($price)) {
        $error[] = "Please Type Digit Value";
    } elseif ($price <= 0) {
        $error[] = "Price Can't Be Zero Or Less";
    } else{
        $_SESSION['product_price'] = $price;
    }

    //QTY
    if (required($qty)) {
        $errors[] = "Quantaty is required";
    } elseif (!numberVal($qty)) {
        $error[] = "Please Type Digit Value";
    } elseif ($qty <= 0) {
        $error[] = "qtyQuantaty Can't Be Zero Or Less";
    } else{
        $_SESSION['product_qty'] = $qty;

    }

    //CODE
    if (required($code)) {
        $error[] = "Code Is Required";
    } else{

        $_SESSION['product_code'] = $code;
    }


    if (empty($errors)) {
        $sql = "INSERT INTO products(`name`, `price`, `qty`, `code`) VALUES('$name', $price, $qty, '$code')";
        if (DB_insert($sql)) {
            $_SESSION['message'] = ['added sucsess'];
        } else {
            die("ERROR");
        }
        unset($_SESSION['product_name'], $_SESSION['product_price'], $_SESSION['product_qty'], $_SESSION['product_code']);
    } else {

        SE_input('errors', $errors);
    }


    header("location:" . URL . 'products/add.php');
}
