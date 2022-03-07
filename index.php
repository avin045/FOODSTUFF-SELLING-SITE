<?php

session_start();

session_destroy();
unset($_SESSION['username']);
Header('url=../../index.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="./Assets/css/bootstrap.min.css">

    <!-- custom styling -->
    <link rel="stylesheet" href="style.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>

    <!-- bootstrap icons styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- feather icons styling-->
    <script src="https://unpkg.com/feather-icons"></script>

    <!--icons iconify-->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js">
    </script>

    <!--icons for footer-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />

    <!-- map box CDN -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />


    <title>FOODSTUFF - HOME</title>

</head>

<body>


    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand ms-2 fw-bold" id="brand"><i class="fas fa-leaf fa-lg fa-rotate-190 brandicon"></i>
                    FOODSTUFF</a>

                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item nedpad">
                            <a href="#" class="nav-link active">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle nedpad" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu bg-dark drop" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item  btn btnsquare" href="./other_pages/farmerslogin.php">For
                                        Farmer's</a></li>
                                <li><a class="dropdown-item" href="./other_pages/consumers/consumer-log.php">For
                                        Consumer's</a></li>
                                <!-- <li><a class="dropdown-item bg-primary text-light" href="#">Privacy Polices</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-item nedpad">
                            <a href="#aboutus" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item nedpad">
                            <a href="#contactus" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>


    <!-- Showcase -->
    <section class="bg-green text-light p-5 p-lg-0 pt-lg-5 mt-4 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div class="indtxt">
                    <h1>Support <span class="text-warning"> Farmer's </span></h1>
                    <p class="lead my-4">
                        We focus on farmer's who are all cultivating there own land with proper culivatable products.
                    </p>
                    <a href="#learn" class="btn btn-dark btn-lg anim" data-bs-toggle="learn" data-bs-target="#learn">
                        Know more
                    </a>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="./Assets/images_for_fe/modern_veg_and_fruits.png" alt="image of FOODSTUFF" />
            </div>
        </div>
    </section>



    <!-- Newsletter -->
    <section class="bg-dark text-light p-2">
        <div class="container">

            <div class="text-center">
                <figure>
                    <blockquote class="blockquote pt-2">

                        உயிரே போனாலும் விவசாயத்த மட்டும் விட்ராதீங்க

                    </blockquote>

                    <figcaption class="blockquote-footer mt-2">
                        ஜீவானந்தம் <cite title="Source Title">( கத்தி )</cite>
                    </figcaption>
                </figure>
            </div>
            <!-- </div> -->
        </div>
    </section>



    <!-- Boxes -->
    <!--we can add (bg-warning) after p-5 in the same class-->
    <section class="p-5" id="cards">
        <div class="container">
            <div class="row text-center g-3">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="fas fa-shopping-basket pt-3"></i>

                            </div>
                            <h3 class="card-title mb-3">Foodstuff Basket</h3>
                            <!-- textbind PARAGRAPH for js -->
                            <p class="card-text text-center textbind">
                                Here we are providing the feature called BASKET,Weakly once we provide
                                offers and if you
                                <!-- more-less SPAN for js -->
                                <span class="more-less">
                                    purchase above
                                    the specific amount,You are eligilble to this
                                    category.And you are enables as our frequently customers for respective
                                    farmers.so,they gave their best offers with best quality.
                                </span>
                            </p>
                            <!-- readmore BUTTON for js -->
                            <button class="btn btn-primary shadow-none readmore" id="btnrm">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- ---------------------------------- -->
                <div class="col-md">
                    <div class="card bg-success text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="fab fa-pagelines fa-lg pt-3"></i>
                            </div>
                            <h3 class="card-title mb-3">Our Products</h3>
                            <p class="card-text text-center textbind2">
                                The truly sustainable products and companies will take the whole eco-system into
                                consideration, and will
                                <span class="more-less2">
                                    talk more about supporting life that destroying life, more about balancing an
                                    eco-system rather than about killing an
                                    enemy, and more about teaching you a method than selling you a silver bullet.

                                </span>
                            </p>
                            <button class="btn btn-dark shadow-none readmore2">Read More</button>
                        </div>
                    </div>
                </div>
                <!-- -------------------------------- -->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="fas fa-map-marker-alt pt-3"></i>
                            </div>
                            <h3 class="card-title mb-3">Manual Finder</h3>
                            <p class="card-text text-center textbind3">
                                Here,we have a brand new feature like get the <br>
                                products detail from Manual finder by
                                using the map.
                                <span class="more-less3">
                                    We have a partnership with the MAPBOX searching API.so,you have best interface with
                                    makes easy of search processing for you.
                                </span>
                            </p>
                            <button class="btn btn-primary shadow-none readmore3">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Learn Sections 1 -->
    <section id="learn" class="p-5 sky text-dark opacy1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md mt-5">
                    <img src="./Assets/images_for_fe/Agriculture-Machine.png" class="img-fluid imgg" alt="" />
                </div>
                <div class="col-md p-5">
                    <h2>Why we are here?</h2>
                    <p class="lead ">
                        <t class="text-uppercase badge bg-dark fs-6 r">CONSUMER SIDE:</t> <br>
                        Now a days the world in the dreadful situation and we won't always go out for buy the fruits and
                        vegetables.so,we are here to link you the proper cultivatable products to you..Who are all
                        consumers.
                    </p>
                    <!-- <h2>Why we are here?</h2> -->
                    <p class="lead">
                        <t class="text-uppercase badge bg-dark fs-6">farmer's SIDE:</t> <br>
                        There is a lot of intermediators between the products which are received by the consumers from
                        the farmers.so,we provide the ecosystem of non-intermediate services for farmers.
                    </p>
                    <p class="hide" id="hide">
                        <!-- class="text-md-center" i need text-center after md-768px -->
                        Quality is Company name’s meat and potatoes. Each angle including supply of superb fixings,
                        provoke conveyance
                        administration, straightforward and simple to explore online interface, protected and
                        advantageous installment
                        strategies are just a couple of key precedents organization name devotes its endeavors towards.
                    </p>
                    <!-- secread for read more -->
                    <a class="btn btn-dark mt-3 secread">
                        <i class="bi bi-chevron-right"></i>
                        <t class="text">Read More</t>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Question Accordion -->
    <section id="questions" class="p-5">
        <div class="container">
            <h2 class="text-center mb-4">Frequently Asked Questions</h2>
            <div class="accordion accordion-flush" id="questions">
                <!-- Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">
                            Where exactly are we located?
                        </button>
                    </h2>
                    <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            At present we were located in chennai merku.
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">
                            How much does it cost for interlinking products to consumers?
                        </button>
                    </h2>
                    <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            What the services we are provided is absolutely free.
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three">
                            What do I need to Know about natural farming?
                        </button>
                    </h2>
                    <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Just wait for sometime we'll looking through it.
                        </div>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-four">
                            How Do I sign up?
                        </button>
                    </h2>
                    <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            You easily find them under services section.
                        </div>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-five">
                            Do you help me find a job?
                        </button>
                    </h2>
                    <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Wait for sometime we'll update very soon.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learn Sections 2 -->
    <section class="p-5 bg-dark text-light" id="aboutus">
        <div class="container pt-2">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5">
                    <h2>About Us</h2>
                    <p class="lead">
                        ‘Foodstuff’.com (Foodstuff Retail Concepts Private Limited)
                        is tamil nadu’s newest online site
                        sustenance and grocery
                        store.
                    </p>
                    <p class="hide2 no-wrap">
                        With more than 18,000 items and over a 1000 brands in our list you will discover all that you
                        are searching for.
                        Appropriate from new Fruits and Vegetables and fruits to Packaged state.

                        Browse a wide scope of choices in each class, solely handpicked to enable you to locate the best
                        quality accessible at
                        the least costs.
                    </p>
                    <a class="btn btn-light mt-3 section2">
                        <i class="bi bi-chevron-right"></i>
                        <t class="text1">Read More</t>
                    </a>
                </div>
                <div class="col-md">
                    <img src="./Assets/images_for_fe/plants.png" class="img-fluid img1" alt="" />
                </div>
            </div>
        </div>
    </section>

    <!-- contact us -->
    <section class="p-5" id="contactus">
        <div class="container pt-5">
            <div class="row g-4">
                <h3 style="text-align: center;" class="text-uppercase">
                    Contact us
                </h3>
                <div class="col-md">

                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <span class="fw-bold">Main Location:</span><br>
                            NO 6 vivekanandha street, <br>
                            Dubai main road, <br>
                            Dubai narrow road, <br>
                            Dubai-600028. <br>
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Current Location:</span><br>
                            NO 305 kadavul street, <br>
                            CTS road, <br>
                            TCS narrow road, <br>
                            Wipro-600029. <br>
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Phone:</span> (+91) 63635-98745
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Email:</span>
                            foodstuff@gmail.com
                        </li>
                    </ul>
                </div>
                <div class="col-md">
                    <div id="map">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact us end-->



    <!-- footer -->
    <div class="footer-dark pt-5" id="footer">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col item social">
                        <a href="#"><i class="icon ion-social-facebook"></i></a>
                        <a href="#"><i class="icon ion-social-twitter"></i></a>
                        <a href="#"><i class="iconify" data-icon="ant-design:mail-filled"></i></a>
                        <a href="#"><i class="icon ion-social-instagram"></i></a>
                    </div>
                </div>
                <p class="copyright">
                    <!-- <a href="#" class="text-decoration-none">  -->
                    FOODSTUFF SELLING SITE © 2021
                    <!-- </a> -->
                </p>
            </div>
        </footer>
    </div>
    <!-- footer end -->



    <!-- back to top button -->

    <button type="button" class="btn btn-primary btn-floating btn" id="btn-back-to-top" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </button>





    <!-- jquery -->
    <script src="./Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- custom js -->
    <script src="./Assets/implemented_js/homejq.js"></script>

    <!-- <script src="./Assets/implemented_js/home.js"></script> -->

    <!-- bootstrap  -->
    <script src="./Assets/js/bootstrap.min.js"></script>


    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYmxhY2trNDUiLCJhIjoiY2twODZjb253MDV4djJ5b2diemh6dTFodCJ9.bM4Xwt3wL0whIyfOh39tpQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [55.296, 25.276987],
            zoom: 9,
        })
    </script>
</body>





</html>