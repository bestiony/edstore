<?php //session_start();

$products = $_SESSION['products'] ?? array();

$cart = $_SESSION['cart'] ?? array();

$categories = $_SESSION['categories'] ?? array();

$brands = $_SESSION['brands'] ?? array();

$prices = $_SESSION['prices'] ?? array();

$queryList = $_SESSION['queryList'] ?? array();

$queryList[]=$_SERVER["REQUEST_URI"];

$filter = $_SESSION['filter'] ?? array();

$show = $_SESSION['show'] ?? $products;

$items_per_page = $_SESSION['items_per_page']?? 15;

$search_history = $_SESSION['search_history'] ?? array();