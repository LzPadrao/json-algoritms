<?php 
	
	// recebe o conteudo do arquivo externo
	$arq = file_get_contents('../dados/atleta.json');
	/*
	//conteudo do arquivo atleta.json
	[
	{"IdReg":1,"Cod":232323,"Nome":"Luiz","Sexo":"M","Email":"luiz@teste.com","Peso":0.00,"Altura":0.00,"Funcao":"Meio_Campo","Posicao":"Volante"},
	{"IdReg":2,"Cod":434343,"Nome":"Alberto","Sexo":"M","Email":"alberto@teste.com","Peso":0.00,"Altura": 0.00,"Funcao":"Ataque","Posicao":"Ponta"},
	{"IdReg":3,"Cod":123456,"Nome":"Elio","Sexo":"M","Email":"Teste@teste","Peso":80,"Altura":1.72,"Funcao":"Goleiro","Posicao":"Goleiro"}
	]
	*/ 
	// transforma o JSON em objeto PHP e conto a quantidade count($key)
	$key = json_decode($arq);
	echo "Qt. Registros ".count($key)."<br><br>";
	// dados a serem gravados
	$dados  = array("IdReg"=>count($key)+1,"CodCota"=>1234,"Nome"=>"Ebinho","DtNasc"=>"1971-01-11","Sexo"=>"M","Email"=>"ebinho@seila.tes.br","Peso"=>85.00,"Altura"=>1.61,"Funcao"=>"Ataque","Posicao"=>"Ponta");
	
	// transformo o array DADOS em objeto
	$dados = (object) $dados;	
	echo "Dados que serão gravados<br>";
	var_dump($dados);
	
	echo "<br><br>Array aumentado de um item <br>";
	// adiciona o OBJETO ao fim do array
	array_push($key, $dados);
	var_dump($key);

	echo "<br><br>Voltou a ser JSON <br>";
	// retorno o objeto para o formato JSON
	$json = json_encode($key);
	var_dump($json);
	
	// Abro o arquivo em modo de re-escrita (w) e substituo os dados
	$abre = fopen('../dados/atleta.json','w');
	fwrite($abre,$json);

	// fecho o arquivo
	fclose($abre);

?>