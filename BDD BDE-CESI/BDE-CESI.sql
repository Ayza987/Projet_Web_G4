Use bde;
-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 01 fév. 2019 à 21:11
-- Version du serveur :  5.7.23
-- Version de PHP :  7.1.19



#------------------------------------------------------------
# Table: USERS
#------------------------------------------------------------
CREATE TABLE Users(
        idUsers        Int  Auto_increment  NOT NULL ,
        Nom            Varchar (20) NOT NULL ,
        Prenom         Varchar (20) NOT NULL ,
        Email           Varchar (25) UNIQUE NOT NULL ,
        Password       Varchar (25) NOT NULL ,
        Statut      Varchar (10) NOT NULL 
,CONSTRAINT TB_USER_PK PRIMARY KEY (idUsers)
);

--
-- Déchargement des données de la table Users
--

INSERT INTO Users (Nom, Prenom, Email, Password, Statut ) VALUES
( 'zizou', 'ait rabah', 'zizou@gmail.com', 'ae81d380d610814c52858e',   'BDE'),
( 'soltane', 'benghazal', 'soltane@gmail.com', 'ae81d380d610814c52858',   'SAL'),
( 'Abdelhamid', 'Larachi', 'abdelhamid@gmail.com', 'ae81d380d610814c52858',  'CON'),
( 'Asta', 'Bald', 'AstaBald@gmail.com', 'ae81d380d610814c52858',   'ETU');

-- --------------------------------------------------------



#------------------------------------------------------------
# Table: CATEGORIE
#------------------------------------------------------------

CREATE TABLE categorie(
        idCategorie   Int  Auto_increment  NOT NULL ,
        NomCategorie  Varchar (20) NOT NULL 

        ,CONSTRAINT CATEGORIE_PK PRIMARY KEY (idCategorie)

);

INSERT INTO categorie ( NomCategorie) VALUES
( 'Alimentation'),
( 'Fournitures'),
( 'Gadgets Elect'),
( 'Hygiene');


#------------------------------------------------------------
# Table: PRODUITS
#------------------------------------------------------------

CREATE TABLE Produits(
        idProduit          Int  Auto_increment  NOT NULL ,
        idCategorie        Int NOT NULL,
        Nom         Varchar (20) NOT NULL ,
        Prix        INT NOT NULL , 
        URLimage         Varchar (255) NOT NULL ,
        Description Varchar (100)
        
        ,CONSTRAINT PRODUIT_PK PRIMARY KEY (idProduit)

        ,CONSTRAINT PRODUIT_CATEGORIE_FK FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie)
);

--
-- Déchargement des données de la table produits
--
INSERT INTO Produits (idCategorie, Nom, Prix, URLimage, Description) VALUES
(1, 'Jus d''orange', 500, '/image/jus-orange.png', 'Délicieux jus d''orange frais'),
(1, 'Crêpes au chocolat', 1000, '/image/crepes-chocolat.png', 'Délicieuses crêpes au chocolat'),
(2, 'Stylos à bille', 300, '/image/stylos-bille.png', 'Lot de stylos à bille noirs et rouges'),
(2, 'Rame de papier format A4', 5000, '/image/rame-papier-a4.png', 'Rame de 500 feuilles de papier A4'),
(3, 'Écouteurs sans fil', 15000, '/image/ecouteurs-sans-fil.png', 'Écouteurs sans fil Bluetooth'),
(3, 'Chargeur universel', 8000, '/image/chargeur-universel.png', 'Chargeur universel compatible avec différents appareils'),
(4, 'Mouchoirs en papier', 500, '/image/mouchoirs-papier.png', 'Paquet de mouchoirs en papier doux'),
(4, 'Serviettes hygiéniques', 2000, '/image/serviettes-hygieniques.png', 'Boîte de serviettes hygiéniques absorbantes');

#------------------------------------------------------------
# Table: COMMANDE
#------------------------------------------------------------

CREATE TABLE Commande(
        idCommande     Int  Auto_increment  NOT NULL ,
        idUsers        Int  NOT NULL ,
        idProduit      Int  NOT NULL ,
        Quantite       INT  NOT NULL ,
        PrixTotal      INT  NOT NULL ,
        DateCommande   datetime  NOT NULL ,
        Statut         BOOL NOT NULL 
        ,CONSTRAINT COMMANDE_PK PRIMARY KEY (idCommande)

        ,CONSTRAINT COMMANDE_USER_FK FOREIGN KEY (idUsers) REFERENCES Users(idUsers)
        ,CONSTRAINT COMMANDE_PRODUIT_FK FOREIGN KEY (idProduit) REFERENCES Produits(idProduit)

);

INSERT INTO Commande (idUsers, idproduit, Quantite, PrixTotal, DateCommande, Statut) VALUES
( 1, 7, 1, 500, '2024-03-07', 1),
( 2, 2, 1, 1000, '2024-03-07', 1);


CREATE TABLE Panier(
        idPanier       Int  Auto_increment  NOT NULL ,
        idUsers        Int  NOT NULL ,
        idProduit      Int  NOT NULL ,
        DatePanier     datetime  NOT NULL ,
        Quantite       INT  NOT NULL ,
        PrixTotal      INT  NOT NULL
        ,CONSTRAINT PANIER_PK PRIMARY KEY (idPanier)

        ,CONSTRAINT PANIER_USER_FK FOREIGN KEY (idUsers) REFERENCES Users(idUsers)
        ,CONSTRAINT PANIER_PRODUIT_FK FOREIGN KEY (idProduit) REFERENCES Produits(idProduit)
);

INSERT INTO Panier ( idUsers, idproduit, Quantite, PrixTotal, DatePanier) VALUES
(1, 7, 1, 500, '2024-03-07'),
(2, 3, 1, 1000, '2024-03-07');







#------------------------------------------------------------
# Table: EVENEMENT
#------------------------------------------------------------


CREATE TABLE Evenement(
        idEvenement        Int  Auto_increment  NOT NULL ,
        Nom                 Varchar (50) NOT NULL ,
        Description        Varchar (250) NOT NULL ,
        DateEvent           DATE NOT NULL ,
        Prix                 Int NOT NULL ,
        URLimage            Varchar (50) NOT NULL 
      
,CONSTRAINT EVENEMENT_PK PRIMARY KEY (idEvenement)
);

INSERT INTO Evenement ( Nom,  Prix, Description, DateEvent, URLimage) VALUES
( 'Fashion Week', 30000, 'Mettez vous en scene et surtout prennez vos masques','2024-10-05', 'ipad.jpg'),
( 'IUI Feast', 32000, 'Venez feter au coeur de IuI Feast et rejoignez tous les campus Ucac','2024-10-05', 'iphone.jpg');





#------------------------------------------------------------
# Table: COMMENTAIRE
#------------------------------------------------------------

CREATE TABLE Commentaire(
        idCommentaire      Int  Auto_increment  NOT NULL ,
        idUsers      Int NOT NULL,
        Contenu            Varchar (250) NOT NULL,
        AlerteCom      BOOL NULL,
        Source          BOOL NOT NULL,
        DateCommentaire      Datetime NOT NULL
        
,CONSTRAINT COMMENTAIRE_PK PRIMARY KEY (idCommentaire)

,CONSTRAINT COMMENTAIRE_USER_FK FOREIGN KEY (idUsers) REFERENCES Users(idUsers)
);

--
-- Déchargement des données de la table commentaire
--

INSERT INTO  Commentaire( idUsers, Contenu, AlerteCom, DateCommentaire, Source) VALUES
( 2,  'abdelhamid', 0, '2019-01-27 15:14:48', 1),
( 1,  'abdelhamid', 1, '2019-01-27 15:14:51', 1),
( 3,  'Abdelhamid', 0, '2019-01-29 10:53:59', 0);


-- --------------------------------------------------------



#------------------------------------------------------------
# Table: PHOTO
#------------------------------------------------------------



CREATE TABLE Photo(
        idPhoto       Int  Auto_increment  NOT NULL ,
        idUsers       Int NOT NULl,
        Description   Varchar (250) NOT NULL ,
        URLimage      Varchar (50) NOT NULL ,
        AlertePhoto   BOOL NOT NULL
        
,CONSTRAINT PHOTO_PK PRIMARY KEY (idPhoto)

,CONSTRAINT PHOTO_USERS_FK FOREIGN KEY (idUsers) REFERENCES Users(idUsers)
);

--
-- Déchargement des données de la table `photo`
--

INSERT INTO Photo (Description,  URLimage, idUsers,AlertePhoto) VALUES
( 'hhhh', '6.jpg', 1,   0),
( 'jjj', '4.jpg', 2,  0),
( 'DELL XPS', '4.jpg', 3,  1),
( 'say something about this pic', '3.jpg', 4, 0);


-- --------------------------------------------------------

#------------------------------------------------------------
# Table: LIKES
#------------------------------------------------------------


CREATE TABLE Likes (
  idUsers int NOT NULL,
  idPhoto int NOT NULL

  ,CONSTRAINT LIKES_USERS_PK FOREIGN KEY (idUsers) REFERENCES Users (idUsers)
  ,CONSTRAINT LIKES_PHOTO_PK FOREIGN KEY (idPhoto) REFERENCES Photo(idPhoto)
  ,CONSTRAINT LIKES_PK PRIMARY KEY (idUsers,idPhoto)


) ;

-- Déchargement des données de la table `Likes`
--

INSERT INTO Likes (idUsers, idPhoto) VALUES
(2, 1),
(3, 2),
(2, 2)
;
-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE Inscrits (
  idUsers int NOT NULL,
  idEvenement int NOT NULL

  ,CONSTRAINT INSCRITS_PK PRIMARY KEY (idUsers,idEvenement)
  ,CONSTRAINT INSCRITS_USERS_PK FOREIGN KEY (idUsers) REFERENCES Users (idUsers) 
  ,CONSTRAINT INSCRITS_EVENEMENT_PK FOREIGN KEY (idEvenement) REFERENCES Evenement(idEvenement)
) ;


INSERT INTO Inscrits (idUsers, idEvenement) VALUES
(1, 2),
(2, 2),
(3, 2),
(1, 1),
(4, 1)
;





--
-- Structure de la table `vote`
--

CREATE TABLE Vote (
  idUsers  int NOT NULL,
  idCommentaire INT NOT NULL
  ,CONSTRAINT VOTE_PK PRIMARY KEY (idUsers,idCommentaire)
  ,CONSTRAINT VOTE_USERS_PK FOREIGN KEY (idUsers) REFERENCES Users(idUsers)
  ,CONSTRAINT VOTE_COMMENTAIRE_PK FOREIGN KEY (idCommentaire) REFERENCES Commentaire(idCommentaire)
) ;


--
-- Déchargement des données de la table `vote`
--

INSERT INTO Vote (idUsers, idCommentaire) VALUES
(1,  1),
(3, 3),
(2,  3),
(4,  3),
(1, 2);

