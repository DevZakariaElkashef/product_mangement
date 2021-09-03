<?php 
require_once '../app/config.php'; 
include('../app/database.php');

$sql = "SELECT * FROM `categories` ";
$result = mysqli_query($conn, $sql);

?>     

<?php
include('../inc/header.php');  ?>     

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-success btn-lg" href="<?php echo URL.'categories/add.php'; ?>" role="button">Add New Category </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  All Categories  </h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; while($row = mysqli_fetch_assoc($result)) :?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="../handelers/categories/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                </table>

               
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

<?php include('../inc/footer.php'); ?>     




