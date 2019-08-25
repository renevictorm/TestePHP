<?php
	
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	// Includes
	include_once '../config/database.php';
	include_once '../domain/Triangulo.php';
 
	// Instanciando o banco de dados
	$database = new Database();
	$db = $database->getConnection();
 
	// Inicializando Triangulo
	$triangulo = new Triangulo($db);
 
	// Query
	$stmt = $triangulo->read();
	$num = $stmt->rowCount();
 
	// Verificando se há algum resultado
	if($num>0){
 
		// triangulos array
		$triangulos_arr=array();
		$triangulos_arr["triangulos"]=array();
		
		// recuperando o conteúdo 
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			
			extract($row);
 
			$product_item=array(
				"x1" => $x1,
				"y1" => $y1,
				"x2" => $x2,
				"y2" => $y2,
				"x3" => $x3,
				"y3" => $y3
			);
 
			array_push($triangulos_arr["triangulos"], $product_item);
		}
 
		// Respondendo 200 OK
		http_response_code(200);
 
		// Exibindo resultados
		echo json_encode($triangulos_arr);
	}
 
	else{
 
		// Respondendo 404 Not found
		http_response_code(404);
 
		// Avisando do Erro
		echo json_encode(
			array("message" => "No products found.")
		);
	}
?>