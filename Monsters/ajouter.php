<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

   
    if (isset($_SESSION['panier'][$product_id])) {
        $_SESSION['panier'][$product_id] += 1; 
    } else {
        $_SESSION['panier'][$product_id] = 1; 
    }
}

header("Location: ".$_SERVER['HTTP_REFERER']);
?>
