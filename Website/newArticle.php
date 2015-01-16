<?php
		include "include/connection.php";
		include "include/function.php";
		include "include/linkparameter.php";
	if(isset($_POST['save'])){
		$Title = $_POST['newTitle'];
		$Author = $_POST['newAuthor'];
		$Category = $_POST['newCategory'];
		$Text = $_POST['newText'];
		
		$query = "INSERT INTO `t_article` (`author`, `title`, `text`, `category_id`) VALUES ('".$Author."', '".$Title."', '".$Text."', '2')";
		GetDBConnection();
			$insert = mysql_query($query);
		CloseDBConnection();
		
		if($insert) { 
			echo "<script>";
			echo "alert('Artikel erfolgreich gespeichert!');"; 
			echo "</script>";
		}
		else { 
			echo "<script>";
			echo "alert('Artikel konnte nicht gespeichert werden!');";  
			echo "</script>";
		} 
	}
?>
<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Essential Blog</title>
	<link rel="stylesheet" type="text/css" href="include/format.css">
  </head>
  <body>
    <h1><a href=/index.php>Essential Blog</a></h1>
	<!--horizontale Linie: -->
	<h2>neuen Artikel verfassen:</h2>
	
	<!--Teil der Seite mit den Artikeln -->
	<div id="newArticle">
		
		<!--neuen Artikel verfassen-->
		<div id="newArticleSection" >
			
			<table class= "articleBorder">
				<tr>
					<td>
						<!--Eingabe Titel-->
						<form method="post" action="newArticle.php"  >
						<input type="text" name="newTitle" class="newTitle" placeholder="Titel"></input>
					</td>
				</tr>
				
				<tr>
					<td>
						<!--Eingabe Author-->
						<input type="text" name="newAuthor" class="newAuthor" placeholder="Author"></input>
					</td>
				</tr>				
				
				<tr>
					<td>
						<!--Eingabe Kategorie-->
						<input type="text" name="newCategory" class="newCategory" placeholder="Kategorie"></input>
					</td>
				</tr>	
				<tr>
					<td>
						<!--Eingabe Text-->
						<textarea name="newText" rows="10" placeholder="Text" ></textarea>
					</td>
				</tr>
				<tr>
					<td><br>
							<input name="save" type="submit" submit="submit" value="Speichern" class="button">
						</form>
						<form action='/'>
							<input type='submit' value='Abbrechen'>
						</form>
					</td>
				</tr>
		</div>
	</div>	
  </body>
</html>