<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "product_mangement";

// connect to server
$conn = mysqli_connect($serverName, $userName, $password);

//create database if it's not exists
$create_db = "CREATE DATABASE IF NOT EXISTS product_mangement";
$result_create_db = mysqli_query($conn, $create_db);
if(!$result_create_db){
    die("Error Creating Database <br>". mysqli_connect_error($conn));
}

// connect to database product_mangement
$conn = mysqli_connect($serverName, $userName, $password, $databaseName);


//create categorise table if it's not exists
$create_cat_tabel = "CREATE TABLE IF NOT EXISTS $databaseName.categories (
    `id` INT PRIMARY KEY AUTO_INCREMENT ,
    `name` varchar(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL default CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL on update CURRENT_TIMESTAMP
)";

$result_create_cat_table = mysqli_query($conn, $create_cat_tabel);

if(!$result_create_cat_table){
    die("error creating categories table <br>". mysqli_error($conn));
}



//create products table if it's not exists
$create_products_tabel = "CREATE TABLE IF NOT EXISTS $databaseName.products (
    `id` INT PRIMARY KEY AUTO_INCREMENT ,
    `category_id` INT,
    `name` varchar(255) NOT NULL,
    `price` FLOAT NOT NULL,
    `qty` INT NOT NULL,
    `code` VARCHAR(100),
    `created_at` TIMESTAMP NOT NULL default CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL on update CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
)";

$result_create_products_table = mysqli_query($conn, $create_products_tabel);

if(!$result_create_products_table){
    die("error creating products table <br>". mysqli_error($conn));
}



//create users table if it's not exists
$create_users_tabel = "CREATE TABLE IF NOT EXISTS $databaseName.users (
    `id` INT PRIMARY KEY AUTO_INCREMENT ,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `type` 	enum('admin', 'super_admin') NOT NULL,
    `created_at` TIMESTAMP NOT NULL default CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL on update CURRENT_TIMESTAMP
)";

$result_create_users_table = mysqli_query($conn, $create_users_tabel);

if(!$result_create_users_table){
    die("error creating users table <br>". mysqli_error($conn));
}

$test = sha1("0000");

// insert admins 
$sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `type`)
SELECT * FROM (SELECT 'super', 'admin', 'z@z.com', '$test', 'super_admin') AS tmp
WHERE NOT EXISTS (
    SELECT first_name FROM `users` WHERE first_name = 'super'
) LIMIT 1;";
$result = mysqli_query($conn, $sql);

if(!$result){
    die("error admin". mysqli_error($conn));
}













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

