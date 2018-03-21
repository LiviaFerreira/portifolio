
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>WEB</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
	<?php
		include "cabecalho.inc";
	
		if(empty($_POST)){
			include "form.inc";
		}
		else{
			
			include "cadastro.php";
			
			header("Location:index.php");
		}
	?>
	</body>
</html>
