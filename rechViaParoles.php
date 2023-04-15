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
<!-- 	<meta name="viewport" content="width=device-width, initial-scale=1"/> -->
	<link rel="stylesheet" type="text/css" href="styles.css"/>


	<link rel="shortcut icon" href="./images/logo.png"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Recherche via paroles</title>
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
           		<li><a href="partie1.php">Recherche via les paroles</a></li>
           		<li><a href="propos.php">À propos</a></li>  
           		<li><a href="partie1.php">Image du jour</a></li>
          

           		</ul>
      	 </nav>
      	
   		</form>
  	</header>

<main>
	<article style="margin-left:5%;">
			<h2 style="margin-top: 15%;">Vous avez oublié le nom d'un titre ou d'un artiste ?</h2> 
			<h2>Mais vous avez toujours les paroles en tête ! </h2>
			<h2>Cet endroit est dédié pour vous </h2>
				<form style="margin-left: 60%; margin-top: -5%;" action ="resultRechViaParoles.php" method = "post">
  			<input type = "search" name = "mot"  placeholder="Paroles..."/>
  			<input type = "submit" value = "Rechercher"/>
	</article>
	
</main>

</body>

</html>