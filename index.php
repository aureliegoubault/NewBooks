<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>NewBooks</title>
		
		<!-- IMPORTS -->
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.3.2.css" />
 		<link rel="stylesheet" href="css/jquery.mobile-1.3.2.css" />
 		<link rel="stylesheet" href="css/index.css" />
 
		<script src="js/jquery-2.0.2.min.js"></script>
		<script src="js/jquery.mobile-1.3.2.min.js"></script>
	</head>
	
	<body>
	
		<div data-role="page" id="home">
		
			<!-- SCRIPT JAVASCRIPT -->
			<script type="text/javascript">

				// FONCTION QUI RECUPERE LA LISTE DES AUTEURS
				function get_author_list(){
					$.ajax({
                        url: 'ajax/auteurs.php?action=get_all',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                			$('#ul_auteurs_liste').empty();
                			
                			for (var i = 0; i < data.length; i++) {
                				$('#ul_auteurs_liste').append('<li><a href="livres.php?auteur='+data[i]+'" data-transition="slide"><h3>'+data[i]+'</h3></a></li>');   
                			}
                			
                			$('#ul_auteurs_liste').listview('refresh');
                        }
                    });
				}
        
                $("#home").on('pageinit', function(){

					// On teste si on est bien sur index.php => sinon problème sur appel Ajax sur bouton HOME
                	var currentLocation =  document.location.href;
                	if (currentLocation.split("/").pop() !== "index.php") {
                		window.location = "index.php";
                	}
                		
                	// RECUPERATION DE LA LISTE D'AUTEURS
                	get_author_list();

                    // AJOUT D'UN AUTEUR
                    $("#ajouter_auteur_bouton").click(function(e) {
						var auteur = $("#ajouter_auteur_champ").val();

						$.ajax({
                            url: 'ajax/auteurs.php?action=add',
                            type: 'POST',
                            data: { auteur: auteur },
                            success: function (data) {
                            	get_author_list();
                            	$("#ajouter_auteur_champ").val("");
                            }
                        });
                    });
                	
                });

                $("#home").on('pageshow', function(){
                	get_author_list();
                });

            </script>
			
			<!-- HEADER -->
			<div data-role="header" data-theme="b">      
				<h1>NewBooks</h1>
				
				<!-- AJOUTER UN AUTEUR -->
				<div class="ui-grid-a" style="padding-left: 10px;padding-right: 10px;">
					<div class="ui-block-a" style="width:90%"><input type="text" id="ajouter_auteur_champ" placeholder="Entrez le nom d'un auteur..." /></div>
					<div class="ui-block-b" style="width:10%"><a href="" id="ajouter_auteur_bouton" data-role="button" data-icon="plus" data-theme="a">Ajouter</a></div>
				</div>
			</div>
 			
 			<!-- LISTE DES AUTEURS -->
			<div data-role="content">
				<ul id="ul_auteurs_liste" data-role="listview" data-inset="true" data-filter="true" ></ul>
			</div>
			
			<!-- FOOTER -->
			<div data-role="footer" class="footbar" data-theme="b" data-position="fixed">   
				<div data-role="navbar" class="footbar">
					<ul>
						<li><a href="index.php" id="auteur" data-icon="custom">Auteurs</a></li>
						<li><a href="nouveautes.php" id="nouveautes" data-icon="custom">Nouveautes</a></li>
						<li><a href="paraitre.php" id="paraitre" data-icon="custom">A paraitre</a></li>
					</ul>
				</div>
			</div> 
		 
		</div>

	</body>
	
</html>