<?php session_start();
include_once "./snipets/varriables.php";
include_once "./snipets/functions.php";
include "./snipets/html_head.php";
?>

<body>

    <?php
    include "./snipets/header_and_cover.php";
    ?>


    <!-- -----------------------Cart Items ------------------ -->
    <div class="small-container cart_page">
        <h2 class="title">Favorites</h2>




        <div class="row favorites_container">
            <?php
            $empty = true;
            foreach ($products as $product) {
                if ($product['favorite'] == 1) {
                    $link = "ProductDetails.php?id=" . $product['id'];
                    $image = "<a href='$link'><img src='" . $product['photos'][0] . "'></a>";
                    $name = "<a href='$link'><p>" . $product['ModelName'] . "</p></a>";
                    echo "
                    <div class='favorite_card'>
                        $image
                        <div class='fav_info'>
                            $name
                            <small>Price $" . $product['price'] . "</small>
                            <br>
                            <a href='./microprocesses/favorite.php?favorite=remove&id=" . $product['id'] . "'>Remove</a>
                        </div>
                    </div>
                    ";
                    $empty = false;
                }
            }
            if ($empty){
                echo "<div style='text-align: center;'><i style='font-size: 100px;' class='fa fa-thumbs-o-up'></i><br>
                <h2>You have no favorites yet</h2>
                <a style='color: #D21F3C'  href='./Products.php'>Browse Products</a>
                </div>";
            }

            ?>
            <!-- <div class='favorite_card'>
                <img src='./images/macbook.jpg'>
                <div class='fav_info'>
                    <p>Mac book 2021</p>
                    <small>Price $1200</small>
                    <br>
                    <a href=''>Remove</a>
                </div>
            </div> -->
            
        </div>
    </div>


    <!-- ------------------footer------------------  -->
    <?php
    include "./snipets/footer.php";
    ?>

    <!-- ---------------- scripts ---------------- -->
    <script src="./js/toggleMenu.js"></script>
    <script src="./js/blackCover.js"></script>
</body>

</html>
<?php include_once "./snipets/updateSession.php"; ?>