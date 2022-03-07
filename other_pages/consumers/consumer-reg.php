<?php
require "../phpscripts/db.php";
// echo "connection success";


$error = "";
$error1 = "";
$error2 = "";

$name = "";
$uname = '';
$gml = '';
$email = '';
$errorname = "";

echo "<pre>";
// var_dump($_POST);
echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //mname , descri which are given name in forms so if you get data from the post you must mention that name to here to get.

    $email = $_POST['email'];
    // echo $email;
    $name = $_POST['name'];
    // $name = 'gh';
    // echo $name;
    $uname = $_POST['uname'];
    // echo $uname;
    $password = $_POST['pwd'];
    // echo $password;

    //var_dump($mobile_image);

    // $gml = $_POST['gmli'];
    // echo $gml;


    $query = $pdo->prepare("SELECT * from cregister WHERE uname=?");
    $query->execute([$uname]);
    $result = $query->rowCount();
    if ($result > 0) {
        $error = "*Username is already taken";
    }


    if ($name == "") {
        $errorname = "*Username is already taken";
    }


    $query1 = $pdo->prepare("SELECT * from cregister WHERE email=?");
    $query1->execute([$_POST['email']]);
    $result1 = $query1->rowCount();
    // var_dump($result1);
    if ($result1 > 0) {
        $error1 = "*Email is already in use";
    }
    // {
    //     $error1="";
    // }

    // $query2 = $pdo->prepare("SELECT * from cregister WHERE email=?");
    // $query2->execute([$gml]);
    // $result2 = $query1->rowCount();
    // if ($result > 0) {
    //     $error2 = "*Email is already registered";
    // }

    echo '<pre>';
    // var_dump($query);
    echo '</pre>';

    echo '<pre>';
    // var_dump($result);
    echo '</pre>';

    if (empty($error)) {
        $statement = $pdo->prepare("INSERT INTO cregister (name, uname, password, email) 
                VALUES (:name, :uname,:password,:email)");



        $statement->bindValue(':name', $name);
        $statement->bindValue(':uname', $uname);
        $statement->bindValue(':password', $password);
        // $statement->bindValue(':gml', $gml);
        $statement->bindValue(':email', $email);
        $statement->execute();


        Header('Location:consumer-log.php');
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- custom css -->
    <link rel="stylesheet" href="./consumer-reg.css" />

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">
    <!-- Assets/css/bootstrap.min.css -->

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <title>For consumers - Foodstuff</title>
</head>

<body class="bg-dark">
    <div class="container mt-4 mb-2">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card px-4 py-4 bg-dark">
                    <span class="circle bg-success"><i class="fa fa-check"></i></span>
                    <h5 class="mt-3 pb-2">
                        Let's start a day with Foodstuff Community <br />

                    </h5>

                    <small class="mt-2 text-muted">
                        Get register with us to get quality products.
                    </small>
                    <!-- <form id="form" action="./" method="GET"> -->
                    <form action="" id="form" method="POST">

                        <!-- </form> -->

                        <div class="form-input mb-3">
                            <i class="fas fa-envelope"></i>
                            <!-- email pattern:/^[^ ]+@[^ ]+\.[a-z]{2,3}$/; -->
                            <input type="email" class="form-control text-light emailval" id="emailval" placeholder="Email address" name="email" value="<?php echo $email; ?>">
                            <div id="email"></div>
                            <div id="emaill" class="text-warning"> <?php echo $error1; ?></div>
                        </div>

                        <div class="form-input mb-3">
                            <i class="fas fa-signature"></i>
                            <input type="text" class="form-control text-light username" placeholder="Name" name="name" id="name" minlength="5" maxlength="18" value="<?php echo $name; ?>">
                            <div id="name"></div>
                        </div>

                        <div class="form-input mb-3">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control text-light username" placeholder="User name" name="uname" id="uname" minlength="5" maxlength="18" autocapitalize="off" onkeyup="nospaces(this)" onkeypress="return blockSpecialChar(event)" value="<?php echo $uname; ?>">
                            <div id="username" class="text-danger"></div>
                            <div id="uname" class="text-danger"> <?php echo $error; ?></div>
                            <small id="unameerr" class="text-muted"></small>
                            <small id="unameerrr" class="text-danger pt-1"></small>
                            <!-- *Whitespaces removed automatically -->
                        </div>

                        <div class="form-input mb-3">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" minlength="6" maxlength="10" class="form-control text-light passwordval" placeholder="Password" name="pwd">
                            <button class="fas fa-eye eye" id="pwd" type="button" onclick="toggle(this);"></button>
                            <div id="passval"></div>
                        </div>
                        <!-- <i class="fas fa-low-vision"></i> -->

                        <div class="form-input mb-3">
                            <!-- <i class="fas fa-lock"></i> -->
                            <i class="fas fa-keyboard"></i>
                            <input type="password" id="repassword" minlength="6" maxlength="10" class="form-control text-light" placeholder="Confirm password" name="pwdconf" onkeyup="matchPassword()">

                            <!-- password checker -->

                            <div>
                                <span class="passwordvalid" style="color: lightgreen;" id="passwordvalid"></span>
                            </div>
                        </div>


                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required />
                            <label class="form-check-label" for="flexCheckChecked">
                                I agree all the <a href="#" type="button" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Terms and
                                    Conditions </a>
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
                                </div>
                            </div>
                        </div>


                        <!-- button for form -->
                        <div class="text-center">
                            <!-- style="display: inline-block; width: 100%;" -->
                            <button type="submit" class="btn btn-success mt-2 signup shadow-none" id="btn">

                                Register now
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <span>Or</span>
                    </div>

                    <!-- social medias -->
                    <div class="d-flex justify-content-center mt-3">
                        <!-- <span class="social"><i class="fa fa-google"></i></span> -->
                        <a class="social" href="#" style="text-decoration: none;"><i class="fa fa-facebook"></i></a>
                        <a class="social" href="#" style="text-decoration: none;"><i class="fa fa-twitter"></i></a>
                        <!-- <span class="social"><i class="fa fa-linkedin"></i></span> -->
                    </div>

                    <div class="text-center mt-4">
                        <span>If you already an member?</span>
                        <a href="./consumer-log.php" class="text-decoration-none" style="color: goldenrod;">Sign In</a>
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

        $("#form").submit(function() {
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
            $("#repassword").keyup(passwordvalid);
        });

        // email validation

        function validateEmail(email) {
            const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return re.test(email);
        }

        function validate() {
            var $result = $("#email");
            var email = $(".emailval").val();
            $result.text("");

            if (validateEmail(email)) {
                $result.text(email + " is valid :)");
                $result.css("color", "lightgreen");
                $('#form').attr('onsubmit', 'return true;')
            } else {
                $result.text(email + " is not valid :(");
                $result.css("color", "red");
                $('#form').attr('onsubmit', 'return false;');
            }
            // return false;
        }
        $(".emailval").on('keydown keyup change', validate);

        //user name and email validation red
        $("#form").submit(function() {
            var pass = document.getElementById("uname");
            if ($("#uname").val() == "") {
                $("#username").html("Username is must").css("color", "red");
                return false;
            }
        });
        $("#form").submit(function() {
            var eml = document.getElementById("emailval");
            if ($("#emailval").val() == "") {
                $("#email").html("Email is must need").css("color", "red");
                return false;
            }
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
                $("#unameerrr").html("*Use '_' or '-' ");
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