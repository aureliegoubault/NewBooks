<?php

include '../simple_html_dom.php';

$action = isset($_GET['action']) ? stripslashes($_GET['action']) : '';

// RŽcupre les donnŽes d'une page web ˆ partir de son URL
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

// RŽcupre les nouveautŽs d'un auteur
if ($action == "get_new"){
	
	$auteur = isset($_GET['auteur']) ? stripslashes($_GET['auteur']) : '';
	$auteur_search = str_replace(" ", "+", $auteur);
	
	$livres = array();
	
	$nouveaute_url = get_data('http://www.amazon.fr/s/ref=sr_nr_p_n_publication_date_1?rh=n%3A301061%2Ck%3A'.$auteur_search.'%2Cp_n_publication_date%3A183197031&keywords='.$auteur_search.'&ie=UTF8&qid=1383734563&rnid=183195031');
	$nouveaute_html = str_get_html($nouveaute_url);
	
	$results_div = $nouveaute_html->getElementById("atfResults");
	$children = $results_div->children();
	
	foreach ($children as $child){
		
		$img_div = $child->find('div[class=image imageContainer]',0);
		$img_src = $img_div->find('img',0)->src;
		
		$infos_h3 = $child->find('h3[class=newaps]',0);
		$infos = array(
			titre => $infos_h3->find('span[class=lrg bold]',0)->plaintext,
			auteur => $infos_h3->find('span[class=med reg]',0)->plaintext,
			image => $img_src
		);
		array_push($livres,$infos);
	}
	
	echo json_encode($livres);
	
}

// RŽcupre tous les livres a paraitre d'un auteur
if ($action == "get_all"){
	
	$auteur = isset($_GET['auteur']) ? stripslashes($_GET['auteur']) : '';
	$auteur_search = str_replace(" ", "+", $auteur);
	
	$livres = array();
	
	$nouveaute_url = get_data('http://www.amazon.fr/s/ref=sr_nr_p_n_publication_date_2?rh=n%3A301061%2Ck%3A'.$auteur_search.'%2Cp_n_publication_date%3A183198031&keywords='.$auteur_search.'&ie=UTF8&qid=1383690571&rnid=183195031');
	$nouveaute_html = str_get_html($nouveaute_url);
	
	$results_div = $nouveaute_html->getElementById("atfResults");
	$children = $results_div->children();
	
	foreach ($children as $child){
		
		$img_div = $child->find('div[class=image imageContainer]',0);
		$img_src = $img_div->find('img',0)->src;
		
		$infos_h3 = $child->find('h3[class=newaps]',0);
		$infos = array(
			titre => $infos_h3->find('span[class=lrg bold]',0)->plaintext,
			auteur => $infos_h3->find('span[class=med reg]',0)->plaintext,
			image => $img_src
		);
		array_push($livres,$infos);
	}
	
	echo json_encode($livres);
	
	
}

?>