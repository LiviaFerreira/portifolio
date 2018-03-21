<?php

	
	$nome = $_POST["nome"];
	$link = $_POST["link"];
	$data = $_POST["data"];
	// utilizamos o pacote de variavel files - direto no form
	if(isset($_FILES['arquivo'])){
					  date_default_timezone_set("Brazil/East"); 
						// arquivo nome da minha variavel no form. name vai direcionar o nome do arquivo que esta no meu computador
					  $ext = strtolower(substr($_FILES['arquivo']['name'],-4));//Pegando extensão do arquivo
						// depois denominamos o arquivo no caso $ext e com um novo tempo, para poder enviar duas atividades com o mesmo nome sem apagar o arquivo antigo
					  $arquivo_novo = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
					  // no dir o nome da on pasta que vou criar
					  $dir = 'upload/'; //Diretório para uploads
					  
						// aqui estou movendo o meu arquivo com tmp_name para a pasta que redirecionei 
					  move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$arquivo_novo); //Fazer upload do arquivo
					 
			}	
	
	if(!file_exists('cadastros.xml') ){
		
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
		
			<cadastros>
				<cadastro>
					<nome>$nome</nome>
					<link>$link</link>
					<data>$data</data>
					<arquivo_novo>$arquivo_novo</arquivo_novo>
				</cadastro>
			</cadastros>
			";
			file_put_contents("cadastros.xml", $xml);
	} 
	
	else{
			
			$xml = simplexml_load_file("cadastros.xml");
			$cadastro = $xml->addChild('cadastro');
			$cadastro -> addChild('nome', $nome);
			$cadastro -> addChild('link', $link);
			$cadastro -> addChild('data', $data);
			$cadastro -> addChild('arquivo_novo', $arquivo_novo);
			file_put_contents("cadastros.xml",$xml->asXML());
			
		}
			
		
		
	

	
	
?>

		
	
		