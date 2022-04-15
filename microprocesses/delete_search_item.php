<?php session_start();
include_once "../snipets/varriables.php";

if (isset($_GET['item'])){
    $to_be_deleted = $_GET['item'];
} else {
    include "./404.php";
    exit;
}

// unset ($search_history[$to_be_deleted]);
array_splice($search_history,$to_be_deleted,1);
$_SESSION['search_history'] = $search_history;



include_once "../snipets/updateSession.php";
// if ($queryList[count($queryList)-2] != $queryList[count($queryList)-4]) {
    // header("location:".$queryList[count($queryList)-2]);
// } else {
    header("location:../Products.php");
// }
