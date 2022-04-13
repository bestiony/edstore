<?php session_start();
include_once "../snipets/varriables.php";


$newProduct = $_GET?? array();


$id = count($products);
$products[] = $newProduct;
$file = fopen("../data/storedata.csv","w");
fputcsv($file, $_SESSION['keys']);
foreach($products as $product){
    fputcsv($file, $product);
}
fclose($file);

include_once "../snipets/updateSession.php";

header("location:../ProductDetails.php?id=".$id);