<?php
    define('TITLE', 'Change Password');
    define('PAGE', 'changePassword');
    include("adminIncludes/header.php");
    include("../dbConnection.php");
    
    session_start();

    // If admin is logged in
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    }
    // If admin is not logged in then redirect to index.php
    else{
        echo "<script> location.href='login.php'; </script>";
    }

    $aEmail = $_SESSION['aEmail'];
    if(isset($_REQUEST['passupdate'])){
        if($_REQUEST['aPassword'] == ""){
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-3 mt-2" role="alert"> Fill All Fields </div>';
        }
        else{
            $aPass = $_REQUEST['aPassword'];
            $sql = "UPDATE adminlogin SET a_password = '$aPass' WHERE a_email = '$aEmail' ";
            if($conn->query($sql) == TRUE){
                $passmsg = '<div class="alert alert-success col-sm-6 ml-3 mt-2" role="alert"> Updated Successfully </div>';
            }
            else{
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-3 mt-2" role="alert"> Unable to Update </div>';
            }
        }
    }

?>

<!-- Start Admin Change Password From 2nd Column -->
<div class="col-md-6 mt-5">
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="aEmail">Email</label>
            <input type="email" class="form-control" name="aEmail" id="aEmail" value="<?php echo $aEmail ?>" readonly>
        </div>
        <div class="form-group my-4">
            <label for="inputnewPassword">New Password</label>
            <input type="password" class="form-control" name="aPassword" id="inputnewPassword"
                placeholder="New Password">
        </div>
        <button type="submit" class="btn btn-danger mt-4 mr-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4" href="">Reset</button>
        <?php if(isset($passmsg)) { echo $passmsg; } ?>
    </form>
</div>
<!-- End Admin Change Password From 2nd Column -->

<?php
    include("adminIncludes/footer.php");
?>