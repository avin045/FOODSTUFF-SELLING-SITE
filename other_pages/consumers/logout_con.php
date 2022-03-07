<?php

session_start();

session_destroy();
unset($_SESSION['username']);
Header('Location: consumer-log.php');

?>





<!-- altenative method respective code in viewprod.php -->
<?php
// session_start();

// if(isset($_POST['logout_btn']))
// {
//     session_destroy();
//     unset($_SESSION['username']);
//     header('Location: login.php');
// }

?>