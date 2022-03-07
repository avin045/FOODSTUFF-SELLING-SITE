<?php

session_start();

session_destroy();
unset($_SESSION['username']);
Header('url=../../index.php');

?>
