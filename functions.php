<?php
function printProduct($product)
{


    $in_favourites = $product['favorite'] > 0;
    if ($in_favourites) {
        $button = "<button type='submit' name ='favorite' value='Remove from Favorite'>
                    <img class='favon' src='./images/favOn.png' alt='remove from favorite'>
                </button>";
    } else {
        $button = "<button type='submit' name ='favorite' value='Add to Favourite'>
                <img class='favon' src='./images/favOff.png' alt='add to favorite'>
                </button>";
    }
    echo "<table>
        <th>$product[name]</th>
        <tr><td>$product[size]</td></tr>
        <tr><td>$product[about]</td></tr>
        <tr><td><form>
        <input type='hidden' name='favorite_item_id' value='$product[id]'>
        <input type='submit' name ='favorite' value='Add to Favourite'>
        $button
        </form></td></tr>
        </table>
        ";
}

function refresh_page()
{
    echo '<script>window.location="' . $_SERVER["PHP_SELF"].  '"</script>';
    // $_SERVER["PHP_SELF"]
}

function search_items($products)
{
    $search_result = array();
    foreach ($products as $product) {
        // conditions are only checked if user puts an input or ticks a box otherwise 
        // they're not accounted for by making them true anyways
        $id = $product['id'];
        $isAbout = isset($_GET['about']) && $_GET['about'] != "" ? (strpos($product['about'], $_GET['about']) !== false) : true;
        $isName = isset($_GET['name']) && $_GET['name'] != "" ? (strpos($product['name'], $_GET['name']) !== false) : true;
        $isSize = isset($_GET['size']) ? ($product['size'] == $_GET['size']) : true;
        if ($isSize && $isAbout && $isName) {
            if (!in_array($product, $search_result)) {
                $search_result[$id] = $product;
                // array_push($search_result, $product);
            }
        }
    }
    $_SESSION['search_result'] = json_encode($search_result);
    $_SESSION['show'] = $_SESSION['search_result'];
    return $search_result;
}

function add_items($products)
{
    $id = count($products);
    $size = isset($_GET['addsize']) ? $_GET['addsize'] : "unkown";
    $name = $_GET['addname'] ? $_GET['addname'] : "unkown" . (count($products) + 1);
    $about = $_GET['addabout'] ? $_GET['addabout'] : "unkown";
    array_push($products, array(
        "id" => $id,
        "size" => "$size",
        "name" => "$name",
        "about" => "$about",
        "favorite" => 0
    ));

    $_SESSION['products'] = json_encode($products);
    search_items($products);
    return $products;
}

function print_search_history($history_array)
{
    echo "<div class='search_item'>";
    foreach ($history_array as $key => $value) {
        if ($value != " ") {
            echo "$key : $value <br>";
        }
    }
    echo "</div>";
}

function print_favorites($favorite_item)
{
    echo "$favorite_item[name] <br>
        $favorite_item[about]<br>";
}
