<?php


	class Triangulo{
		  private $conn;
		  private $table_name = "triangulos";
  
		  private $x1;
		  private $y1;
		  private $x2;
		  private $y2;
		  private $x3;
		  private $y3;
		  
 
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
  
		  public function setX2($x2) {
			$this->x2 = $x2;
		  }
 
		  public function setY2($y2) {
			$this->y2 = $y2;
		  }
  
		  public function setX3($x3) {
			$this->x3 = $x3;
		  }
 
		  public function setY3($y3) {
			$this->y3 = $y3;
		  }
     
		  public function getX2() {
			return $this->x2;
		  }
 
		  public function getY2() {
			 return $this->y2;
		  }
  
		   public function getX3() {
			return $this->x3;
		  }
 
		  public function getY3() {
			 return $this->y3;
		  }
  

     
		  function read(){
 
				// select all query
				$query ="SELECT p.x1, p.y1, p.x2, p.y2, p.x3, p.y3
						FROM " . $this->table_name . " p";
	 
				// prepare query statement
				$stmt = $this->conn->prepare($query);
	 
				// execute query
				$stmt->execute();
	 
				return $stmt;
		  }
   
		  function create(){
 
			// Query
			$query = "INSERT INTO
						" . $this->table_name . "
					SET
						x1=:x1, y1=:y1, x2=:x2, y2=:y2, x3=:x3, y3=:y3";
 
			// Preparando query statement
			$stmt = $this->conn->prepare($query);
 
			// Limpando
			$this->x1=htmlspecialchars(strip_tags($this->x1));
			$this->y1=htmlspecialchars(strip_tags($this->y1));
			$this->x2=htmlspecialchars(strip_tags($this->x2));
			$this->y2=htmlspecialchars(strip_tags($this->y2));
			$this->x3=htmlspecialchars(strip_tags($this->x3));
			$this->y2=htmlspecialchars(strip_tags($this->y3));
			
 
			// Bind
			$stmt->bindParam(":x1", $this->x1);
			$stmt->bindParam(":y1", $this->y1);
			$stmt->bindParam(":x2", $this->x2);
			$stmt->bindParam(":y2", $this->y2);
			$stmt->bindParam(":x3", $this->x3);
			$stmt->bindParam(":y3", $this->y3);
			
 
			// Executando a query
			if($stmt->execute()){
				return true;
			}
 
			return false;
		  }
	}
?>