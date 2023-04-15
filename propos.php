<?php
require "./include/functions.inc.php";

//style par defaut
if (empty($_POST['sombre'])&&empty($_POST['clair'])) {     
  $style="fond.jpg";
             }
?>

<!DOCTYPE html>




<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="shortcut icon" href="./images/logo.png"/>
  <title>À propos</title>
</head>
<body style="background-image: url(images/<?=$style?>);">
  <header>
    <nav style="text-align:center;background: rgba(250, 250, 250, 0.5);">
          <ul style="list-style-type: none;margin-left:-5%;">
            <li><img src="./images/logo.png" style="width:17%; height:17%;" alt="logo"></li> 
              <li><a href="index.php">Accueil</a></li>  
              <li><a href="genre.php">Genres musicaux</a></li>
                <li><a href="rechViaParoles.php">Recherche via les paroles</a></li>
              <li><a href="propos.php">À propos</a></li>   
              <li><a href="partie1.php">Image du jour</a></li> 

           </ul>
         </nav>
         <form style="margin-left:70%; margin-top:-1.8%;" action = "rech.php" method = "post">
      <input type = "search" name = "mot" placeholder="Artiste ou album...">
      <input type = "submit" value = "Rechercher">

      </form>
      
  </header>



<main>
<section style="margin-top:3%;">
  <article class="art" style="text-align: center;">
     <h2 style="text-align:center;">À propos</h2>
    <h2 style="margin-top:2%;">Pourquoi ce site ?</h2>
    <p style="text-align:justify, center;">
      Ce site a été créé dans le but de réaliser le projet du module gestion de projet dans le cadre de la L3 informatique générale du CNAM à l'ESIEE IT. 
      En effet, l'avantage majeur de ce projet est de mettre en pratique nos connaissances en développement web (HTML, CSS, PHP) et intéragir ainsi avec différentes API et manipuler plusieurs outils (FileZila, Sublime Text...etc) afin de faciliter à l'utilisateur la recherche des titres musicaux, des artistes, des albums...ect en quelques clics seulement grâce à l'option de recherche via les paroles. De plus, y a aussi l'aspect de découverte que propose l'onglet "Genres musicaux" où on peut retrouver plusieurs genres, artistes, albums...
    </p>

 

    <h2 style="margin-top:2%;">Quel est le contenu principal de ce site ?</h2>
   <p style="text-align:justify, center;">
     Ce site est principalement dédié aux fans de la musique de tous les genres. En effet, les utilisateurs peuvent effectuer des recherches sur leurs artiste préféré, ou bien des recherches sur leurs son préféré, ou album préféré...etc et aussi rechercher un titre ou un artiste ou un album via les paroles car on a tendance à retenir généralement seulement les paroles et on oubli le nom du titre ou de l'artiste

   </p>









    <h2 style="margin-top:2%;">Qui a réalisé ce site ?</h2>
   <p>
     Ce site a été réalisé par Samy ZIREM et Milan BASKARA et Bryan KOUAME, étudiants en Licence 3 Informatique à l'ESIEE IT en partenariat avec le CNAM.

   </p>

 
  

    <h2 style="margin-top:2%;">Quand ?</h2>
   <p>
     Ce site a été réalisé durant l'année scolaire 2022/2023.

   </p>

  </article>

</section>
</main>
</body>
</html>