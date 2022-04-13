<?php

function printProduct($product)
{   
    $cartLink ="add";
    $cartIcon = "";
    $favoriteLink = "add";
    $favIcon = "fa fa-heart-o";
    $showIcon = "";
    if ($product['favorite']>0){
        $favoriteLink = "remove";
        $favIcon = "fa fa-heart";
        $showIcon = "style='opacity: 1;'";
    }
    
    if (array_key_exists($product['id'], $_SESSION['cart'])){
        $cartLink = "remove";
        $cartIcon = "style='color: #D21F3C;'";

    }

    $link = "ProductDetails.php?id=".$product['id'];
    $image = "<a href='$link'><img src='".$product['photos'][0]."'></a>";
    $title = "<a href='$link'><h4>".substr($product['title'],0,21)."</h4></a>";
    echo "
        <div class='col-5 product-box'>
            <div class='product_photo'>
            $image
            </div>
            <div>
            <div ".$showIcon." class='favorite'>
                <a href ='./microprocesses/favorite.php?favorite=".$favoriteLink."&id=".$product['id']."'>
                <i class='".$favIcon."'></i></a>
            </div>
            $title
            <p>" . substr($product['top'], 0, 15) . "...</p>
            <div class='rating'>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
            </div>
            <div class='price'>
                <div class='upper'>$</div><span>" . $product['price'] . "</span>
            </div>
            <a class='add_to_cart' href='./microprocesses/cart_add_remove.php?cart=".$cartLink."&id=".$product['id']."'>
                <i ".$cartIcon." class='fa fa-cart-plus'></i>
            </a>
            </div>
        </div>
        ";
}


function devide_into_pages($list)
{
    $items_per_page = $_SESSION['items_per_page'];
    $array_length = count($list);
    $page_index = 0;
    $start = 0;
    $pages = array();
    while ($start < $array_length) {
        $pages[$page_index] = array_slice($list, $start, $items_per_page);
        $start += 15;
        $page_index++;
    }
    return $pages;
}

function make_pages_buttons($pages)
{
    echo "<div class='page-btns'>";
    if (!empty($pages)) {
        $array_length = count($pages);
        if ($array_length > 1) {
            $currentPage = $_GET['page']?? 0;
            $previousPage = $currentPage == 0? $currentPage: $currentPage-1;
            $nextPage = $currentPage == $array_length-1 ? $currentPage : $currentPage +1;
            echo "<a href='./Products.php?page=$previousPage'><span>&#8592;</span></a>";
            foreach ($pages as $key => $page) {
                $style = $key == $currentPage? "style ='background: #6f40cf;color: #fff;'" :"" ;
                echo "<a href='./Products.php?page=$key'><span $style>$key</span></a>";
            }
            echo "<a href='./Products.php?page=$nextPage'><span>&#8594;</span></a>";
        }
    }
    echo "</div>";
}

function refresh_page()
{
    echo '<script>window.location="' . $_SERVER["PHP_SELF"] . '"
            alert("item was not found");
    </script>';
    // $_SERVER["PHP_SELF"]
}
