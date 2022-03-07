<?php
session_start();
require "./phpscripts/db.php";
// echo "success";


$username = "";
$password = "";
$errror_of_login = "";

if (isset($_POST['login'])) {
    $username = $_POST['usname'];
    // echo $username;
    $password = $_POST['uspwd'];
    // echo $password;
    // $sql = "select * from admin where name='$un' and psw='$pwd'";
    $statement = $pdo->prepare("SELECT uname,email,password FROM fregister WHERE (uname=:usname || email=:usname) AND password=:pwd ");
    $statement->bindValue(':usname', $username);
    $statement->bindValue(':pwd', $password);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $_SESSION['userlogin'] = $_POST['usname'];
        header('location:productsregistration.php');
    } else {
        $errror_of_login = "Invalid Username or Password";
    }
}

echo '<pre>';
// var_dump($statement);
echo '</pre>';



// header('location:productsregistration.php');



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

    <title>Farmer's Login - Foodstuff</title>
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 m-auto mt-5 mb-5">
                <div class="card bg-dark">
                    <div class="card-title text-center pt-5 logtit">
                        <span class="fas fa-leaf fa-3x"> </span><br /><br />
                        <p class="title text-secondary">Foodstuff Farmer's Login</p>
                    </div>

                    <div class="card-body">
                        <form action=" " method="POST" id="loginform">
                            <div class="input-group mb-3 box1">


                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
                                    <i class="fas fa-user fa-lg input-group-text" id="basic-addon1"></i>
                                </div>
                                <input type="text" class="form-control py-0 bg-dark text-light shadow-none" placeholder="Username" minlength="4" name="usname" autocapitalize="off" onkeyup="nospaces(this)" onkeypress="return blockSpecialChar(event)" value="<?php echo $username; ?>" required />


                            </div>
                            <div class="text-center">
                                <small id="unameerr" class="text-muted pt-1"></small>
                                <small id="unameerrr" class="text-danger pt-1"></small>
                            </div>


                            <div class="input-group mb-3 box2">
                                <div class="input-group-prepend">
                                    <i class="fas fa-unlock-alt fa-lg input-group-text" id="basic-addon1"></i>

                                </div>
                                <input type="password" id="password" class="form-control py-0 bg-dark text-light shadow-none" placeholder="Password" minlength="6" maxlength="10" name="uspwd" />

                                <button class="fas fa-eye eye" id="pwd" type="button" onclick="toggle(this);"></button>
                            </div>


                            <div class="mx-2">
                                <span class="passwordvalid" style="color:red;" id="passwordvalid"></span>
                            </div>

                            <div class="mx-2">
                                <span class="passwordvalid" style="color:red;" id="passwordvalid">
                                    <!-- php code -->
                                    <?php
                                    echo "$errror_of_login";
                                    ?>
                                </span>
                            </div>

                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required />
                                <label class="form-check-label text-light" for="flexCheckChecked">
                                    Accept the
                                    <a href="#" type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Terms and Conditions
                                    </a>
                                </label>

                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header text-light">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Terms and Conditions
                                            </h5>
                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-light mb-2">
                                            Our terms is very simple, <br />
                                            it's only about what the permissions you gave to access
                                            our site and what the details you provided here to sale
                                            your products. <br /><br />
                                            That's it.
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- button for form -->

                            <!--make the button to center we can add the class to certain div and we wrap within-->

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4 signup" name="login" style="align-content: center">
                                    Login now
                                </button>
                                <div class="text-danger">
                                    <p class="text-end mt-3"><a href="./farmrecpwd.php" class="text-decoration-none text-danger">Forgot Password</a></p>
                                </div>
                            </div>

                            <p class="text-center text-light mt-3">
                                Don't have a account -
                                <a href="./farmers.php" class="text-decoration-none">Sign Up</a>
                            </p>
                        </form>
                        <div class="text-center">
                            <a type="button" href="../index.php" class="text-decoration-none btn btn-sm btn-primary shadow-none">Go to Home</a>
                        </div>
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