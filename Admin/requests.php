<?php
    define('TITLE', 'Requests');
    define('PAGE', 'requests');
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
        echo "<script> location.href='../index.php'; </script>";
    }
?>

<!-- Start 2nd Column -->
<div class="col-sm-4 mb-5">
    <?php
        $sql = "SELECT request_id, request_info, request_desc, request_date FROM submitrequest"; 
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            ?>
    <div class="card mt-5 mx-5">
        <div class="card-header">
            Request ID:
            <?php echo $row['request_id'] ?>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                Request Info:
                <?php echo $row['request_info'] ?>
            </h5>
            <p class="card-text">
                <?php echo $row['request_desc'] ?>
            </p>
            <p class="card-text">
                Request Date:
                <?php echo $row['request_date'] ?>
            </p>
            <div class="float-right">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['request_id'] ?>">
                    <input type="submit" class="btn btn-danger mr-3" value="View" name="view">
                    <input type="submit" class="btn btn-secondary" value="Close" name="close">
                </form>
            </div>
        </div>
    </div>
    <?php
        }   
    ?>
</div>
<!-- End 2nd Column -->

<?php
    include("assignworkform.php");
?>


<?php
    include("adminIncludes/footer.php");
?>