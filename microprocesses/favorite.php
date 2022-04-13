<?php session_start();
include_once "../snipets/varriables.php";
include_once "../snipets/functions.php";
if (!(isset($_GET['favorite']) && isset($_GET['id']))){
    include "../snipets/404.php";
    exit;
}

$id = $_GET['id'];
$decision = $_GET['favorite'];

if($decision == "add"){
    $products[$id]['favorite'] = 1;
    $show[$id]['favorite'] = 1;
} else if ($decision == "remove"){
    $products[$id]['favorite'] = 0;
    $show[$id]['favorite'] = 0;
}
$_SESSION['show'] = $show ;


include_once "../snipets/updateSession.php";

header("location:".$queryList[count($queryList)-2]);