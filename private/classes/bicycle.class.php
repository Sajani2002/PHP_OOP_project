<?php

class Bicycle {
  public static $instance_count = 0;
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $gender;
  public $price;
  public $description;
  public $weight_kg;
  protected $condition_id;

  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];
  public const GENDERS = ['men', 'women', 'unisex'];

  protected const CONDITION_OPTIONS = [
    1=> 'Beat up',
    2=> 'Decent',
    3=> 'Good',
    4=> 'Great',
    5=> 'Like New'
  ];

  public function __construct($args=[]){
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $args['color'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->description = $args['description'] ?? '';
    $this->weight_kg = $args['price'] ?? 0.0;
    $this->condition_id = $args['condition_id'] ?? 3;
  }
  public static function create() {
    $class_name = get_called_class(); // must retrieve string first
    $obj = new $class_name;           // "new" expects a class or a string
    // $obj = new static              // self & static work here too!
    self::$instance_count++;
    return $obj;
  }

  public function weight_kg() {
    return number_format($this->weight_kg,2) . ' kg';
  }

  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return number_format($weight_lbs,2) . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  public function condition(){
    if($this->condition_id >0){
        return self::CONDITION_OPTIONS[$this->condition_id];
    }else{
        return "unknown";
    }
  }
}

?>