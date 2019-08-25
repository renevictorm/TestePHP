<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// incluindo database e Triangulo
include_once '../config/database.php';
include_once '../domain/Triangulo.php';
 
$database = new Database();
$db = $database->getConnection();
 
$triangulo = new Triangulo($db);
 
// Pegando os valores enviados via POST
$data = json_decode(file_get_contents("php://input"));
 
// Verificando se os valores estão vazios
if(
    (!empty($data->x1) ) &&
    (!empty($data->y1) ) &&
	(!empty($data->x2) ) &&
    (!empty($data->y2) ) &&
	(!empty($data->x3) ) &&
    (!empty($data->y3) )){
 
    // Definindo o valores do Triangulo	
	 $triangulo->setX($data->x1);
	 $triangulo->setY($data->y1);
	 $triangulo->setX2($data->x2);
	 $triangulo->setY2($data->y2);
	 $triangulo->setX3($data->x3);
	 $triangulo->setY3($data->y3);
	 
 
    // Criando Triangulo
    if($triangulo->create()){
 
        // Respondendo 201 created
        http_response_code(201);
 
       // Avisando o que o Triangulo foi criado
        echo json_encode(array("message" => "Triangulo foi criado."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // Respondendo 503 service unavailable
        http_response_code(503);
 
         // Avisando o erro
        echo json_encode(array("message" => "Nao foi possivel criar o Triangulo."));
    }
}
 
// tell the user data is incomplete
else{
 
    // Respondendo 400 bad request
    http_response_code(400);
 
    // Avisando o erro
    echo json_encode(array("message" => "Incapaz de criar o Triangulo algum campo vazio ou com valor 0."));
}
?>