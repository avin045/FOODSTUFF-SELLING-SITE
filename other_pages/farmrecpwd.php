<?php
// session_start();
require "./phpscripts/db.php";
// echo "success";

// $_SESSION("$username");

$username = "";
$password = "";
$errror_of_login = "";

if (isset($_POST['pwdreset'])) {
    $username = $_POST['usname'];
    // echo $username;
    $password = $_POST['uspwd'];
    // echo $password;
    // $sql = "select * from admin where name='$un' and psw='$pwd'";
    $statement = $pdo->prepare("SELECT * FROM fregister WHERE uname=:usname");
    $statement->bindValue(':usname', $username);
    // var_dump($statement);
    // $statement->bindValue(':pwd', $password);
    $statement->execute();

    $ct = $statement->rowCount();
    // echo $ct;

    if ($statement->rowCount() > 0) {
        $stupd = $pdo->prepare("UPDATE fregister SET password=:cpwd WHERE uname=:usname");
        // $stupd = $pdo->prepare("UPDATE cart SET cpneed=:cpneed WHERE uname=:cpimage");
        $stupd->bindValue(':usname', $username);
        $stupd->bindValue(':cpwd', $password);
        $stupd->execute();
        // echo"<script>alert('Password reset done successfully');</script>";
        echo "<script>alert('Password reset done successfully');</script>";
        $URL = "farmerslogin.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        // header("Location: farmerslogin.php");
    } else {
        $errror_of_login = "Invalid Username";
    }
}

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- custom css -->
    <link rel="stylesheet" href="./farmerslogin.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
    <!-- Assets/css/bootstrap.min.css -->

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>

    <title>Farmer's password recovery - Foodstuff</title>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6 m-auto mt-5 mb-5">
                <div class="card bg-dark px-3 py-3">
                    <div class="card-title text-center pt-5 logtit">

                        <span class="fas fa-leaf fa-3x">

                        </span><br><br>
                        <p class="title text-secondary">
                            Foodstuff Farmer's Recovery
                        </p>
                    </div>
                    <div class="card-body">
                        <form action=" " method="POST" id="loginform">
                            <div class="input-group mb-3 box1">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                                    <i class="fas fa-user fa-lg input-group-text" id="basic-addon1"></i>
                                </div>
                                <input type="text" class="form-control py-0 bg-dark text-light shadow-none" id="uuname" placeholder="Username" minlength="4" autocapitalize="off" name="usname" onkeyup="nospaces(this)" onkeypress="return blockSpecialChar(event)" value="<?php echo $username; ?>" required>
                            </div>
                            <div class="text-center">
                                <small id="unameerr" class="text-muted pt-1"></small>
                                <small id="unameerrr" class="text-muted pt-1"></small>
                            </div>


                            <div class="input-group mb-3 mt-3 box2">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                                    <i class="fas fa-key fa-lg input-group-text" id="basic-addon2"></i>
                                    <!-- <i class="fas fa-key"></i> -->
                                </div>
                                <input type="password" id="password" class="form-control py-0 bg-dark text-light shadow-none" placeholder="New password" minlength="6" maxlength="10" name="uspwd" />
                                <button class="fas fa-eye eye" id="pwd" type="button" onclick="toggle(this);"></button>
                            </div>

                            <div class="input-group mb-3 mt-3 box2">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                                    <!-- <i class="fas fa-check"></i> -->
                                    <i class="fas fa-check fa-lg input-group-text" id="basic-addon2"></i>
                                    <!-- <i class="fas fa-key"></i> -->
                                </div>
                                <input type="password" id="repassword" class="form-control py-0 bg-dark text-light shadow-none" placeholder="Retype Password" minlength="6" maxlength="10" name="uspwdcheck" onkeyup="matchPassword()" />
                            </div>
                            <!-- <br> -->
                            <div class="text-start">
                                <span class="passwordvalid" style="color: lightgreen;" id="passwordvalid"></span>
                            </div>

                            <div class="mx-2">
                                <span class="passwordvalid" style="color:red;" id="passwordvalid">
                                    <?php
                                    echo "$errror_of_login";
                                    ?>
                                </span>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-danger mt-4 signup shadow-none" name="pwdreset" value="uslog" style="align-content:center;">
                                    Reset
                                </button>
                            </div>

                            <p class="text-center text-light mt-3"><a href="./farmerslogin.php" class="text-decoration-none">Back to login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jquery -->
    <script src="../Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- bootstrap  -->
    <script src="../Assets/js/bootstrap.min.js"></script>


    <script>
        // for hide and unhide the passwords
        function toggle(button) {
            var pass = document.getElementById("password");

            if (pass.type == "password") {
                pass.type = "text";
                $(".eye").removeClass("fas fa-eye");
                $(".eye").toggleClass("fas fa-eye-slash");
            } else {
                pass.type = "password";
                $(".eye").removeClass("fas fa-eye-slash");
                $(".eye").toggleClass("fas fa-eye");
            }
        }

        $("#loginform").submit(function() {
            if ($("#password").val() == "") {
                // alert("password should be same");
                $("#passwordvalid").html("*Password is mandatory");
                return false;
            }
        })


        $("#loginform").submit(function() {
            if ($("#password").val() != $("#repassword").val()) {
                // alert("password should be same");
                $("#passwordvalid").html("Password cannot Matched");
                return false;
            }

            if ($("#password").val() == "") {
                // alert("password should be same");
                $("#passwordvalid").html("Password is must");
                return false;
            }
        })

        $(document).ready(() => {
            $("#password").keyup(passwordvalid);
        });


        function nospaces(t) {
            if (t.value.match(/\s/g)) {
                t.value = t.value.replace(/\s/g, '');
                $("#unameerr").html("**Special case automatically removed, Use' _ (underscore)'");
                // return false;
            } else {
                $("#unameerr").html("");
            }


            if (t.value.match(/[`~!@#$%^&*|•√π÷×¶∆€¥$¢^°=<>()-+{}[\]\\|,.//?;':"]/g)) {
                t.value = t.value.replace(/[`~!@#$%^&*|•√π÷×¶∆€¥$¢^°=<>()-+{}[\]\\|,.//?;':"]/g, '');
                // @#₹&-+()/~`|•√π÷×¶∆€¥$¢^°={}\%©®™✓[]<>*;:'"()/
                $("#unameerrr").html("*Special case automatically removed, Use' _ (underscore)'");
                // return false;
            } else {
                $("#unameerrr").html("");
            }
            // const regex = /[`~!@#$%^&*()-_+{}[\]\\|,.//?;':"]/g
            // let slug = label.replace(regex, '');
        }
    </script>

</body>

</html>