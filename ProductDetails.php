<?php session_start();
include "./snipets/html_head.php";
include_once "./snipets/functions.php";
include_once "./snipets/varriables.php";

// check for error
if (isset($_GET['id'])){
    $product = $products[$_GET['id']];
} else {
    include_once "./snipets/404.php";
    exit;
}
?>

<body>

    <?php
    include "./snipets/header_and_cover.php";
    ?>
    <!-- ---------------- top button ------------ -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <!-- -------------------- Single Product Details -------------------- -->

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2 product-images">
                <div class="small-img-col">
                <?php 

                foreach ($product['photos'] as $imageLink){
                    echo "<div class='small-img-row'>
                    <img src='$imageLink' width='100%' class='small_img'>
                </div>";
                }
            
                ?>                    
                </div>
                <img src="<?php echo $product['photos'][0]; ?>" width="100%" id="big_img">
            </div>
            <div class="col-2">
                <?php 
                    echo "
                    <p>".$product['top']."</p>
                    <h1>".$product['title']."</h1>
                    <div class='price big-price'>
                        <div class='upper'>$</div><span>".$product['price']."</span>
                    </div>
                    ";
                
                ?>
                
                <!-- <p>Capacity</p> -->
                <!-- <div class="size-btn">
                    <span>512 GB</span>
                    <span>1 TB</span>
                </div> -->
                <form action="./microprocesses/cart_add_remove.php">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <input type="number" min="0" name="quantity" value="1" id="">
                    <button class="btn" type="submit" name="cart" value="add">Add to Cart</button>
                </form>
                <h3>Product Details</h3>
                <br>
                <div class="table_details">
                    <table>
                    <tr>
                            <td class="table-left-col">Model Name</td>
                            <td class="table-right-col"><?php echo $product['ModelName'] ?></td>
                        </tr> 
                        <tr>
                            <td class="table-left-col">Brand</td>
                            <td class="table-right-col"><?php echo $product['brand'] ?></td>
                        </tr>
                        <?php 
                        if (strlen($product['color'])>1){
                            echo "
                            <tr>
                            <td class='table-left-col'>Color</td>
                            <td class='table-right-col'><?php echo ".$product['color']." ?></td>
                        </tr> 
                            ";
                        }
                        ?>
                        <tr>
                            <td class="table-left-col">Color</td>
                            <td class="table-right-col"><?php echo $product['color'] ?></td>
                        </tr> 
                        <tr>
                            <td class="table-left-col">Category</td>
                            <td class="table-right-col"><?php echo $product['category'] ?></td>
                        </tr> 
                    </table>
                </div>
                <br>
                <h4>Description</h4>
                <p><?php echo $product['description'] ?></p>
            </div>
        </div>

    </div>
    <!-- ------------ Related Products ----------------- -->


    <div class="small-container" id="popular_products">
        <div class="row row-2">
        <h2>Related Products</h2>
        <a href="./Products.php?category=<?php echo $product['category'];?>"><p>View More</p></a>
        </div>
        <div class="row">

            <?php 
            $only4 = 0;
            foreach ($products as $related){
                if ($related['category'] == $product['category']){
                    printProduct($related);
                    $only4++;
                }
                if ($only4 == 4){
                    break;
                }
            }
            
            ?>
        </div>
    </div>



    <!-- ------------------footer------------------  -->
    <?php
    include "./snipets/footer.php";
    ?>

    <!-- ---------------- scripts ---------------- -->
    <script src="./js/toggleMenu.js" ></script>
    <script src="./js/blackCover.js" ></script>
    <script src="./js/product_small_image_toggle.js"></script>
    <script src="./js/scroll_top_button.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
    var scrollpos = localStorage.getItem('scrollposSingleProduct');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollposSingleProduct', window.scrollY);
};
    </script>
    
</body>

</html>
<?php include_once "./snipets/updateSession.php";?>