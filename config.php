<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Untitled</title>
</head>

<body>
		<?php
		$cn = new mysqli('localhost', 'root', '', 'my_sugarfoody');
		/* check connection */
		if ($cn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		?>
</body>
</html>
