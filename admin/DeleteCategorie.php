<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

$idCategorie = $_POST['categorie'];
// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL DeleteCategorie (:categorie_id)");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':categorie_id', $idCategorie, PDO::PARAM_STR);



// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.product.php');
exit();


?>