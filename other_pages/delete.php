<?php

require("./phpscripts/db.php");

$id = $_POST['id'] ?? null;


if (!$id) {
    header('location:viewprod.php');
    // echo $id;
    exit;
}

$statement = $pdo->prepare("DELETE from fproduct WHERE pid=:id");
$statement->bindValue(':id', $id);
$statement->execute();



//   echo "<pre>";
//   var_dump($_POST);
//   echo "</pre>";


header('location:farmerslogin.php');
