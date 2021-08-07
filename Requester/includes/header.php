<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title> <?php echo TITLE ?> </title>
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php" style="margin-left: 40px;">OSMS</a>
    </nav>

    <!-- Start Container -->
    <div class="contianer-fluid" style="margin-top: 40px;">
        <!-- Start Row -->
        <div class="row">
            <!-- Start Slide Bar 1st Column -->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'RequesterProfile') { echo 'active'; } ?>"
                                href="RequesterProfile.php" style="margin-left: 30px;"><i class="fas fa-user"></i>
                                Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'SubmitRequest') { echo 'active'; } ?>"
                                href="SubmitRequest.php" style="margin-left: 30px;"><i
                                    class="fab fa-accessible-icon"></i> Submit Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ServiceStatus') { echo 'active'; } ?>"
                                href="ServiceStatus.php" style="margin-left: 30px;"><i class="fas fa-align center"></i>
                                Service Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'ChangePassword') { echo 'active'; } ?>"
                                href="ChangePassword.php" style="margin-left: 30px;"><i class="fas fa-key"></i> Change
                                Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'Logout') { echo 'active'; } ?>" href="../logout.php"
                                style="margin-left: 30px;"><i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Slide Bar 1st Column-->