<?php
	include "include/connection.php";
	include "include/function.php";
	include "include/linkparameter.php";
	$article_id=1;
	echo "article_id:    ".$article_id."<br>";
	echo "<hr>";
	echo "Titel:         ".GetArticleTitle($article_id)."<br>";
	echo "<hr>";
	echo "Autor:         ".GetArticleAuthor($article_id)."<br>";
	echo "<hr>";
	echo "Datum:         ".GetArticleDate($article_id)."<br>";
	echo "<hr>";
	echo "Kategorie:     ".GetArticleCategory($article_id)."<br>";
	echo "<hr>";
	echo "Likes:    ".GetArticleLikes($article_id)."<br>";
	echo "<hr>";
	echo "Text:<br>".GetArticleText($article_id)."<br>";
	echo "<hr>";
	echo "Kommentare: <br>";
	$comment_array = GetArticleComments(1);	
	while ($row = mysql_fetch_array($comment_array, MYSQL_NUM)) {
		$comment_author = $row[0];
		$comment_text = $row[1];
		$comment_time = $row[2];
		$comment_likes = $row[3];
		echo "Kommentarautor: ".$comment_author."<br>Kommentartext: ".$comment_text."<br>Erstellungszeit: ".$comment_time."<br>Kommentarlikes: ".$comment_likes."<br>";
		echo "<br>";
	}
	echo "<hr>";
	echo "Artikel_IDs die dem ?&articlecategory= Parameter entsprechen:<br>";
	$article_id_array = GetSelectedArticles($order,$articlecategory,$displayedarticles);
	while ($row = mysql_fetch_array($article_id_array, MYSQL_NUM)) {
		echo $row[0]."<br>";
	}
?>