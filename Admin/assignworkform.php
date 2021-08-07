<?php
    if(session_id() == ''){
        session_start();
    }

    // If admin is logged in
    if(isset($_SESSION['is_adminlogin'])){
        $aEmail = $_SESSION['aEmail'];
    }
    // If admin is not logged in then redirect to index.php
    else{
        echo "<script> location.href='../index.php'; </script>";
    }


    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM submitrequest WHERE request_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    if(isset($_REQUEST['close'])){
        $sql = "DELETE FROM submitrequest WHERE request_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
        }
        else{
            echo "Unable to Delete";
        }   
    }

    if(isset($_REQUEST['assign'])){
        if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['requestdate'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" style="margin-left: 46px">Fill All Fields</div>';
        }
        else{
            $rid = $_REQUEST['request_id'];
            $rinfo = $_REQUEST['request_info'];
            $rdesc = $_REQUEST['requestdesc'];
            $rname = $_REQUEST['requestername'];
            $radd1 = $_REQUEST['address1'];
            $radd2 = $_REQUEST['address2'];
            $rcity = $_REQUEST['requestercity'];
            $rstate = $_REQUEST['requesterstate'];
            $rzip = $_REQUEST['requesterzip'];
            $remail = $_REQUEST['requesteremail'];
            $rmobile = $_REQUEST['requestermobile'];
            $rassigntech = $_REQUEST['assigntech'];
            $rdate = $_REQUEST['requestdate'];

            $sql = "INSERT INTO assignwork (request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, assign_tech, assign_date) VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate')";
            if($conn->query($sql) == TRUE){
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" style="margin-left: 46px">Work Asssigned Successfully</div>';
            }
            else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" style="margin-left: 46px">Unable to Assign Work</div>';
            }  
        }
    }

?>


<!-- Start Assigned Work 3rd Column -->
<div class="col-sm-5 mt-5 jumbotron">
    <h5 class="text-center">Assign Work Order Request</h5>
    <form class="mx-5" action="" method="POST">
        <div class="mb-3">
            <label for="request_id" class="form-label">Request ID</label>
            <input type="text" class="form-control" id="request_id" name="request_id"
                value="<?php if(isset($row['request_id'])) echo $row['request_id']; ?>">
        </div>
        <div class="mb-3">
            <label for="request_info" class="form-label">Request Info</label>
            <input type="text" class="form-control" id="request_info" name="request_info"
                value="<?php if(isset($row['request_info'])) echo $row['request_info']; ?>">
        </div>
        <div class="mb-3">
            <label for="requestdesc" class="form-label">Description</label>
            <input type="text" class="form-control" id="requestdesc" name="requestdesc"
                value="<?php if(isset($row['request_desc'])) echo $row['request_desc']; ?>">
        </div>
        <div class="mb-3">
            <label for="requestername" class="form-label">Name</label>
            <input type="text" class="form-control" id="requestername" name="requestername"
                value="<?php if(isset($row['requester_name'])) echo $row['requester_name']; ?>">
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="address1">Address Line 1</label>
                <input type="text" class="form-control my-2" id="address1" name="address1"
                    value="<?php if(isset($row['requester_add1'])) echo $row['requester_add1']; ?>">
            </div>
            <div class="mb-3 col-md-6">
                <label for="address2">Address Line 2</label>
                <input type="text" class="form-control my-2" id="address2" name="address2"
                    value="<?php if(isset($row['requester_add2'])) echo $row['requester_add2']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="requestercity">City</label>
                <input type="text" class="form-control my-2" id="requestercity" name="requestercity"
                    value="<?php if(isset($row['requester_city'])) echo $row['requester_city']; ?>">
            </div>
            <div class="mb-3 col-md-3">
                <label for="requesterstate">State</label>
                <input type="text" class="form-control my-2" id="requesterstate" name="requesterstate"
                    value="<?php if(isset($row['requester_state'])) echo $row['requester_state']; ?>">
            </div>
            <div class="mb-3 col-md-3">
                <label for="irequesterzip">Zip</label>
                <input type="text" class="form-control my-2" id="irequesterzip" name="requesterzip"
                    onkeypress="isInputNumber(event)"
                    value="<?php if(isset($row['requester_zip'])) echo $row['requester_zip']; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="requesteremail">Email</label>
                <input type="email" class="form-control my-2" id="requesteremail" name="requesteremail"
                    value="<?php if(isset($row['requester_email'])) echo $row['requester_email']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="requestermobile">Mobile</label>
                <input type="text" class="form-control my-2" id="requestermobile" name="requestermobile"
                    onkeypress="isInputNumber(event)"
                    value="<?php if(isset($row['requester_mobile'])) echo $row['requester_mobile']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="assigntech">Assign to Technician</label>
                <input type="text" class="form-control my-2" id="assigntech" name="assigntech">
            </div>
            <div class="form-group col-md-3">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control my-2" id="inputDate" name="requestdate" value="">
            </div>
        </div>

        <div class="float-right mb-3">
            <button type="submit" class="btn btn-success" name="assign">Assign</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>

    </form>
    <?php
        if(isset($msg)){
            echo $msg;
        }
    ?>
</div>
<!-- End Assigned Work 3rd Column -->

<!-- Only Number for Input Fields -->
<script>
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}
</script>