<?php
session_start();
require("../phpscripts/db.php");


$statement = $pdo->prepare('SELECT * from fproduct where pcategory = :pcat');
$statement->execute(array(':pcat' => "Fruit"));
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// var_dump($products);
// echo "</pre>";


$stmt = $pdo->prepare('SELECT cpname,cpprice,cpimage,cpaval,cpneed FROM cart WHERE uname= ?');
$stmt->execute([$_SESSION['userlog']]);
// $stmt->execute();
$count = $stmt->rowCount();
// echo $count;
// $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_SESSION['userlog'])) {
    $name = $_SESSION['userlog'];
}

if (!$_SESSION['userlog']) {
    header('Location: consumer-log.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">

    <!-- custom styling -->
    <!-- <link rel="stylesheet" href="viewprodc.css"> -->

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>

    <title>view product card - Foodstuff</title>




    <style>
        /* Navbar */

        .brandicon {
            color: chartreuse;
        }

        div i {
            padding-right: 4px;
        }

        .brandicon:hover {
            color: red;
        }

        #brand:hover {
            font-size: 1.4rem;
        }

        @media only screen and (min-width: 1240px) {
            .nedpad {
                margin-left: 30px;
                margin-right: 30px;
            }
        }

        .dropdown-menu li a {
            /* background-color: darkkhaki; */
            color: silver;
        }

        .dropdown-menu li a:hover {
            background-color: crimson;
            color: whitesmoke;
        }

        .btnsquare {
            border-radius: 0px;
        }



        .textbind.textmore .more-less {
            display: inline;
        }

        input[type="number"] {
            /* font-size: 50%; */
            width: 50px;
        }

        .subnav li a {
            color: wheat;
        }

        .subnav li a:hover {
            color: whitesmoke;
        }
    </style>

</head>

<body style="background-color: silver;">
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top pb-0">
            <div class="container">
                <a href="#" class="navbar-brand ms-2 fw-bold" id="brand"><i class="fas fa-leaf fa-lg fa-rotate-190 brandicon"></i>
                    FOODSTUFF</a>

                <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
                <ul class="navbar-nav ms-auto">
                    <div class="btn-group dropstart bg-trasparent">
                        <button type="button" class="btn bg-dark text-white dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-user-circle fa-lg" style="color:springgreen;">
                            </i>
                            <?php
                            echo "$name";
                            ?>
                        </button>
                        <ul class="dropdown-menu bg-dark p-0">
                            <li><a class="dropdown-item bg-dark text-center" href="./logout_con.php">Logout Now</a></li>

                            <!-- Dropdown menu links -->
                        </ul>
                    </div>
                </ul>
            </div>
            </div>
        </nav>
    </header>

    <br>
    <!-- <br> -->

    <ul class="nav justify-content-center p-4 bg-dark subnav nav-pills pb-1">
        <!-- <li class="nav dropdown">
            <a class="nav-link dropdown-toggle nedpad" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
            </a> -->
        <!-- <ul class="dropdown-menu bg-dark drop"> -->
        <li class="nav-item nedpad">
            <a class="nav-link" href="../consumers/viewp_c_veg.php">Vegetables</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="../consumers/viewp_c_frt.php">Fruits</a>
        </li>
        <!-- <li><a class="dropdown-item bg-primary text-light" href="#">Privacy Polices</a></li> -->
        <!-- </ul> -->
        </li>
        <li class="nav-item">
            <a class="nav-link nedpad" aria-current="page" href="./map/map.html">Map service</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="./reservedplace.php">Reserved &nbsp;<i class="fas fa-shopping-cart"></i>
                <span class="badge badge-pill bg-warning text-dark h6" id="cart-inc-id"><?php echo $count; ?></span></a>
        </li>
    </ul>


    <div class="text-center text-dark mt-5 heading">
        <p class="h1">Fruits Array</p>
    </div>


    <!-- modals -->
    <!-- <div class="card"> -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content rounded-0" style="background: transparent;">
                <!-- <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> -->
                <div class="modal-body bg-dark text-white" style="border-radius: 0px;">

                </div>
                <div class="bg-dark text-white text-center p-2">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <!-- cards -->
    <section class="p-5" id="cards">
        <div class="container p-1 text-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-sm-2 row-cols-lg-4">
                <?php foreach ($products as $i => $product) { ?>
                    <div class="col mb-4">
                        <div class="card bg-dark text-light">
                            <img src="<?php echo "../" . $product['pimage'] ?>" class="card-img-top" alt="..." height="200px">
                            <div class="card-body">
                                <?php
                                $id = $product['pid'];
                                ?>
                                <h5 class="card-title">
                                    <?php echo $product['pname'] ?>
                                </h5>
                                <p class="card-text m-1">
                                    Price<br><?php echo $product['pprice'] ?> <br>
                                    <?php
                                    // echo "<button data-id='" . $id . "' class='userinfo btn-primary btn-md shadow-none'>
                                    //More info
                                    // </button>";
                                    ?>

                                <p class="card-text m-0" style="color: springgreen;">
                                    Available<br><?php echo $product['pavailable'] . " " . "Kg"; ?>
                                </p>
                                <!-- <p class="text-center m-0 text-warning">
                                    Your need
                                </p> -->
                                <!-- <div class="text-center p-0 m-0 ">
                                    <input type="number" name="quantity" id="quantity" placeholder="Kg">
                                    <?php
                                    // if()
                                    ?>
                                </div> -->

                                <div class="text-center pt-1">
                                    <?php
                                    echo "<button data-id='" . $id . "' class='userinfo btn btn-outline-info btn-sm btn-block rounded border-none shadow-none'>
                                    More info
                                    </button>";
                                    ?>
                                </div>


                                <form action="./reservedplace.php" method="POST">
                                        <div class="text-center pt-2 pb-0">
                                            <p class="text-center m-0 text-warning">
                                                Your need
                                            </p>
                                            <div class="text-center p-0 m-0 pb-1">
                                            <input type="number" name="quantity" id="quantity" placeholder="Kg" min="1" max="<?php echo $product['pavailable']; ?>" required>
                                            </div>

                                            <input type="hidden" name="product_id" value="<?= $product['pid'] ?>">
                                            <input type="hidden" name="product_price" value="<?= $product['pprice'] ?>">
                                            <input type="hidden" name="product_available" value="<?= $product['pavailable'] ?>">
                                            <input type="hidden" name="product_image" value="<?= $product['pimage'] ?>">
                                            <input type="hidden" name="product_name" value="<?= $product['pname'] ?>">
                                            <input type="hidden" name="product_funame" value="<?= $product['username'] ?>">

                                            <!-- <input type="submit" value="Add To Cart"> 
                                        <p>
                                            <input type="submit" class="btn btn-warning btn-sm" value="Reserve">
                                            <i class="fas fa-cart-plus"></i>
                                        </p> -->
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="fas fa-cart-plus"></i>
                                                <!-- Add to cart -->
                                                Reserve
                                            </button>
                                        </div>
                                    </form>
                                <!-- <div class="text-center pt-2 pb-0">
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="fas fa-cart-plus"></i>
                                        Reserve
                                    </button>
                                </div> -->


                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>




    <!-- jquery -->
    <script src="../../Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- popper -->
    <script src="./node_modules/@popperjs/core/dist/umd/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="../../Assets/js/bootstrap.min.js"></script>


    <!-- scripts -->
    <script>
        $(document).ready(function() {

            $('.userinfo').click(function() {

                var userid = $(this).data('id');

                // AJAX request
                $.ajax({
                    url: 'ajaxfile.php',
                    // type: 'post',
                    data: {
                        userid: userid
                    },
                    success: function(response) {
                        // Add response in Modal body
                        $('.modal-body').html(response);

                        // Display Modal
                        $('#exampleModal').modal('show');
                    }
                });
            });
        });
    </script>
</body>

</html>