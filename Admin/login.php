<?php
    include("../dbConnection.php");
    session_start();
    if(!isset($_SESSION['is_adminlogin'])){
        if(isset($_REQUEST['aEmail'])){
            $aEmail = mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
            $aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['aPassword']));
            $sql = "SELECT a_email , a_password FROM adminlogin WHERE a_email = '". $aEmail ."' AND a_password = '". $aPassword ."' limit 1";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $_SESSION['is_adminlogin'] = true;
                $_SESSION['aEmail'] = $aEmail;
                echo "<script> location.href='dashboard.php'</script>";
            }
            else{
                $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>';
            }
        }
    }
    else{
        echo "<script> location.href='dashboard.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href=../css/all.min.css>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <title>Login</title>

    <style>
    .custom-margin {
        margin-top: 8vh;
    }
    </style>
</head>

<body>

    <div class="text-center mb-3 mt-5" style="font-size: 30px;">
        <i class="fas fas-stethoscope"></i>
        <span>Online Service Management System</span>
    </div>
    <p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger mx-2"></i>Admin Area (Demo)
    </p>
    <div class="container-fluid">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" method="POST" class="shadow-lg p-4">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="aEmail">
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="pass" class="font-weight-bold pl-2">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="aPassword">
                    </div>
                    <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block">Login</button>
                    <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                    ?>
                </form>
                <div class="text-center">
                    <a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="../js/jquery.min.js">
</script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Custom Javascript -->
<script type="text/javascript" src="index.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<!-- isotope plugin Js file -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</html>