<?php
include "../../app/database.php";
$id = $_GET['id'];

$sql = "DELETE FROM `users` WHERE `id` = $id";

$result = mysqli_query($conn, $sql);

header('location:../../users/index.php');