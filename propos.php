<?php
require "./include/functions.inc.php";

//style par defaut
if (empty($_POST['sombre'])&&empty($_POST['clair'])) {     
  $style="fond.jpg";
             }



//clair vers style sombre

if (!empty($_POST['sombre'])) {
$style="fond_nuit.jpg"; 
setcookie('theme','sombre',time() + 60 * 60 * 48 );
}
if($_COOKIE['theme']=='sombre'){
$style="fond_nuit.jpg"; 
} 


//style clair
if (!empty($_POST['clair'])) {    
$style="fond.jpg";    
setcookie('theme','clair',time() + 60 * 60 * 48 );  
}
if($_COOKIE['theme']=='clair'){
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
              <li><a href="propos.php">À propos</a></li> 
              <li><a href="statistique.php">Statistique</a></li>  
              <li><a href="partie1.php">Image du jour</a></li> 

           </ul>
         </nav>
         <form style="margin-left:70%; margin-top:-2%;" action = "rech.php" method = "post">
      <input type = "search" name = "mot">
      <input type = "submit" value = "Rechercher">

      </form>
      
  </header>



<main>
<section style="margin-top:3%;">
  <h1 class="art" style="text-align:center;border-radius: 10%; margin-bottom: 2%; ">À propos</h1>
  <article class="art" style="text-align: center;">
    <h2 style="margin-top:2%;">Pourquoi ce site ?</h2>
    <p>
      Ce site a été créé dans le but de réaliser le projet du module développement web dans le cadre de la Licence 2 informatique de l'Université de Cergy-Pontoise. 
      En effet, l'avantage majeur de ce projet est de mettre en pratique nos connaissances en développement web (HTML, CSS, PHP) ainsi que ses outils (FileZila, éditeur de code...etc).
    </p>

 

    <h2 style="margin-top:2%;">Quel est le contenu principal de ce site ?</h2>
   <p>
     Ce site est principalement dédié aux fans de la musique de tous les genres. En effet, les utilisateurs peuvent effectuer des recherches sur leurs artiste préféré, ou bien des recherches sur leurs son préféré, ou album préféré...etc.

   </p>









    <h2 style="margin-top:2%;">Qui a réalisé ce site ?</h2>
   <p>
     Ce site a été réalisé par Samy ZIREM et Mélissa MADOUR, étudiants en Licence 2 Informatique à l'Université de Cergy-Pontoise.

   </p>

 
  

    <h2 style="margin-top:2%;">Quand ?</h2>
   <p>
     Ce site a été réalisé en Mars 2022.

   </p>

  </article>






  
</section>
</main>
<footer style="text-align:center;background: rgba(250, 250, 250, 0.8); margin-top: 8%;">
        <?php
        echo visit();
        ?>
    <p style="text-align: center;">Site créé par Samy et Mélissa ©2022     |
        <span><a  style="color: black;" href="mailto:Music_SM@gmail.com">Contactez-nous </a></span>   
        <a style="text-align: center; color: black;" href="plan.php"> | Plan du site</a><span>| Votre navigateur est: <?php 
        echo get_navigateur(); ?></span>
        

        </p>

    
</footer>
</body>
</html>