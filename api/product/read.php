<?php 
//required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//databese connection will be here

include_once '../config/database.php';
include_once '../object/product.php';

//instantiate database and product object
$database =  new Database();
$db = $database->getConnection();

$product = new Product($db);

//read products will be here

//query products
$stmt = $product->read();
$num = $stmt->rowCount();

//check if more than 0 record found 
if($num>0){
    
    //products array 
    $products_arr=array();
    $products_arr["records"]=array();

    //retrive our table contents
    //fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
       //extract row
       extract($row);
       
       $product_item = array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
       );

       array_push($products_arr["records"], $product_item);
    }

    //set reponse code - 200 OK
    http_response_code(200);

    //show products data in json format
    echo json_encode($products_arr);
} else {
    //set reponse code -404 not found 
    http_response_code(404);

    //tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
