<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../object/product.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare product object
$product = new Product($db);

//get product id
$data = json_decode(file_get_contents("php://input"));

//set product id to be deleted
$product->id = $data->id;

//delete product
if($product->delete()){
    //set response code 200
    http_response_code(200);

    echo json_encode(array('message'=>'product was deleted'));

}else{
    http_response_code(503);
    echo json_encode(array("message" => "unable to delete product"));
}