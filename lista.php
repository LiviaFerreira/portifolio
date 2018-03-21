<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Lista_portifólio</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
	<?php
		include "cabecalho.inc";
		
		if(file_exists('cadastros.xml') ){
				$xml = simplexml_load_file("cadastros.xml");
				echo "<table>";
				
					echo "<tr>";
					
						echo "<th>Atividade</th>";
						echo "<th>Data</th>";
						echo "<th>Download</th>";
					
					
					echo "</tr>";
				
					foreach($xml->children() as $cadastro){
						
						echo"<tr>";
						
							echo "<td> <a href='$cadastro->link'/> $cadastro->nome </td>";
							echo "<td>" . $cadastro->data . " </td>";
							echo "<td> <a href='upload/". $cadastro->arquivo_novo ."'> ". $cadastro->arquivo_novo ." </a></td>";
									
						echo"</tr>";
						
					}
				
				echo "</table>";
		}else{
			echo"<p class='erro'>";
			echo"<h3>Cadastre suas informações no formulário </h3>";
			echo"</p>";
		}

	?>
	</body>
</html>

