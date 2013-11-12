// FONCTION APPELEE A CHAQUE FOIS QUE LA PAGE EST AFFICHEE
$(document).off("pageshow", "#livres").on("pageshow", "#livres", function () {

	var currentLocation =  document.location.href;
	var auteur = currentLocation.split("auteur=").pop();
	
	// SUPPRESSION D'UN AUTEUR
    $("#supprimer_auteur_bouton").click(function(e) {
    	$.ajax({
            url: 'ajax/auteurs.php?action=delete',
            type: 'POST',
            data: { auteur: auteur },
            success: function (data) {
            	$.mobile.changePage("index.html", { transition: "slide", reverse: true });
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
        		$("#ul_livres_nouveaute_liste").append('<li style="background-color: white;">\n\
                        <table><tr><td>\n\
                            <img src="'+data[i].image+'"/>\n\
                        </td>\n\
                        <td>\n\
                        <h4 style="color: dark gray;">'+data[i].titre+'</h4>\n\
                        <p>'+data[i].auteur+'</p>\n\
                        </td></tr></table>\n\
                    </li>'); 
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
        		$("#ul_livres_paraitre_liste").append('<li style="background-color: white;">\n\
                        <table><tr><td>\n\
                            <img src="'+data[i].image+'"/>\n\
                        </td>\n\
                        <td>\n\
                        <h4 style="color: dark gray;">'+data[i].titre+'</h4>\n\
                        <p>'+data[i].auteur+'</p>\n\
                        </td></tr></table>\n\
                    </li>'); 
        	}
        }
    });

});