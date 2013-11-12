// FONCTION APPELEE A CHAQUE FOIS QUE LA PAGE EST AFFICHEE
$(document).off("pageshow", "#nouveautes").on("pageshow", "#nouveautes", function () {
					
	// RECUPERATION DES NOUVEAUTES DE TOUS LES AUTEURS PRESENTS DANS LA LISTE
	$.ajax({
        url: 'ajax/livres.php?action=get_all_new',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
			for (var i = 0; i < data.length; i=i+3) {
				$("#nouveaute_grille").append('<div class="ui-block-a" style="background-color: white;text-align: center;"><img src="'+data[i].image+'" style="margin-top: 10px;" /></div>');
				$("#nouveaute_grille").append('<div class="ui-block-b" style="background-color: white;text-align: center;"><img src="'+data[i+1].image+'" style="margin-top: 10px;" /></div>');
				$("#nouveaute_grille").append('<div class="ui-block-c" style="background-color: white;text-align: center;"><img src="'+data[i+2].image+'" style="margin-top: 10px;" /></div>');
			}
        }
    });
	
});