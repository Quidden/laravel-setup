<?php
session_start();

$time = 5 * 60;

if (isset($_SESSION['last_activity'])){
    $inactive = time() - $_SESSION['last_activity'];

    if ($inactive > $time){
        $_SESSION = [];
        session_destroy();

        header('Location: form.php');
        exit;
    }
}

$_SESSION['last_activity'] = time();
$_SESSION['cart'] ??= [];

if (isset($_POST['product'])) {
    $Product = $_POST['product'];
    $_SESSION['cart'][] = $Product;
    header('Location: form.php');
    exit;
}

$cookieCart = [];

if (isset($_COOKIE['cart'])) {
    $cookieCart = json_decode($_COOKIE['cart'], true);
}

$merge = array_merge($cookieCart, $_SESSION['cart']);

if (isset($_POST['save'])) {
    setcookie('cart',
        json_encode($merge),
        time() + 60*60*24*7,
        "/");
    $_SESSION['cart'] = [];
    header('Location: cart.php');
    exit;
}

echo "<h1>Cart</h1>";
foreach ($_SESSION['cart'] as $product) {
    echo htmlspecialchars($product) . "<br>";
}

echo"<h1>Cookie cart<h1>";
foreach ($cookieCart as $product) {
    echo htmlspecialchars($product) . "<br>";
}
