<?php

	// Parameter f�r Sortierung
	if (isset($_GET['order'])) {
		// Parameter ist im Link definiert
		$order = $_GET['order'];
	}else{
		// Parameter ist im Link nicht definiert/ Default Wert
		$order = 'DESC';
	}
	
	// Parameter f�r Anzahl der dargestellten Artikel
	if (isset($_GET['displayedarticles'])) {
		// Parameter ist im Link definiert
		$displayedarticles = $_GET['displayedarticles'];
	}else{
		// Parameter ist im Link nicht definiert/ Default Wert
		$displayedarticles = 10;
	}

	// Parameter f�r Artikelkategorie
	if (isset($_GET['articlecategory'])) {
		// Parameter ist im Link definiert
		$articlecategory = $_GET['articlecategory'];
	}else{
		// Parameter ist im Link nicht definiert/ Default Wert
		$articlecategory = "%";
	}
?>