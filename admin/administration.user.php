<?php
$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
    <header>
    
    </header>
    
    <main>
        <section id="nav-admin">
          <div>
          <a href="administration.user.php">utilisateur</a>
          <a href="administration.product.php">produits</a>
          <a href="administration.event.php">evenement</a>
          </div>
        </section>
        <section id="act-admin">
        <h1>Administration</h1>
          <div id='tableau-de-bords'>
              <div class=''>
                <img src="user (1).png" alt="">
               <h3>Nombre d'utilisateurs :</h3> 
               <span>
                <?php
                $requete = $bdd->query("SELECT COUNT(*) AS total_entites FROM users");
                $result =  $requete->fetch(PDO::FETCH_ASSOC);
                echo $result['total_entites'];
                ?>
                </span>
              </div>
              <div class=''>
                <img src="box.png" alt="">
                <h3>Nombre de Produits :</h3> 
                <span>
                <?php
                $requete = $bdd->query("SELECT COUNT(*) AS total_entites FROM produits");
                $result =  $requete->fetch(PDO::FETCH_ASSOC);
                echo $result['total_entites'];
                ?>
                </span>
              </div> 
              <div class=''>
                <img src="calendar.png" alt="">
                <h3>Nombre d'evenement :</h3> 
                <span>
                <?php
                $requete = $bdd->query("SELECT COUNT(*) AS total_entites FROM evenement");
                $result =  $requete->fetch(PDO::FETCH_ASSOC);
                echo $result['total_entites'];
                ?>
                </span>
              </div> 
         </div>
            <table>
            <h2>Utilisateurs</h2>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Statut</th>
                  <th>Action</th>
                </tr>
                <?php
                $requete = $bdd->query("SELECT idUsers, Nom ,Prenom,Statut FROM users");
                while ($user = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                  <td><?php echo $user['idUsers']; ?> </td>
                  <td><?php echo $user['Nom']; ?>, <?php echo $user['Prenom']; ?> </td>
                  <td><?php echo $user['Statut']; ?></td>
                  <td>
                    <button class="edit-btn" onclick="openForm(<?php echo $user['idUsers']; ?>,'edit-user-form')">Modifier</button>
                  </td>
                </tr>
                <?php
                }
                $requete->closeCursor();
                ?>
                
              </table>
              <div class="form-popup" id="edit-user-form">
                <form class="form-container" action="modifierStatut.php" method="post">
                  <h2>Changer le statut d'un utilisateur</h2>
                  <input  name="id" type="number" placeholder="id" class="edit-id" readonly>
                  <select  name="statut" required>
                      <option disabled selected value="">statut</option>
                      <option value="BDE">BDE</option>
                      <option value="SAL">SAL</option>
                      <option value="CON">CON</option>
                      <option value="ETU">ETU</option>
                  </select>
                  <input type="submit" value="Changer">
                  <button type="button" class="btn cancel" onclick="closeForm('edit-user-form')">Quitter</button>
              </form>
              </div>
              <div class="form-popup" id="delete-user-form">
                <form  class="form-container" action="">
                  <h2>Supprimer un utilisateur</h2>
                  <input type="number" placeholder="id" class="edit-id" readonly>
                  <input type="button" value="delete">
                  <button type="button" class="btn cancel" onclick="closeForm('delete-user-form')">Quitter</button>
                </form>
              </div>

        </section>
        <script src="formulaire.js"></script>
    </main>
    <footer>

    </footer>
</body>
</html>