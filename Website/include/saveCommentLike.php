<?php
	include "connection.php";
	include "function.php";
	
	if (isset($_GET['LikedCommentID'])) {
		// Parameter ist im Link definiert
		$LikedCommentID = $_GET['LikedCommentID'];
	}
	else{
		// Parameter ist im Link nicht definiert/ Default Wert
		$LikedCommentID = 'Speichern des Kommentar-Likes fehlgeschlagen!';
		die();
	}
	SaveCommentLike($LikedCommentID);
	echo "<script type='text/javascript'>";; 
	echo "window.location.href = '../index.php#article".$LikedCommentID."';";
	echo "</script>";
?>