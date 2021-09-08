<?php require_once '../app/config.php'; ?>
<?php require_once '../inc/header.php'; ?>     

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?= URL . "users/index.php" ?>" role="button">View All Users </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Add New User  </h1>

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
                <form class="p-4 m-3 border bg-gradient-info" action="../handelers/users/add.php" method="POST">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="name"  name="fname" value="<?php
                        if(isset($_SESSION['new_fname'])){
                            echo $_SESSION['new_fname'];
                        }
                    ?>">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="name"  name="lname" value="<?php
                        if(isset($_SESSION['new_lname'])){
                            echo $_SESSION['new_lname'];
                        }
                    ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"  name="email" value="<?php
                        if(isset($_SESSION['new_email'])){
                            echo $_SESSION['new_email'];
                        }
                    ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="password">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type">
                        <?php if(isset($_SESSION['new_type'])) :?>
                            <option value="<?= $_SESSION['new_type']?>"><?= $_SESSION['new_type']?></option>
                        <?php endif;?>
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="super_admin">Super Admin</option>
                        </select>
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
            document.querySelectorAll('#message').forEach( message=> {
                message.style.display = "none"
        })}, 2000);
        document.querySelectorAll('#message').forEach( message=> {
            message.style.display = "block"
        });
    </script>
<?php require_once '../inc/footer.php'; ?>




<?php
unset($_SESSION['errors'], $_SESSION['message']);
?>
