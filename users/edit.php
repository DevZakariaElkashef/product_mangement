<?php 
include '../app/config.php';
include '../app/database.php';
include "../inc/header.php";

$id = $_GET['id'];

if(!is_numeric($id) || !isset($id)){
    header('location:index.php');
}

$sql = "SELECT * FROM `users` WHERE `id` = $id ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$check = mysqli_num_rows($result);
if(!$check){
    header('location:index.php');
}


?>
    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-primary btn-lg" href="<?php echo URL.'users/index.php'; ?>" role="button">View All Users </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  Edit User Info  </h1>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
            <form class="p-4 m-3 border bg-gradient-info" action="../handelers/users/update.php" method="POST">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="name"  name="fname" value="<?= $row['first_name'] ?>">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="name"  name="lname" value="<?= $row['last_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"  name="email" value="<?= $row['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="password" >
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option value="<?= $row['type'] ?>"><?= $row['type'] ?></option>
                            <option value="admin">admin</option>
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

<?php require_once '../inc/footer.php'; ?>     




