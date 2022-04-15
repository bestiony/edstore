<?php session_start();
include_once "./snipets/varriables.php";
include "./snipets/html_head.php";
?>

<body>

    <?php
    include "./snipets/header_and_cover.php";
    ?>


    <!-- :: TEMPORARY -->
    <!-- <div class="cover-container">
        <div id="cover" class="cover-focus"></div>
    </div> -->

    <div class="area" id="background">
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

    <!-- ----------------- add product form ----------------------->
    <div class="small-container add_product_form">
        <h2>Add a New Product</h2>
        <div class="row">
            <div class="col-2">
                <form action="./microprocesses/add_product.php">
                    <input type="hidden" name="id" value="<?php echo count($products); ?>">
                    <div class="drop-down">
                        <span>Categories</span>
                        <select name="category" id="">
                            <?php 
                            foreach ($categories as $category){
                                echo "<option value='$category'>".str_replace("_", " ", $category)."</option>";
                            }
                            ?>
                            
                        </select>
                    </div>
                    <input type="hidden" name="top" value="NEW">
                    <input type="text" placeholder="Model name" name="ModelName" required>
                    <input type="text" placeholder="Title" name="title" required>
                    <input type="text" placeholder="Brand" name="brand" required>
                    <input  min="0" type="number" id="" placeholder="Price $" name="price" required>
                    <input type="text" placeholder="color" name="color" required>
                    <textarea id="" cols="30" rows="10" placeholder="Description" name="description" required></textarea>
                    <div class="images_urls">
                        <input onblur="showphoto(url,show),showphoto(url,image1)" id="url" type="url"
                            name="photos[]" placeholder="image 1 url" title="please use a valid img url" required>
                        <input onblur="showphoto(url2,image2)" id="url2" type="url" name="photos[]"
                            placeholder="image 2 url" title="please use a valid img url" required>
                        <input onblur="showphoto(url3,image3)" id="url3" type="url" name="photos[]"
                            placeholder="image 3 url" title="please use a valid img url" required>
                        <input onblur="showphoto(url4,image4)" id="url4" type="url" name="photos[]"
                            placeholder="image 4 url" title="please use a valid img url" required>
                    </div>
                    <input type="hidden" name="favorite" value="0">
                    <button type="submit" class="btn">Publish</button>
                </form>
            </div>

            <div class="col-2">
                <div class="small-img-col">
                    <div class="small-img-row"><img src="./images/imageholder.png" alt="" id="image1"></div>
                    <div class="small-img-row"><img src="./images/imageholder.png" alt="" id="image2"></div>
                    <div class="small-img-row"><img src="./images/imageholder.png" alt="" id="image3"></div>
                    <div class="small-img-row"><img src="./images/imageholder.png" alt="" id="image4"></div>
                </div>
                <div class="big-img-col">
                    <img id="show" src="./images/imageholder.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <!-- ------------------footer------------------  -->
    <?php
    include "./snipets/footer.php";
    ?>

    <!-- ---------------- scripts ---------------- -->
    <script src="./js/toggleMenu.js" ></script>
    <script src="./js/blackCover.js" ></script>
    <script src="./js/add_product_photo_urls.js"></script>

</body>

</html>
<?php include_once "./snipets/updateSession.php";?>