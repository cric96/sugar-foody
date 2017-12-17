<?php
	$cn = new mysqli('localhost', 'root', '', 'my_sugarfoody');
	/* check connection */
	if ($cn->connect_error) {
	    die("Connection failed: " . $cn->connect_error);
	}
?>
