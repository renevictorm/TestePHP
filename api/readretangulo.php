<?php
	
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	// Includes
	include_once '../config/database.php';
	include_once '../domain/Retangulo.php';
 
	// Instanciando o banco de dados
	$database = new Database();
	$db = $database->getConnection();
 
	// Inicializando Retangulo
	$retangulo = new Retangulo($db);
 
	// Query
	$stmt = $retangulo->read();
	$num = $stmt->rowCount();
 
	// Verificando se há algum resultado
	if($num>0){
 
		// retangulos array
		$retangulos_arr=array();
		$retangulos_arr["retangulos"]=array();
 
		// recuperando o conteúdo 
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			
			extract($row);
 
			$product_item=array(
				"x1" => $x1,
				"y1" => $y1,
				"altura" => $altura,
				"largura" => $largura
			);
 
			array_push($retangulos_arr["retangulos"], $product_item);
		}
 
		// Respondendo 200 OK
		http_response_code(200);
 
		// Exibindo os resultados
		echo json_encode($retangulos_arr);
	}
 
	else{
 
		// Respondendo 404 Not found
		http_response_code(404);
 
		// Avisando do erro
		echo json_encode(
			array("message" => "No products found.")
		);
	}

?>