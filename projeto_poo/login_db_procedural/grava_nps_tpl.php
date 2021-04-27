<!DOCTYPE html>
<html>
<head>
	<title>Avaliado</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="text-center">
	<h1><?php echo $msg; ?></h1>
	<p><a class="text-dark" href="nps_tpl.php">Avaliar Novamente?</a></p>
	
	<?php echo "<p><a class='text-dark' href='agradecimento.php?nota=".$nota."'>Seguir</a></p>";?>
	
</body>
</html>