<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php

$products = array();
// populate array after a button is pressed 
echo "<form class='generate' method='post'><input type = 'submit' name='generate' value='generate'></form>";
if (isset($_POST['generate'])) {
    $j = 0;
    while ($j < 60) {
        $id = $j + 1;
        $size = $j % 2 == 0 ? "x" : "xl";
        $about = $j % 3 == 0 ? "very good please buy it " : "excellent quality";
        $favorite = 0;
        $products[$j] = array(
            'id' => $j,
            "size" => "${size}", 
            "name" => "sth $id", 
            "about" => "$about", 
            "favorite" => $favorite
        );
        $j++;
    }
    // set things 
    $products = json_encode($products);
    $_SESSION['products'] = $products;
    $_SESSION['show'] = $_SESSION['products'];
    $_SESSION['items_per_page'] = 15;
    $_SESSION['query_list'] = "";
    // to devide what to show on the page : all products or the search result
    $_SESSION['priority_list'] = "products";


    //reset other things 
    $_SESSION['favorites'] = "";

    unset($_SESSION['search_history']);
    $_SESSION['search_history'] = "";

    unset($_SESSION['search_result']);

    $_SESSION['pages'] = "";
    echo "<form class='generate' method='post' action='main.php'><input type = 'submit' name='go' value='Go to store'></form>";

}

