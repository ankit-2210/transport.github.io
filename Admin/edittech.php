<?php
   define('TITLE', 'Update Technician');
   define('PAGE', 'technician');
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

    
    if(isset($_REQUEST['empupdate'])){
        // Checking for empty fields
        if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
            // msg displayed if required field missing
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }
        else{
            // Assigning User Values to Variable
            $eid = $_REQUEST['empid'];
            $eName = $_REQUEST['empName'];
            $eCity = $_REQUEST['empCity'];
            $eMobile = $_REQUEST['empMobile'];
            $eEmail = $_REQUEST['empEmail'];
            
            $sql = "UPDATE technician SET empName = '$eName', empCity = '$eCity', empMobile = '$eMobile', empEmail = '$eEmail'  WHERE empid = '$eid' ";
            
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

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details</h3>

    <?php
        if(isset($_REQUEST['edit'])){
            $sql = "SELECT * FROM technician WHERE empid = {$_REQUEST['id']}";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="empid">Emp ID</label>
            <input type="text" class="form-control" id="empid" name="empid"
                value="<?php if(isset($row['empid'])) { echo $row['empid']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName"
                value="<?php if(isset($row['empName'])) { echo $row['empName']; } ?>">
        </div>
        <div class="form-group">
            <label for="empCity">City</label>
            <input type="text" class="form-control" id="empCity" name="empCity"
                value="<?php if(isset($row['empCity'])) { echo $row['empCity']; } ?>">
        </div>
        <div class="form-group">
            <label for="empMobile">Mobile</label>
            <input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)"
                value="<?php if(isset($row['empMobile'])) { echo $row['empMobile']; } ?>">
        </div>
        <div class="form-group">
            <label for="empEmail">Email</label>
            <input type="email" class="form-control" id="empEmail" name="empEmail"
                value="<?php if(isset($row['empEmail'])) { echo $row['empEmail']; } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
            <a href="technician.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
            if(isset($msg)){
                echo $msg;
            }
        ?>
    </form>
</div>

<!-- Only Number for Input Fields -->
<script>
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}
</script>

<?php
    include("adminIncludes/footer.php");
?>