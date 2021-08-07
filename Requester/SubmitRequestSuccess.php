<?php
    define('TITLE', 'Success');
    include('includes/header.php');
    include('../dbConnection.php');
    session_start();
    if($_SESSION['is_login']){
        $rEmail = $_SESSION['rEmail'];
    }
    else{
        echo "<script> location.href='RequesterLogin.php' </script>";
    }
    $sql = "SELECT * FROM submitrequest WHERE request_id = {$_SESSION['myid']}";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        ?>
<div class='col-sm-10 col-md-6 mt-5'>
    <div class='mt-5 mx-5'>
        <table class='table'>
            <tbody>
                <tr>
                    <th>Request ID</th>
                    <td> <?php echo $row['request_id'] ?> </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td> <?php echo $row['requester_name'] ?></td>
                </tr>
                <tr>
                    <th>Email ID</th>
                    <td> <?php $row['requester_email'] ?> </td>
                </tr>
                <tr>
                    <th>Request Info</th>
                    <td> <?php $row['request_info'] ?> </td>
                </tr>
                <tr>
                    <th>Request Description</th>
                    <td> <?php $row['request_desc'] ?> </td>
                </tr>
                <tr>
                    <td>
                        <form class='d-print-none'>
                            <input class='btn btn-danger' type='submit' value='Print' onclick='window.print()'>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
    }
    else{
        echo "<div>Failed</div>";
    }
    ?>

<?php
    include("includes/footer.php");
?>