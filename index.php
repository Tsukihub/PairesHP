<?php $tabPhp = array("img/ane.jpg", "img/chat.jpg", "img/chien.jpg", "img/lama.jpg", "img/lapins.jpg", 
"img/lionne.jpg", "img/ours.jpg", "img/ane.jpg", "img/chat.jpg", "img/chien.jpg", "img/lama.jpg", 
"img/lapins.jpg", "img/lionne.jpg", "img/ours.jpg"); 
shuffle($tabPhp);
var_dump($tabPhp);
?>	
<script type="text/javascript">
	<?php 
	$tableau=""; 

	foreach ($tabPhp as $key => $CaseTableau) {
		if($key!=13){
	
    $tableau .= '"'.$CaseTableau.'",';
}else{$tableau .= '"'.$CaseTableau.'"';}
 // $dernierecle=array_pop(array_keys($array));
 // foreach ($tabPhp as &$cle=>$valeurCase){
 // 	if ($cle===$dernierecle){
 		
 // 	}
 // }

    // as $key=>$value;
		}
		// else if{$tableau .= '"'.$value.'"';}
  //   }
 
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
		<p>Règles du jeu: Afficher toutes les paires pour gagner</p>
		<p>Vous avez trouvé <span id="paires">0</span> paires cachées</p>
		<span id="chronotime">00:00</span>
		
			
		 <div id="photo"> 
		  <!--ici javascript--> 
		  <?php
		  $LongueurTableau = count($tabPhp);
		  for($numeroDosCarte=0; $numeroDosCarte<($LongueurTableau); $numeroDosCarte++){
          echo '<img src="img/dos.png" class="photo" onclick="choisir('.$numeroDosCarte.') "draggable="false">'; 
	}
?>

		</div>
		
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>