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
  <title>Image du jour</title>
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
<section style="margin-top:5%;">
  <h2 style="text-align:center; background: rgba(250, 250, 250, 0.95); border-radius: 10%; margin-bottom: 2%; ">Image du jour et localisation</h2>
  <article class="art" style="text-align: center;">
    <h2>Image du jour (NASA)</h2>
    <?php
    echo api(); 
    ?>
  </article>
  <article class="art" style="text-align:center; margin-top: 4%;">
    <h2>Localisation</h2>
    <?php
    echo geo();
    ?>
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