<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>NewBooks</title>
		
		<!-- IMPORTS -->
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.3.2.css" />
 		<link rel="stylesheet" href="css/jquery.mobile-1.3.2.css" />
 		<link rel="stylesheet" href="css/index.css" />
 		<link rel="stylesheet" href="css/livres.css" />
 
		<script src="js/jquery-2.0.2.min.js"></script>
		<script src="js/jquery.mobile-1.3.2.min.js"></script>
		
		
	</head>
	
	<body>
	
		<div data-role="page" id="livres">
		
			<script src="js/livres.js"></script>
		
			<!-- HEADER -->
			<div data-role="header" data-theme="b">   
				<a href="index.html" data-role="button" data-icon="home" data-transition="slide" data-direction="reverse" data-theme="a" >Home</a>   
				<h1><?php echo $_GET['auteur']; ?></h1>
				<a href="" id="supprimer_auteur_bouton" data-role="button" data-icon="delete" data-theme="a">Delete</a>   
			</div>
 			
 			<!-- LISTE DES NOUVEAUTES ET LIVRES A PARAITRE -->
			<div data-role="content">
				<ul id="ul_livres_nouveaute_liste" data-role="listview" data-inset="true" >
					<li data-role="list-divider">NOUVEAUTES</li>
				</ul>
				
				<ul id="ul_livres_paraitre_liste" data-role="listview" data-inset="true" >
					<li data-role="list-divider">A PARAITRE</li>
				</ul>
			</div>
		 
		</div>

	</body>
	
</html>