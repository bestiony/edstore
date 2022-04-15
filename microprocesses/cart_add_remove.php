<?php session_start();
include_once "../snipets/varriables.php";
include_once "../snipets/functions.php";
if (!(isset($_GET['cart']) && isset($_GET['id']))){
    include "./404.php";
    exit;
}

$id = $_GET['id'];
$decision = $_GET['cart'];
$quantity = $_GET['quantity']?? 1;
if($decision == "add"){
    $cart[$id]= $quantity;
} else if ($decision == "remove"){
    unset($cart[$id]);
}
include_once "../snipets/updateSession.php";

header("location:".$queryList[count($queryList)-2]);