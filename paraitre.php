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
	
		<div data-role="page" id="paraitre">
		
			<!-- SCRIPT JAVASCRIPT -->
			<script type="text/javascript">

                $("#paraitre").on('pageinit', function(){

					// RECUPERATION DES LIVRES A PARAITRE DE TOUS LES AUTEURS PRESENTS DANS LA LISTE
                	$.ajax({
                        url: 'ajax/livres.php?action=get_all_next',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                			for (var i = 0; i < data.length; i=i+3) {
                				$("#paraitre_grille").append('<div class="ui-block-a" style="background-color: white;text-align: center;"><img src="'+data[i].image+'" style="margin-top: 10px;" /></div>');
                				$("#paraitre_grille").append('<div class="ui-block-b" style="background-color: white;text-align: center;"><img src="'+data[i+1].image+'" style="margin-top: 10px;" /></div>');
                				$("#paraitre_grille").append('<div class="ui-block-c" style="background-color: white;text-align: center;"><img src="'+data[i+2].image+'" style="margin-top: 10px;" /></div>');
                			}
                        }
                    });
                	
                });

            </script>
			
			<!-- HEADER -->
			<div data-role="header" data-theme="b">      
				<h1>A Paraitre</h1>
			</div>
 			
 			<!-- LISTE DES AUTEURS -->
			<div data-role="content">
				<div id="paraitre_grille" class="ui-grid-b"></div>
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