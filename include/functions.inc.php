<?php
        /**
         * Partie 1 du projet pour afficher la photo du jour NASA
         * Usage API Nasa sous flux JSON
        */ 
	function api(){
	$url ="https://api.nasa.gov/planetary/apod?api_key=5XOYthv6iWKQ0wligUxf6io0Pn6aom5rgwzDgShl";
	$t = array();
	$json=file_get_contents($url);
	$tt = json_decode($json,true);
	echo "<img id='apod' src='".$tt['url']."' alt='APOD' style='width:30%;'/>";
	}
?>

<?php
        /**
         * Partie 1 du projet pour afficher la localisation
         * Usage de l'api geoplugin sous flux xml
        */ 
	function geo(){
	$user_ip = getenv('REMOTE_ADDR');/*obtenir l'adresse ip*/
	$geo= simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$user_ip");
	echo '<p> ville: '.$geo->geoplugin_city.'</p>';
	echo '<p> Département: '.$geo->geoplugin_regionName.'</p>';
	echo '<p> Adresse IP: '.$geo->geoplugin_request.'</p>';
	echo '<p> Continent: '.$geo->geoplugin_continentName.'</p>';
	echo '<p> Région: '.$geo->geoplugin_region.'</p>';
	echo '<p>Code_Postal: '.$geo->geoplugin_regionCode.'</p>';
	echo '<p> Latitude: '.$geo->geoplugin_latitude.'</p>';
	echo '<p> Longitude: '.$geo->geoplugin_longitude.'</p>';
	}
?>



<?php

        /**
         * Fonction qui renvoit la biogrpahie d'un artiste lorsqu'on fais la recherche 
         * Usage de l'API theaudiodb
        */
        function biographie(){
        if (isset($_POST['mot'])) {
        setcookie('lastResearch',$_POST['mot']);
        $mot = ($_POST['mot']);
        $url ="https://www.theaudiodb.com/api/v1/json/2/search.php?s=$mot";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);
        
        if(!empty($tt['artists'])){
        echo"<article class='art' style='margin-top: 5%; padding-bottom: 1%;'>";
        echo"<h2 style='text-align:center;'>Biographie</h2>";
        echo "<p style='text-align:center; margin-top:2%;'> ".$tt['artists']['0']['strArtist']."</p>";

        echo "<p style='text-align:center;'> Genre: ".$tt['artists']['0']['strGenre']."</p>";
        echo "<img alt='bio'  src='".$tt['artists']['0']['strArtistThumb']."' style='width:10%; margin-left:45%;'/>";
        echo "<p style=' text-align: justify; margin-left:3%; margin-right:3%; margin-bottom:2%;'> ".$tt['artists']['0']['strBiographyFR']."</p>";
        }
        }
        }
?>


<?php
        /**
         * Fonction qui renvoit les titres connus d'un artiste ou d'une musique recherchée
         * Usage de l'API Deezer 
        */ 
        function titre (){
        if (isset($_POST['mot'])) {
        $mot = ($_POST['mot']);
        $mot=str_replace(' ','',$mot);
        $url ="https://api.deezer.com/search?q='$mot'&limit=10";
        $url2 ="https://api.deezer.com/search?q='$mot'&limit=10";
        $json=file_get_contents($url);
        $json2=file_get_contents($url2);
        $tt = json_decode($json,true);
        $ttt = json_decode($json2,true);
        if(!empty($tt['data'])&&!empty($ttt['data']['6']['album']['cover_big'])){
                echo "<div>";
                echo "<img alt='tit' src='".$tt['data']['0']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$tt['data']['0']['title']."</p>";
                echo " <audio controls src='".$tt['data']['0']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['2']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['2']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['2']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['3']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['3']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['3']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['4']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['4']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['4']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['5']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['5']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['5']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['6']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['6']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['6']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
        } 
        else{
                echo "<p> Titres non trouvés ! Veuillez réessayer avec un autre terme associé au titre recherché</p>";
        }      
        }
        }
?>




<?php
        
        /**
         * Fonction qui renvoit les albums d'un artiste ou d'une musique lorsqu'on fais la recherche 
        */ 
        function album (){
        if (isset($_POST['mot'])) {
                $mot = ($_POST['mot']);
                $mot=str_replace(' ','',$mot);
                $url="https://api.deezer.com/search?q='$mot'&limit=11";
                $json=file_get_contents($url);
                $tt = json_decode($json,true);
                if(!empty($tt['data']['4']['album']['cover_big'])){
                echo "<div>";
                echo "<img alt='alb' src='".$tt['data']['0']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['0']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='alb' src='".$tt['data']['2']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['1']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$tt['data']['4']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['2']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='alb' src='".$tt['data']['6']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['3']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='alb' src='".$tt['data']['8']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['4']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='alb' src='".$tt['data']['10']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['5']['album']['title']."</p>";
                echo "</div>";
        }
        else if(empty($tt['data']['4']['album']['cover_big'])){
                echo "<p> Albums non trouvés ! Veuillez réessayer avec un autre terme associé à l'album recherché</p>";
        }
        }
        }
?>



<?php
        /**
         * Fonction qui renvoit les différents genres musicaux 
         * Usage de l'API Deezer
        */ 
        function genre (){
        $url="https://api.deezer.com/genre/";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);
        for ($i=1;$i<19;$i++){
                $identifiant=$tt['data'][$i]['id'];
                echo "<div>";
                echo "<p>".$tt['data'][$i]['name']."</p>";
                echo "<a href='info_genre.php?key=$identifiant'> <img alt='genre' src=".$tt['data'][$i]['picture_big']." width='150' height='150'/></a>";
                echo "</div>";
        }
        }
?>


<?php
        /**
         * Fonction qui renvoit les artistes correspondants au genre choisi
         * Usage de l'API Deezer
        */ 
        function genre_artist($identifiant){
        $url="https://api.deezer.com/genre/$identifiant/artists";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);
        for ($i=0;$i<12;$i++){
                $id=$tt['data'][$i]['name'];
                $id = str_replace(' ','%20', $id);
                echo "<div>";
                echo "<p>".$tt['data'][$i]['name']."</p>";
                echo "<a href='rech2.php?key=$id'><img alt='genre_artist' src=".$tt['data'][$i]['picture_big']." width='150' height='150'/></a>";
                echo "</div>";
        }
        }
?>


<?php
        /**
         * Fonction qui renvoit au compteur de nombre de visite avec l'usage d'un fichier texte 
        */ 
        function visit(){
        $fichier = 'file.txt'; //--- Nom du fichier
        // ---- Permet d'eviter des erreurs sur la création du fichier ---- //
        $test = fopen($fichier, 'a+');
        fclose($test);
        // ---- FIN DU TEST POUR LA CREATION DU FICHIER ---- //
        $nombre = file($fichier);
        $compt = $nombre[0] + 1;
        $new = fopen($fichier,'w+');
        fwrite($new, "$compt \n");
        fclose($new);
        if($compt == 1){
                print 'Vous êtes le 1er visiteur';
        }
        else{
                print 'Vous êtes le '.$compt . ' ième visiteur !';
        }
        }

        /**
         * Fonction qui renvoit l'image aléatoire avec l'usage d'un tableau php
        */ 
        function image(){
        $images[0]="./imagealeatoire/image1.PNG";
        $images[1]="./imagealeatoire/image2.png";
        $images[2]="./imagealeatoire/image3.png";
        $images[3]="./imagealeatoire/image4.png";
        $i=rand(0,3);
        echo "<img src='$images[$i]' alt='icon' style='margin-top:14.3%; margin-left:5%; height: 30%; width: 30%;'/>";
        }
?>



<?php
        /**
         * Fonction qui renvoit à la biographie d'un artiste lorsqu'on appuie sur son image une fois choisi le genre musical souhaité
         * Usage de l'API theaudiodb sous flux JSON
        */ 
        function biographie2($key){ 
        $url ="https://www.theaudiodb.com/api/v1/json/2/search.php?s=$key";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);
        if(!empty($tt['artists'])){
                echo"<article class='art' style='margin-top: 5%; padding-bottom: 1%;'>";
                echo"<h2 style='text-align:center;'>Biographie</h2>";
                echo "<p style='text-align:center;'> ".$tt['artists']['0']['strArtist']."</p>";
                echo "<p style='text-align:center;'> Genre: ".$tt['artists']['0']['strGenre']."</p>";
                echo "<img alt='bio' src='".$tt['artists']['0']['strArtistThumb']."' style='width:10%; margin-left:45%;'/>";
                echo "<p style=' text-align: justify; margin-left:3%; margin-right:3%; margin-bottom:2%;'> ".$tt['artists']['0']['strBiographyFR']."</p>";
                echo"</article>";
        }
        }
?>


<?php
        /**
         * Fonction qui renvoit aux titres d'un artiste lorsqu'on appuie sur son image une fois choisi le genre musical souhaité
         * Usage de l'API Deezer sous flux JSON
        */
        function titre2 ($key){
        $key=str_replace(' ','',$key);
        $url ="https://api.deezer.com/search?q='$key'&limit=10";
        $url2 ="https://api.deezer.com/search?q='$key'&limit=10";
        $json=file_get_contents($url);
        $json2=file_get_contents($url2);
        $tt = json_decode($json,true);
        $ttt = json_decode($json2,true);
        if(!empty($tt['data'])&&!empty($ttt['data']['6']['album']['cover_big'])){
                echo "<div>";
                echo "<img alt='tit' src='".$tt['data']['0']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$tt['data']['0']['title']."</p>";
                echo " <audio controls src='".$tt['data']['0']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['2']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['2']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['2']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['3']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['3']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['3']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['4']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['4']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['4']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['5']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['5']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['5']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='tit' src='".$ttt['data']['6']['album']['cover_big']."' style='width:50%;margin-left:0%; '/>";
                echo "<p style='text-align:left;'>".$ttt['data']['6']['title']."</p>";
                echo " <audio controls src='".$ttt['data']['6']['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
        } 
        else{
                echo "<p> Titres non trouvés ! Veuillez réessayer avec un autre terme associé au titre recherché</p>";
        }     
        }
?>






<?php
        /**
         * Fonction qui renvoit les albums lorsqu'on appuie sur un artiste
         * Usage de l'API Deezer sous flux JSON
        */ 
        function album2 ($key){
        $key=str_replace(' ','',$key);
        $url="https://api.deezer.com/search?q='$key'&limit=11";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);
        if(!empty($tt['data']['4']['album']['cover_big'])){
                echo "<div>";
                echo "<img alt='album2' src='".$tt['data']['0']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['0']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='album2' src='".$tt['data']['2']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['1']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='album2' src='".$tt['data']['4']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['2']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='album2' src='".$tt['data']['6']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['3']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='album2' src='".$tt['data']['8']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['4']['album']['title']."</p>";
                echo "</div>";
                echo "<div>";
                echo "<img alt='album2' src='".$tt['data']['10']['album']['cover_big']."' style='width:50%; margin-left:0%;'/>";
                echo "<p style='text-align:left;'> ".$tt['data']['5']['album']['title']."</p>";
                echo "</div>";
        }
        else if(empty($tt['data']['4']['album']['cover_big'])){
        echo "<p> Albums non trouvés ! Veuillez réessayer avec un autre terme associé à l'album recherché</p>";
        }
        }
?>

<?php
        
        /**
         * Fonction qui renvoit le top des titres du moment à l'accueil
         * Usage de l'API Deezer sous flux JSON
        */ 
        function top_music(){
        $url="https://api.deezer.com/chart&limit=10";
        $json=file_get_contents($url);
        $tt = json_decode($json,true);
        for ($i=0;$i<9;$i++){
                echo "<div>";
                echo "<img alt='top_music' src='".$tt['tracks']['data'][$i]['album']['cover_big']."'  style='width:10%; margin-left:0%;'/>";
                echo "<p>".$tt['tracks']['data'][$i]['album']['title']."</p>";
                echo " <audio controls src='".$tt['tracks']['data'][$i]['preview']."' style='margin-left:0%;'></audio>";
                echo "</div>";
        }
        }
?>


<?php
        /**
         * Fonction qui renvoit le navigateur de l'utilisateur au footer
        */ 
        function get_navigateur(){
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $ub = '';
        if(preg_match('/MSIE/i',$u_agent)){
                $ub = "Internet Explorer";
        }
        else if(preg_match('/Firefox/i',$u_agent)){
                $ub = "Firefox";
        }
        else if(preg_match('/OPR/i',$u_agent)){
                $ub = "Opera";
        }    
        else if(preg_match('/Chrome/i',$u_agent)){
                $ub = "Chrome";
        }
        else if(preg_match('/Safari/i',$u_agent)){
                $ub = "Safari";
        }
        else if(preg_match('/Flock/i',$u_agent)){
                $ub = "Flock";
        }
        else{
                $ub= "Autre type de navigateur";
        }
        return $ub;
        }

?>
