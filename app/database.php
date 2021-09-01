<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "product_management4";

// connect to databases
$conn = mysqli_connect($serverName, $userName, $password);

//create database if it's not exists
$create_db = "CREATE DATABASE IF NOT EXISTS product_management4";
$result_create_db = mysqli_query($conn, $create_db);
if(!$result_create_db){
    die("Error Creating Database <br>". mysqli_connect_error($conn));
} else{
    echo "databas $databaseName created sucssesfully";
}

// connect to database projects_mangement (project manegment system)
$conn = mysqli_connect($serverName, $userName, $password, $databaseName);

//insert into db function
function DB_insert($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    if(DB_affected_rows()){
        return true;
    } else{
        DB_errors(); 
        // return false 
        // make ne function for connection error
    }
}

//update into db function
function DB_iupdate($query){
    global $conn;

    $result = mysqli_query($conn, $query);

    if(DB_affected_rows()){
        return true;
    } else{
        DB_errors();
    }
}






//queries function errors
function DB_errors(){
    global $conn;
    return mysqli_error($conn);
}

// check
function DB_affected_rows(){

    global $conn;
    return mysqli_affected_rows($conn);
}