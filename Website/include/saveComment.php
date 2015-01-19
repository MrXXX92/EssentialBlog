<?php
	include "connection.php";
	include "function.php";
	
	
	if(isset($_POST['saveComment'])){
		$CommentAuthor = $_POST['commentauthor'];
		$CommentText = $_POST['commenttext'];
		if (isset($_GET['ArticleID'])) {
			// Parameter ist im Link definiert
			$ArticleID = $_GET['ArticleID'];
		}
		else{
			// Parameter ist im Link nicht definiert/ Default Wert
			$ArticleID = 'Speichern des Kommentars fehlgeschlagen!';
			die();
		}
		SaveComment($ArticleID,$CommentText,$CommentAuthor);
		echo "<script type='text/javascript'>";; 
		echo "window.location.href = '../index.php#article".$CommentID."';";
		echo "</script>";
	}
?>