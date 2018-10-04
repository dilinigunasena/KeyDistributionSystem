<?php

session_start();
$path = $_SERVER['DOCUMENT_ROOT'];

foreach (glob($path . "/class/*.php") as $filename) {
    $class = basename($filename, '.php');
    spl_autoload_register(function ($class) {
        include $_SERVER['DOCUMENT_ROOT'] . '/class/' . $class . '.php';
    });
}

$logged = 0; //boolean variable to check if logged in or not
$user = new User();

if ($_GET) {
    if (array_key_exists('logout', $_GET)) {
        if ($_GET['logout']) {
            session_destroy();
            header('location: /index.php');
        }
    }
}

//if ($_POST) {
//    $dpname = $_POST['eid'];
//    $pass = $_POST['passwd'];
//    $dpname = htmlspecialchars($dpname);
//    $pass = htmlspecialchars($pass);
//    $logged = $regular->login($dpname, $pass);
//    if ($logged) {
//        $_SESSION['regular'] = $regular;
//        // $_SESSION['cart'] = new Cart();
//    } else
//        header('location: /login.php');    //redirect to login page
//}

if ($_SESSION) {
    if (isset($_SESSION['user'])) {
        $logged = 1;
        $user = $_SESSION['user'];
        $cart = new Cart(); // = $_SESSION['cart'];
    }
}
?>