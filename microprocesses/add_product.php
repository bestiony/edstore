<?php session_start();
include_once "../snipets/varriables.php";


$newProduct = $_GET?? array();


$id = count($products);
$products[] = $newProduct;

include_once "../snipets/updateSession.php";

header("location:../ProductDetails.php?id=".$id);