<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>NewBooks</title>
		
		<!-- IMPORTS -->
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.3.2.css" />
 		<link rel="stylesheet" href="css/jquery.mobile-1.3.2.css" />
 
		<script src="js/jquery-2.0.2.min.js"></script>
		<script src="js/jquery.mobile-1.3.2.min.js"></script>
	</head>
	
	<body>
	
		<div data-role="page" id="livres">
		
			<!-- SCRIPT JAVASCRIPT -->
			<script type="text/javascript">

				$("#livres").on('pageshow', function(){

					var auteur = '<?php echo $_GET['auteur']; ?>';

					// SUPPRESSION D'UN AUTEUR
                    $("#supprimer_auteur_bouton").click(function(e) {
                    	$.ajax({
                            url: 'ajax/auteurs.php?action=delete',
                            type: 'POST',
                            data: { auteur: auteur },
                            success: function (data) {
                            	$.mobile.changePage("index.php", { transition: "slide", reverse: true });
                            }
                        });
                    });

                 	// RECUPERATION DES NOUVEAUTES VIA AMAZON
                    $.ajax({
                        url: 'ajax/livres.php?action=get_new&auteur='+auteur,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                        	for (var i = 0; i < data.length; i++) {
                        		$("#ul_livres_nouveaute_liste").append('<li><div style="background-color: white;"><img src="'+data[i].image+'" />'+data[i].titre+'////'+data[i].auteur+'</div></li>'); 
                        	}
                        }
                    });

					// RECUPERATION DES LIVRES A PARAITRE VIA AMAZON
                    $.ajax({
                        url: 'ajax/livres.php?action=get_all&auteur='+auteur,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                        	for (var i = 0; i < data.length; i++) {
                        		$("#ul_livres_paraitre_liste").append('<li><div style="background-color: white;"><img src="'+data[i].image+'" />'+data[i].titre+'////'+data[i].auteur+'</div></li>'); 
                        	}
                        }
                    });

				});

			</script>
		
			<!-- HEADER -->
			<div data-role="header" data-theme="b">   
				<a href="index.php" data-role="button" data-icon="home" data-transition="slide" data-direction="reverse" data-theme="a" >Home</a>   
				<h1><?php echo $_GET['auteur']; ?></h1>
				<a href="" id="supprimer_auteur_bouton" data-role="button" data-icon="delete" data-theme="a">Delete</a>   
			</div>
 			
 			<!-- LISTE DES NOUVEAUTES ET LIVRES A PARAITRE -->
			<div data-role="content">
				<h3>NOUVEAUTES</h3>
				<ul id="ul_livres_nouveaute_liste" data-role="listview" data-inset="true" ></ul>
				<h3>A PARAITRE</h3>
				<ul id="ul_livres_paraitre_liste" data-role="listview" data-inset="true" ></ul>
			</div>
		 
		</div>

	</body>
	
</html>