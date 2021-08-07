<?php
    define('TITLE', 'Change Password');
    define('PAGE', 'ChangePassword');
    include("includes/header.php");
    include("../dbConnection.php");
    session_start();
    if($_SESSION['is_login']){
        $rEmail = $_SESSION['rEmail'];
    }
    else{
        echo "<script> location.href='RequesterLogin.php' </script>";
    }

    $rEmail = $_SESSION['rEmail'];
    if(isset($_REQUEST['passupdate'])){
        if($_REQUEST['rPassword'] == ""){
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-3 mt-2" role="alert"> Fill All Fields </div>';
        }
        else{
            $rPass = $_REQUEST['rPassword'];
            $sql = "UPDATE requesterlogin SET r_password = '$rPass' WHERE r_email = '$rEmail' ";
            if($conn->query($sql) == TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 ml-3 mt-2" role="alert"> Updated Successfully </div>';
            }
            else{
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-3 mt-2" role="alert"> Unable to Update </div>';
            }
        }
    }

?>

<!-- Start User Change Password From 2nd Column -->
<div class="col-md-6 mt-5">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="rEmail">Email</label>
            <input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
        </div>
        <div class="form-group my-4">
            <label for="inputnewPassword">New Password</label>
            <input type="password" class="form-control" name="rPassword" id="inputnewPassword"
                placeholder="New Password">
        </div>
        <button type="submit" class="btn btn-danger mt-4 mr-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
        <?php if(isset($passmsg)) { echo $passmsg; } ?>
    </form>
</div>
<!-- End User Change Password From 2nd Column -->


<?php
    include("includes/footer.php");
?>