<?php session_start();
include_once "./snipets/varriables.php";
include "./snipets/html_head.php";
?>

<body>

    <?php
    include "./snipets/header_and_cover.php";
    ?>

<!-- ---------------background ------------- -->
    <div class="area accPage" id="accPage">
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
        </div >

<!-- ------------------ login /register form -------------- -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="./images/pc.png" alt="">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="shiftToLogin()" >Login</span>
                            <span onclick="shiftToRegister()">Register</span>
                        </div>
                        <hr id="indicator" >
                        <form method="post" id="login" action="">
                            <input type="text" name="" id="" placeholder="Username">
                            <input type="password" name="" id="" placeholder="Password">
                            <button type="submit" class="btn">Login</button>
                            <br>
                            <a href="">Forgot password</a>
                        </form>
                        <form method="post" id="register" action="">
                            <input type="email" name="" id="" placeholder="Email">
                            <input type="text" name="" id="" placeholder="Username">
                            <input type="password" name="" id="" placeholder="Password">
                            <input type="password" name="" id="" placeholder="Repeat assword">
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
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
    <script src="./js/login_register.js"></script>

</body>

</html>
<?php include_once "./snipets/updateSession.php";?>