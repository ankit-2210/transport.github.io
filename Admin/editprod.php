<?php
   define('TITLE', 'Update New Product');
   define('PAGE', 'assests');
   include("adminIncludes/header.php");
   include("../dbConnection.php");
    // If admin is logged in
    session_start();
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    }
    // If admin is not logged in then redirect to index.php
    else{
        echo "<script> location.href='login.php'; </script>";
    }

    
    if(isset($_REQUEST['pupdate'])){
        // Checking for empty fields
        if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
            // msg displayed if required field missing
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }
        else{
            // Assigning User Values to Variable
            $pid = $_REQUEST['pid'];
            $pname = $_REQUEST['pname'];
            $pdop = $_REQUEST['pdop'];
            $pava = $_REQUEST['pava'];
            $ptotal = $_REQUEST['ptotal'];
            $poriginalcost = $_REQUEST['poriginalcost'];
            $psellingcost = $_REQUEST['psellingcost'];
            
            $sql = "UPDATE assests SET pname = '$pname', pdop = '$pdop', pava = '$pava', ptotal = '$ptotal', poriginalcost = '$poriginalcost', psellingcost = '$psellingcost'  WHERE pid = '$pid' ";
            
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
    <h3 class="text-center" style="margin-bottom: 18px;">Update Product Details</h3>

    <?php
        if(isset($_REQUEST['edit'])){
            $sql = "SELECT * FROM assests WHERE pid = {$_REQUEST['id']}";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control" id="pid" name="pid"
                value="<?php if(isset($row['pid'])) { echo $row['pid']; } ?>" readonly>
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" id="pname" name="pname"
                value="<?php if(isset($row['pname'])) { echo $row['pname']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pdop">Date of Purchase</label>
            <input type="date" class="form-control" id="pdop" name="pdop"
                value="<?php if(isset($row['pdop'])) { echo $row['pdop']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)"
                value="<?php if(isset($row['pava'])) { echo $row['pava']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="ptotal">Total</label>
            <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)"
                value="<?php if(isset($row['ptotal'])) { echo $row['ptotal']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="poriginalcost">Original Cost Each</label>
            <input type="text" class="form-control" id="poriginalcost" name="poriginalcost"
                onkeypress="isInputNumber(event)"
                value="<?php if(isset($row['poriginalcost'])) { echo $row['poriginalcost']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="psellingcost">Selling Cost Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost"
                onkeypress="isInputNumber(event)"
                value="<?php if(isset($row['psellingcost'])) { echo $row['psellingcost']; } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate">Update</button>
            <a href="assests.php" class="btn btn-secondary">Close</a>
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