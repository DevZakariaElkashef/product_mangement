<?php 
require_once '../app/config.php'; 
require_once '../app/database.php'; 
require_once ('../inc/header.php'); 

$sql = "SELECT * FROM `users` ";
$result = mysqli_query($conn, $sql);
 
?>     

<?php if(!isset($_SESSION['admin'])): ?>

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-success btn-lg" href="<?= URL . "users/add.php" ?>" role="button">Add New User </a>
        </h3>
    </div>
    <?php endif; ?>

    <h1 class=" p-3 border display-4">  All Users  </h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col"> First Name</th>
                    <th scope="col"> Last Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col">Type</th>
                    <?php if(!isset($_SESSION['admin'])): ?>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                <?php $i=0; while($row = mysqli_fetch_assoc($result)) :?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= $row['first_name'] ?></td>
                            <td><?= $row['last_name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['type'] ?></td>
                            <?php if(!isset($_SESSION['admin'])): ?>

                            <td><a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="../handelers/users/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                </table>

               
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

<?php require_once '../inc/footer.php'; ?>     




