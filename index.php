<?php session_start();
include_once "./processes.php";
include_once "./snipets/functions.php";
include "./snipets/html_head.php";
?>

<body>

    <?php
    include "./snipets/header_and_cover.php";
    ?>
    <!-- ---------------- top button ------------ -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!-- ------------ background --------------- -->
    <div class="area homepage-bg" id="indexbg">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- ----------------slideshow------------------- -->
    <div class="slideshow container">
        <div class="row">
            <div class="col-2">
                <h1>
                    Your Ultimate<br />
                    Gaming Pc <br />Awaits!
                </h1>
                <p>
                    Check out our amazing offers and level up your gaming experience
                    with latest hardwar technology has to to offer
                </p>
                <a href="./Products.php" class="btn">Let's Play <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
            <div class="col-2">
                <img src="./images/case.png" alt="" />
            </div>
        </div>
    </div>

    <!-- ------------------ categories ------------------ -->
    <div class="small-container">
        <h2 class="title">Categories</h2>
        <div class="row">

            <?php
            foreach ($categories as $category) {
                // $category = str_replace("_"," ", $category);
                echo " 
                    <div class='col-4'>
                        <a style='display: inline-block;'   href='./Products.php?category=$category'>
                            <img src='./images/$category.png'>
                            <h4>" . str_replace("_", " ", $category) . "</h4>
                        </a>
                    </div>
                    
                    ";
            }
            ?>
        </div>
    </div>

    <!-- -------------------- Popular Products -------------------- -->
    <div class="small-container">
        <h2 class="title">Popular Products</h2>
        <div class="row popular_products" id="popular_products">


            <?php
            // this is to randomize the process
            $chosen = array();
            for ($i = 0; $i < 4; $i++) {
                $id = rand(0, 32);
                $products[$id]['photos'][0];
                // to avoid repetition 
                if (empty($chosen)) {
                    $chosen[] = $id;
                } else if (!in_array($id, $chosen)) {
                    $chosen[] = $id;
                } else {
                    $i--;
                    continue;
                }

                printProduct($products[$id]);
            }

            ?>
        </div>
    </div>

    <!-- ----------------------- offer ----------------------- -->
    <div class="area homepage-bg" id="indexbg">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img class="offer-image" src="./images/deal.png" alt="">
                </div>
                <div class="col-2">
                    <p>get the best deal ever</p>
                    <h1><span style="background: #D21F3C;">3</span> <span style="background:#fff;color : black;">X</span> <span style="background: #D21F3C;">1</span> <br> The Best Gaming Combo</h1>
                    <small>get the latest gaming keyboard and we'll through in a kickass gaming mouse with it's
                        extreemly comfortable mat </small>
                    <br>
                    <a href="ProductDetails.php?id=17" class="btn">Buy Now</a>
                </div>
            </div>
        </div>
    </div>


    <!-- --------------------brands--------------------  -->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-6">
                    <a href=""><img src="./images/intel.png" alt=""></a>
                </div>
                <div class="col-6">
                    <a href=""><img src="./images/amd.png" alt=""></a>
                </div>
                <div class="col-6">
                    <a href=""><img src="./images/nv.png" alt=""></a>
                </div>
                <div class="col-6">
                    <a href=""><img src="./images/dell.png" alt=""></a>
                </div>
                <div class="col-6">
                    <a href=""><img src="./images/hp.png" alt=""></a>
                </div>
                <div class="col-6">
                    <a href=""><img src="./images/ASUS.png" alt=""></a>
                </div>

            </div>
        </div>
    </div>


    <!-- ------------------footer------------------  -->
    <?php
    include "./snipets/footer.php";
    ?>

    <!-- ---------------- scripts ---------------- -->
    <script src="./js/toggleMenu.js"></script>
    <script src="./js/blackCover.js"></script>
    <script src="./js/scroll_top_button.js"></script>
    <!-- ----------- stay on the same position when refershed -------- -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem("scrollposIndex");
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem("scrollposIndex", window.scrollY);
        };
    </script>
</body>

</html>
<?php include_once "./snipets/updateSession.php"; ?>