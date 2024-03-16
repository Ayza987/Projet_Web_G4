
<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

// Récupération des données utilisateurs
$user_id = $_POST['id'];
$statut = $_POST['statut'];


// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL modifierStatut(:user_id, :statut)");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$requete->bindValue(':statut', $statut, PDO::PARAM_STR);



// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.user.php');
exit();

?>