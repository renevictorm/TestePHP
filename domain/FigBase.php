<?php
class FigBase {
  private $x1;
  private $y1;

 
  //Construtor da classe
  public function __construct($x, $y) {
   setX($x);
   setY($y);
   // $this->x = $x;
   // $this->y = $y;
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
}
  ?>