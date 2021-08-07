<?php
    define('TITLE', 'Sell Report');
    define('PAGE', 'sellreport');
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
?>

<!-- Start 2nd Column -->
<div class="col-sm-9 mt-5">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row" style="display: flex;">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <span> to </span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary mx-2" name="searchsubmit" value="Search">
            </div>
        </div>
    </form>
    <?php
        if(isset($_REQUEST['searchsubmit'])){
            $startdate = $_REQUEST['startdate'];
            $enddate = $_REQUEST['enddate'];
            $sql = "SELECT * FROM customer WHERE cpdate BETWEEN '$startdate' AND '$enddate' ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
    ?>
    <p class="bg-dark text-white p-2 mt-4 text-center">Details</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Address</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price Each</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <th scope="row">
                    <?php echo $row['custid']; ?>
                </th>
                <td>
                    <?php echo $row['custname']; ?>
                </td>
                <td>
                    <?php echo $row['custadd']; ?>
                </td>
                <td>
                    <?php echo $row['cpname']; ?>
                </td>
                <td>
                    <?php echo $row['cpquantity']; ?>
                </td>
                <td>
                    <?php echo $row['cpeach']; ?>
                </td>
                <td>
                    <?php echo $row['cptotal']; ?>
                </td>
                <td>
                    <?php echo $row['cpdate']; ?>
                </td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td>
                    <form class="d-print-none">
                        <input class="btn btn-danger" type="submit" value="Print" onclick="window.print();">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <?php
            }
            else{
                echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found !</div>";
            }
        }
    ?>

</div>
<!-- End 2nd Column -->


<?php
    include("adminIncludes/footer.php");
?>