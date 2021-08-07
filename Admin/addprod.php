<?php
   define('TITLE', 'Add New Product');
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
        echo "<script> location.href='../index.php'; </script>";
    }

    
    if(isset($_REQUEST['psubmit'])){
        // Checking for empty fields
        if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }
        else{
            // Capture the data coming from input
            $pname = $_REQUEST['pname'];
            $pdop = $_REQUEST['pdop'];
            $pava = $_REQUEST['pava'];
            $ptotal = $_REQUEST['ptotal'];
            $poriginalcost = $_REQUEST['poriginalcost'];
            $psellingcost = $_REQUEST['psellingcost'];
                    
            $sql = "INSERT INTO assests (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES ('$pname', '$pdop', '$pava', '$ptotal', '$poriginalcost', '$psellingcost')";
            if($conn->query($sql) == True){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Product Added Succesfully !</div>';  
            }
            else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Product </div>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center" style="margin-bottom: 18px;">Add New Product</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" id="pname" name="pname">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pdop">Date of Purchase</label>
            <input type="date" class="form-control" id="pdop" name="pdop">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="ptotal">Total</label>
            <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="poriginalcost">Original Cost Each</label>
            <input type="text" class="form-control" id="poriginalcost" name="poriginalcost"
                onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="psellingcost">Selling Cost Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost"
                onkeypress="isInputNumber(event)">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger mx-2" id="psubmit" name="psubmit">Submit</button>
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