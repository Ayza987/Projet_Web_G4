<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

// Récupération des données utilisateurs
$produit_id = $_POST['id'];
$prix = $_POST['prix'];

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL modifierProduit(:produit_id, :prix)");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':produit_id', $produit_id, PDO::PARAM_STR);
$requete->bindValue(':prix', $prix, PDO::PARAM_STR);



// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.product.php');
exit();

?>