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
	<title>Plan du site</title>
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
      	<form style="margin-left:70%; margin-top:-2%;" action ="rech.php" method = "post">
  			<input type = "search" name = "mot">

  			<input type = "submit" value = "Rechercher">

   		</form>
   	
  	</header>



<main>

	<article class="art" style="margin-top:5%;">
	<h2 style="text-align:center;">Plan du site</h2>


 	<h3 style="margin-top:2%; margin-left:2%;"><a  href="index.php">Accueil</a></h3>
 	<p style="margin-left:2%;">Top titres du moment</p>
 	<p style="margin-left:2%;">Image aléatoire</p>
 	<p style="margin-left:2%;">Mode Clair/Sombre</p>





 


<div style="margin-left:65%; margin-top:-5.5%;">
 	<h3><a href="partie1.php">Image du jour</a></h3>
 	<p>Image NASA</p>
 	<p>Localisation</p>
 	
</div>




<div style="margin-left:85%; margin-top:-4%;">
 	<h3><a href="statistique.php">Statistique</a></h3>
 	<p>Dernier artiste ou musique consultée</p>
 	<p>Histogramme</p>
 	<p>Fonctionnement de l'histogramme</p>
 
 	
</div>

<div style="margin-left:40%; margin-top:-8%;">
	
 	<h3><a href="propos.php">À propos</a></h3>
 	<p>Pourquoi ce site ?</p>
 	<p>Quel est le contenu principal de ce site ?</p>
 	<p>Qui a réalisé ce site ?</p>
 	<p>Quand ?</p>
 </div>

<div style="margin-left:20%; margin-top:-7%;">
 	<h3 ><a href="genre.php">Genres musicaux</a></h3>
 	<p>POP</p>
 	<p>Livres audio</p>
 	<p>RAP/HIP-HOP</p>
 	<p>Rock</p>
 	<p>R&B</p>
 	<p>Metal</p>
 	<p>Soul & Funk</p>
 	<p>Dance</p>
 	<p>Folk</p>
 	<p>Alternative</p>
 	<p>Reggae</p>
 	<p>Classique</p>
 	<p>Country</p>
 	<p>Jazz</p>
 	<p>Chanson française</p>
 	<p>Films/Jeux vidéo</p>
 	<p>Blues</p>
</div>


</article>



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