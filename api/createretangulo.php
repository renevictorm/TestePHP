<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// incluindo database e Retangulo
include_once '../config/database.php';
include_once '../domain/Retangulo.php';
 
$database = new Database();
$db = $database->getConnection();
 
$retangulo = new Retangulo($db);
 
// Pegando os valores enviados via POST
$data = json_decode(file_get_contents("php://input"));
 
// Verificando se os valores estão vazios
if(
    (!empty($data->x1) || ($data->x1 == 0)) &&
    (!empty($data->y1) || ($data->y1 == 0)) &&
	!empty($data->altura) &&
    !empty($data->largura)){
 
    // Definindo o valores do Retangulo
	
	 $retangulo->setX($data->x1);
	 $retangulo->setY($data->y1);
	 $retangulo->setAltura($data->altura);
	 $retangulo->setLargura($data->largura);
	 	 
 
    // Criando o Retangulo
    if($retangulo->create()){
 
        // Respondendo 201 created
        http_response_code(201);
 
        // Avisando o que o Retangulo foi criado
        echo json_encode(array("message" => "Retangulo foi criado."));
    }
 
    else{
 		
		// Respondendo 503 service unavailable
        http_response_code(503);
 
        // Avisando o erro
        echo json_encode(array("message" => "Incapaz de salvar o Retangulo."));
        
    }
}
 
else{
 
    // Respondendo 400 bad request
    http_response_code(400);
 
    // Avisando o erro
    echo json_encode(array("message" => "Incapaz de criar o Retangulo algum campo vazio ou com valor 0."));
}
?>