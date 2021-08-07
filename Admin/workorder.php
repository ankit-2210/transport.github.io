<?php
    define('TITLE', 'Work Order');
    define('PAGE', 'workorder');
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
?>

<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5">
    <?php   
        $sql = "SELECT * FROM assignwork";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table mx-3">
        <thread>
            <tr>
                <th scope="col">Req ID</th>
                <th scope="col">Req Info</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Mobile</th>
                <th scope="col">Technician</th>
                <th scope="col">Assigned Date</th>
                <th scope="col">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php
                while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td>
                    <?php echo $row['request_id'] ?>
                </td>
                <td>
                    <?php echo $row['request_info'] ?>
                </td>
                <td>
                    <?php echo $row['requester_name'] ?>
                </td>
                <td>
                    <?php echo $row['requester_add1'] ?>
                </td>
                <td>
                    <?php echo $row['requester_city'] ?>
                </td>
                <td>
                    <?php echo $row['requester_mobile'] ?>
                </td>
                <td>
                    <?php echo $row['assign_tech'] ?>
                </td>
                <td>
                    <?php echo $row['assign_date'] ?>
                </td>
                <td>
                    <form action="viewassignwork.php" method="POST" class="d-inline mr-2">
                        <input type="hidden" name="id" value="<?php echo $row['request_id'] ?>">
                        <button class="btn btn-warning" name="view" value="View" type="submit"> <i
                                class="far fa-eye"></i> </button>
                    </form>
                    <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row['request_id'] ?>">
                        <button class="btn btn-secondary" name="delete" value="Delete" type="submit"> <i
                                class="far fa-trash-alt"></i> </button>
                    </form>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        }
        else{
            echo "0 Result";
        }

        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM assignwork WHERE request_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            }
            else{
                echo "Unable to Delete Data";
            }
        }
    ?>
</div>

<!-- End 2nd Column  -->


<?php
    include("adminIncludes/footer.php");
?>