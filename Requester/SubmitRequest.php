<?php
    define('TITLE', 'Submit Request');
    define('PAGE', 'SubmitRequest');
    include("includes/header.php");
    include("../dbConnection.php");
    session_start();
    if($_SESSION['is_login']){
        $rEmail = $_SESSION['rEmail'];
    }
    else{
        echo "<script> location.href='RequesterLogin.php' </script>";
    }

    if(isset($_REQUEST['submitrequest'])){
        // Checkout for empty fields
        if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-3 mt-2" role="alert" style="margin-left: 46px;"> Fill All Fields </div>';
        }
        else{
            $rinfo = $_REQUEST['requestinfo'];
            $rdesc = $_REQUEST['requestdesc'];
            $rname = $_REQUEST['requestername'];
            $radd1 = $_REQUEST['requesteradd1'];
            $radd2 = $_REQUEST['requesteradd2'];
            $rcity = $_REQUEST['requestercity'];
            $rstate = $_REQUEST['requesterstate'];
            $rzip = $_REQUEST['requesterzip'];
            $remail = $_REQUEST['requesteremail'];
            $rmobile = $_REQUEST['requestermobile'];
            $rdate = $_REQUEST['requestdate'];

            $sql = "INSERT INTO submitrequest(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
            if($conn->query($sql) == TRUE){
                $genid = mysqli_insert_id($conn);
                $msg = '<div class="alert alert-success col-sm-6 ml-3 mt-2" role="alert" style="margin-left: 46px;"> Request Submitted Successfully </div>';
                $_SESSION['myid'] = $genid;
                echo "<script> location.href='SubmitRequestSuccess.php' </script>";
            }
            else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-3 mt-2" role="alert" style="margin-left: 46px;"> Unable to Submit Your Request </div>';
            }
        }
    }

?>

<!-- Start Services Request From 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5">
    <form class="mx-5" action="" method="POST">
        <div class="mb-3">
            <label for="inputRequestInfo" class="form-label">Request Info</label>
            <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo">
        </div>
        <div class="mb-3">
            <label for="inputRequestDescription" class="form-label">Description</label>
            <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description"
                name="requestdesc">
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Name" name="requestername">
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="inputAddress1">Address Line 1</label>
                <input type="text" class="form-control my-2" id="inputAddress1" placeholder="House No. 123"
                    name="requesteradd1">
            </div>
            <div class="mb-3 col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control my-2" id="inputAddress2" placeholder="Railway Colony"
                    name="requesteradd2">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control my-2" id="inputCity" name="requestercity">
            </div>
            <div class="mb-3 col-md-3">
                <label for="inputState">State</label>
                <input type="text" class="form-control my-2" id="inputState" name="requesterstate">
            </div>
            <div class="mb-3 col-md-3">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control my-2" id="inputZip" name="requesterzip"
                    onkeypress="isInputNumber(event)">
            </div>
        </div>


        <div class="row mb-3">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control my-2" id="inputEmail" name="requesteremail">
            </div>
            <div class="form-group col-md-3">
                <label for="inputMobile">Mobile</label>
                <input type="text" class="form-control my-2" id="inputMobile" name="requestermobile"
                    onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group col-md-3">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control my-2" id="inputDate" name="requestdate">
            </div>
        </div>

        <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>

    </form>
    <?php
        if(isset($msg)){
            echo $msg;
        }
    ?>
</div>
<!-- End Services Request From 2nd Column -->

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