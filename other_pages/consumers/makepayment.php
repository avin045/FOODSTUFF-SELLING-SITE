<?php
session_start();
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

    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css">

    <!-- custom styling -->
    <link rel="stylesheet" href="makepayment.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/deef53b5f5.js" crossorigin="anonymous"></script>

    <title>Foodstuff - Payment</title>


</head>

<body class="bg-dark">

    <div class="container mt-4 mb-2">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card px-4 py-4 bg-dark">
                    <span class="circle bg-warning text-dark"><i class="fa fa-check"></i></span>
                    <h5 class="mt-3 pb-2">
                        Your Payment Secured with Foodstuff <br>

                    </h5>

                    <small class="mt-2 text-muted">
                        *Please ensure about stable Internet connection
                    </small>

                    <form action="./thanks.php" id="form" method="post">

                        <div class="mb-3">
                            <label class="form-label">NAME</label>
                            <input type="text" class="form-control text-light" name="name" placeholder="Name on card" minlength="4"     maxlength="20" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ADDRESS</label>
                            <textarea class="form-control text-light" name="address" placeholder="Full-address(can't exceed 30 charc)" maxlength="30" required></textarea>
                        </div>




                        <div class="mb-3">
                            <label class="form-label" for="phone">PHONE NUMBER</label> <br>
                            <input type="tel" class="form-control text-light" id="phone" name="phone"
                                pattern="[91]{2}-[0-9]{5}-[0-9]{5}" placeholder="91-63694-99789" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Delivery Method</label> <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="dtype" id="cod" value="cod"
                                    required>
                                <label class="form-check-label" for="cod">Cash on Delivery</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="dtype" id="op" value="op">
                                <label class="form-check-label" for="op">Online Payment</label>
                            </div>
                        </div>

                        <div class="d-none toogledis">
                            <div class="form-input mb-3">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control needs-validation text-light"
                                    pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" id="cc-number"
                                    placeholder="3456-8796-5674-XXXX" name="cardnum" minlength="19" maxlength="19"
                                    required>
                            </div>

                            <div class="text-center" style="display: inline-flex;">
                                <div class="form-input mb-3">
                                    <label for="cc-expiration" class="form-label">Expiration</label>
                                    <input type="text" class="form-control needs-validation text-light" name="exp"
                                        id="cc-expiration" placeholder="05" pattern="[0-9]{2}" required>

                                </div>


                                <div class="form-input mb-3 mx-3">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control needs-validation text-light" name="cvv"
                                        id="cc-cvv" placeholder="002"  pattern="[0-9]{3}" required>

                                </div>
                            </div>
                        </div>



                        <!-- button for form -->
                        <div class="text-center">
                            <!-- style="display: inline-block; width: 100%;" -->
                            <button type="submit" class="btn btn-warning mt-2 signup shadow-none">
                                Make Done
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- jquery -->
    <script src="../../Assets/Jquery/jquery-3.6.0.min.js"></script>


    <!-- bootstrap  -->
    <script src="../../Assets/js/bootstrap.min.js"></script>

    <!-- <script>
        $(document).ready(function () {
            $('input:radio[name=op]').change(function () {
                if ($('input:radio[name=op]:checked')) {
                    // alert("hi");
                    $(".toogledis")
                }
            })

        });
    </script> -->

    <script>
        $(document).ready(function () {
            $("#op").click(function () {
                $("#op").prop("checked", true);
                $("#cod").prop("checked", false);
                $(".toogledis").removeClass("d-none");
                $(".needs-validation").prop("disabled", false);
            });
            $("#cod").click(function () {
                $("#cod").prop("checked", true);
                $("#op").prop("checked", false);
                $(".toogledis").addClass("d-none");
                // remove the whole class so we wont face the required field issues and success with prop
                $(".needs-validation").prop("disabled", true);
                // remove the whole class so we wont face the required field issues but it removes totally
                // $(".toogledis").remove();
                // $(".needs-validation").removeAttr("required");
            });
        });
    </script>

</body>

</html>