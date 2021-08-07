<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href=../css/all.min.css>
    <link rel="stylesheet" href="../css/custom.css">

</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php" style="margin-left: 40px;">OSMS</a>
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
                            <a class="nav-link <?php if(PAGE == 'dashboard') { echo 'active'; } ?>" href="dashboard.php"
                                style="margin-left: 30px;"><i class="fas fa-user"></i>
                                Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'workorder') { echo 'active'; } ?>" href="workorder.php"
                                style="margin-left: 30px;"><i class="fab fa-accessible-icon"></i> Work Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'requests') { echo 'active'; } ?>" href="requests.php"
                                style="margin-left: 30px;"><i class="fas fa-align center"></i>
                                Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'assests') { echo 'active'; } ?>" href="assests.php"
                                style="margin-left: 30px;"><i class="fas fa-key"></i> Assests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'technician') { echo 'active'; } ?>"
                                href="technician.php" style="margin-left: 30px;"><i class="fas fa-key"></i>
                                Technician</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'requester') { echo 'active'; } ?>" href="requester.php"
                                style="margin-left: 30px;"><i class="fas fa-sign-out-alt"></i>
                                Requester</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'sellreport') { echo 'active'; } ?>"
                                href="sellreport.php" style="margin-left: 30px;"><i class="fas fa-sign-out-alt"></i>
                                Sell Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'workreport') { echo 'active'; } ?>"
                                href="workreport.php" style="margin-left: 30px;"><i class="fas fa-sign-out-alt"></i>
                                Work Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if(PAGE == 'changePassword') { echo 'active'; } ?>"
                                href="ChangePassword.php" style="margin-left: 30px;"><i class="fas fa-sign-out-alt"></i>
                                Change Password</a>
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