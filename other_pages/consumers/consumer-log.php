<?php
session_start();
require "../phpscripts/db.php";
// echo "success";

// $_SESSION("$username");

$username = "";
$password = "";
$errror_of_login = "";

if (isset($_POST['login'])) {
    $username = $_POST['usname'];
    // echo $username;
    $password = $_POST['uspwd'];
    // echo $password;
    // $sql = "select * from admin where name='$un' and psw='$pwd'";
    $statement = $pdo->prepare("SELECT uname,password,email FROM cregister WHERE uname=:usname AND password=:pwd");
    $statement->bindValue(':usname', $username);
    $statement->bindValue(':pwd', $password);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $_SESSION['userlog'] = $_POST['usname'];
        header('location:viewp_c_veg.php');
    } else {
        $errror_of_login = "Invalid Username or Password";
    }
}

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css -->
    <link rel="stylesheet" href="consumer-log.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css" />
    <!-- Assets/css/bootstrap.min.css -->

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>


    <title>Consumer's Login - Foodstuff</title>
</head>

<body class="bg-dark">
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6 m-auto mt-5 mb-5">
                <div class="card bg-dark px-3 py-3">
                    <div class="card-title text-center pt-5 logtit">

                        <span class="fas fa-leaf fa-3x">

                        </span><br><br>
                        <p class="title text-secondary">
                            Foodstuff Consumer's Login
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
                                <small id="unameerrr" class="text-danger pt-1"></small>
                            </div>


                            <div class="input-group mb-3 mt-3 box2">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                                    <i class="fas fa-key fa-lg input-group-text" id="basic-addon2"></i>
                                    <!-- <i class="fas fa-key"></i> -->
                                </div>
                                <input type="password" id="password" class="form-control py-0 bg-dark text-light shadow-none" placeholder="Password" minlength="6" maxlength="10" name="uspwd" />
                                <button class="fas fa-eye eye" id="pwd" type="button" onclick="toggle(this);"></button>
                            </div>


                            <div class="mx-2">
                                <span class="passwordvalid" style="color:red;" id="passwordvalid">
                                    <?php
                                    echo "$errror_of_login";
                                    ?>
                                </span>
                            </div>


                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required />
                                <label class="form-check-label text-light" for="flexCheckChecked">
                                    Accept the <a href="#" type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">T &
                                        C </a>
                                </label>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header text-light">
                                            <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-light mb-2">
                                            Our terms is very simple, <br>
                                            it's only about what the permissions you gave to access our site and what
                                            the details you provided here to buy your products. <br><br>
                                            That's it.
                                        </div>
                                        <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- button for form -->

                            <!--make the button to center we can add the class to certain div and we wrap within-->


                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4 signup shadow-none" name="login" value="uslog" style="align-content:center;">
                                    Login now
                                </button>
                                <div class="text-danger">
                                    <p class="text-end mt-3"><a href="./pwdrec.php" class="text-decoration-none text-danger">Forgot Password</a></p>
                                </div>
                            </div>

                            <p class="text-center text-light mt-3">Don't have a account - <a href="./consumer-reg.php" class="text-decoration-none">Sign Up</a></p>
                        </form>
                        <div class="text-center">
                            <a type="button" href="../../index.php" class="text-decoration-none btn btn-sm btn-primary shadow-none">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jquery -->
    <script src="../../Assets/Jquery/jquery-3.6.0.min.js"></script>

    <!-- bootstrap  -->
    <script src="../../Assets/js/bootstrap.min.js"></script>

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

        $(document).ready(() => {
            $("#password").keyup(passwordvalid);
        });


        function nospaces(t) {
            if (t.value.match(/\s/g)) {
                t.value = t.value.replace(/\s/g, '');
                $("#unameerr").html("*White Space automatically removed, Use' _ (underscore)' ");
                // return false;
            } else {
                $("#unameerr").html("");
            }

            if (t.value.match(/[`~!@#$%^&*|•√π÷×¶∆€¥$¢^°=<>()-+{}[\]\\|,.//?;':"]/g)) {
                t.value = t.value.replace(/[`~!@#$%^&*|•√π÷×¶∆€¥$¢^°=<>()-+{}[\]\\|,.//?;':"]/g, '');
                // @#₹&-+()/~`|•√π÷×¶∆€¥$¢^°={}\%©®™✓[]<>*;:'"()/
                $("#unameerrr").html("*Use '_'  or  '-'");
                // return false;
            } else {
                $("#unameerrr").html("");
            }
        }

        function blockSpecialChar(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 95 || k == 32 || (k >= 48 && k <= 57));
        }
    </script>

</body>

</html>



<!-- function nospaces(t) {
            if (t.value.match(/\s/g)) {
                t.value = t.value.replace(/\s/g, '');
                $("#unameerr").html("*White Space automatically removed ");
                // return false;
            } else {
                $("#unameerr").html("");
            }
            // const regex = /[`~!@#$%^&*()-_+{}[\]\\|,.//?;':"]/g
            // let slug = label.replace(regex, '');
        }

        function blockSpecialChar(e) {
            var k = e.charCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 95 || k == 32 || (k >= 48 && k <= 57));
        } -->