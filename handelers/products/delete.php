<?php
include "../../app/database.php";
$id = $_GET['id'];

$sql = "DELETE FROM `products` WHERE `id` = $id";

$result = mysqli_query($conn, $sql);

header('location:../../products/index.php');