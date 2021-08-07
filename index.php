<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <!-- <link rel="stylesheet" href="css/own.carousel.default.css"> -->

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" -->
    <!-- integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" /> -->
    <!-- <link rel="stylesheet" -->
    <!-- href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" -->
    <!-- integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" /> -->

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="css/custom.css">

    <title> OSMS </title>

</head>

<body>

    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top" style="background-color: rgb(218, 59, 93);">
        <a href="index.php" class="navbar-brand">OSMS</a>
        <span class="navbar-text">Customer's Happiness is outr Aim</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <!-- End Navigation -->


    <!-- Start Header Jumbotron -->
    <header class="jumbotron back-image" style="background-image: url(images/abc.jpg);">
        <div class="myclass mainHeading">
            <h1 class="text-uppercase text-danger font-weight-bold">Welcome to OSMS</h1>
            <p class="font-italic text-danger">Customer's Happiness is our Aim</p>
            <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
            <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
        </div>
    </header>
    <!-- End Header Jumbotron -->


    <!-- Start Introduction Section -->
    <div class="container" id="Services">
        <div class="jumbotron">
            <h3 class="text-center">OSMS Services</h3>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique corrupti qui reprehenderit? Facilis
                facere cum quod temporibus impedit cupiditate optio quae odio est nihil veniam, pariatur mollitia saepe
                excepturi maxime magnam aut explicabo quisquam necessitatibus reiciendis voluptates eum. Magnam illo eum
                quae molestiae! Molestiae obcaecati, repellendus voluptates velit dolore eius.

                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium earum assumenda non sed accusamus
                magnam fugit hic eaque doloremque omnis temporibus deleniti iste consequatur facere corporis, aut
                consectetur soluta dolorem?

                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae adipisci quasi at? Soluta deserunt
                libero magnam illum? Quasi iure non iste fuga laudantium dolor necessitatibus!
            </p>
        </div>
    </div>
    <!-- End Introduction Section -->


    <!-- Start Services Section -->
    <div class="container text-center border-bottom">
        <h2>Our Services</h2>
        <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                <h4 class="mt-4">Electronic Appliances</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                <h4 class="mt-4">Preventive Maintenance</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                <h4 class="mt-4">Fault Repair</h4>
            </div>

        </div>
    </div>
    <!-- End Services Section -->


    <!-- Start Registration Form -->
    <?php
    include("UserRegistration.php");
    ?>
    <!-- End Registration Form -->


    <!-- Start Happy Customer -->
    <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white">Happy Customer</h2>
            <div class="row">

                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/pexels-photo-220453.jpeg" class="img-fluid" style="border-radius:100px;"
                                alt="avt1">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda
                                numquam fugit corrupti, fugiat incidunt accusantium.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/user-1.png" class="img-fluid" style="border-radius:100px;" alt="avt1">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda
                                numquam fugit corrupti, fugiat incidunt accusantium.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/user-2.png" class="img-fluid" style="border-radius:100px;" alt="avt1">
                            <h4 class="card-title">Sumit Vyas</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda
                                numquam fugit corrupti, fugiat incidunt accusantium.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/user-3.png" class="img-fluid" style="border-radius:100px;" alt="avt1">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda
                                numquam fugit corrupti, fugiat incidunt accusantium.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Happy Customer -->


    <!-- Start Contact Us -->
    <div class="container" id="Contact">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <!-- Start 1st column -->
            <?php
                include("contact.php");
            ?>
            <!-- End 1st column -->
            <!-- Start 2nd column -->
            <div class="col-md-4 text-center">
                <strong>Headquarter:</strong><br>
                OSMS pvt Ltd, <br>
                Ashok Bazar, Lucknow<br>
                Uttar Pradesh - 489022<br>
                Phone: +00000000000<br>
                <a href="#" target="_blank">www.osms.com</a><br>
                <br>
                <strong>Branch:</strong><br>
                OSMS pvt Ltd, <br>
                Ashok Nagar, delhi<br>
                New Delhi - 489022<br>
                Phone: +00000000000<br>
                <a href="#" target="_blank">www.osms.com</a><br>
            </div>
            <!-- End 2nd column -->
        </div>
    </div>
    <!-- End Contact Us -->


    <!-- Start footer -->
    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <!-- Start 1st column -->
                <div class="col-md-6">
                    <span class="pr-2">Follow Us: </span>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-rss"></i></a>
                </div>
                <!-- End 1st column -->
                <!-- Start 2nd column -->
                <div class="col-md-6 text-right">
                    <small>Designed by Aki.com &copy; 2021</small>
                    <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
                </div>
                <!-- End 2nd column -->
            </div>
        </div>
    </footer>

    <!-- End footer -->


</body>

<script src=" js/jquery.min.js">
</script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/owl.carousel.js"></script> -->

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

<!-- Owl Carousel Js file -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" -->
<!-- integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script> -->

<!-- isotope plugin Js file -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>



<!-- <script type="text/javascript" src="js/ajaxrequest.js"></script> -->
<!-- <script type="text/javascript" src="js/adminajaxrequest.js"></script> -->
</body>



</html>