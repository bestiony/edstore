<?php session_start();
include_once "./snipets/functions.php";
include_once "./snipets/varriables.php";




// without products array there musy be sth wrong
if (empty($products)) {
    include_once "./snipets/404.php";
    exit;
}

// if there is no query we must show all the products
if (empty($_GET)) {
    $_SESSION['show'] = $products;
    $show = $_SESSION['show'];
    $filter = array();
}






// user filter
// if ther is a get 
// take the first filter 
// compare it to the show array
// add matches to cash
// repeat till end
// make show = cash

// ***** :: FILTER :: *****

// build filter
if (isset($_GET['brand'])) {
    $filter['brand'] = $_GET['brand'];
}
if (isset($_GET['category'])) {
    $filter['category'] = $_GET['category'];
}
$_SESSION['filter'] = $filter;

// use the filter
if (!empty($_GET)) {
    $cash = array();
    foreach ($show as $product) {
        $matches = array();
        foreach ($filter as $f_key => $f_value) {
            $matches[] = strlen($filter[$f_key]) > 0 ? $filter[$f_key] == $product[$f_key] : true;
        }
        if (!in_array(false, $matches)) {
            $cash[$product['id']] = $product;
        }
    }
    $show = $cash;
}




// search 
if (isset($_GET['searchwords'])) {
    $searchResults = array();
    foreach ($products as $product) {
        $id = $product['id'];
        $matchName = stripos($product['ModelName'], $_GET['searchwords']) !== false;
        $matchTitle = stripos($product['title'], $_GET['searchwords']) !== false;
        $matchDescription = stripos($product['description'], $_GET['searchwords']) !== false;
        if ($matchName || $matchDescription || $matchTitle) {
            $searchResults[$id] = $product;
        }
    }
    $show = $searchResults;
    $search_history[] = $_GET['searchwords'];
    $_SESSION['search_history'] = $search_history;
}


// make pages
If (!empty($show)){
    $pages = devide_into_pages($show);
}

include "./snipets/html_head.php";
?>

<body >
    <!-- ---------------- top button ------------ -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <?php
    include "./snipets/header_and_cover.php";
    ?>

    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
            <div class="drop-down">
                <span>Sort by</span>
                <select name="" id="">
                    <option value="">Default</option>
                    <option value="">Price ( high to low )</option>
                    <option value="">Price ( low to high )</option>
                    <option value="">Rating</option>
                    <option value="">Popularity</option>
                    <option value="">Sales</option>
                </select>
            </div>
            <?php 
                if (!empty($show)){
                    make_pages_buttons($pages);
                }
            ?>
            <!-- <div class="page-btns">
                <span>&#8592;</span>
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>&#8594;</span>
            </div> -->
        </div>
        <div class="row">
            <div id="filterBtn" onclick="showFilter()" class="showfilter">
                <span class="filter">Filter</span>
            </div>
            <div id="filterBar" class="tall-row" onblur="hideFilter()">
                <h3>CPU Brands</h3>
                <div class="row">
                    <a href=""><i class="fa fa-square-o"></i> intel</a>
                    <a href=""><i class="fa fa-square-o"></i> AMD</a>
                </div>
                <hr>
                <h3>Categories</h3>
                <div class="row">
                    <?php

                    foreach ($categories as $name) {
                        $cashFilter = $_SESSION['filter'];
                        $cashFilter['category'] = $name != $_GET['category'] ? $name : "";
                        $query = http_build_query($cashFilter);
                        $check = $name == $_GET['category'] ? "fa-check-square-o" : "fa-square-o";
                        $link =  "Products.php?$query";
                        echo "<a href='$link'><i class='fa $check'></i> " . str_replace("_", " ", $name) . "</a>";
                    }
                    ?>
                </div>
                <hr>
                <h3>Brands</h3>
                <div class="row">
                    <?php
                    foreach ($brands as $name) {
                        $cashFilter = $_SESSION['filter'];
                        $cashFilter['brand'] = $name != $_GET['brand'] ? $name : "";
                        $query = http_build_query($cashFilter);
                        $check = $name == $_GET['brand'] ? "fa-check-square-o" : "fa-square-o";
                        $link =  "Products.php?$query";
                        echo "<a href='$link'><i class='fa $check'></i> $name</a>";
                    }
                    ?>
                </div>
            </div>

            <!-- --------------------  Products -------------------- -->
            <div class="row All-products-row" id="popular_products">

                <?php
                $continue = true;
                if(empty($show)){
                    echo "
                    <h1>The item you're looking for was not found</h1>
                    <a href='./contact.php'>Contact us to add it to the list </a>
                    ";
                    $continue = false;
                    refresh_page();
                }
                if (isset($_GET['page']) && $continue) {
                    $page = $_GET['page'];
                    
                    foreach ($pages[$page] as $product) {
                        printProduct($product);
                    }
                } else {
                    if($continue){
                        foreach ($pages[0] as $product) {
                            printProduct($product);
                        }

                    }
                }    
                

                // foreach ($show as $product) {
                //     printProduct($product);
                // }

                ?>


            </div>

        </div>
        <?php 
            if($continue){
                make_pages_buttons($pages);

            }
        ?>
        <!-- <div class="page-btns">
            <span>&#8592;</span>
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div> -->
    </div>





    <!-- ------------------footer------------------  -->
    <?php
    include "./snipets/footer.php";
    ?>

    <!-- ---------------- scripts ---------------- -->
    <script src="./js/toggleMenu.js"></script>
    <script src="./js/blackCover.js"></script>
    <script src="./js/scroll_top_button.js"></script>

    <!-- ----------------- scroll to the same position when reloaded ----------- -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollposProducts');
            if (scrollpos) window.scrollTo(0, scrollpos);
            
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollposProducts', window.scrollY);
        };
    </script>
    <!-- ------------ hide and show the filter sidebar in small screen sizes -------------- -->
    <script>
        let filterBar = document.getElementById('filterBar');
        let filterBtn = document.getElementById('filterBtn');
        function showFilter (){
            filterBar.style.transform = "translateX(-25%)";
            setVisible ('visible');
        }

        function hideFilter(){
            filterBar.style.transform = "translateX(-150%)";
            setVisible ('hidden');
            
        }
    </script>

</body>

</html>
<?php include_once "./snipets/updateSession.php"; ?>