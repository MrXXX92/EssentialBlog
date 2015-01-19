<?php
	include "connection.php";
	include "function.php";
	
	if (isset($_GET['LikedArticleID'])) {
		// Parameter ist im Link definiert
		$LikedArticleID = $_GET['LikedArticleID'];
	}
	else{
		// Parameter ist im Link nicht definiert/ Default Wert
		$LikedArticleID = 'Speichern des Artikel-Likes fehlgeschlagen!';
		die();
	}
	SaveArticleLike($LikedArticleID);
	echo "<script type='text/javascript'>";; 
	echo "window.location.href = '../index.php#article".$LikedArticleID."';";
	echo "</script>";
?>