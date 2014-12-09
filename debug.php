<?php
	include "connection.php";
	include "function.php";
	$article_id=1;
	echo "article_id:    ".$article_id."<br>";
	echo "Titel:         ".GetArticleTitle($article_id)."<br>";
	echo "Autor:         ".GetArticleAuthor($article_id)."<br>";
	echo "Datum:         ".GetArticleDate($article_id)."<br>";
	echo "Kategorie:     ".GetArticleCategory($article_id)."<br>";
	echo "Likes:    ".GetArticleLikes($article_id)."<br>";
	echo "Text:<br>".GetArticleText($article_id)."<br>";
	$comment_array = GetArticleComments(1);
	
	
	while ($row = mysql_fetch_array($comment_array, MYSQL_NUM)) {
		$comment_author = $row[0];
		$comment_text = $row[1];
		$comment_likes = $row[2];
		echo $comment_author.$comment_text.$comment_likes."<br>";
	}
?>