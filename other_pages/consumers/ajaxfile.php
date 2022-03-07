<?php
require("../phpscripts/db.php");

// $userid = 20;

$iid = $_REQUEST["userid"];
// echo $iid;

$statement = $pdo->prepare('SELECT * from fproduct where pid = :userid');
$statement->execute(array(':userid' => $iid));

// $statement = $pdo->prepare('SELECT * from fproduct where pcategory = :pcat');
// $statement->execute(array(':pcat' => "Vegetable"));
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// var_dump($products);
// echo "</pre>";
?>

<?php
$response = "<table class='text-white' border='0' width='100%'>";

foreach ($products as $i => $product) {
    //    $iid= $product['pid'];
    // $product['pname']; //2
    $desc = $product['pdesc'];
    $cate = $product['pcategory'];
    $funame = $product['username'];  //username
    // $product['pimage'];  //1
    // $product['pprice']; //3
    $addre = $product['paddress'];
    $loca =  $product['plocation'];
    $ph =  $product['pphoneno'];
    $d = $product['date'];



    // $response = "";
    // .= COncatenation append

    $response .= "<tr>";
    $response .= "<td>Farmer Username : " . $funame . "</td>";
    $response .= "</tr>";


    $response .= "<tr>";
    $response .= "<td>Description : " . $desc . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Address : " . $addre . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Location : " . $loca . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Date : " . $d . "</td>";
    $response .= "</tr>";

    
    $response .= "<tr>";
    $response .= "<td>Phone : " . $ph . "</td>";
    $response .= "</tr>";



    // break;



    // continue;
}
$response .= "</table>";
echo $response;
exit;

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
        table {
            color: whitesmoke;
        }
    </style>
</head>

<body>
    <script src="../../Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- popper -->
    <script src="./node_modules/@popperjs/core/dist/umd/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="../../Assets/js/bootstrap.min.js"></script>


</body>

</html>