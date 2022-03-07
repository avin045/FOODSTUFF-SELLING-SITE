<?php

session_start();

require("./phpscripts/db.php");

$name = $_SESSION['userlogin'];



$statement = $pdo->prepare('SELECT * from fproduct where username = :us');
// $statement->execute(array(':pcat' => "Vegetable"));
$statement->execute(array(':us' => $name));

// $statement = $pdo->prepare('SELECT * from fproduct where pcategory = :pcat');
// $statement->execute(array(':pcat' => "Vegetable"));
// $statement->execute(array(':us' => $name));
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
// $products = $statement->fetchColumn(4);


//  echo "<pre>";
//  var_dump($products);
//  echo "</pre>";


// if (isset($_SESSION['userlogin'])) {
//     $name = $_SESSION['userlogin'];
// }

// if (!$_SESSION['userlogin']) {
//     header('Location: farmerslogin.php');
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>

    <!-- datatables -->
    <link rel="stylesheet" href="../node_modules/datatables.net-dt/css/jquery.dataTables.min.css">

    <!-- responsive -->
    <link rel="stylesheet" href="../node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css">


    <title>View Products - Foodstuff</title>

    <style>
        /* Navbar */
        .dropdown-menu li a:hover {
            background-color: transparent;
            color: tomato;
        }

        .dropdown-menu li a {
            background-color: transparent;
            color: springgreen;
        }

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

        .subnav li a {
            color: palegreen;
        }

        .subnav li>a:hover {
            color: silver;
        }

        .gray {
            background-color: darkslategrey;
        }

        /* @media only screen and (min-width: 1240px) {
            .nedpad {
                margin-left: 30px;
                margin-right: 30px;
            }
        } */


        /* table image */
        .mobile_image_size {
            width: 175px;
        }

        .block {
            display: inline-block;
        }
    </style>


</head>

<body class="bg-warning text-dark">

    <!-- class="bg-warning text-dark" -->

    <!-- header -->
    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand ms-2 fw-bold" id="brand"><i class="fas fa-leaf fa-lg fa-rotate-190 brandicon"></i>
                FOODSTUFF</a>

            <!-- <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button> -->
            <div id="navbarNav">
                <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
                <ul class="navbar-nav">


                    <!-- <li class="nav-item dropdown nedpad">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services & cart
                        </a>
                        <ul class="dropdown-menu bg-dark p-0 m-0 border-0" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-center" aria-current="page" href="./map/map.html">Map service</a></li>
                            <li> <a class="dropdown-item text-center" href="#">Add Cart</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->
                    <div class="btn-group dropstart bg-trasparent">
                        <button type="button" class="btn bg-dark text-white dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-user-circle fa-lg" style="color:springgreen;">
                            </i>
                            <?php
                            echo "$name";
                            ?>
                        </button>
                        <ul class="dropdown-menu bg-dark p-0">
                            <li><a class="dropdown-item bg-dark text-center" href="./logout.php">Logout Now</a></li>

                            <!-- Dropdown menu links -->
                        </ul>
                    </div>


                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>


    <!-- <div class="container text-light p-2"> -->

    <ul class="nav justify-content-center p-2 gray subnav">
        <li class="nav-item">
            <a class="nav-link active" href="../other_pages/productsregistration.php">Register Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../other_pages/viewprod.php">View Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../other_pages/who_ordered.php">Who ordered</a>
        </li>
    </ul>
    <!-- </div> -->

    <div class="container p-1 mt-1">
        <h1 class="text-center pt-4 pt-sm-2 pb-2 text-dark">Products</h1>
        <div class="row py-3">
            <div class="col-lg-12">
                <table id="example" class="table bg-warning text-dark table-hover table-responsive nowrap" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price (Per/Kg)</th>
                            <th>Available (in Kg)</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                            <!-- <th>Start date</th> -->
                            <!-- <th>Salary</th> -->
                        </tr>
                    </thead>



                    <tbody class="table align-middle table-dark table-hover text-center">
                        <!-- table-dark table-hover text-center -->
                        <?php foreach ($products as $i => $product) { ?>
                            <tr>
                                <td>
                                    <!-- <img class="img-responsive" src="../Assets/images_for_fe/tomotoo.png" alt="img" style="width:100px;"> -->
                                    <img src="<?php echo $product['pimage'] ?>" class="mobile_image_size">
                                </td>
                                <!-- <td>Tomato</td> -->

                                <td>
                                    <!-- hello -->
                                    <?php echo $product['pname'] ?>
                                </td>
                                <td>
                                    <!-- 9786687784 -->
                                    <?php echo $product['pprice'] ?>
                                </td>
                                <td>
                                    <!-- 9786687784 -->
                                    <?php echo $product['pavailable'] ?>
                                </td>

                                <td>
                                    <!-- hello -->
                                    <?php echo $product['pdesc'] ?>
                                </td>

                                <td>
                                    <!-- No: 500 , adangamaru road, <br>
                                Manachannallur -->
                                    <?php echo $product['paddress'] ?>
                                </td>
                                <td>
                                    <!-- Amoor -->
                                    <?php echo $product['plocation'] ?>
                                </td>
                                <td>
                                    <!-- 61 -->
                                    <?php echo $product['pphoneno'] ?>
                                </td>

                                <td>
                                    <?php echo $product['date'] ?>
                                </td>
                                <!-- <a href="update.php?id=<?php
                                                            // echo $product['pid']
                                                            ?>" class="btn btn-sm btn-outline-primary">Edit</a> -->
                                <td>
                                    <a href="update.php?id=<?php echo $product['pid'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form method="post" action="delete.php" class="block">
                                        <input type="hidden" name="id" value="<?php echo $product['pid'] ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                                <!-- <td>2011/04/25</td>
                            <td>$320,800</td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- jquery -->
    <script src="../Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- popper -->
    <!-- <script src="./node_modules/@popperjs/core/dist/umd/popper.min.js"></script> -->

    <!-- bootstrap -->
    <script src="../Assets/js/bootstrap.min.js"></script>

    <!-- datatables -->
    <script type="text/javascript" language="javascript" src="../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>



    <!-- responsive -->
    <script type="text/javascript" language="javascript" src="../node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                jQueryUI: false,
                paging: false,
                // "pagingType": scrolling,
                // searching: false,
                responsive: true
            });
        });
    </script>

</body>


</html>