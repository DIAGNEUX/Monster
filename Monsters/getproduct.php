<?php

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "monster");

    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données: " . $conn->connect_error);
    }
   
    $req = "SELECT * FROM produits WHERE id = $productId";

    $result = $conn->query($req);

    if ($result) {
        $product = $result->fetch_assoc();
        echo '<img src="' . $product['img'] . '" alt="' . $product['nom'] . '" />';
        echo '<p>Prix : ' . $product['prix'] . ' €</p>';

        
        session_start();

        $id = $product['id'];
        if (isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id]++;
        
        } else {
            $_SESSION['panier'][$id] = 1;
            
        }

        header("location:index.php");
        $conn->close();
    } else {
        echo "Erreur lors de la récupération des informations du produit.";
    }
} else {
    echo "L'ID du produit n'est pas défini.";
}
?>
