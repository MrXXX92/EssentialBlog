<?php
	include "include/connection.php";
	include "include/function.php";
	include "include/linkparameter.php";
	
	echo "<!doctype html>\n";
	echo "<html>\n";
	echo "  <head>\n";
	echo "    <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">\n";
	echo "    <title>Essential Blog</title>\n";
	echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"include/format.css\">\n";
	
	//Einbindung der Javascript Datei
	echo "	<script language=\"javascript\" type=\"text/javascript\" src=\"clientFunctions.js\"></script>\n";
	echo "  </head>\n";
	echo "  <body>\n";
	echo "    <h1><a href=/index.php>Essential Blog</a></h1>\n";
	echo "	\n";
	echo "	<div id=\"header\">\n";
	echo "			<div id=\"new\">\n";
	echo "				<form action='/newarticle.php'>";
	echo "				    <input type='submit' value='Neuer Artikel'>";
	echo "				</form>";
	echo "		</div>\n";
	echo "		<!--Sortierungs-Auswahl: -->\n";
	echo "		<div id=\"sorter\">\n";
	echo "			<FORM NAME=\"nav\">\n";
	echo "			<SELECT NAME=\"SelectURL\" onChange=\"document.location.href=document.nav.SelectURL.options[document.nav.SelectURL.selectedIndex].value\">\n";
	echo "				<OPTION VALUE=''SELECTED>Bitte Sortierung w&aumlhlen\n";
	echo "				<OPTION VALUE=?&order=newestfirst&articlecategory=".$articlecategory."&displayedarticles=".$displayedarticles.">Neuester Artikel zuerst\n";
	echo "				<OPTION VALUE=?&order=oldestfirst&articlecategory=".$articlecategory."&displayedarticles=".$displayedarticles.">&Aumlltester Artikel zuerst\n";
	echo "				<OPTION VALUE=?&order=mostlikedfirst&articlecategory=".$articlecategory."&displayedarticles=".$displayedarticles.">Beliebtester Artikel zuerst\n";
	echo "			</SELECT>\n";
	echo "			</FORM>";
	echo "		</div>\n";
	echo "		</div>\n";
	echo "	<div style=\"clear:both\" />\n";
	echo "	<!--rechter Teil der Seite mit den Kategorien -->	\n";
	echo "	<div id=\"categorySection\">\n";
	echo "		Kategorien: <br>\n";
	echo "		<ul id=\"categories\">\n";
	
	//Anzeigen der Kategorien mit Hyperlink zur Kategoriefilterung und Anzeige der Artikel-Anzahl pro Kategorie
	$category_array = GetCategorys();
	while ($row = mysql_fetch_array($category_array, MYSQL_NUM)) {
		$category_name = $row[0];
		$category_sum= $row[1];
		echo "<li><a href=?&order=".$order."&articlecategory=".$category_name."&displayedarticles=".$displayedarticles.">".$category_name." (".$category_sum.")</a> </li>";
	}
	echo "		</ul>\n";
	echo "	</div>\n";
	echo "	\n";
	echo "	\n";
	
	
	//Anzeige Artikel mit Hilfe  von GetSelectedArticles Funktion
	$article_id_array = GetSelectedArticles($order,$articlecategory,$displayedarticles);
	while ($row = mysql_fetch_array($article_id_array, MYSQL_NUM)) {
		$article_id = $row[0];
		echo "	<!--linker Teil der Seite mit den Artikeln -->\n";
	echo "	<div id=\"articleSection\">\n";
		echo "		<!--Abschnitt f�r 1 Artikel + Kommentare -->\n";
		echo "		<table class= \"articleBorder\">\n";
		echo "			<tr>\n";
		echo "				<!--Artikel-->\n";
		echo "				<td class=\"article\">\n";
		echo "					<!--Titel + Header-->\n";
		echo "					<div class=\"articleTitle\">".GetArticleTitle($article_id)."</div>\n";
		echo "					<div class=\"articleHeader\">\n";
		echo "						geschrieben von: \n";
		echo "						<label for=\"author\">".GetArticleAuthor($article_id)."</label>\n";
		echo "						        \n";
		echo "						am: \n";
		echo "						<label for=\"date\">".GetArticleDate($article_id)."</label>\n";
		echo "					</div>\n";
		echo "					<br />\n";
		echo "					<!--Artikel-Text-->\n";
		echo "					<div class=\"articleText\">".GetArticleText($article_id)."</div>\n";
		echo "					<a href=\"\">Mehr...</a>\n";
		echo "					<div>\n";
		echo "						<img src=\"images\smiley.png\" alt=\"like\" height=\"30\" width=\"30\">\n";
		echo "						<br>\n";
		echo "						<label for=\"likes\">".GetArticleLikes($article_id)."</label>\n";
		echo "					</div>\n";
		echo "				</td>\n";
		echo "			</tr>\n";
		echo "			<tr>\n";
		echo "				<!--Kommentare eingeklappt-->\n";
		echo "				<td id=\"HideComment".$article_id."\" class=\"HideComments\">\n";
		echo "					<div onclick=\"hideComments('".$article_id."')\"><img src=\"images\Pfeil_unten.png\" alt=\"Kommentare-zuklappen\" height=\"15\" width=\"15\">Kommentare ausblenden</div>\n";
		echo "					<!--Likes Artikel-->\n";
		echo "				</td>\n";
		echo "			</tr>\n";
		echo "			\n";
		echo "			<tr>\n";
		echo "				<!--Kommentare ausgeklappt-->\n";
		echo "				<td id=\"ShowComment".$article_id."\" class=\"ShowComments\">\n";
		echo "					<div onclick=\"showComments('".$article_id."')\"><img src=\"images\Pfeil_rechts.png\" alt=\"Kommentare_aufklappen\" height=\"15\" width=\"15\">Kommentare anzeigen</div>\n";
		echo "			</tr>\n";
		echo "			\n";
		
		//Anzeige der zur Artikel_ID zugeh�rigen Kommentare
		echo "			<!--Liste der Kommentare-->";
		$comment_array = GetArticleComments($article_id);
		while ($row = mysql_fetch_array($comment_array, MYSQL_NUM)) {
			$comment_author = $row[0];
			$comment_text = $row[1];
			$comment_time = $row[2];
			$comment_likes = $row[3];
			
			//Alle Kommentare eines Artikels geh�ren zur gleichen Klasse um sie zusammen ein- und ausblenden zu k�nnen
			echo "		<tr class=\"comment".$article_id." comments\">\n";
			echo "			<td class=\"commentDetail\">\n";
			echo "				<!--Kommentar-Header-->\n";
			echo "				<div class=\"commentHeader\">\n";
			echo "					von: <label for=\"author\">".$comment_author."</label>    am: <label for=\"date\">".$comment_time."</label>\n";
			echo "				</div>\n";
			echo "				<br>\n";
			echo "				<!--Kommentar-Text-->\n";
			echo "				<div class=\"commentText\">".$comment_text."</div>\n";
			echo "				<!--Likes Kommentar-->\n";
			echo "				<div>\n";
			echo "					<img src=\"images\smiley.png\" alt=\"like\" height=\"30\" width=\"30\">\n";
			echo "					<br>\n";
			echo "					<label for=\"likes\">".$comment_likes."</label>\n";
			echo "				</div>\n";
			echo "			</td>\n";
			echo "		</tr>\n";
		}
		echo "			<!--neuen Kommentar eingeben-->\n";
		echo "			<tr>\n";
		echo "				<td class=\"newComment\">\n";
		echo "					<input type=\"text\" name=\"commentBox1\" placeholder=\"neuer Kommentar...\"></input>\n";
		echo "					<br>\n";
		echo "					<button type=\"button\">Speichern</button> \n";
		echo "				</td>\n";
		echo "			</tr>\n";
		echo "		</table>\n";
		echo "	</div>\n";
		echo " <p>\n";
	}	
	
	echo "	\n";	
	echo "	\n";
	echo "	<br>\n";
	echo "  </body>\n";
	echo "</html>";
?>