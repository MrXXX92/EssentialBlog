<?php
		include "include/connection.php";
		include "include/function.php";
		include "include/linkparameter.php";
	if(isset($_POST['saveArticle'])){
		SaveArticle();
	}

echo "<!doctype html>\n"; 
echo "<html>\n"; 
echo "  <head>\n"; 
echo "    <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">\n"; 
echo "    <title>Essential Blog</title>\n"; 
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"include/format.css\">\n"; 
echo "  </head>\n"; 
echo "  <body>\n"; 
echo "    <h1><a href=/index.php>Essential Blog</a></h1>\n"; 
echo "	<!--horizontale Linie: -->\n"; 
echo "	<h2>neuen Artikel verfassen:</h2>\n"; 
echo "	\n"; 
echo "	<!--Teil der Seite mit den Artikeln -->\n"; 
echo "	<div id=\"newArticle\">\n"; 
echo "		\n"; 
echo "		<!--neuen Artikel verfassen-->\n"; 
echo "		<div id=\"newArticleSection\" >\n"; 
echo "			\n"; 
echo "			<table class= \"articleBorder\">\n"; 
echo "				<tr>\n"; 
echo "					<td>\n"; 
echo "						<!--Eingabe Titel-->\n"; 
echo "						<form method=\"post\" action=\"newArticle.php\"  >\n"; 
echo "						<input type=\"text\" name=\"newTitle\" class=\"new\" placeholder=\"Titel\"></input>\n"; 
echo "					</td>\n"; 
echo "				</tr>\n"; 
echo "				\n"; 
echo "				<tr>\n"; 
echo "					<td>\n"; 
echo "						<!--Eingabe Author-->\n"; 
echo "						<input type=\"text\" name=\"newAuthor\" class=\"new\" placeholder=\"Author\"></input>\n"; 
echo "					</td>\n"; 
echo "				</tr>				\n"; 
echo "				\n"; 
echo "				<tr>\n"; 
echo "					<td>\n"; 
echo "						<!--Auswahl Kategorie-->\n"; 
echo "						<select name=\"newCategory\" class=\"dropdown\">\n"; 
echo "							<option name=\"dropdown[]\" value=\"0\" id=\"angabe0\">Kategorie...</option>   \n"; 
								// Anzeigen der Kategorien mit Hyperlink zur Kategoriefilterung und Anzeige der Artikel-Anzahl pro Kategorie
								$category_array = GetCategorys();
								while ($row = mysql_fetch_array($category_array, MYSQL_NUM)) {
									$category_id = $row[0];
									$category_name= $row[1];
									echo "<option name='dropdown[]' value='".$category_id."'>".$category_name."</option>"; 
								}
echo "						</select>";
echo "						\n"; 
echo "					</td>\n"; 
echo "				</tr>	\n"; 
echo "				<tr>\n"; 
echo "					<td>\n"; 
echo "						<!--Eingabe Text-->\n"; 
echo "						<textarea name=\"newText\" rows=\"10\" placeholder=\"Text\" ></textarea>\n"; 
echo "					</td>\n"; 
echo "				</tr>\n"; 
echo "				<tr>\n"; 
echo "					<td><br>\n"; 
echo "							<input name=\"saveArticle\" type=\"submit\" submit=\"submit\" value=\"Speichern\" class=\"button\">\n"; 
echo "						</form>\n"; 
echo "						<form action='/newCategory.php'>\n"; 
echo "							<input type='submit' value='Neue Kategorie'>\n"; 
echo "						</form>\n"; 
echo "						<form action='/'>\n"; 
echo "							<input type='submit' value='Abbrechen'>\n"; 
echo "						</form>\n"; 
echo "					</td>\n"; 
echo "				</tr>\n"; 
echo "		</div>\n"; 
echo "	</div>	\n"; 
echo "  </body>\n"; 
echo "</html>\n";
?>