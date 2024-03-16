<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

$idProduit = $_POST['produit'];
// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL DeleteProduit (:produit_id)");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':produit_id', $idProduit, PDO::PARAM_STR);



// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.product.php');
exit();


?>