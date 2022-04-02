<?php
include_once 'functions.php';
// get the array with 60 products 
$products = $_SESSION['products'];
$products = json_decode($products, true);


// add product 
if (isset($_GET['AddProduct'])) {
    $products = add_items($products);
}

// make an array called show[] that contains the current showed items 
// default value is first 15 items 
$show = array_slice($products, 0 );

// its value is changed based on search parameteres 
if (!isset($_SESSION['search_result'])) {
    // show 15 of them 
    $_SESSION['show'] = json_encode(array_slice($products, 0));
}
// it's printed using a function at the end of the script


// refresh page and get rid of search results if there are any
if (isset($_GET['refresh_search'])) {
    if (isset($_SESSION['search_result'])) {
        unset($_SESSION['search_result']);
    }
    // else {
    //     echo "you didn't search anything yet";
    // }
    refresh_page();
}
// perform the search 
// $search_result = array();
$search_history = json_decode($_SESSION['search_history'], true);
if (isset($_GET["search"])) {
    $search_result = search_items($products);

    //  search history 
    $searchAbout = $_GET["about"] ? $_GET['about'] : " ";
    $searchName = $_GET['name'] ? $_GET["name"] : " ";
    $searchSize = isset($_GET["size"]) ? $_GET['size'] : " ";
    if ($searchName != " " || $searchAbout != " " || $searchSize != " ") {
        $search_history_item = array(
            "size" => "$searchSize",
            "name" => "$searchName",
            "about" => "$searchAbout"
        );
        if (empty($search_history)) {
            $search_history[0] = $search_history_item;
        } else if (!in_array($search_history_item, $search_history)) {
            $search_history[count($search_history)] = $search_history_item;
        }
        $_SESSION['search_history'] = json_encode($search_history);
    }
}

$favorites = array();
$favorites = json_decode($_SESSION["favorites"], true);


// for each product add next to it a "add to favourite " input button to 
if (isset($_GET["favorite"])) {

    $product_id = $_GET['favorite_item_id'];
    $product_from_list = $products[$product_id];
    $new_favourite =  array(
        "id" => $product_id,
        "size" => "${product_from_list['size']}",
        "name" => "${product_from_list['name']}",
        "about" => "${product_from_list['about']}",
        "favorite" => "${product_from_list['favorite']}"
    );

    // add to favorite
    if ($_GET['favorite'] == "Add to Favourite") {
        // in_array() and count() throw warnings if you give them an empty array
        // so using empty() avoids that warning 
        $products[$product_id]["favorite"] = 1;
        $new_favourite["favorite"] = 1;
        if (empty($favorites)) {
            $favorites[$product_id] = $new_favourite;
        } else if (!in_array($new_favourite, $favorites)) {
            $favorites[$product_id] = $new_favourite;
        }
    } else if ($_GET['favorite'] == "Remove from Favorite") {
        $products[$product_id]['favorite'] = 0;
        unset($favorites[$product_id]);
    }
    if (isset($_SESSION['search_result'])) {
        $search_result = json_decode($_SESSION['search_result'], true);
        foreach ($search_result as $key => $product) {
            // $show[$key]["favorite"] = $products[$key]['favorite'];
            $search_result[$key] = $products[$key];
            $_SESSION["search_result"] = json_encode($search_result);
        }
    }

    // store the users favourite products in a session and update store products


    $_SESSION["favorites"] = json_encode($favorites);
    $_SESSION['products'] = json_encode($products);
    $_SESSION["show"] = json_encode($show);
    
    refresh_page();
}

// implement a search history that saves the user's last 3 searches
