<?php /*session_start();
include_once "functions.php";*/

// take an array of products 
// $products = json_decode($_SESSION['products'], true);
// devide it into arrays of 15 products each 
    $pages= array();

    $items_per_page = 15;
    // what are the result of count(array)/15 and count(array) % 15 
    $array_length = count($show);
    for ($i = 0, $j = 0; $i < $array_length ; $i+= $items_per_page, $j++){
        $start = $i;
        $end = $array_length - $i > $items_per_page ? 
                $i + $items_per_page : 
                $array_length  ;
        $pages[$j] = array_slice($show, $start, $end);
    }
// print each array in a separate page 
// if(isset($_GET[]))
if ($array_length > 1) {
    echo "<form>";
    foreach ($pages as $key => $page) {
        echo "<button type='submit' name='page' value='$key'>page $key</button>";
    }
    echo "</form>";
}


if(isset($_GET['page'])) {
    $page = $_GET['page'];
    foreach ($pages[$page] as $product) {
        printProduct($product);
    }
} else if (count($pages) < 2){
    foreach ($pages[0] as $product) {
        printProduct($product);
    }
} else {
	foreach ($show as $product) {
        printProduct($product);
    }
}