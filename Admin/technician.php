<?php
    define('TITLE', 'Technician');
    define('PAGE', 'technician');
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

    
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM technician WHERE empid = {$_REQUEST['id']}";
        
        if($conn->query($sql) == TRUE){
            echo '<meta http-eqiv="refresh" content="0;URL=?deleted" />';
        }
        else{
            echo "Unable to Delete Data";
        }
    }

?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Technician</p>
    <?php
        $sql = "SELECT * FROM technician";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thread>
            <tr>
                <th scope="col">S No.</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php   
                $sno = 0;
                while($row = $result->fetch_assoc()){
                    $sno = $sno + 1;
            ?>
            <tr>
                <td> <?php echo $sno ?> </td>
                <td> <?php echo $row['empName'] ?> </td>
                <td> <?php echo $row['empCity'] ?> </td>
                <td> <?php echo $row['empMobile'] ?> </td>
                <td> <?php echo $row['empEmail'] ?> </td>
                <td>
                    <form action="edittech.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row["empid"] ?>">
                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                    <form action="" method=" POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row["empid"] ?>">
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


<div>
    <a class="btn btn-danger box" href="addtech.php">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>



<?php
    include("adminIncludes/footer.php");
?>

<style>
.box {
    position: fixed;
    bottom: 10px;
    right: 20px;
    margin-bottom: 30px;
}
</style>