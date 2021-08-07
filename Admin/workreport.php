<?php
    define('TITLE', 'Work Report');
    define('PAGE', 'workreport');
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
            $sql = "SELECT * FROM assignwork WHERE assign_date BETWEEN '$startdate' AND '$enddate' ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
    ?>
    <p class="bg-dark text-white p-2 mt-4 text-center">Details</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Request ID</th>
                <th scope="col">Request Info</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Mobile</th>
                <th scope="col">Technician</th>
                <th scope="col">Assigned Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <th scope="row">
                    <?php echo $row['request_id']; ?>
                </th>
                <td>
                    <?php echo $row['request_info']; ?>
                </td>
                <td>
                    <?php echo $row['requester_name']; ?>
                </td>
                <td>
                    <?php echo $row['requester_add1']; ?>
                </td>
                <td>
                    <?php echo $row['requester_city']; ?>
                </td>
                <td>
                    <?php echo $row['requester_mobile']; ?>
                </td>
                <td>
                    <?php echo $row['assign_tech']; ?>
                </td>
                <td>
                    <?php echo $row['assign_date']; ?>
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