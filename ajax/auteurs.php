<?php

$action = isset($_GET['action']) ? stripslashes($_GET['action']) : '';

// RŽcupre la liste des auteurs dans un fichier
if ($action == "get_all"){
	
	$liste_auteurs = array();
	$lines = file('../auteurs.txt');
	foreach ($lines as $auteur){
		if(strlen(trim($auteur))){
			array_push($liste_auteurs, $auteur);
		}
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

// Supprime un auteur dans le fichier
if ($action == "delete"){
	
	$auteur = isset($_POST['auteur']) ? stripslashes($_POST['auteur']) : '';
	$nouvelle_liste = array();
	
	$lines = file('../auteurs.txt');
	foreach ($lines as $line){
		$line = trim($line);
		if ($line != $auteur){
			array_push($nouvelle_liste, $line);
		}
	}
	
	$fp = fopen("../auteurs.txt","w");
	foreach ($nouvelle_liste as $auteur){
		fputs($fp, $auteur."\n");	
	}
	fclose($fp);
	
}

?>