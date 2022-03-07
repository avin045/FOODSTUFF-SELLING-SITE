<?php
session_start();
require("./phpscripts/db.php");
$name = $_SESSION['userlogin'];

$id = $_GET['id'] ?? null;

// echo $id;


if (!$id) {
    header('location:viewprod.php');
    // echo $id;
    exit;
}

$statement = $pdo->prepare("SELECT * FROM fproduct WHERE pid=:id");
$statement->bindValue(":id", $id);
$statement->execute();
$productt = $statement->fetch(PDO::FETCH_ASSOC);



// echo "<pre>";
// var_dump($productt);
// echo "</pre>";

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
    $image_path = $productt['pimage'];

    if ($productt['pimage']) {
        unlink($productt['pimage']);
    }


    if ($prodimg && $prodimg['tmp_name']) {
        $image_path = 'farmers_images/' . randomString(6) . '/' . $prodimg['name'];

        mkdir(dirname($image_path));
        move_uploaded_file($prodimg['tmp_name'], $image_path);
    }
    // exit;

    $statement = $pdo->prepare("UPDATE fproduct SET pname=:prodname,username=:username,pdesc=:proddesc,pcategory=:prodcategory,pimage=:prodimage,pavailable=:pavailable,pprice=:prodprice,paddress=:prodaddress,plocation=:prodlocation,pphoneno=:prodphoneno WHERE pid=:id");

    $statement->bindValue(':prodname', $prodname);
    $statement->bindValue(':username', $name);
    $statement->bindValue(':proddesc', $proddesc);
    $statement->bindValue(':prodcategory', $prodcat);
    $statement->bindValue(':prodimage', $image_path);
    $statement->bindValue(':pavailable', $prodaval);
    $statement->bindValue(':prodprice', $prodprice);
    $statement->bindValue(':prodaddress', $prodaddr);
    $statement->bindValue(':prodlocation', $prodloc);
    $statement->bindValue(':prodphoneno', $prodphone);
    $statement->bindValue(':id', $id);
    // $statement->bindValue(':date', $date);


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
                        <i class="far fa-user-circle fa-lg" style="color:springgreen;">
                        </i>

                        <a class="fs-4 text-center" id="username1" style="text-decoration: none;">
                            <?php
                            echo "$name";
                            ?>
                        </a>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>

    <ul class="nav justify-content-center p-2 bg-dark text-white subnav">
        <li class="nav-item">
            <a class="nav-link active" href="../other_pages/productsregistration.php">Register Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../other_pages/viewprod.php">View Products</a>
        </li>
    </ul>



    <div class="fs-1 text-center pt-0" id="username">
        <span class="text-capitalize">Welcome</span>
        <?php
        echo "$name";
        ?>

    </div>

    <div class="text-light lead text-center">
        <p class="pt-1 lead fs-2 text-captalize">Update Details Of <?php echo $productt['pname'] ?></p>
    </div>


    <div class="container mt-0">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <form action=" " method="POST" class="bg-dark text-light p-5" id="product" enctype="multipart/form-data">

                        <?php if ($productt['pimage']) : ?>
                            <img src="<?php echo $productt['pimage'] ?>" alt="product image" srcset="" style="width: 175px;">

                        <?php endif; ?>

                        <div class="mb-3">
                            <label class="form-label">PRODUCT NAME</label>
                            <input type="text" class="form-control" name="pname" value="<?php echo $productt['pname'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">PRODUCT DESCRIPTION</label>
                            <textarea class="form-control" name="descri"><?php echo $productt['pdesc'] ?></textarea>
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
                            <input type="number" class="form-control" name="aval" minlength="3" maxlength="3" placeholder="takes as KG" value="<?php echo $productt['pavailable'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">PRODUCT PRICE</label>
                            <input type="number" step=".01" class="form-control" name="price" placeholder="Price Per KG" value="<?php echo $productt['pprice'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ADDRESS</label>
                            <textarea id="addr" class="form-control addr" name="address" placeholder="specify only one line of your address" required><?php echo $productt['paddress'] ?></textarea>
                            <!-- <div class="text-danger"> -->
                            <div id="address"></div>
                            <!-- </div> -->
                        </div>

                        <div class="mb-3">
                            <label class="form-label">LOCATION</label>
                            <input type="text" class="form-control locate" name="locate" placeholder="Ex: Amoor,Musiri T.K" value="<?php echo $productt['plocation'] ?>" required>
                            <div id="location"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="phone">PHONE NUMBER</label> <br>
                            <input type="tel" class="form-control phonenumber" id="phone" name="phone" pattern="[6-9]{1}[0-9]{4}[0-9]{5}" minlength="10" maxlength="10" placeholder="6369499789" value="<?php echo $productt['pphoneno'] ?>" required>
                            <div id="phonenumber"></div>
                        </div>

                        <div class="text-center pt-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="../Assets/js/bootstrap.min.js"></script>

    <script src="../Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- <script src="../Assets/js/bootstrap.bundle.min.js"></script> -->

    <script>
        var minLength = 10;
        var maxLength = 40;
        $(document).ready(function() {
            $('.addr').on('keydown keyup change', function() {

                var char = $(this).val();
                var charLength = $(this).val().length;
                $(".addr").attr("required", "true");
                if (charLength < minLength) {
                    $('#address').text('Address is short, minimum ' + minLength + ' letters required.').css("color", "red");
                    $('#product').attr('onsubmit', 'return false;');
                    // return false;
                }

                // else if (charLength > maxLength) {
                //     $('#address').text('Address is not valid, maximum ' + maxLength + ' allowed.').css("color", "red");
                //     $(this).val(char.substring(0, maxLength));
                //     $('#product').attr('onsubmit', 'return false;');
                // }
                else {
                    $('#address').text('Address is valid').css("color", "lightgreen");
                    $('#product').attr('onsubmit', 'return true;');
                    // $('#product').attr('onsubmit', 'return false;');
                }
            });



            $('.phonenumber').on('keydown keyup change', function() {
                var phone_no = 10;
                var char = $(this).val();
                var charLength = $(this).val().length;

                if (charLength = phone_no) {
                    $('#phonenumber').text('Phone number is valid').css("color", "lightgreen");
                    $(this).val(char.substring(0, phone_no));
                    $('#product').attr('onsubmit', 'return true;');
                }
                if (charLength < phone_no) {
                    $('#phonenumber').text('Phone number is not valid').css("color", "red");
                    $('#product').attr('onsubmit', 'return false;');
                }
            });
        });


        $(document).ready(function() {
            $('.locate').on('keydown keyup change', function() {
                var ml_location = 20;
                var sl_location = 4;
                var char = $(this).val();
                var charLength = $(this).val().length;
                if (charLength > ml_location || charLength < sl_location) {
                    $('#location').text('Location is not valid').css("color", "red");
                    $(this).val(char.substring(0, ml_location));
                    $(this).val(char.substring(0, sl_location));
                    $('#product').attr('onsubmit', 'return false;');
                } else {
                    $('#location').text('Location is valid').css("color", "lightgreen");
                    $('#product').attr('onsubmit', 'return true;');
                }
            });

        });
    </script>
</body>

</html>