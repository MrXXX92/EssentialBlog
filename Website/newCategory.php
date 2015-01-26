<?php
		include "include/connection.php";
		include "include/function.php";
		include "include/linkparameter.php";
	if(isset($_POST['saveCategory'])){
		saveCategory();
	}

echo "<!doctype html>\n"; 
echo "<html>\n"; 
echo "  <head>\n"; 
echo "    <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">\n"; 
echo "    <title>Essential Blog</title>\n"; 
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"include/format.css\">\n"; 
echo "  </head>\n"; 
echo "  <body>\n"; 
echo "    <h1><a href=/index.php><img src='images/header.png'></a></h1><br><br><br>\n"; 
echo "	<!--horizontale Linie: -->\n"; 
echo "	<h2><br><br>neuen Kategorie erstellen:</h2>\n"; 
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
echo "						<form method=\"post\" action=\"newCategory.php\"  >\n"; 
echo "						<input type=\"text\" name=\"newCategory\" class=\"new\" placeholder=\"Kategoriename...\"></input>\n"; 
echo "					</td>\n"; 
echo "				</tr>\n"; 
echo "					<td>\n"; 
echo "							<input name=\"saveCategory\" type=\"submit\" submit=\"submit\" value=\"Speichern\" class=\"button\">\n"; 
echo "						</form>\n"; 
echo "						<form action='/newArticle.php'>\n"; 
echo "							<input type='submit' value='Abbrechen'>\n"; 
echo "						</form>\n"; 
echo "					</td>\n"; 
echo "				</tr>\n"; 
echo "		</div>\n"; 
echo "	</div>	\n"; 
echo "  </body>\n"; 
echo "</html>\n";
?>