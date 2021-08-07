<?php
    define('TITLE', 'Dashboard');
    define('PAGE', 'dashboard');
    if(!isset($_SESSION)){
        session_start();
    }

    include("adminIncludes/header.php");
    include("../dbConnection.php");

    // If admin is logged in
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    }
    // If admin is not logged in then redirect to index.php
    else{
        echo "<script> location.href='login.php'; </script>";
    }

    $sql = "SELECT max(request_id) FROM submitrequest";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $submitrequest = $row[0];

    $sql = "SELECT max(rno) FROM assignwork";
    $result = $conn->query($sql);
    $row = $result->fetch_row();
    $assignwork = $row[0];

    $sql = "SELECT * FROM technician";
    $result = $conn->query($sql);
    $totaltech = $result->num_rows;
    

    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM requesterlogin WHERE r_login_id = {$_REQUEST['id']}";
        
        if($conn->query($sql) == TRUE){
            echo '<meta http-eqiv="refresh" content="0;URL=?deleted" />';
        }
        else{
            echo "Unable to Delete Data";
        }
    }
?>

<!-- Start Dashboard 2nd Column -->
<div class="col-sm-9 col-md-10">
    <div class="row mx-5 text-center">

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">Requests Receive</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $submitrequest; ?>
                    </h4>
                    <a class="btn text-white" href="requests.php">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $assignwork; ?>
                    </h4>
                    <a class="btn text-white" href="workorder.php">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">No. of Technician</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $totaltech; ?>
                    </h4>
                    <a class="btn text-white" href="technician.php">View</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Course Details -->
    <div class="mx-5 mt-5 text-center">
        <!-- Table -->
        <p class="bg-dark text-white p-2">List of Requesters</p>
        <?php
            $sql = "SELECT * FROM requesterlogin";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
        ?>
        <table class="table">
            <thread>
                <tr>
                    <th scope="col">Requester ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thread>
            <tbody>
                <?php
                    $sno = 0;
                    while($row = $result->fetch_assoc()){
                        $sno = $sno + 1;
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $sno; ?>
                    </th>
                    <td>
                        <?php echo $row['r_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['r_email']; ?>
                    </td>
                    <td>
                        <form action="" method=" POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row["r_login_id"] ?>">
                            <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
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
        ?>
    </div>
    <!-- End Course Details -->

</div>
<!-- End Dashboard 2nd Coumn -->



<?php
    include("adminIncludes/footer.php");
?>