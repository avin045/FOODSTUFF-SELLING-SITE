<?php
$pdo = new PDO('mysql:host=localhost;port=3308;dbname=foodstuff', 'root', ''); //port 3306 or 3308
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $user ="epiz_29200406";
// $pass ="cXMC2AZHu1";

// $pdo = new PDO('mysql:host=sql110.epizy.com;dbname=epiz_29200406_foodstuff',$user,$pass);
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
