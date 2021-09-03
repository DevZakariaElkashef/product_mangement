<?php 
include '../app/config.php';
include '../app/database.php';
include "../inc/header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `products` WHERE `id` = $id ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

  
?>

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?php echo URL.'products/index.php'; ?>" role="button">View All Products </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Edit Product  </h1>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">



            
                <form action="../handelers/products/update.php" class="p-4 m-3 border bg-gradient-info" method="POST" >
                    <div class="form-group">
                        <label for="cat">Product Name</label>
                        <input type="text" class="form-control" id="cat" name="name" value="<?= $row['name'] ?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div>
                    <div class="form-group">
                        <label for="cat">Product Price</label>
                        <input type="text" class="form-control" id="cat" name="price" value="<?= $row['price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="cat">Product Quantity</label>
                        <input type="text" class="form-control" id="cat" name="qty" value="<?= $row['qty'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="cat">Product Code</label>
                        <input type="text" class="form-control" id="cat" name="code" value="<?= $row['code'] ?>">
                    </div>
        
                    <button type="submit" class="btn btn-success" name="submit">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

<?php require_once '../inc/footer.php'; ?>     




