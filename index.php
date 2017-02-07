 <?php 
// $tabPhp = array("img/ane.jpg", "img/chat.jpg", "img/chien.jpg", "img/lama.jpg", "img/lapins.jpg", 
// "img/lionne.jpg", "img/ours.jpg", "img/ane.jpg", "img/chat.jpg", "img/chien.jpg", "img/lama.jpg", 
// "img/lapins.jpg", "img/lionne.jpg", "img/ours.jpg"); 
 $tabPhp = array("img/ane.jpg", "img/ane.jpg");
shuffle($tabPhp);//shuffle($array)
// var_dump($tabPhp);//affiche tt le contenu du tableau en html


$my_file = 'file.txt';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);


if (isset($_GET["min"], $_GET["sec"], $_GET["nom"])){
	    $min=$_GET["min"];
	    $sec=$_GET["sec"];
	    $etat="victoire";
	    $nom=$_GET["nom"];
	    $new_data = "\n".$min.", min ".$sec.", sec ".$nom;
		fwrite($handle, $new_data);
}else{$etat="jeu";
}


/////////////////////////////////////////php de contrôle//////////////////////////////////////////////////

?>	
<script type="text/javascript">
	<?php 
	$LongueurTableau = count($tabPhp);
	$tableau=""; 

	foreach ($tabPhp as $key => $CaseTableau) {//foreach($array as $index =>$contenuALindex){]récupère index et contenu dans variables
		if($key!=$LongueurTableau-1){//pour tout le tableau sauf la dernière case
	
    $tableau .= '"'.$CaseTableau.'",';
}else{$tableau .= '"'.$CaseTableau.'"';}
}
 // $dernierecle=array_pop(array_keys($array));//gets the last key inside of dernierecle
 
	echo "var tab=[$tableau];";

	?>
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Jeux-des-paires</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Kumar+One" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

	<body>
		<div id="titre">
		<h1>JEU DES PAIRES</h1>
		</div>
	
	    <?php
	    if ($etat=="jeu") {
	      	echo"		<p>Règles du jeu: Afficher toutes les paires pour gagner</p>
		<p>Vous avez trouvé <span id='paires'>0</span> paires cachées</p><span id='chronotime'>00:00</span>";
	      }  
		
		?>
			
		 <div id="photo"> 
		  <!--ici javascript--> 
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
		
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>