<?php 
require_once('../problem4_oop.php');

if (!empty($_POST)) {

  $data = $_POST;
  // var_dump($data);

  // validate at server side
  $isValid = true;
  $message = false;
  try {
    foreach ($data as $field => $value) {
      if ($field == 'weight' && $field == 'height' && $field == 'width' && $field == 'depth') {
        if ($value == '' || $value < 0 || !is_numeric($value)) {
          throw new Exception($field . " is invalid. It should be positive number");
        }
      }
      if ($field == 'type') {
        if ($value == '') {
          throw new Exception($field . " is required");
        }
      }
    }
  } catch (Exception $e) {
    header(http_response_code(400));
    print(json_encode(['message' => $e->getMessage()]));
    exit();
  }

  $product = null;
  switch ($data['type']) {
    case 'Fiddle':
      $product = new Fiddle($data['weight'], $data['width'], $data['height'], $data['depth']);
    break;

    case 'Dish':
      $product = new Dish($data['weight'], $data['width'], $data['height'], $data['depth']);
    break;
    case 'Spoon':
      $product = new Spoon($data['weight'], $data['width'], $data['height'], $data['depth']);
    break;

    default:
  }

  if ($product) {
    print(json_encode([
      'message' => 'add product success',
      'product' => $product->toString()
    ]));
  } else {
    header(http_response_code(400));
    print(json_encode(['message' => "Product is incorrect"]));
  }
}
