<?php require_once '../app/config.php'; ?>
<?php require_once '../inc/header.php'; ?>

<div class="jumbotron p-2 m-4">
    <h3 class="">
        <a class="btn btn-primary btn-lg" href="<?= URL . "products/index.php" ?>" role="button">View All Products </a>
    </h3>
</div>
<h1 class=" p-3 border display-4"> Add New Product </h1>



<?php
if (isset($_SESSION['errors'])) :
    foreach ($_SESSION['errors'] as $value) : ?>
        <div class="col-4 mx-auto alert text-center border alert-danger text-uppercase" id="message">
            <?= $value ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php
if (isset($_SESSION['message'])) {
    echo '<div class="col-4 mx-auto alert text-center border alert-success text-uppercase" id="message">' . $_SESSION['message'][0] . '</div>';
}

?>




<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <form class="p-4 m-3 border bg-gradient-info" action="../handelers/products/add.php" method="POST">
                <div class="form-group">
                    <label for="cat">Product Name</label>
                    <input type="text" class="form-control" id="cat" name="name" value="<?php
                        if(isset($_SESSION['product_name'])){
                            echo $_SESSION['product_name'];
                        }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="cat">Product Price</label>
                    <input type="number" class="form-control" id="cat" name="price" value="<?php
                        if(isset($_SESSION['product_price'])){
                            echo $_SESSION['product_price'];
                        }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="cat">Product Quantity</label>
                    <input type="number" class="form-control" id="cat" name="qty" value="<?php
                        if(isset($_SESSION['product_qty'])){
                            echo $_SESSION['product_qty'];
                        }
                    ?>">
                </div>
                <div class="form-group">
                    <label for="cat">Product Code</label>
                    <input type="text" class="form-control" id="cat" name="code" value="<?php
                        if(isset($_SESSION['product_code'])){
                            echo $_SESSION['product_code'];
                        }
                    ?>">
                </div>
                <button type="submit" class="btn btn-success" name="submit">
                    <i class="bi bi-reply-all-fill"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<script type="text/javascript">
    setTimeout(function() {
        document.querySelectorAll('#message').forEach(message => {
            message.style.display = "none"
        })
    }, 2000);
    document.querySelectorAll('#message').forEach(message => {
        message.style.display = "block"
    });
</script>
<?php require_once '../inc/footer.php'; ?>




<?php
unset($_SESSION['errors'], $_SESSION['message']);
?>