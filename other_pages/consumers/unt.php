<?php
session_start();
require("../phpscripts/db.php");
$name = $_SESSION['userlog'];

// if (isset($_POST['product_id'], $_POST['product_available']) && is_numeric($_POST['product_id']) && is_numeric($_POST['product_available'])) 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    echo $product_id;
    $product_name = $_POST['product_name'];
    echo $product_name;
    $prodaval = (int)$_POST['product_available'];
    echo $prodaval;
    $price = (float)$_POST['product_price'];
    echo $price;
    $img = $_POST['product_image'];
    echo $img;
    $prodqty = $_POST['quantity'];
    echo $prodqty;
    $name = $_SESSION['userlog'];
    echo $name;

    $stmts = $pdo->prepare('SELECT * FROM cart WHERE uname = ? AND cpname=:cpname');
    $stmts->bindValue(':cpname',$product_name);
    $stmts->execute([$_SESSION['userlog']]);
    // echo $stmt;
    $ct = $stmts->fetchAll(PDO::FETCH_ASSOC);
    foreach ($ct as $value) {
        // echo implode("", $value); 
        // echo $value;     
    }
    // $nn = implode("", $value);
    // $nn = $value;
    // echo "name is confirm". $nn;
    echo "<pre>";
    var_dump($ct);
    // echo (explode($ct['cpname']));
    echo "</pre>";

    $ctss = $stmts->rowCount();
    // echo "count" . $ct;
    // echo gettype($ct) . "\n";

    // echo $ct['cid'];

    // echo "<pre>";
    // var_dump($product);
    // echo "</pre>";

    //check the product name not= then go inside the loop
    if(!empty($ct)){
    if ($_POST['product_name'] == $value) {
        echo $_POST['product_name'];
        // echo $value;

        if ((int)$ct > (int)0) {
            # code...            
            echo "<script>alert('product already added and updated');</script>";          
            $stupd = $pdo->prepare("UPDATE cart SET cpneed=:cpneed WHERE cpimage=:cpimage");
            $stupd->bindValue(':cpimage', $img);
            $stupd->bindValue(':cpneed', $prodqty);
            $stupd->execute();        
            // header('Location: reservedplace.php');
            // exit();
        }
        }
    } else {
        # code...
        // echo "less than 0";

        $statement = $pdo->prepare("INSERT INTO cart (cpname,cpprice,cpimage,cpaval,cpneed,uname) 
                    VALUES (:cpname,:cpprice,:cpimage,:cpaval,:cpneed,:uname)");
        // $stmt->execute([$_POST['product_id']]);
        // $statement->bindValue(':cid', $prodname);
        $statement->bindValue(':cpname', $product_name);
        $statement->bindValue(':cpprice', $price);
        // $statement->bindValue(':cpquantity',$quantity);
        $statement->bindValue(':cpimage', $img);
        $statement->bindValue(':cpaval', $prodaval);
        $statement->bindValue(':cpneed', $prodqty);
        $statement->bindValue(':uname', $name);

        $statement->execute();
    }
}

$stmt = $pdo->prepare('SELECT cid,cpname,cpprice,cpimage,cpaval,cpneed FROM cart WHERE uname= ?');
$stmt->execute([$_SESSION['userlog']]);
// $stmt->execute();
$count = $stmt->rowCount();
echo $count;
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
// var_dump($products);
echo "</pre>";

echo "<pre>";
// var_dump($products);
echo "</pre>";


if (isset($_SESSION['userlog'])) {
    $name = $_SESSION['userlog'];
}

if (!$_SESSION['userlog']) {
    // header('Location: consumer-log.php');
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


    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>


    <!-- datatables -->
    <link rel="stylesheet" href="../../node_modules/datatables.net-dt/css/jquery.dataTables.min.css">

    <!-- responsive -->
    <link rel="stylesheet" href="../../node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css">

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
            width: 70px;
            border: 0rem;
        }

        .subnav li a {
            color: silver;
        }

        .subnav li a:hover {
            color: whitesmoke;
        }
    </style>

</head>

<body style="background-color: silver;">
    <header>
        <!-- navbar -->
        <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand ms-2 fw-bold" id="brand"><i class="fas fa-leaf fa-lg fa-rotate-190 brandicon"></i>
                    FOODSTUFF</a>
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


                        </ul>

                </ul>
            </div>
        </nav> -->
    </header>

    <br>

    <!-- Subnav -->
    <ul class="nav justify-content-center p-3 bg-dark subnav nav-pills">

        <li class="nav-item nedpad">
            <a class="nav-link " href="../consumers/viewp_c_veg.php">Vegetables</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../consumers/viewp_c_frt.php">Fruits</a>
        </li>

        </li>
        <li class="nav-item">
            <a class="nav-link nedpad" aria-current="page" href="./map/map.html">Map service</a>
        </li>
        <li class="nav-item nedpad">
            <a class="nav-link active" href="./reservedplace.php">Reserved &nbsp;<i class="fas fa-shopping-cart"></i>
                <span class="badge bg-warning text-dark" id="cart-inc-id"><?php echo $count; ?></span>
            </a>

        </li>
    </ul>



    <div class="container p-1 mt-1">
        <h1 class="text-center pt-4 pt-sm-2 pb-2 text-dark">Your reserved things</h1>
        <div class="row">
            <div class="col-lg-8">
                <table id="example" class="text-dark table-responsive table-hover" style="width:100%">
                    <thead class="table bg-warning">
                        <tr class="text-center">
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price <br> (Per/Kg)</th>
                            <th>Available <br>(in Kg)</th>
                            <th>Your need <br>(in Kg)</th>
                            <!-- <th>Total</th> -->
                            <th>Remove</th>

                        </tr>
                    </thead>
                    <tbody class="table align-middle table-hover text-center">
                        <?php
                        foreach ($products as $i => $product) {
                        ?>
                            <tr>
                                <td>
                                    <!-- picture -->
                                    <img src="<?php echo "../" . $product['cpimage'] ?>" class="mobile_image_size" style="width: 150px;">
                                </td>
                                <td>
                                    <!-- some name be there -->
                                    <?php echo $product['cpname'] ?>
                                </td>
                                <td>
                                    <!-- price of the product -->
                                    <?php echo $product['cpprice'] ?>
                                </td>
                                <td>
                                    <!-- available units -->
                                    <?php echo $product['cpaval'] ?>
                                </td>
                                <td>
                                    <!-- needed -->
                                    <!-- <form action="" class="action"> -->
                                    <input type="number" name="quantity" id="quantity" value="<?php echo $product['cpneed'] ?>" placeholder="Kg" name="qty" minlength="1" maxlength="3" min="1" max="<?php echo $product['cpaval'] ?>" onchange="alrt();" required>
                                    <!-- </form> -->
                                    <?php
                                    // if()
                                    ?>
                                </td>
                                <!-- <td>
                                total amount
                            </td> -->
                                <td>
                                    <form action="./delv.php" method="POST">
                                        <input type="text" name="cid" value="<?php echo $product['cid'] ?>">
                                        <button type="submit" class="btn btn-outline-danger btn-md"><i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>


                </table>
            </div>



            <div class="col-4 justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="card-title fs-2 text-center">Total amount</h5>
                            <h6 class="card-subtitle mb-2 fs-2 text-muted text-center">
                                <!-- 250/- -->
                                <?php
                                $var1 = $product['cpprice'];
                                // echo $var1;
                                $var2 =  $product['cpneed'];
                                // echo $var2;
                                $tot = $var1 * $var2;
                                echo $tot;
                                ?>
                            </h6>

                            <form action="" class="action">
                                <div class="text-center">
                                    <a href="#" type="button" class="btn btn-sm btn-primary shadow-none">Refresh</a>

                                </div>
                            </form>
                            <p class="card-text">some text</p>
                            <div class="text-center">
                                <a href="./makepayment.php" type="button" class="btn btn-sm btn-outline-danger">Proceed to Pay</a>
                                <!-- <a href="#" class="card-link text-decoration-none">Another link</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- jquery -->
    <script src="../../Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- popper -->
    <!-- <script src="./node_modules/@popperjs/core/dist/umd/popper.min.js"></script> -->

    <!-- bootstrap -->
    <script src="../../Assets/js/bootstrap.min.js"></script>

    <!-- datatables -->
    <script type="text/javascript" language="javascript" src="../../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>

    <!-- responsive -->
    <script type="text/javascript" language="javascript" src="../../node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

    <!-- <script type="text/javascript" language="javascript" src="../../node_modules/"></script> -->


    <script>
        function alrt() {
            alert("ht");
            var x = document.POSTElementById("quantity").value;
            var aval = '<?php $product['pavailable']; ?>';
            console.log(aval);
            document.write("aval" + aval);

            // alert(x);
            // if (x > aval) {
            //     alert("not");
            // } else {
            //     $.ajax({
            //         url: 'cartm.php',
            //         // type: 'post',
            //         data: {
            //             id: pid,
            //             sessvar: sv,
            //             quant: x
            //         },
            //         success: function(response) {
            //             // Add response in Modal body
            //             $('.modal-body').html(response);

            //             // Display Modal
            //             $('#exampleModal').modal('show');
            //         }
            //     });

            // }
            // alert("added to reserved");

        }

        $(document).ready(function() {
            $('#example').DataTable({
                jQueryUI: false,
                paging: false,
                // "pagingType": scrolling,
                searching: false,
                responsive: true
            });
        });
    </script>
</body>

</html>