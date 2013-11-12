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

// FONCTION APPELEE A CHAQUE FOIS QUE LA PAGE EST AFFICHEE
$(document).off("pageshow", "#home").on("pageshow", "#home", function () {

	// On teste si on est bien sur index.php => sinon probleme sur appel Ajax sur bouton HOME
	var currentLocation =  document.location.href;
	if (currentLocation.split("/").pop() !== "index.html") {
		window.location = "index.html";
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