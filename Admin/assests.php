<?php
    define('TITLE', 'Assests');
    define('PAGE', 'assests');
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
        $sql = "DELETE FROM assests WHERE pid = {$_REQUEST['id']}";
        
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
    <p class="bg-dark text-white p-2">Product/Part Details</p>
    <?php
        $sql = "SELECT * FROM assests";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
    ?>
    <table class="table">
        <thread>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Name</th>
                <th scope="col">DOP</th>
                <th scope="col">Available</th>
                <th scope="col">Total</th>
                <th scope="col">Original Cost Each</th>
                <th scope="col">Selling Cost Each</th>
                <th scope="col">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php   
                // $sno = 0;
                while($row = $result->fetch_assoc()){
                    // $sno = $sno + 1;
            ?>
            <tr>
                <td> <?php echo $row['pid'] ?> </td>
                <td> <?php echo $row['pname'] ?> </td>
                <td> <?php echo $row['pdop'] ?> </td>
                <td> <?php echo $row['pava'] ?> </td>
                <td> <?php echo $row['ptotal'] ?> </td>
                <td> <?php echo $row['poriginalcost'] ?> </td>
                <td> <?php echo $row['psellingcost'] ?> </td>
                <td>
                    <form action="editprod.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row["pid"] ?>">
                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                            <i class="fas fa-pen"></i>
                        </button>
                    </form>
                    <form action="" method=" POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row["pid"] ?>">
                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    <form action="sellproduct.php" method=" POST" class="d-inline">
                        <input type="hidden" name="id" value="<?php echo $row["pid"] ?>">
                        <button type="submit" class="btn btn-warning" name="issue" value="issue">
                            <i class="fas fa-handshake"></i>
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
    <a class="btn btn-danger box" href="addprod.php">
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