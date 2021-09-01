<?php
require_once '../app/config.php';
require_once '../inc/header.php';
include('../app/database.php');

$sql = "SELECT * FROM `products` ";
$result = mysqli_query($conn, $sql);


?>    

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-success btn-lg" href="<?= URL . "products/add.php" ?>" role="button">Add New Product </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  All Products  </h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">action</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=0; while($row = mysqli_fetch_assoc($result)) :?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['category_id'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['qty'] ?></td>
                            <td><?= $row['code'] ?></td>
                            <td><a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="../handelers/products/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                </table>

               
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

