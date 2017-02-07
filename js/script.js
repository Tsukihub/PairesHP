var dos = 'img/dos.png'; 
var clique=0;//reset dans verif() utile dans choisir()
var triplet = 0;//Utile dans verif()pour mettre fin au jeu et pour affichage triplets trouvés
var norepeat = true;//empeche le chrono de pouvoir être relancé dans choisir()


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //                                                                           CHOIX DES CARTES                                                         //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
function choisir(carte) { // Choix des cartes quand l'utilisateur clique
	if (norepeat == true){//empeche le chronometre de se repeter
		timerID = setInterval("chrono()", 1000);//on appelle la fonction chronometre
		norepeat = false;
	}
	 
	if (clique == 3) { // Au delà du deuxième clique
		return; // On affiche rien
	}
	if (clique == 0) { // Au premier clique
		choixun = carte; // On attribue le numéro de la carte choisie au premier choix
		document.images[carte].src =  tab[carte]; // Affiche l'image de la carte correspondant au choix
		document.images[choixun].style.pointerEvents = 'none';//Desactive l'evenement du clique(pas de double clique)
		clique = 1; // On passe le clique à 1
	}
	else if(clique==1){ // Au deuxième clique
		clique=2;
		choixdeux = carte;// Affiche l'image de la carte correspondant au choix
		document.images[carte].src =  tab[carte]; 
		document.images[choixdeux].style.pointerEvents = 'none'; // Ajoute un temps de pause puis passe à la fonction de vérification
	}else{
		timer = setTimeout("verif()", 500);
		clique = 3; // On passe le clique à 2
		choixtrois = carte; // On attribue le numéro de la carte choisie au deuxième choix
		document.images[carte].src =  tab[carte]; 
		document.images[choixtrois].style.pointerEvents = 'none'; 
	}	
}


   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                         VERIFIE LES PAIRES                                                       //
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




function verif() { // Vérifie si une paire a été faite
	clique = 0;
	if (tab[choixdeux] ==  tab[choixun]&& tab[choixdeux]==tab[choixtrois]&&tab[choixtrois]==tab[choixun]) {
		//si les deux cartes sont pareilles la paire reste fixe
			triplet++; 
			document.getElementById("paires").innerHTML = triplet;
			document.images[choixun].style.pointerEvents = 'none';//Desactive l'evenement du clique(pas de double clique)
			document.images[choixun].style.opacity = '0.3';// l'opacité s'applique sur la carte retournée
			document.images[choixdeux].style.pointerEvents = 'none';//Desactive l'evenement du clique(pas de double clique)
			document.images[choixdeux].style.opacity = '0.3';
			document.images[choixtrois].style.pointerEvents = 'none';//Desactive l'evenement du clique(pas de double clique)
			document.images[choixtrois].style.opacity = '0.3';// l'opacité s'applique sur la carte retournée
	
	} else {
		document.images[choixun].src = dos;
		document.images[choixun].style.pointerEvents = 'auto';
		document.images[choixdeux].style.pointerEvents = 'auto';//Desactive l'evenement du clique(pas de double clique)
		document.images[choixdeux].src = dos;
		document.images[choixtrois].style.pointerEvents = 'auto';
		document.images[choixtrois].src = dos;
		return;
	}
	if (triplet==7) {
		// clearInterval(timerID);//arette le chrono quand toutes les paires trouvées
		// document.getElementById("photo").style.display = 'block';
		// document.getElementById("photo").style.flexDirection = 'column';
		var nom=prompt(nom);
		document.location.href='/php/paires/index.php?min='+min+"&sec="+sec+"&nom="+nom;
	}
}


   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                         CHRONOMETRE                                                              //
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



var timerID = 0;
var sec = 0;
var min = 0; 

function chrono(){ //Function chronometre
	if(sec<59){//quand seconde superieur a 59 milliemme
		sec++;//ajoute une seconde au chronometre
		if(sec<10){
			sec = "0" +sec;//affiche 00 avant le chiffre 1
		}

	}
	else if(sec=59){//quand seconde superieur a 59 milliemme
		min++;//ajoute une minute au chronometre
		sec = "0" + 0;
	}
	document.getElementById("chronotime").innerHTML = min + ":" + sec +"";//affiche le chronometre dans le html a l'endroit ciblé par l'id

} 
 
function restart(){
	document.location.href='/php/paires/';
}