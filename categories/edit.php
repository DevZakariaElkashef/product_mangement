<?php 
require_once '../app/config.php'; 
include('../inc/header.php');
include('../app/database.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `categories` WHERE `id` = $id ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


 ?>     

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?php echo URL.'categories/index.php'; ?>" role="button">View All Categories </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Edit Categoery  </h1>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <form class="p-4 m-3 border bg-gradient-info" action="<?php echo URL.'handelers/categories/update.php'; ?>" method="POST">
                    <div class="form-group">
                        <label for="cat">Category Name</label>
                        <input type="text" class="form-control" id="cat" name="name" value="<?= $row['name'] ?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div>
        
                    <button type="submit" class="btn btn-success" name="submit">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

<?php include('../inc/footer.php');  ?>     




