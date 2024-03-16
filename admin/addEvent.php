<?php
// Adapter dbname et mot de passe si besoin
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');

echo "POST values: ";
print_r($_POST);

echo "FILES values: ";
print_r($_FILES);

// Récupération des données utilisateurs
$date = $_POST['date'];
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$image = $_FILES['image'];



// Chemin de destination pour le fichier téléchargé
$destination = "./image/" . $image['name'];

// Déplacez le fichier téléchargé vers l'emplacement de destination
move_uploaded_file($image['tmp_name'], $destination);

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("CALL AddEvent (:event_nom, :event_description, :event_date, :event_prix, :event_image )");

// Liaison des variables de la requête préparée aux variables php
$requete->bindValue(':event_date', $date, PDO::PARAM_STR);
$requete->bindValue(':event_nom', $nom, PDO::PARAM_STR);
$requete->bindValue(':event_prix', $prix, PDO::PARAM_STR);
$requete->bindValue(':event_image', $destination, PDO::PARAM_STR);
$requete->bindValue(':event_description', $description, PDO::PARAM_STR);




// Exécution de la requête préparée avec les données liées
$requete->execute();
header('Location: administration.event.php');
exit();

?>