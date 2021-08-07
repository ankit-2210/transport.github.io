<?php
   define('TITLE', 'Add Technician');
   define('PAGE', 'technician');
   include("adminIncludes/header.php");
   include("../dbConnection.php");
    // If admin is logged in
    session_start();
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    }
    // If admin is not logged in then redirect to index.php
    else{
        echo "<script> location.href='../index.php'; </script>";
    }

    

    if(isset($_REQUEST['empsubmit'])){
        // Checking for empty fields
        if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }
        else{
            // Capture the data coming from input
            $eName = $_REQUEST['empName'];
            $eCity = $_REQUEST['empCity'];
            $eMobile = $_REQUEST['empMobile'];
            $eEmail = $_REQUEST['empEmail'];
                    
            $sql = "INSERT INTO technician (empName, empCity, empMobile, empEmail) VALUES ('$eName', '$eCity', '$eMobile', '$eEmail')";
            
            if($conn->query($sql) == True){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Technician Added Succesfully !</div>';  
            }

            else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Technican </div>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center" style="margin-bottom: 18px;">Add New Technician</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="empCity">City</label>
            <input type="text" class="form-control" id="empCity" name="empCity">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="empMobile">Mobile</label>
            <input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group" style="margin-bottom: 18px;">
            <label for="empEmail">Email</label>
            <input type="email" class="form-control" id="empEmail" name="empEmail">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger mx-2" id="empsubmit" name="empsubmit">Submit</button>
            <a href="technician.php" class="btn btn-secondary">Close</a>
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