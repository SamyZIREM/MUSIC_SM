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
	<title>Résultats</title>
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
<article class="art" style="margin-top: 5%; margin-bottom: 2%;">
	<h2 style="text-align:center;">Les titres correspondants à la recherche via les paroles</h2>
	<div style="text-align: center;">
	<?php
	// echo searchTracksByLyrics($apiKey, $lyrics)  ;
	$apikey = "3fa0982852a98331dff1ac3dc0cadeb7";
		if(isset($_POST['mot'])) {
		    $mot = $_POST['mot'];
		    $tracks = searchTracksByLyrics($apikey, $mot);
		    if($tracks != null) {
		        foreach($tracks as $track) {
		            $title = $track['track']['track_name'];
		            $artist = $track['track']['artist_name'];
		            $trackid = $track['track']['track_id'];
		            $snippet = getTrackSnippet($apikey, $trackid);
		            echo "<h3 style='text-align:center; margin-top: 5%;'>$title</h3> ";
		            echo "<p style='text-align:center;'>Artiste : $artist</p>";
		            echo "<p style='text-align:center;'>Extrait des paroles: $snippet</p>";
		        }
		    } else {
		        echo "<p style='text-align:center;'>Aucun résultat trouvé</p>";
		    }
		} else {
		    echo "<p style='text-align:center; margin-top: 5%;'>Veuillez saisir des paroles de chansons à rechercher !!!!!!!!!!!!!!</p>";
		}
	?>
</article>

</div>
</main>
<footer style="text-align:center;background: rgba(250, 250, 250, 0.8); margin-top: 8%;">
        <?php
        	echo visit();
        ?>
		<p style="text-align: center;">Site créé par Samy & Bryan & Milan ©2023     |
      <span><a  style="color: black;" href="mailto:Music_SM@gmail.com">Contactez-nous </a></span>   
        <a style="text-align: center; color: black;" >| Votre navigateur est: <?php 
        echo get_navigateur(); ?>
      </span>
        

    </p>

		
</footer>
</body>
</html>