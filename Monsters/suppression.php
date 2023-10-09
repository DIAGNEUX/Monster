<?php

$mysqli = new mysqli("localhost", "root", "", "monster");


if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    $sql = "DELETE FROM produits WHERE id = $productId";

    if ($mysqli->query($sql) === TRUE) {
        header('Location: page_admin.php'); 
        exit;
    } else {
        echo "Erreur lors de la suppression de l'enregistrement : " . $mysqli->error;
    }
}

$mysqli->close();
?>
