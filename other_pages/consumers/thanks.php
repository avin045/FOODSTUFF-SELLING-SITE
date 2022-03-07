<?php
session_start();
// require("../phpscripts/db.php");
$name = $_SESSION['userlog'];

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
    <meta http-equiv="refresh" content="12;url=http://foodstuff.rf.gd/">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">

    <title>Thanks</title>

    <style>
        p.bggreen {
            color: limegreen;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body class="bg-dark">

    <div class="container">
        <!-- 🥳🥳🥳 -->
        <div class="text-center mt-5 p-5">
            <p class="h1 text-muted">Hurray!!!!!!!! 🥳🥳</p> <br> <br>
            <p class="h1 text-light"> Thank You,
            <p class=" h1 bggreen"><?php echo $name ?></p>
            </p>
            <p class="h2 text-light"> For shopping with us.</p> <br>
            <p class="h2 text-danger"> You have to Go & Get your order manually.</p> <br>
            <p class="h5 text-primary mt-3">Don't forget to call the respective seller to get your product.</p>
        </div>
    </div>

    <div class="text-center">
        <form action="./logout_con.php">
            <button type="submit" class="btn btn-outline-warning">Back to Login</button>

            <!-- <a href="http://foodstuff.rf.gd/" type="button" class="btn btn-outline-warning">Back to home</a> -->

        </form> <br>
        <!-- <img src="http://i.stack.imgur.com/SBv4T.gif" alt="this slowpoke moves" width="100"/> -->
        <img src="../../Assets/gif/Reload-1.6s-200px.gif" alt="this slowpoke moves" width="30"/>
        <small class="fs-6 text-light">Please wait redirecting to Home</small>
    </div>
    



    <!-- jquery -->
    <script src="../../Assets/Jquery/jquery-3.6.0.min.js"></script>


    <!-- bootstrap  -->
    <script src="../../Assets/js/bootstrap.min.js"></script>
</body>

</html>