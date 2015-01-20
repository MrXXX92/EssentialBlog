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
		//Abfangen des order-Parameters aus Link und anschließendes Umwandeln in SQL-Query
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
		SELECT DATE_FORMAT (create_time,'%d.%m.%Y um %k:%i') FROM t_article
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
		SELECT comment_id, author, text, DATE_FORMAT (create_time,'%d.%m.%Y um %k:%i') as create_time, like_count
		FROM t_comment
		WHERE article_id=$article_id";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return $result;
	}
	
	//Ausgabe: Kategorien mit Anzahl der Beiträge anzeigen
	function GetCategorySum()
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
	
	//Ausgabe: Kategorien mit ID
	function GetCategorys()
	{
		$query ="
		SELECT t_category.category_id, t_category.title
		FROM t_category;";
		GetDBConnection();
		$result = mysql_query($query);
		CloseDBConnection();
		return $result;
	}
	
	//Speichert Artikel mit Atributen der ausgefüllten Feldern
	function SaveArticle()
	{
		$Title = $_POST['newTitle'];
		$Author = $_POST['newAuthor'];
		$Category = $_POST['newCategory'];
		$Text = $_POST['newText'];
		
		//Prüfung ob alle Parameter gefüllt sind
		if($Title == NULL OR $Author == NULL OR $Category == "0" OR $Text == NULL ){
			echo "<script type='text/javascript'>"; 
			echo "alert('Bitte alle Felder ausfuellen!');"; 
			echo "window.location.href = 'newArticle.php';";
			echo "</script>";
			die();
		}
		
		$query = "INSERT INTO `t_article` (`author`, `title`, `text`, `category_id`) VALUES ('".$Author."', '".$Title."', '".$Text."', '".$Category."')";
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
	
	//Speichert neue Kategorie
	function SaveCategory()
	{
		$Category = $_POST['newCategory'];
		//Prüfung ob alle Parameter gefüllt sind
		if($Category == NULL){
			echo "<script type='text/javascript'>"; 
			echo "alert('Bitte alle Felder ausfuellen!');"; 
			echo "window.location.href = 'newCategory.php';";
			echo "</script>";
			die();
		}
		$query = "INSERT INTO `t_category` (`title`) VALUES ('".$Category."')";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();
		
		if($insert) { 
			echo "<script type='text/javascript'>"; 
			echo "alert('Kategorie erfolgreich gespeichert!');"; 
			echo "window.location.href = 'newArticle.php';";
			echo "</script>";
		}
		else { 
			echo "<script type='text/javascript'>";
			echo "alert('Kategorie konnte nicht gespeichert werden!');";  
			echo "</script>";
		}		
	}	
	
	//Speichert den Kommentar zum dazugehörigen Artikel
	function SaveComment($ArticleID,$CommentText,$CommentAuthor)
	{	

		//Prüfung ob alle Parameter gefüllt sind
		if($ArticleID == NULL OR $CommentText == NULL OR $CommentAuthor == NULL ){
			echo "<script type='text/javascript'>"; 
			echo "alert('Bitte alle Felder ausfuellen!');"; 
			echo "window.location.href = '../index.php';";
			echo "</script>";
			die();
		}
		$query = "INSERT INTO t_comment (author, text, article_id) VALUES ('".$CommentAuthor."', '".$CommentText."', '".$ArticleID."')";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();	
	}
	
	//Erhöht den Like_Count des Artikels um 1
	function SaveArticleLike($article_id)
	{		
		$query = "UPDATE t_article SET like_count= like_count+1 WHERE article_id=".$article_id.";";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();	
	}		
	
	//Erhöht den Like_Count des Kommentars um 1
	function SaveCommentLike($comment_id)
	{		
		$query = "UPDATE t_comment SET like_count= like_count+1 WHERE comment_id=".$comment_id.";";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();	
	}
	
?>