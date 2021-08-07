<?php
    define('TITLE', 'Service Status');
    define('PAGE', 'ServiceStatus');
    include("includes/header.php");
    include("../dbConnection.php");
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 row mt-5 mx-3">
    <form action="" class="mt-2 row g-3 form-inline d-print-none">
        <!-- <div class="col-auto form-group mr-3">
            <label for="checkid">Enter Request ID: </label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
        </div> -->

        <div class="col-auto" style="margin-top: 25px;">
            <label for="checkid">Enter Request ID: </label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control ml-3 " id="checkid" name="checkid">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-danger">Search</button>
        </div>
    </form>

    <?php
    if(isset($_REQUEST['checkid'])){
        if($_REQUEST['checkid'] == ""){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
        }
        else{
        $sql = "SELECT * FROM assignwork WHERE request_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if(($row['request_id'] == $_REQUEST['checkid'])){
    ?>

    <h3 class="text-center mt-3">Assigned Work Details</h3>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td>
                    <?php if(isset($row['request_id'])){ echo $row['request_id'];} ?>
                </td>
            </tr>
            <tr>
                <td>Request Info</td>
                <td>
                    <?php if(isset($row['request_info'])){ echo $row['request_info'];} ?>
                </td>
            </tr>
            <tr>
                <td>Request Description</td>
                <td>
                    <?php if(isset($row['request_desc'])){ echo $row['request_desc'];} ?>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    <?php if(isset($row['requester_name'])){ echo $row['requester_name'];} ?>
                </td>
            </tr>
            <tr>
                <td>Address Line 1</td>
                <td>
                    <?php if(isset($row['requester_add1'])){ echo $row['requester_add1'];} ?>
                </td>
            </tr>
            <tr>
                <td>Address Line 2</td>
                <td>
                    <?php if(isset($row['requester_add2'])){ echo $row['requester_add2'];} ?>
                </td>
            </tr>
            <tr>
                <td>City</td>
                <td>
                    <?php if(isset($row['requester_city'])){ echo $row['requester_city'];} ?>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <?php if(isset($row['requester_state'])){ echo $row['requester_state'];} ?>
                </td>
            </tr>
            <tr>
                <td>Pin Code</td>
                <td>
                    <?php if(isset($row['requester_zip'])){ echo $row['requester_zip'];} ?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <?php if(isset($row['requester_email'])){ echo $row['requester_email'];} ?>
                </td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>
                    <?php if(isset($row['requester_mobile'])){ echo $row['requester_mobile'];} ?>
                </td>
            </tr>
            <tr>
                <td>Assigned Date</td>
                <td>
                    <?php if(isset($row['assign_date'])){ echo $row['assign_date'];} ?>
                </td>
            </tr>
            <tr>
                <td>Technician Name</td>
                <td>
                    <?php if(isset($row['assign_tech'])){ echo $row['assign_tech'];} ?>
                </td>
            </tr>
            <tr>
                <td>Customer Sign</td>
                <td></td>
            </tr>
            <tr>
                <td>Technician Sign</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <form action="" class="ml-3 d-print-none">
            <input class="btn btn-danger" type="submit" value="Print" onclick="window.print()">
            <input class="btn btn-secondary" type="submit" value="Close">
        </form>
    </div>
    <?php
    }
    else{

            $sql = "SELECT * FROM submitrequest WHERE request_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['request_id'] != $_REQUEST['checkid'])){
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Your Request Id is Wrong</div>';
            }
            else{
                $msg = '<div class="alert alert-info col-sm-6 ml-5 mt-2" role="alert"> Your Request is Still Pending</div>';
      
            }
        }
    }
}
    ?>
    <?php
        if(isset($msg)){
            echo $msg;
        }
    ?>
</div>
<!-- End 2nd Column -->

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
    include("includes/footer.php");
?>