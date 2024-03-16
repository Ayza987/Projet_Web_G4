<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

$idEvent = $_POST['event'];
// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL deleteEvent (:event_id)");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':event_id', $idEvent, PDO::PARAM_STR);



// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.event.php');
exit();


?>