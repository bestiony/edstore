<?php session_start();

include_once "./snipets/functions.php";
include_once "./snipets/varriables.php";


echo "<pre>";
$tests = array();
$tests['_SERVER'] = $_SERVER ;
foreach ($tests['_SERVER'] as $key => $item){
    $tests['_SERVER'][$key] = "--------------".$item;
}
$tests['filter'] = $filter ;
$tests['prices'] = $prices ;
$tests['categories'] = $categories ;
$tests['brands'] = $brands ;
$tests['products'] = $products ;
$tests['details'] = $details ;
$tests['_SESSION["products"]'] = $_SESSION['products'] ;
$tests['_SESSION'] = $_SESSION ;
$tests['queryList'] = $queryList ;
$tests['cart'] = $cart ;
$tests['show'] = $show ;



foreach ($products as $product){
    if ($product['favorite'] >0){
        echo $product['id']."<br>";
    }
}
// print_r($products);
// print_r($show);

include_once "./snipets/updateSession.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="small-container">
            <?php 
        
            echo count($search_history);

            foreach($tests as $title => $issue){
                echo "<div class='issue'><h1>$title</h1>";
                print_r($issue);
                echo"</div>";
            }
            
            ?>

            
    </div>
</body>
</html>