<?php
include "../../app/database.php";
$id = $_GET['id'];

$sql = "DELETE FROM `categories` WHERE `id` = $id";

$result = mysqli_query($conn, $sql);

header('location:../../categories/index.php');