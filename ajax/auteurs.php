<?php

$action = isset($_GET['action']) ? stripslashes($_GET['action']) : '';

// RŽcupre la liste des auteurs dans un fichier
if ($action == "get_all"){
	
	$liste_auteurs = array();
	$lines = file('../auteurs.txt');
	foreach ($lines as $auteur){
		array_push($liste_auteurs, $auteur);
	}
	echo json_encode($liste_auteurs);
	
}

// Ajoute un auteur dans le fichier
if ($action == "add"){
	
	$auteur = isset($_POST['auteur']) ? stripslashes($_POST['auteur']) : '';
	$fp = fopen("../auteurs.txt","a");
	fputs($fp, $auteur."\n");
	fclose($fp);
	
}

?>