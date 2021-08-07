<?php
    define('TITLE', 'Edit Requester');
    define('PAGE', 'requester');
    include("adminIncludes/header.php");
    include("../dbConnection.php");
    // If admin is logged in
    session_start();
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    }
    // If admin is not logged in then redirect to index.php
    else{
        echo "<script> location.href='../index.php'; </script>";
    }


    if(isset($_REQUEST['requpdate'])){
        // Checking for empty fields
        if(($_REQUEST['r_login_id'] == "") || ($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "")){
            // msg displayed if required field missing
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert>Fill All Fields</div>';
        }
        else{
            // Assigning User Values to Variable
            $rid = $_REQUEST['r_login_id'];
            $rname = $_REQUEST['r_name'];
            $remail = $_REQUEST['r_email'];
            
            $sql = "UPDATE requesterlogin SET r_login_id = '$rid', r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid' ";
            
            if($conn->query($sql) == True){
                // below msg display on form submit success
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Succesfully !</div>';
            }
            else{
                // below msg display on form submit failed
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update </div>';
            }
        }
    }

?>


<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details</h3>

    <?php
        if(isset($_REQUEST['edit'])){
            $sql = "SELECT * FROM requesterlogin WHERE r_login_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="r_login_id">Requester ID</label>
            <input type="text" class="form-control" id="r_login_id" name="r_login_id"
                value="<?php if(isset($row['r_login_id'])) { echo $row['r_login_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="r_name">Name</label>
            <input type="text" class="form-control" id="r_name" name="r_name"
                value="<?php if(isset($row['r_name'])) { echo $row['r_name']; } ?>">
        </div>
        <div class="form-group">
            <label for="r_email">Email</label>
            <input type="email" class="form-control" id="r_email" name="r_email"
                value="<?php if(isset($row['r_email'])) { echo $row['r_email']; } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="requester.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
            if(isset($msg)){
                echo $msg;
            }
        ?>
    </form>
</div>
<!-- End 2nd Column -->

<?php
    include("adminIncludes/footer.php");
?>