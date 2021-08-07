<?php
   define('TITLE', 'Sell Product');
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


    if(isset($_REQUEST['psubmit'])){
        // Checking for empty fields
        if(($_REQUEST['cname'] == "") || ($_REQUEST['cadd'] == "") || ($_REQUEST['pname'] == "") || ($_REQUEST['pquantity'] == "") || ($_REQUEST['psellingcost'] == "") || ($_REQUEST['totalcost'] == "") || ($_REQUEST['selldate'] == "")){
            // msg displayed if required field missing
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }
        else{
            // Assigning User Values to Variable
            $pid = $_REQUEST['pid'];
            $pava = $_REQUEST['pava'] - $_REQUEST['pquantity'];

            $custname = $_REQUEST['cname'];
            $custadd = $_REQUEST['cadd'];
            $cpname = $_REQUEST['pname'];
            $cpquantity = $_REQUEST['pquantity'];
            $cpeach = $_REQUEST['psellingcost'];
            $cptotal = $_REQUEST['psellingcost'];
            $cpdate = $_REQUEST['selldate'];
            $sql = "INSERT INTO customer(custname, custadd, cpname, cpquantity, cpeach, cptotal, cpdate) VALUE ('$custname', '$custadd', '$cpname', '$cpquantity', '$cpeach', '$cptotal', '$cpdate')";
            
            if($conn->query($sql) == True){
                $genid = mysqli_insert_id($conn);
                session_start();
                $_SESSION['myid'] = $genid;
                echo "<script> location.href='sellproductsuccess.php'; </script>";
            }

            $sqlup = "UPDATE assests SET pava = '$pava' WHERE pid = '$pid'";
            $conn->query($sqlup);
        }
    }


?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center" style="margin-bottom: 18px;">Customer Bill</h3>

    <?php
        if(isset($_REQUEST['issue'])){
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
            <label for="cname">Customer Name</label>
            <input type="text" class="form-control" id="cname" name="cname" value="">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="cadd">Customer Address</label>
            <input type="text" class="form-control" id="cadd" name="cadd" value="">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pname">Product Name</label>
            <input type="text" class="form-control" id="pname" name="pname"
                value="<?php if(isset($row['pname'])) { echo $row['pname']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pava">Available</label>
            <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)"
                value="<?php if(isset($row['pava'])) { echo $row['pava']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="pquantity">Quantity</label>
            <input type="text" class="form-control" id="pquantity" name="pquantity" onkeypress="isInputNumber(event)"
                value="">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="psellingcost">Price Each</label>
            <input type="text" class="form-control" id="psellingcost" name="psellingcost"
                onkeypress="isInputNumber(event)"
                value="<?php if(isset($row['psellingcost'])) { echo $row['psellingcost']; } ?>">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="totalcost">Total Price</label>
            <input type="text" class="form-control" id="totalcost" name="totalcost" onkeypress="isInputNumber(event)"
                value="">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="inputDate">Date</label>
            <input type="date" class="form-control" id="inputDate" name="selldate" value="">
        </div>
        <div class="text-center" style="margin-bottom: 18px;">
            <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit">Submit</button>
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