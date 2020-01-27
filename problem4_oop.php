<?php 
/**
 * candidate: Toan Nguyen
 * email: n.minhtoan
 */
/*
Hey Di Di Co ships 3 different products, a fiddle, a dish and a spoon.  The shipping department needs an object-oriented PHP program written that allows them to get and set the weight and dimensions of each product as well as create new products as needed. 

They also need a user interface in HTML and JS to interact with the PHP program. It needs to be simple and intuitive to learn as their warehouse manager Mr. Dumpty has recently had a great fall.

Item Measurements
Fiddle: 1 kg, 60cm x 20cm x 10cm
Dish: 0.1 kg, 30cm 30cm x 5cm
Spoon: 0.05kg, 15cm x 5cm x 2xm
*/

/**
 * Abstract class product
 */
abstract class Product {
  protected $type;
  protected $weight;
  protected $depth;
  protected $width;
  protected $height; 

  public function __construct($weight, $width, $height, $depth) {
    $this->setWeight($weight);
    $this->setDimensions($width, $height, $depth);
  }

  public function setWeight($weight) {
    $this->weight = $weight;
  }

  public function getWeight() {
    return $this->weight;
  }

  public function setDimensions($width, $height, $depth) {
    $this->width = $width;
    $this->height = $height;
    $this->depth = $depth;
  }

  public function getWidth() {
    return $this->width;
  }

  public function getHeight() {
    return $this->height;
  }

  public function getDepth() {
    return $this->depth;
  }

  public function toString() {
    return "{$this->type}: {$this->weight}kg, {$this->width}cm x {$this->height}cm x {$this->depth}cm";
  }
}

class Fiddle extends Product{
  public function __construct($weight, $width, $height, $depth) {
    $this->type = "Fiddle";
    parent::__construct($weight, $width, $height, $depth);
  }
}

class Dish extends Product{
  public function __construct($weight, $width, $height, $depth) {
    $this->type = "Dish";
    parent::__construct($weight, $width, $height, $depth);
  }
}

class Spoon extends Product{
  public function __construct($weight, $width, $height, $depth) {
    $this->type = "Spoon";
    parent::__construct($weight, $width, $height, $depth);
  }
}

