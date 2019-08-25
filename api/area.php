<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	// includes
	include_once '../config/database.php';
	include_once '../domain/Triangulo.php';
	include_once '../domain/Retangulo.php';
 
	// criando instancia do banco de dados
	$database = new Database();
	$db = $database->getConnection();
 
	// inicializando objetos
	$triangulo = new Triangulo($db);
	$retangulo = new Retangulo($db);
 
	// Query 
	$stmtT = $triangulo->read();
	$numT = $stmtT->rowCount();

	$stmtR = $retangulo->read();
	$numR = $stmtR->rowCount();

	// definindo area inicial como 0
	$area = 0;
 
	// Verificando se há algum resultado
	if($numT>0){

		// recuperando o conteúdo 
		while ($rowT = $stmtT->fetch(PDO::FETCH_ASSOC)){
		
			extract($rowT);
 
			$product_triangulo=array(
				"x1" => $x1,
				"y1" => $y1,
				"x2" => $x2,
				"y2" => $y2,
				"x3" => $x3,
				"y3" => $y3,
				"id" => $id
			);
		
			//Calculando a área do Triangulo 
			//A área será metade do módulo do determinante das coordenadas dos pontos
			$area= $area + ABS((((($x1 * $y2)+($y1 * $x3)+($x2 * $y3))-(($y1 * $x2)+($x1 * $y3)+($y2 * $x3)))/2));
		}
	}

	 
	if($numR>0){
 
		// recuperando o conteúdo 
		while ($rowR = $stmtR->fetch(PDO::FETCH_ASSOC)){
        
			extract($rowR);
 
			$product_retangulo=array(
				"x1" => $x1,
				"y1" => $y1,
				"altura" => $altura,
				"largura" => $largura,
				"id" => $id
			);
		
			//Calculando a área do Retangulo
			$area= $area + ABS($altura * $largura);
		}	
	}

	// Respondendo- 200 OK
	http_response_code(200);
 
	// Mostrando a área total
	echo json_encode($area);
 ?>