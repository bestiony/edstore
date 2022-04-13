<?php session_start();
include "./snipets/varriables.php";
include "./snipets/html_head.php";
?>

<body>

    <?php
    include "./snipets/header_and_cover.php";
    ?>
    <!-- ::TEMPORARY 
    <div class="cover-container">
        <div id="cover" class="cover-focus"></div>
    </div> -->

    <!-- ------------ background --------------- -->
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
    <div class="small-container add_product_form contact-form">
        <h2>Contact Us</h2>
        <div class="row">
            <div class="col-2">
                <form action="">
                    <input type="email" placeholder="Email" name="email">
                    <input type="text" placeholder="name" name="name">
                    <input type="tel" name="phonenumber" id="" placeholder="Phone Number" name="phonenumber">
                    <textarea  id="" cols="30" rows="10" placeholder="Message" name="message"></textarea>
                    
                    <button type="submit" class="btn" name="submit" value="submit">Send</button>
                </form>
            </div>

            <div class="col-2">
                <img src="https://c.tenor.com/5ljPtnvutJ8AAAAC/peter-griffin-long-nails.gif" alt="">
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
</body>

</html>
<?php include_once "./snipets/updateSession.php";?>