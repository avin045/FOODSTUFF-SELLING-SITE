<?php
require("../phpscripts/db.php");

$id = $_POST['cid'] ?? null;

var_dump($_POST);

if (!$id) {
    // header('location:index.php');
    // exit;
}

$statement = $pdo->prepare("DELETE from cart WHERE cid=:id");
$statement->bindValue(':id', $id);
$statement->execute();

// header('location: viewp_c_veg.php');
header('location: reservedplace.php');
?>