<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="./index.php"><img  src="./images/logo.png" /></a>
                </div>
                <div class="searchbar">
                    <form action="./Products.php" class="search" id="searchform">
                        <a class="searchbtn" href="./addproduct.php"><i class="fa fa-plus-square-o"></i></a>
                            <input onclick="setVisible('visible'),toggleBar('show')" onblur="setVisible('hidden'),toggleBar('hide')" id="searchInput" type="text" name="searchwords" placeholder="what can we get you first?" />
                        <a href="#" onclick="document.getElementById('searchform').submit();" class="searchbtn" name='searchButton'><i class="fa fa-search"></i> </a>
                    </form>
                    <div id="history_bar" class="search_history" onblur="toggleBar('hide')">
                        
                            <?php 
                            $limit = count($_SESSION['search_history']) -1;

                                for($i = $limit ; $i> $limit - 3 && $i >= 0; $i-- ){

                                    echo "
                                    <div class='single_history_item'>
                                        <a href='./Products.php?searchwords=".$search_history[$i]."'>
                                            <li>".$search_history[$i]."</li>
                                        </a> 
                                        <a href='./microprocesses/delete_search_item.php?item=".$i."'>
                                            <i class='fa fa-times' ></i>
                                        </a>
                                    </div>
                                    ";
                                }
                                if (empty($search_history)){
                                    echo "
                                    <div class='single_history_item'>
                                        <p style='color: #555; font-style:italic;'> Search history is empty. Search something ! </p>
                                    </div>
                                    ";
                                }
                            ?>
                        
                    </div>
                </div>
                <nav>
                    <ul id="menu_items">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./Products.php">Browse Products</a></li>
                        <li><a href="./favorites.php">My Favorites</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                        <li><a href="./account.php">Account</a></li>
                    </ul>
                </nav>
                <div class="cart">
                    <a href="./cart.php">
                        <p>
                            <?php  
                                if (!empty($cart)){
                                    echo count($cart);
                                }
                            ?>
                        </p>
                        <img src="./images/cart.png"  />
                    </a>
                </div>
                <div class="menu-icon" onclick="toggleMenu()">
                    <img  src="./images/menu.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="header-space"></div>
    <div id="cover" class="cover-focus" onclick="hideFilter()"></div>