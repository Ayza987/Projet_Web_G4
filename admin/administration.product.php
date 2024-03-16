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
          <h2>Categories</h2>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Action</th>
                  <th>
                  <button class="edit-btn" onclick="openForm(0,'add-categorie-form')">ADD categories</button> <br>
                  </th>
                </tr>
                <?php
                $requete = $bdd->query("SELECT idCategorie, NomCategorie  FROM categorie");
                while ($user = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                  <td><?php echo $user['idCategorie']; ?> </td>
                  <td><?php echo $user['NomCategorie']; ?> </td>
                  <td>
                    <button class="delete-btn"onclick="openForm(<?php echo $user['idCategorie']; ?>,'delete-categorie-form')">Supprimer</button>
                  </td>
                </tr>
                <?php
                }
                $requete->closeCursor();
                ?>
                
            </table>
          
            <table>
            <h2>Produits</h2>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>id Categorie</th>
                  <th>Prix</th>
                  <th>Action</th>
                  <th><button class="edit-btn" onclick="openForm(0,'add-produit-form')">ADD</button> <br>
                  </th>
                </tr>
                <?php
                $requete = $bdd->query("SELECT idProduit, Nom ,idCategorie ,prix FROM produits");
                while ($user = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                  <td><?php echo $user['idProduit']; ?> </td>
                  <td><?php echo $user['Nom']; ?> </td>
                  <td><?php echo $user['idCategorie']; ?> </td>
                  <td><?php echo $user['prix']; ?></td>
                  <td>
                    <button class="edit-btn" onclick="openForm(<?php echo $user['idProduit']; ?>,'edit-produit-form')">Modifier</button>
                    <button class="delete-btn"onclick="openForm(<?php echo $user['idProduit']; ?>,'delete-produit-form')">Supprimer</button>
                  </td>
                </tr>
                <?php
                }
                $requete->closeCursor();
                ?>
                
              </table>
              <div class="form-popup" id="edit-produit-form">
                <form class="form-container" action="modifierproduit.php" method='post'>
                  <h2>Changer le prix d'un produit</h2>
                  <input type="number" placeholder="id" class="edit-id" readonly name='id'>
                  <input type="number"  placeholder="prix" required name='prix'>
                  <input type="submit" value="Changer">
                  <button type="button" class="btn cancel" onclick="closeForm('edit-produit-form')">Quitter</button>
              </form>
              </div>
              <div class="form-popup" id="delete-produit-form">
                <form  class="form-container" action="deleteProduit.php" method='post'>
                  <h2>Supprimer un produits</h2>
                  <input type="number" placeholder="id" class="edit-id" readonly name='produit'>
                  <input type="submit" value="delete">
                  <button type="button" class="btn cancel" onclick="closeForm('delete-produit-form')">Quitter</button>
                </form>
              </div>
              <div class="form-popup" id="add-produit-form">
                <form  class="form-container" action="addProduit.php" method='post' enctype="multipart/form-data">
                 <h2>Ajouter un produit</h2>
                 <input type="text" placeholder="Nom" name='nom'>
                 <input type="text" placeholder="Prix" name='prix'>
                 <input type="id" placeholder="idcategories" name='categorie'>
                 <input type="file" placeholder="image" name='image'>
                 <textarea name="description" id="" cols="30" rows="10"></textarea>
                 <input type="submit"  value="Add">
                 <button type="button" class="btn cancel" onclick="closeForm('add-produit-form')">Quitter</button>
                </form>
              </div>
              <div class="form-popup" id="add-categorie-form">
                <form  class="form-container" action="addCategorie.php" method="post">
                  <h2>Ajouter une categorie</h2>
                  <input type="text" placeholder="Nom" name='categorie'>
                  <input type="submit"  value="add" >
                  <button type="button" class="btn cancel" onclick="closeForm('add-categorie-form')">Quitter</button>
                </form>
              </div>
              <div class="form-popup" id="delete-categorie-form">
                <form  class="form-container" action="DeleteCategorie.php" method='post'>
                 <h2>Supprimer une categorie</h2>
                 <input type="number" placeholder="id categorie" name='categorie' class="edit-id" readonly>
                 <input type="submit" class="bouton-jaune" value="delete">
                  <button type="button" class="btn cancel" onclick="closeForm('delete-categorie-form')">Quitter</button>
                </form>
              </div>

        </section>
        <script src="formulaire.js"></script>
    </main>
    <footer>

    </footer>
</body>
</html>