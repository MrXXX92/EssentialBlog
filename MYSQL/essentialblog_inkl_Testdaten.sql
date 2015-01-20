-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: essentialblog
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `t_article`
--

DROP TABLE IF EXISTS `t_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` mediumtext NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`),
  KEY `category_id_idx` (`category_id`),
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `t_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_article`
--

LOCK TABLES `t_article` WRITE;
/*!40000 ALTER TABLE `t_article` DISABLE KEYS */;
INSERT INTO `t_article` VALUES (1,'Kirsten','mein erster Tag in Asien','Hallo liebe Leute, \nich schreibe hiermit meinen ersten Eintrag zu meiner Asien-Reise. Ich bin immer noch super aufgeregt, freue mich aber, da&szlig das Abendteuer endlich losgeht.\nAber eins nach dem anderen: Ich konnte nat&uumlrlich &uumlberhaupt nich schlafen und habe gewartet, bis ich endlich zum Flughafen fahren konnte. Da hat alles super funktioniert und der Flug war zwar lang aber ok. Ich hatte einen netten Briten neben mir sitzen, der mir allerlei aus seinem Leben erz&aumlhlt hat. Seine beste Freundin ist wohl nach Japan ausgewandert und die wollte er besuchen. \nAber zur&uumlck zu mir :P am Ziel-Flughafen konnte ich mir dann erstmal die Beine vertreten, weil es ewig gedauert hat, bis wir das Gep&aumlck bekommen haben. Erst dachte ich schon, meine Koffer w&aumlren weg (*schluchz*), gaaaaaanz am Ende kamen sie dann aber doch aufs Band.  \nTja dann mu&szligte ich mich erstmal durch Shanghai k&aumlmpfen und meine Absteige finden. das war gar nicht so einfach. Es sind einfach sau viele Leute da! War mir ja eigentlich auch vorher klar, dann aber doch sehr eindrucksvoll. Also die ganze Stadt an sich einfach, naja im Hostel angekommen habe ich mich kurz frisch gemacht und dann wieder ins Get&uumlmmel gest&uumlrzt: Ich war in Parks und habe die Innenstadt einfach mal so erkundet. Morgen kommt dann auch meine Travel-Partnerin aus Brasilien an, mit der einige Aktivit&aumlten geplant sind. Ich bin gerade aber erstmal einfach nur m&uumlde und schlie&szlige den Tag ab.\n\nLiebe Gr&uuml&szlige nach Deutschland! La&szligt mal was von euch h&oumlren ;)\nKirsten','2015-01-20 18:48:47',2,11),(2,'Johannes ','Klausurenphase -.-','Boaah wie mich diese BWL-Themen ankotzen. -.-\nDas meiste davon intere&szligiert mich nich und ich werds wahrscheinlich eh nie wieder brauchen... Br&uumlte gerade &uumlber Kosten und Leistungsrechnung und w&uumlrde am liebsten alles hinschmei&szligen. Wer denkt sich so einen Quatsch aus? Immer diese 10 Mio Methoden und Prinzipien f&uumlr alles...\nWie l&aumlufts bei euch?','2015-01-20 18:48:47',3,4),(4,'Henning','Bachelorarbeit','Wi&szligt ihr schon, wor&uumlber ihr schreibt? Ich zermater mir schon seit ner Weile den Kopf,  hab aber nich so wirklich nen Plan. Also ich w&uumlrde gerne was mit Datenbanken machen, weil ich in dem Umfeld auch recht fit bin, wei&szlig aber nicht, was da m&oumlgliche Themen w&aumlren..','2015-01-20 18:48:47',3,3),(5,'Andrea','mein Albtraum-Tag','Also heute war echt ein beschi&szligener Tag, wie er im Buche steht: Zuerst war mein Wecker kaputt, dadurch hab ich verschlafen. Dann ist das Fr&uumlhst&uumlck auch weggefallen, weil das Brot geschimmelt hat. Auf der Stra&szlige hat mich jemand angerempelt und mir hei&szligen Kaffee &uumlber das Oberteil gesch&uumlttet.. Da hatte ich echt schon die Nase voll.\nAber als ob das nicht schon gereicht h&aumltte, ist die Zugstrecke ausgefallen und mein Auto ist auch nicht angesprungen.\nBin also total versp&aumltet mit einem sauteuren Taxi zur Arbeit und da lief auch &uumlberhaupt nichts rund heute..\n\nAlso manchmal denke ich, das Leben ha&szligt mich! -.-','2015-01-20 18:48:47',1,2),(6,'Thomas','Hello London!','Soo Leute, ich bin endlich in London angekommen.\nViele wi&szligen ja schon, da&szlig ich hier ein Ausland&szligemester mache und in diesem Blog gedenke ich euch auf dem neuesten Stand zu halten. ;)\nFirst things first, die Anreise habe ich gut &uumlberstanden. Der Billigflieger hat seinen Zweck erf&uumlllt und mich heil auf die Insel gebracht. Mein Gep&aumlck war sogar auch schnell verf&uumlgbar.. Als ich meine Bleibe dann gefunden hatte, bin ich erstmal raus, um die Gegend etwas zu erkunden. Bis jetzt ist alles cool hier, melde mich bald nochmal.\n\nBis dann\nEuer Thomas','2015-01-20 18:48:48',2,23),(7,'Alice','nervige Nachbarn','Gnaaargh!\nIch bin ja nicht so der Gewohnheits-Blogger aber heute mu&szlig es mal sein.. Meine Nachbarn treiben mich IN DEN WAHNSINN!!\nIch habe frei und versuche mich an einem gesunden Mix aus in der Sonne d&oumlsen und Lernen aber so geht das echt nicht. Erstmal haben sie einen total nervigen K&oumlter. Nichts gegen Tiere undso aber wenn man sich ein Tier anschafft, dann sollte man sich auch damit besch&aumlftigen und es artgerecht halten. Besagte T&oumlle befindet sich jedenfalls die meiste Zeit im Garten an einer Metallkette. Wenn er dann mal rumlaufen will, ra&szligelt die Kette nat&uumlrlich lautstark hinterher. Meistens steht er aber wahlweise entweder an der Grundst&uumlcksgrenze oder vor der Terra&szlige der Besitzer und bellt was das Zeug h&aumllt.. Soviel zur Ruhe in einem kleinen D&oumlrfchen wie Pundrel.. \nWenn er dann mal still ist, rennen entweder die Kinder der Nachbarn rum und streiten sich, ooooder die Eltern stehen im Garten und schreien sich an. Das mit dem L&aumlrm haben die echt drauf, das mu&szlig man ihnen la&szligen!\nAchso aber manchmal steigen sie auch auf Geruchsbel&aumlstigung um: Die beiden Eheleute sind pa&szligionierte Raucher und paffen an einem sch&oumlnen Sommerabend gerne mal so gef&uumlhlt ne Stange durch.. Nat&uumlrlich steht der Wind IMMER so, da&szlig der Qualm voll in meinen Garten zieht und ich mir wie ein unpa&szligendes R&aumlucherst&aumlbchen vorkomme..\nAlso heute hab ich echt die Fre&szlige dick von denen..\n','2015-01-20 18:48:48',1,3),(8,'Tobi','Racken rockt!','Moin Leutz,\nendlich ist es soweit: Wir sind auf dem Racken-Festival angekommen. Der erste Tag war schon Hammer! m/(>.<)m/\nDie Anreise war zwar recht lang, aber so als spa&szligige Truppe in nem Bulli geht das alles fit. Es gab au&szligerdem genug Erfrischungen gegen die W&aumlrme ;) Tja das Festivalgel&aumlnde is auf jeden Fall nich zu klein und wir haben einen starken Platz f&uumlr unsere Zelte gefunden. Die ersten Bands haben wir auch schon gesehen, zwischendurch gabs die obligatorischen Treffen auf dem Zeltplatz. Die Frauen hier sind auch auf jeden Fall nicht zu verachten^^ Alles sehr entspannte Leute..\nIch danke meinem Konto, das mich hergebracht hat und meiner Autokorrektur, die diesen Text lesbar machte :D\nHaut rein!\n','2015-01-20 18:48:48',2,23),(9,'Lucy','Puschi, das K&aumltzchen','Leuteeee ich habe ein K&aumltzchen!\nEin ganz echtes! Ich war mit meinen Eltern beim Bauern im Nachbarort und die hatten den Nachwuchs ihrer Katze abzugeben o_o\nIch habe jetzt ein kleines graues K&aumltzchen, sie hei&szligt Puschi. Sie hat ein sehr weiches Fell und ist generell einfach ganz puschelig  Ich bin &uumlbergl&uumlcklich. Die kleine Puschi war zwar am Anfang &aumlngstlich, aber das ist ja normal, schlie&szliglich hat man sie von ihrer Mama und ihrem gewohnten Umfeld getrennt. \nNach einiger Zeit fing sie aber doch an, durch unseren Garten zu tapsen. Sie ist einfach sooooooooooooooooooooo s&uuml&szlig! Sie schaut sich alles ganz genau an und l&auml&szligt sich gerne streicheln. Au&szligerdem folgt sie mir mittlerweile &uumlberall hin. Oh und ich hab mit einem langen Graswedel mit ihr gespielt und sie hat sich total gefreut. Hat einfach mitgemacht und war ganz ausgela&szligen.\nIch hoffe, sie vermi&szligt ihre Mama nicht mehr so..\nAchso und wir haben sie gef&uumlttert und nat&uumlrlich hat sie erstmal in die Ecke gepinkelt^^ Ich habe das aber weggemacht und wir werden sie jetzt langsam an das Katzenklo gew&oumlhnen. Das wird bestimmt super, denn Puschi ist ein sehr cleveres K&aumltzchen!\nIch freue mich jedenfalls tooootaaaaal und gehe jetzt wieder mit Puschi spielen.\nBis Bald,\neure Lucy','2015-01-20 18:48:48',1,6),(10,'Jo','meine neue Stelle','Soo Leute,\nich habe euch ja versprochen, da&szlig ich mich melde, sobald ich meine neue Stelle fernab der Heimat angetreten habe.\nAlso: Hier ist der Report ;)\nDie neue Wohnung ist super, davon habe ich ja schon berichtet. Aber jetzt hat die Arbeit auch angefangen. Also der Arbeitsweg ist noch ziemlich l&aumlstig, ich bin so eine gro&szlige Stadt mit dem ganzen Gedr&aumlnge einfach nicht gewohnt.. \nNaja das Geb&aumlude, in dem ich arbeite, schaut sehr modern aus und ist -  das mu&szlig ich in diesen Tagen besonders anerkennen - angenehm temperiert ;) Der Blick aus meinem B&uumlrofenster ist auch nicht zu verachten: Neben vielen H&aumluserd&aumlchern kann ich auch auf einen See schauen, was einen zuweilen sehr gut entspannt..\nAchso und was ist noch wichtig? Die Menschen nat&uumlrlich! Meine Kollegen und sogar die Cheffin sind alle nett und wirkten sehr hilfsbereit. Sie haben mich schnell eingewiesen und mir die wichtigsten Dinge (wo bekommt man den besten Kaffee etc.) beigebracht^^ Abends gehen wir auch manchmal noch kurz in die Stadt, um den Tag gemeinsam ausklingen zu la&szligen. Das macht echt Laune. Das einzige, was au&szliger dem Verkehr nicht so bombe war, war der grummelige Typ am Geb&aumlude-Empfang. Der hat echt immer nen finstren Blick drauf. Die anderen konnten mir auch noch nicht so genau sagen, was er gegen mich hat, aber vielleicht hilft ja Schokolade :D\n\nNunja, soviel zu meiner ersten Woche hier. Ich bin gespannt, was mich hier noch so erwartet! \nBis dann, euer Jo\n','2015-01-20 18:48:48',3,14),(12,'Susi','Reisetipps Balkonien','Leuteeee ich brauch euch! Verbringe den Urlaub auf Balkonien, das ist aber gerade schnarchlangweilig! Hat jemand Zeit und Bock, was zu unternehmen?? Ich bin offen f&uumlr (fast) alles! :D','2015-01-20 18:53:16',1,2);
/*!40000 ALTER TABLE `t_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_category`
--

DROP TABLE IF EXISTS `t_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_category`
--

LOCK TABLES `t_category` WRITE;
/*!40000 ALTER TABLE `t_category` DISABLE KEYS */;
INSERT INTO `t_category` VALUES (1,'Freizeit'),(2,'Reise'),(3,'Arbeit/ Uni');
/*!40000 ALTER TABLE `t_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_comment`
--

DROP TABLE IF EXISTS `t_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) NOT NULL,
  `text` text NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `article_id` int(11) NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `article_id_idx` (`article_id`),
  CONSTRAINT `article_id` FOREIGN KEY (`article_id`) REFERENCES `t_article` (`article_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_comment`
--

LOCK TABLES `t_comment` WRITE;
/*!40000 ALTER TABLE `t_comment` DISABLE KEYS */;
INSERT INTO `t_comment` VALUES (1,'Susi','Wow, das h&oumlrt sich ja echt aufregend an! Du mu&szligt mir ganz bald mal ein paar erste Fotos schicken ;) Pa&szlig auf dich auf!','2015-01-20 18:49:09',1,1),(2,'Karl','Geil, erstmal von nem Briten vollquatschen la&szligen :D gut, da&szlig du Englisch kannst^^ Viel Spa&szlig noch!','2015-01-20 18:49:09',1,1),(3,'Christina','Hey danke f&uumlr das Update! Ich w&uumlnsch dir auch noch viel Spa&szlig!','2015-01-20 18:49:09',1,0),(4,'Alex','Ich schlie&szlige mich an. Steig da auch null durch..','2015-01-20 18:49:09',2,1),(5,'Jonas','Ist doch alles gar nicht so wild ;) Wenn ihr wollt, k&oumlnnen wir uns mal zusammen zum lernen treffen.','2015-01-20 18:49:09',2,2),(6,'Johannes','Das w&aumlre nat&uumlrlich Bombe, wenn du das verstanden hast^^ Wann hastn Zeit?','2015-01-20 18:49:09',2,0),(7,'Alex','w&aumlre durchaus auch intere&szligiert ;)','2015-01-20 18:49:09',2,0),(8,'Jonas','Am Donnerstag z.B. so ab 18.30 bei mir?','2015-01-20 18:49:09',2,2),(9,'Johannes','Jo!','2015-01-20 18:49:09',2,0),(10,'Alex','Bin auch am Start!','2015-01-20 18:49:09',2,0),(11,'Jonas','Alles klar!','2015-01-20 18:49:09',2,0),(18,'Tim','Ich hab inner Firma n paar Vorschl&aumlge bekommen, h&oumlr dich doch da mal um?','2015-01-20 18:49:10',4,0),(19,'Klaus','oha, das h&oumlrt sich ja &uumlbel an.. Aber jetzt kanns ja nur noch be&szliger werden!','2015-01-20 18:49:10',5,0),(20,'Sabine','Och S&uuml&szlige, das tut mir ja Leid f&uumlr dich :/ Kopf hoch, morgen is M&aumldelsabend! :)','2015-01-20 18:49:10',5,2),(21,'Leonie','Oh man, ich f&uumlhle mit dir! :/','2015-01-20 18:49:10',5,0),(22,'Lynn','Hey das h&oumlrt sich doch gut an. Freue mich auf weitere News ;)','2015-01-20 18:49:10',6,0),(23,'John','Alter, wu&szligte ich ja gar nicht! Da mu&szlig ich dich da dr&uumlben aber mal besuchen kommen!','2015-01-20 18:49:10',6,1),(24,'Jenny','ach du kacke :/','2015-01-20 18:49:10',7,0),(25,'Hendrik','H&oumlrt sich mies an. Komm rum, wenn du willst, bei mir is alles ruhig ;)','2015-01-20 18:49:10',7,1),(26,'Alice','Danke f&uumlr das Angebot! Gerne morgen?','2015-01-20 18:49:10',7,1),(27,'Hendrik','Geht klaa ;)','2015-01-20 18:49:10',7,2),(28,'Lena','Boah voll geiel! N&aumlchstes mal bin ich auch wieder am Start!','2015-01-20 18:49:10',8,1),(29,'Mirko','Wenn deine Autokorrektur dich noch versteht, bist du nicht betrunken genug :D','2015-01-20 18:49:10',8,5),(30,'Paul','Viel Spa&szlig alter! Ich will n paar geile Geschichten h&oumlren, wenn du wieder da bist ;)','2015-01-20 18:49:10',8,2),(31,'Monika','Das h&oumlrt sich doch kla&szlige an! Viel Spa&szlig noch!','2015-01-20 18:49:10',10,0),(32,'Sascha','Ich w&uumlnsch dir auch viel Spa&szlig da! Sag mal bescheid, wann ich mal auf ein Bier rum kommen kann ;)','2015-01-20 18:49:10',10,1),(33,'Merle','Ooooh das h&oumlrt sich ja super an! Darf ich euch morgen besuchen kommen? :):)','2015-01-20 18:50:41',9,0),(34,'Lola','Oh ja, ich will auch!','2015-01-20 18:50:41',9,1),(35,'Lucy','Klaro, wir sind zuhause ;)','2015-01-20 18:50:41',9,3),(36,'Ralf','Oh man.. So viel Wind um eine Katze?! :D','2015-01-20 18:50:41',9,0),(37,'Marco','Sag mal nix, kleine K&aumltzchen sind sau s&uuml&szlig ja?!','2015-01-20 18:50:41',9,4),(38,'Ralf','Okee :D','2015-01-20 18:50:41',9,0),(39,'Karl','Hier, ich! ^^ Wie w&aumlrs mit gem&uumltlich einen Trinken und dann Park?','2015-01-20 18:54:47',12,3),(40,'Steffen','Oh ja, bei Karls Vorschlag w&aumlre ich auch dabei ;) Wo und wann?','2015-01-20 18:54:47',12,2),(41,'Jenny','Mich auch!','2015-01-20 18:54:47',12,1),(42,'Susi','Oke h&oumlrt sich gut an. 19 Uhr bei mir? Bringt mal einer bitte ein Kartenspiel mit. Taxi innen Park hab ich auch  grad orgnanisiert ;)','2015-01-20 18:54:47',12,3),(43,'Hanna','Wenn du willst, k&oumlnnen wir morgen an den See fahren :)','2015-01-20 18:54:47',12,1),(44,'Susi','Jaaa, das w&aumlre super!','2015-01-20 18:54:47',12,0);
/*!40000 ALTER TABLE `t_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'essentialblog'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-20 19:55:32
