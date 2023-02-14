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
	<title>Music_SM</title>
	<style>
.image {
position: absolute;
top:0;
left:0;
width:300px;
z-index:100;
margin-left: 2%;
}
.texte {
position:relative;
margin-left: 2%;
z-index:10;
}
.genre {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 10px 2em;
  margin-left: 10%;
  margin-top: 2%;
}



    </style>
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
      	<form style="margin-left:70%; margin-top:-2%;" action ="rech.php" method = "post">
  			<input type = "search" name = "mot">
  			<input type = "submit" value = "Rechercher">

   		</form>

  	</header>



<main>

	<?php

if (!empty($_GET['key'])){
	setcookie('lastResearch',$_GET['key']);
	$key=$_GET['key'];
	echo biographie2($key);
	


	$statsFile = fopen('./histogramme.csv', 'a');
    //parcours du fichier
    $termes = implode(' ', file('histogramme.csv')); 
    //compteur de hit
      $compteur=substr_count($termes,$_GET['key']);
    //ecriture dans le fichier
    fwrite($statsFile,$_GET['key'].",".$compteur."\n");
    //fermeture du fichier 
    fclose($statsFile);
}




		?>

	
	




	<article class="art" style="margin-top: 5%;">
	<h2 style="text-align:center;">Les titres les plus connus</h2>
<div class="genre">
		<?php
		if (!empty($_GET['key'])){
	$key=$_GET['key'];
	echo titre2($key);
}

		?>
	</div>
	</article>


<article class="art" style="margin-top: 5%;">
	<h2 style="text-align:center;">Albums les plus connus</h2>
	<div class="genre">
<?php
		if (!empty($_GET['key'])){
	$key=$_GET['key'];
	echo album2($key);
}

		?>
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