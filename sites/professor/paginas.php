<?php
	$result = mysql_query('SELECT * FROM paginas');
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}
?>