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
            <h2>Evenements</h2>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Date</th>
                  <th>Prix</th>
                  <th>Action</th>
                  <th><button class="edit-btn" onclick="openForm(0,'add-event-form')">ADD</button> <br>
                  </th>
                </tr>
                <?php
                $requete = $bdd->query("SELECT idEvenement, Nom ,Prix, DateEvent FROM evenement");
                while ($user = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                  <td><?php echo $user['idEvenement']; ?> </td>
                  <td><?php echo $user['Nom']; ?> </td>
                  <td><?php echo $user['DateEvent']; ?></td>
                  <td><?php echo $user['Prix']; ?></td>
                  <td>
                    <button class="delete-btn"onclick="openForm(<?php echo $user['idEvenement']; ?>,'delete-event-form')">Supprimer</button>
                  </td>
                </tr>
                <?php
                }
                $requete->closeCursor();
                ?>
                
              </table>
              <div class="form-popup" id="delete-event-form">
                <form  class="form-container" action="deleteEvent.php" method='post'>
                <h2>Supprimer un evenement</h2>
                 <input type="number" class="edit-id" readonly name='event'>
                 <input type="submit" value='supprimer'>
                  <button type="button" class="btn cancel" onclick="closeForm('delete-event-form')">Quitter</button>
                </form>
              </div>

              <div class="form-popup" id="add-event-form">
                <form  class="form-container" action="addEvent.php" method='post' enctype="multipart/form-data">
                 <h2>Ajouter un evenement</h2>
                 <input type="date" placeholder="date" name="date">
                 <input type="text" placeholder="nom" name='nom'>
                 <input type="number" placeholder="prix" name='prix'>
                  <input type="file" placeholder="image" name='image'>
                 <textarea name="description" id="" cols="60" rows="10" placeholder="description" name='description'></textarea>
                 <input type="submit" value="Add">
                 <button type="button" class="btn cancel" onclick="closeForm('add-event-form')">Quitter</button>
                </form>
              </div>
              <div class="form-popup" id="delete-comment-form">
                <form  class="form-container" action="">
                 <h2>Supprimer un Commentaire</h2>
                 <input type="number" placeholder="id">
                 <input type="button" class="bouton-jaune" value="Add">
                  <button type="button" class="btn cancel" onclick="closeForm('delete-comment-form')">Quitter</button>
                </form>
              </div>
        </section>
        <script src="formulaire.js"></script>
    </main>
    <footer>

    </footer>
</body>
</html>