<?php 
session_start();

if(!isset($_SESSION['user_email'])){
    header('location:login.php');
}

// define base url 
define("URL","http://localhost:2525/Back-End/WorkShop-1-2/Zakaria_Elkashef/product_mangement/");