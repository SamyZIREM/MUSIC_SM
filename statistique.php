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
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="styles.css"/>
	<link rel="shortcut icon" href="./images/logo.png"/>
	<title>Statistique</title>
	<style>
		aside {
	  	width: 20%;
	  	height: 500px;
	  	overflow-y: scroll;
	  	margin-left: 75%;
	  	background-color: rgba(250, 250, 250, 0.7);
	    margin-top: -26%;
		}
	</style>
</head>
<body style="background-image: url(images/<?=$style?>);">
	<header>
		<nav style="text-align:center;background: rgba(250, 250, 250, 0.5);">
        	<ul style="list-style-type: none; margin-left:-5%;">
        	 	<li><img src="./images/logo.png" style="width:17%; height:17%;" alt="logo"></li> 
           		<li><a href="index.php">Accueil</a></li>  
           		<li><a href="genre.php">Genres musicaux</a></li>
           		<li><a href="propos.php">À propos</a></li>  
           		<li><a href="statistique.php">Statistique</a></li> 
           		<li><a href="partie1.php">Image du jour</a></li> 

           		</ul>

 
      		
      	 </nav>
      	<form style="margin-left:70%; margin-top:-1.8%;" action ="rech.php" method = "post">
  			<input type = "search" name = "mot" placeholder="Artiste ou album..."/>

  			<input type = "submit" value = "Rechercher"/>

   		</form>
  	</header>

<main>
<article class="art" style="margin-top:2%;">
	
	<?php
		/**
		 * Usage de cookie pour retourner le dernier artiste ou titre consulté
		*/ 
		if (empty($_COOKIE['lastResearch'])){
		    setcookie('lastResearch', 'aucun', time() + 3600 * 24 * 365);
		}
		$art=$_COOKIE['lastResearch'];
		if($art!='aucun'){
	      $as= str_replace(' ','&nbsp;',$art);

	      echo "<h2 style='text-align:center;'> Dernier artiste ou titre consulté dans les genres musicaux:$as </h2>";
	    }
	?>
		
	</article>
<footer style="text-align:center;background: rgba(250, 250, 250, 0.8); margin-top: 8%;">
        <?php
        	echo visit();
        ?>
		<p style="text-align: center;">Site créé par Samy et Mélissa ©2022     |
      <span><a  style="color: black;" href="mailto:Music_SM@gmail.com">Contactez-nous </a></span>   
        <a style="text-align: center; color: black;" href="plan.php"> | Plan du site</a><span>| Votre navigateur est: <?php 
        echo get_navigateur(); ?>
      </span>
        

    </p>

		
</footer>
</body>
</html>