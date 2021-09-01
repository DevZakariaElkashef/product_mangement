<?php require_once '../app/config.php';
include '../app/session.php';


// var_dump($_SESSION);
?>     

<?php
include('../inc/header.php') ; ?>   

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?php echo URL.'categories/index.php'; ?>" role="button">View All Categories </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Add New Categoery  </h1>
    <?php
    if(isset($_SESSION['errors'])) :
    foreach($_SESSION['errors'] as $value) :?>
        <div class="col-4 mx-auto alert text-center border alert-danger text-uppercase" id="message">
            <?= $value ?>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
    
    <?php
    if(isset($_SESSION['message'])) {
        echo '<div class="col-4 mx-auto alert text-center border alert-success text-uppercase" id="message">'. $_SESSION['message'][0] .'</div>';
    }
        
     ?>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <form class="p-4 m-3 border bg-gradient-info" method="POST" action="<?php echo URL.'handelers/categories/add.php'; ?>">
                    <div class="form-group">
                        <label for="cat">Category Name</label>
                        <input type="text" name="name" class="form-control" id="cat" >
                    </div>
        
                    <button type="submit" class="btn btn-success my-3" name="submit">
                        <i class="bi bi-reply-all-fill"></i> Submit
                     </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">
        setTimeout(function() {
            document.getElementById('message').style.display = "none";
        }, 2000);
        document.getElementById('message').style.display = "block";
    </script>
<?php include('../inc/footer.php'); ?>     


<?php
unset($_SESSION['errors'], $_SESSION['message']);
?>

