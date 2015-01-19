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

	//Ausgabe: Array mit Artikel_IDs entsprechend selektierter Anzahl, Kategorie und Sortierung
	function GetSelectedArticles($order,$articlecategory,$displayedarticles)
	{
		//Abfangen des order-Parameters aus Link und anschlie�endes Umwandeln in SQL-Query
		if ($order=="newestfirst") 
		{
			$order = "article_id DESC";
		} 
		elseif ($order=="oldestfirst") 
		{
			$order = "article_id ASC";
		} 
		elseif ($order=="mostlikedfirst")
		{
			$order = "like_count DESC";
		}
		else 
		{
			$order = "article_id DESC";
		}
		$query ="
		SELECT t_article.article_id FROM t_article
		INNER JOIN t_category ON t_category.category_id = t_article.category_id
		WHERE t_category.title LIKE '$articlecategory'
		ORDER BY $order
		LIMIT $displayedarticles";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return $result;
	}		

	//Ausgabe: Artikel Titel abh�ngig von Artikel_ID
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

	//Ausgabe: Artikel Autor abh�ngig von Artikel_ID
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

	//Ausgabe: Artikel Text abh�ngig von Artikel_ID
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
	
	//Ausgabe: Artikel Zeit abh�ngig von Artikel_ID
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
	
	//Ausgabe: Artikel Likes abh�ngig von Artikel_ID
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
	
	//Ausgabe: Artikel Kategorie abh�ngig von Artikel_ID
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
	
	//Ausgabe: Kommentare zu Artikel abh�ngig von Artikel_ID
	function GetArticleComments($article_id)
	{
		$query ="
		SELECT comment_id, author, text, create_time, like_count
		FROM t_comment
		WHERE article_id=$article_id";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return $result;
	}
	
	//Ausgabe: Kategorien mit Anzahl der Beitr�ge anzeigen
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
	
	//Speichert Artikel mit Atributen der ausgef�llten Feldern
	function SaveArticle()
	{
		$Title = $_POST['newTitle'];
		$Author = $_POST['newAuthor'];
		$Category = $_POST['newCategory'];
		$Text = $_POST['newText'];
		
		$query = "INSERT INTO `t_article` (`author`, `title`, `text`, `category_id`) VALUES ('".$Author."', '".$Title."', '".$Text."', '2')";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();
		
		if($insert) { 
			echo "<script type='text/javascript'>"; 
			echo "alert('Artikel erfolgreich gespeichert!');"; 
			echo "window.location.href = 'index.php';";
			echo "</script>";
		}
		else { 
			echo "<script type='text/javascript'>";
			echo "alert('Artikel konnte nicht gespeichert werden!');";  
			echo "</script>";
		}		
	}	
	
	//Speichert den Kommentar zum dazugeh�rigen Artikel
	function SaveComment($ArticleID,$CommentText,$CommentAuthor)
	{		
		$query = "INSERT INTO t_comment (author, text, article_id) VALUES ('".$CommentAuthor."', '".$CommentText."', '".$ArticleID."')";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();	
	}
	
	//Erh�ht den Like_Count des Artikels um 1
	function SaveArticleLike($article_id)
	{		
		$query = "UPDATE t_article SET like_count= like_count+1 WHERE article_id=".$article_id.";";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();	
	}		
	
	//Erh�ht den Like_Count des Kommentars um 1
	function SaveCommentLike($comment_id)
	{		
		$query = "UPDATE t_comment SET like_count= like_count+1 WHERE comment_id=".$comment_id.";";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();	
	}
	
?>