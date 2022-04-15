<?php session_start();
include_once "../snipets/varriables.php";


$newProduct = $_GET?? array();
if(empty($_GET)){
    include "./404.php";
    exit;
}
foreach ($newProduct as $property){
    if (empty($property) || count($newProduct)<11){
        include "./404.php";
        exit;
    }
}

$id = count($products);
$products[] = $newProduct;
$file = fopen("../data/storedata.csv","w");
fputcsv($file, $_SESSION['keys']);
$output = $products;
foreach ($output as $key=> $product){
    $output[$key]['photos'] = json_encode($product['photos']);
}




foreach($output as $product){
    fputcsv($file, $product);
}
fclose($file);

include_once "../snipets/updateSession.php";

header("location:../ProductDetails.php?id=".$id);