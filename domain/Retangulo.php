<?php

	class Retangulo  {
		  private $conn;
		  private $table_name = "retangulos";
  
		  private $x1;
		  private $y1;
		  private $largura;
		  private $altura;

 
		  //Construtor da classe
		  public function __construct($db){
			$this->conn = $db;
		  } 
 
		  public function setX($x) {
			$this->x1 = $x;
		  }
 
		  public function setY($y) {
			$this->y1 = $y;
		  }
 
		  public function getX() {
			return $this->x1;
		  }
 
		  public function getY() {
			return $this->y1;
		  }
 
		  public function setLargura($largura) {
			 $this->largura = $largura;
		  }
 
		  public function setAltura($altura) {
			$this->altura = $altura;
		  }
 
		  public function getAltura() {
			return $this->altura;
		  }
 
		  public function getLargura() {
			return $this->largura;
		  }
  
		  public function area() {
			return $this->largura * $this->altura;
		  }
  
		 
  
		  function read(){
 
				// Query
				$query ="SELECT	p.x1, p.y1, p.altura, p.largura
						FROM " . $this->table_name . " p";
	 
				// Preparando query statement
				$stmt = $this->conn->prepare($query);
	 
				// Executando query
				$stmt->execute();
	 
				return $stmt;
		  }
  
		  function create(){
 
			// query to insert record
			$query ="INSERT INTO " . $this->table_name . "
					SET	x1=:x1, y1=:y1, altura=:altura, largura=:largura";
 
			// Preparando query statement
			$stmt = $this->conn->prepare($query);
 
			// Limpando
			$this->x1=htmlspecialchars(strip_tags($this->x1));
			$this->y1=htmlspecialchars(strip_tags($this->y1));
			$this->altura=htmlspecialchars(strip_tags($this->altura));
			$this->largura=htmlspecialchars(strip_tags($this->largura));
 			
 
			// Bind 
			$stmt->bindParam(":x1", $this->x1);
			$stmt->bindParam(":y1", $this->y1);
			$stmt->bindParam(":altura", $this->altura);
			$stmt->bindParam(":largura", $this->largura);
 			
 
			// Executando query
			if($stmt->execute()){
				return true;
			}
 
			return false;
           }
	}
?>