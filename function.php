<?php

	//Ausgabe: Anzahl Artikel
	function GetCountArticle()
	{
		$query ="
		SELECT COUNT(article_id) FROM t_article";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return mysql_result($result, 0);
	}	

	//Ausgabe: Artikel Titel abhängig von Artikel_ID
	function GetArticleTitle($article_id)
	{
		$query ="
		SELECT t_article.title FROM t_article
		WHERE t_article.article_id='$article_id'";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return mysql_result($result, 0);
	}

	//Ausgabe: Artikel Autor abhängig von Artikel_ID
	function GetArticleAuthor($article_id)
	{
		$query ="
		SELECT t_article.author FROM t_article
		WHERE t_article.article_id='$article_id'";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return mysql_result($result, 0);
	}

	//Ausgabe: Artikel Text abhängig von Artikel_ID
	function GetArticleText($article_id)
	{
		$query ="
		SELECT t_article.text FROM t_article
		WHERE t_article.article_id='$article_id'";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return mysql_result($result, 0);
	}
	
	//Ausgabe: Artikel Zeit abhängig von Artikel_ID
	function GetArticleDate($article_id)
	{
		$query ="
		SELECT t_article.create_time FROM t_article
		WHERE t_article.article_id='$article_id'";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return mysql_result($result, 0);
	}
	
	//Ausgabe: Artikel Likes abhängig von Artikel_ID
	function GetArticleLikes($article_id)
	{
		$query ="
		SELECT t_article.like_count FROM t_article
		WHERE t_article.article_id='$article_id'";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return mysql_result($result, 0);
	}
	
	//Ausgabe: Artikel Kategorie abhängig von Artikel_ID
	function GetArticleCategory($article_id)
	{
		$query ="
		SELECT t_category.title FROM t_category
		INNER JOIN t_article ON t_article.category_id = t_category.category_id
		WHERE t_article.article_id='$article_id'";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return mysql_result($result, 0);
	}
	
	//Ausgabe: Kommentare zu Artikel abhängig von Artikel_ID
	function GetArticleComments($article_id)
	{
		$query ="
		SELECT author, text, create_time, like_count
		FROM t_comment
		WHERE article_id=$article_id";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return $result;
	}
	
	//Ausgabe: Kategorien mit Anzahl der Beiträge anzeigen
	function GetCategorys()
	{
		$query ="
		SELECT t_category.title, COUNT(*) AS Anzahl
		FROM t_category
		INNER JOIN t_article ON t_article.category_id = t_category.category_id
		GROUP BY t_category.category_id;";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return $result;
	}
	

?>