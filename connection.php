<?php
    $g_link = false;
	
    function GetDBConnection()
    {
		$db_hostname = "localhost";
		$db_user = "root";
		$db_password = "geheim";
		$db_database = "essentialblog";
		
        global $g_link;
        if( $g_link )
            return $g_link;
        $g_link = mysql_connect( $db_hostname, $db_user, $db_password) or die('Could not connect to server.' );
        mysql_select_db($db_database, $g_link) or die('Could not select database.');
        return $g_link;
    }
    
    function CloseDBConnection()
    {
        global $g_link;
        if( $g_link != false )
            mysql_close($g_link);
        $g_link = false;
    }
    
?>