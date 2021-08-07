<?php
    session_start();
    define('TITLE', 'Success');
    include("adminIncludes/header.php");
    include("../dbConnection.php");

    // If admin is logged in
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    }
    // If admin is not logged in then redirect to index.php
    else{
        echo "<script> location.href='../index.php'; </script>";
    }

    $sql = "SELECT * FROM customer WHERE custid = {$_SESSION['myid']}";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        ?>
<div class="col-sm-6 ml-5 mt-5">
    <h3 class="text-center">Customer Bill</h3>
    <table class="table">
        <tbody>
            <tr>
                <th>Customer ID</th>
                <td>
                    <?php echo $row['custid'] ?>
                </td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td>
                    <?php echo $row['custname'] ?>
                </td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    <?php echo $row['custadd'] ?>
                </td>
            </tr>
            <tr>
                <th>Product</th>
                <td>
                    <?php echo $row['cpname'] ?>
                </td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>
                    <?php echo $row['cpquantity'] ?>
                </td>
            </tr>
            <tr>
                <th>Price Each</th>
                <td>
                    <?php echo $row['cpeach'] ?>
                </td>
            </tr>
            <tr>
                <th>Total Cost</th>
                <td>
                    <?php echo $row['cptotal'] ?>
                </td>
            </tr>
            <tr>
                <th>Date</th>
                <td>
                    <?php echo $row['cpdate'] ?>
                </td>
            </tr>
            <tr>
                <td style="display: flex">
                    <div class="d-inline" style="padding-right: 5px">
                        <form class="d-print-none">
                            <input class="btn btn-danger " type="submit" vlaue="Print" onclick="window.print()">
                        </form>
                    </div>
                    <div class="d-inline">
                        <a href="assests.php" class="btn btn-secondary d-print-none">Close</a>
                    </div>
                </td>

            </tr>

        </tbody>
    </table>
</div>
<?php
    }
    else{
        echo "Failed";
    }
?>

<?php
    include("adminIncludes/footer.php");
?>