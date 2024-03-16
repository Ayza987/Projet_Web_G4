<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

// Récupération des données utilisateurs
$nomCategorie = $_POST['categorie'];

// Vérification du pseudo
$requeteVerifPseudo = $bdd->prepare("SELECT COUNT(*) AS count FROM categorie WHERE NomCategorie = :nomCategorie");
$requeteVerifPseudo->bindValue(':nomCategorie', $nomCategorie, PDO::PARAM_STR);
$requeteVerifPseudo->execute();
$resultatVerifPseudo = $requeteVerifPseudo->fetch(PDO::FETCH_ASSOC);

if ($resultatVerifPseudo['count'] > 0) {
    // Le pseudo est déjà utilisé, afficher un message d'erreur ou effectuer une action appropriée
    echo "Ce nom est déjà utilisé par un autre utilisateur.";
} else {
    // Le pseudo est disponible, procéder à l'insertion dans la base de données
    // ...

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL AddCategorie (:categorie_nom)");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':categorie_nom', $nomCategorie, PDO::PARAM_STR);



// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.product.php');
exit();
}

?>