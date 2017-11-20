<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>HOME</title>
</head>
<body>
  <?php
  include ('config.php');
  $query="SELECT * FROM UTENTE";
	$risultato=mysqli_query($cn,$query);
  echo $risultato;
  ?>
</body>
</html>
