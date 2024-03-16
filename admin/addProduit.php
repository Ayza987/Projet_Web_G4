<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

// Récupération des données utilisateurs
$categorie = $_POST['categorie'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$image = $_FILES['image'];

// Vérification du nom du produit
$requeteVerifPseudo = $bdd->prepare("SELECT COUNT(*) AS count FROM Produits WHERE Nom = :nom");
$requeteVerifPseudo->bindValue(':nom', $nom, PDO::PARAM_STR);
$requeteVerifPseudo->execute();
$resultatVerifPseudo = $requeteVerifPseudo->fetch(PDO::FETCH_ASSOC);

if ($resultatVerifPseudo['count'] > 0) {
    // Le pseudo est déjà utilisé, afficher un message d'erreur ou effectuer une action appropriée
    echo "Ce nom est déjà utilisé par un autre utilisateur.";
} 
else {
    // Le pseudo est disponible, procéder à l'insertion dans la base de données
    // ...

// Chemin de destination pour le fichier téléchargé
$destination = "./image/" . $image['name'];

// Déplacez le fichier téléchargé vers l'emplacement de destination
move_uploaded_file($image['tmp_name'], $destination);
// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL AddProduit (:produit_categorie, :produit_nom, :produit_prix, :image_url, :produit_description )");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':produit_categorie', $categorie, PDO::PARAM_STR);
$requete->bindValue(':produit_nom', $nom, PDO::PARAM_STR);
$requete->bindValue(':produit_prix', $prix, PDO::PARAM_STR);
$requete->bindValue(':image_url', $destination, PDO::PARAM_STR);
$requete->bindValue(':produit_description', $description, PDO::PARAM_STR);




// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.product.php');
exit();
}

?>