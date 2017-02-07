 <?php 
$my_file = 'file.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);


if (isset($_GET["min"], $_GET["sec"], $_GET["nom"])){
	    $min= (int)htmlspecialchars($_GET["min"]);/////htmlspecialchars permet d'échapper les caractères spéciaux ex empecher utilisateur d'ecrire balise fermante php ou script 
	    $sec= (int)htmlspecialchars($_GET["sec"]);
	    $etat="victoire";
	    $nom= htmlspecialchars($_GET["nom"]);
	    $new_data = "\n".$min.", min ,".$sec.", sec ,".$nom.",";
		fwrite($handle, $new_data);
		// $fichier = file("file.txt");
		// $tempsMinUtilisateur="";
		// foreach ($fichier as $index => $ligne) {
		// 	$ligneCoupee=explode(',', $ligne);
		// 	$nomUtilisateur=$ligneCoupee[4];
		// 	$tempsMinUtilisateur=$ligneCoupee[0];
		// 	$tempsSecondeUtilisateur=$ligneCoupee[2];
		// 	$colonneUtilisateur="";
		// }
}else{
	$etat="jeu";
}



if($etat=='jeu'){
$tabPhp = array("img/ane.jpg","img/chat.jpg","img/chien.jpg","img/lama.jpg","img/lapins.jpg",
"img/lionne.jpg", "img/ours.jpg","img/ane.jpg","img/chat.jpg","img/chien.jpg","img/lama.jpg", 
"img/lapins.jpg", "img/lionne.jpg", "img/ours.jpg","img/ane.jpg","img/chat.jpg","img/chien.jpg","img/lama.jpg","img/lapins.jpg", "img/lionne.jpg", "img/ours.jpg"); 

shuffle($tabPhp);//shuffle($array)
// var_dump($tabPhp);//affiche tt le contenu du tableau en html

}

/////////////////////////////////////////php de contrôle/////////////////////////////////////////

?>	
<script type="text/javascript">
	<?php 
	if($etat=='jeu'){
	$LongueurTableau = count($tabPhp);
	$tableau=""; 

	foreach ($tabPhp as $key => $CaseTableau) {//foreach($array as $index =>$contenuALindex){]récupère index et contenu dans variables
		if($key!=$LongueurTableau-1){//pour tout le tableau sauf la dernière case
	
    $tableau .= '"'.$CaseTableau.'",';
}else{$tableau .= '"'.$CaseTableau.'"';}
}
 // $dernierecle=array_pop(array_keys($array));//gets the last key inside of dernierecle
 
	echo "var tab=[$tableau];";
}
	?>
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Jeux-des-triplets</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Kumar+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

	<body>
		<div id="titre">
		<h1>Memory puissance 3</h1>
		</div>
	
	    <?php
	    if ($etat=="jeu") {
	      	echo"		<p>Règles du jeu: Afficher toutes les triplets pour gagner</p>
		<p>Vous avez trouvé <span id='paires'>0</span> triplets cachés</p><span id='chronotime'>00:00</span>";
	      }  
		
		?>
			
		 <div id="photo"> 
		 
		  <?php
//////////////////////////////////////////////////fonction afficher/////////////////////////////////////////	   
		  if($etat=="victoire"){ 
	echo '<h1> Vous avez gagné !</h1><br /><div class="boutton"><input type="button" class="restart" value="Recommencer" onClick="restart()"></div>';
	echo "vous avez gagné en $min:$sec, $nom";





}else{
		  for($numeroDosCarte=0; $numeroDosCarte<($LongueurTableau); $numeroDosCarte++){
          echo '<img src="img/dos.png" class="photo" onclick="choisir('.$numeroDosCarte.') "draggable="false">'; 
	}
	}
?>

		</div>
		<?php
		if($etat=="jeu"){
		echo "<script type='text/javascript' src='js/script.js'></script>";
	}else{
		echo "<script type='text/javascript' src='js/scriptvictoire.js'></script>";
	}
	?>
	</body>
</html>