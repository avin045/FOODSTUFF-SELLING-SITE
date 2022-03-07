<?php
session_start();

require("./phpscripts/db.php");
// echo "ok";

// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
// exit;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prodname = $_POST['pname'];
    // echo $prodname;

    $name = $_SESSION['userlogin'];

    $proddesc = $_POST['descri'];
    // echo $proddesc;

    $prodcat = $_POST['type'];
    // echo  $prodtype;

    $prodimg = $_FILES['image'] ?? null;
    // echo  $prodimg;

    $prodaval = (int)$_POST['aval'];

    $prodprice = (float)$_POST['price'];
    // echo  $prodprice;

    $prodaddr = $_POST['address'];
    // echo $prodaddr;

    $prodloc = $_POST['locate'];
    // echo $prodloc;

    $prodphone = (int)$_POST['phone'];
    // echo $prodphone;

    $date = date('Y-m-d');
    // echo $date;


    //making a directory
    if (!is_dir("farmers_images")) {
        mkdir('farmers_images');
    }

    $prodimg = $_FILES['image'] ?? null;
    $image_path = ''; //its wont show the error if the name has none of the value.

    if ($prodimg && $prodimg['tmp_name']) {
        $image_path = 'farmers_images/' . randomString(6) . '/' . $prodimg['name'];
        // echo "<pre>";
        // var_dump($image_path);
        // echo "</pre>";
        // exit;

        mkdir(dirname($image_path));
        move_uploaded_file($prodimg['tmp_name'], $image_path);
    }
    // exit;

    $statement = $pdo->prepare("INSERT INTO fproduct (pname,username,pdesc,pcategory,pimage,pavailable,pprice,paddress,plocation,pphoneno,date) 
                    VALUES (:prodname,:username,:proddesc,:prodcategory,:prodimage,:pavailable,:prodprice,:prodaddress,:prodlocation,:prodphoneno,:date)");


    $statement->bindValue(':prodname', $prodname);
    $statement->bindValue(':username', $name);
    $statement->bindValue(':proddesc', $proddesc);
    $statement->bindValue(':prodcategory', $prodcat);
    $statement->bindValue(':prodimage', $image_path);
    $statement->bindValue(':pavailable', $prodaval);
    $statement->bindValue(':prodprice', $prodprice); //aval
    $statement->bindValue(':prodaddress', $prodaddr);
    $statement->bindValue(':prodlocation', $prodloc);
    $statement->bindValue(':prodphoneno', $prodphone);
    $statement->bindValue(':date', $date);


    $statement->execute();

    header('Location:viewprod.php');
}

// genarate random string
function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}


if (isset($_SESSION['userlogin'])) {
    $name = $_SESSION['userlogin'];
}


if (!$_SESSION['userlogin']) {
    header('Location: farmerslogin.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="productsregistration.css">


    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>






    <title>Foodstuff - Products Regsitration</title>


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
    </style>

</head>

<body class="bg-dark">
    <!-- header -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand ms-2 fw-bold" id="brand"><i class="fas fa-leaf fa-lg fa-rotate-190 brandicon"></i>
                FOODSTUFF</a>

            <div id="navbarNav">
                <!-- i'm changing the code from this tos <div class="collapse navbar-collapse" id="navbarNav">  -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="./viewprod.php">Registred</a> -->
                    </li>
                    <li class="nav-item nedpad">
                        <!-- <i class="far fa-user-circle fa-lg" style="color:springgreen;">
                        </i> -->

                        <div class="btn-group dropstart bg-trasparent">
                            <button type="button" class="btn bg-dark text-white dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-user-circle fa-lg" style="color:springgreen;">
                                </i>
                                <?php
                                echo "$name";
                                ?>
                            </button>
                            <ul class="dropdown-menu bg-dark p-0">
                                <li><a class="dropdown-item bg-dark text-light text-center" href="./logout.php">Logout Now</a></li>

                                <!-- Dropdown menu links -->
                            </ul>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>

    <ul class="nav justify-content-center p-2 bg-dark text-white subnav">
        <li class="nav-item">
            <a class="nav-link active" href="../other_pages/productsregistration.php" style="color: silver;">Register Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../other_pages/viewprod.php" style="color: silver;">View Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="../other_pages/who_ordered.php" style="color: silver;">who ordered</a>
        </li>
    </ul>

    <div class="text-light text-uppercase text-center mt-5 headerp">
        <!-- <h1>
            <span class="fas fa-leaf mx-1">

            </span>
            Foodstuff
        </h1> -->

    </div>
    <div class="fs-1 text-center pt-0" id="username">
        <span class="text-capitalize">Welcome</span>
        <?php
        echo "$name";
        ?>

    </div>
    <div class="text-light lead text-center">
        <p class="pt-1 lead fs-2 text-captalize">Register your product</p>
    </div>




    <div class="container mt-0">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <!-- <div class="col"> -->
                <!-- above COL for non break at 700px to 750px width -->
                <div class="card bg-dark">
                    <form action="" method="POST" class="bg-dark text-light p-5" id="product" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">PRODUCT NAME</label>
                            <input type="text" id="pname" class="form-control" name="pname">
                            <div id="prodname"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">PRODUCT DESCRIPTION</label>
                            <textarea class="form-control" name="descri"></textarea>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">PRODUCT CATEGORY</label> <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="type" value="Vegetable" required>
                                <label class="form-check-label" for="type">Vegetable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="type2" value="Fruit" required>
                                <label class="form-check-label" for="type2">Fruit</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">PRODUCT IMAGE</label><br>
                            <input type="file" name="image"> <br>
                            <small class="text-muted">*Uploading image will shows quality to customers.</small>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">PRODUCT AVAILABILITY</label>
                            <input type="number" class="form-control" name="aval" minlength="3" maxlength="3" placeholder="takes as KG" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">PRODUCT PRICE</label>
                            <input type="number" step=".01" class="form-control" name="price" placeholder="Price Per KG" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ADDRESS</label>
                            <textarea id="addr" class="form-control addr" name="address" placeholder="specify only one line of your address"></textarea>
                            <!-- <div class="text-danger"> -->
                            <div id="address"></div>
                            <!-- </div> -->
                        </div>

                        <div class="mb-3">
                            <label class="form-label">LOCATION</label>
                            <input type="text" id="locatee" class="form-control locate" name="locate" placeholder="Ex: Amoor,Musiri T.K">
                            <div id="location"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="phone">PHONE NUMBER</label> <br>
                            <input type="tel" class="form-control phonenumber" id="phone" name="phone" pattern="[6-9]{1}[0-9]{4}[0-9]{5}" minlength="10" maxlength="10" placeholder="6369499789" required>
                            <div id="phonenumber"></div>
                        </div>

                        <div class="text-center pt-1">
                            <button type="submit" id="sub" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- <script src="./productsregistration.js" crossorigin="anonymous"></script> -->
    <!-- bootstrap js -->
    <script src="../Assets/js/bootstrap.min.js"></script>

    <!-- <script src="./productsregistration.js"></script> -->

    <script src="../Assets/Jquery/jquery-3.6.0.min.js"></script>



    <!-- <script src="../Assets/js/bootstrap.bundle.min.js"></script> -->

    <script>
        const address = document.getElementById("addr");
        const locati = document.getElementById("locatee");
        const pname = document.getElementById("pname");
        const form = document.getElementById("product");
        // const msgs = document.getElementById("address");
        const err = document.getElementById("address");
        const errr = document.getElementById("location");
        const perrr = document.getElementById("prodname");


        form.addEventListener("submit", (e) => {
            let errors = [];
            let errors_1 = [];
            let locer = [];
            let locer_1 = [];

            let pnameer = [];
            let pnameer_1 = [];

            //   maxlen = "4";
            if (address.value === "" || address.value == null) {
                errors_1.push("Address cannot be an empty");
            }
            if (address.value.length <= 4) {
                errors.push("Address must above with 4 characters");
            }
            if (address.value.length >= 25) {
                errors.push("Address must with in 25 characters");
            }

            if (errors.length > 0) {
                e.preventDefault();
                err.innerText = errors.join();
                // err.innerText = errors_1.join();
                err.style.color = "red";
            }
            if (errors_1.length > 0) {
                e.preventDefault();
                // err.innerText = errors.join();
                err.innerText = errors_1.join();
                err.style.color = "red";
            }



            if (locati.value === "" || locati.value == null) {
                locer_1.push("location cannot be an empty");
            }

            if (locati.value.length <= 4) {
                locer.push("location must above with 4 characters");
            }

            if (locati.value.length >= 15) {
                locer.push("location must with in 15 characters");
            }

            if (locer.length > 0) {
                e.preventDefault();
                errr.innerText = locer.join();
                // err.innerText = errors_1.join();
                errr.style.color = "red";
            }

            if (locer_1.length > 0) {
                e.preventDefault();
                // err.innerText = errors.join();
                errr.innerText = locer_1.join();
                errr.style.color = "red";
            }



            if (pname.value === "" || pname.value == null) {
                pnameer_1.push("Product name cannot be an empty");
            }
            if (pname.value.length <= 4) {
                pnameer.push("Product name must have 4 characters");
            }
            if (pname.value.length >= 20) {
                pnameer.push("Product name must with in 20 characters");
            }

            if (pnameer.length > 0) {
                e.preventDefault();
                perrr.innerText = pnameer.join();
                // err.innerText = errors_1.join();
                perrr.style.color = "red";
            }
            if (pnameer_1.length > 0) {
                e.preventDefault();
                // err.innerText = errors.join();
                perrr.innerText = pnameer_1.join();
                perrr.style.color = "red";
            }
        });
    </script>


</body>

</html>