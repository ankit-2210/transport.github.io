<?php
    define('TITLE', 'Add Requester');
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

    if(isset($_REQUEST['reqsubmit'])){
        // Checking for empty fields
        if(($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }
        else{
            // Capture the data coming from input
            $rname = $_REQUEST['r_name'];
            $remail = $_REQUEST['r_email'];
            $rpass = $_REQUEST['r_password'];
            
            $sql = "INSERT INTO requesterlogin (r_name, r_email, r_password) VALUES ('$rname', '$remail', '$rpass')";
            
            if($conn->query($sql) == True){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Succesfully !</div>';  
            }

            else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add </div>';
            }
        }
    }
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center" style="margin-bottom: 28px;">Add New Requester</h3>
    <form action="" method="POST">
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="r_name">Name</label>
            <input type="text" class="form-control" id="r_name" name="r_name">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="r_email">Email</label>
            <input type="email" class="form-control" id="r_email" name="r_email">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="r_password">Password</label>
            <input type="password" class="form-control" id="r_password" name="r_password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqsubmit" name="reqsubmit">Submit</button>
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