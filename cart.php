<?php session_start();
include_once "./snipets/varriables.php";
include "./snipets/html_head.php";
?>

<body>

    <?php
    include "./snipets/header_and_cover.php";
    ?>


<!-- -----------------------Cart Items ------------------ -->
    <div class="small-container cart_page">
        <h2 class="title">Shopping Cart</h2>
        <table>
            <tr>
                <th>Products</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php
            $total = 0;
            foreach ($cart as $item=> $quantity) {
                $product = $products[$item];
                $subttotal = $product['price']*$quantity;
                $link = "ProductDetails.php?id=".$product['id'];
                $image = "<a href='$link'><img src='".$product['photos'][0]."'></a>";
                $name = "<a href='$link'><p>".$product['ModelName']."</p></a>";
                    echo "
                    <tr>
                        <td>
                            <div class='cart-info'>
                                $image
                                <div>
                                    $name
                                    <small>Price $".$product['price']."</small>
                                    <br>
                                    <a href='./microprocesses/cart_add_remove.php?cart=remove&id=".$product['id']."'>Remove</a>
                                </div>
                            </div>
                        </td>
                        <td>
                        <form action='./microprocesses/cart_add_remove.php' >
                        <input type='hidden' name ='id' value='".$product['id']."'>
                        <input id type='number' min='0' name='quantity' value='$quantity'>
                        <button class='btn' type='submit'   name='cart' value='add'>Change</button>
                        </form>
                        </td>
                        <td>$".$subttotal."</td>
                    </tr>
                    
                    ";
                    $total+= $subttotal;
                }
            

            ?>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Total</td>
                    <td>$<?php echo $total ?></td>
                </tr>
            </table>
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