<?php session_start(); ?>
<?php

$products = array();
// populate array after a button is pressed 
echo "<form method='post'><input type = 'submit' name='generate' value='generate'></form>";
if ($_POST['generate']) {
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
    $products = json_encode($products);
    $_SESSION['products'] = $products;
    $_SESSION['favorites'] = "";
    $_SESSION['show'] = $_SESSION['products'];
    unset($_SESSION['search_history']);
    $_SESSION['search_history'] = "";
    unset($_SESSION['search_result']);
}

echo "<form method='post' action='main.php'><input type = 'submit' name='go' value='Go to store'></form>";
