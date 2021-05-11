<!DOCTYPE html>
<html>
<head>
	<title>Avaliação</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="text-center mt-2">
	<?php include 'index_menu_tpl.php'; ?>
	<h1>Pesquisa de Satisfação</h1>
	<h2>Qual a probabilidade de você recomendar nosso serviço para um amigo?</h2>
	<form method="post" action="grava_nps.php">
	<div class="mt-3 mb-4">
		<label class="text-danger font-weight-bold">Nada provável</label>
		<?php
			for( $i = 1; $i <=10; $i++ ){
				echo " <input type='radio' id='nps$i' name='nota' value='$i'>\n 
				<label for='nps$i'>$i</label>\n";
			}
		?>
		<label class='text-success font-weight-bold'>Muito provável</label>
	</div>
	<h2>Por que você nos deu essa nota?</h2>
	<p>
	<textarea name='explicacao' rows='5' cols='63'></textarea>
	</p>
	<input type='submit' name='avaliacao' value='Avaliar'>
	<hr>
	</form>
</body>
</html>


