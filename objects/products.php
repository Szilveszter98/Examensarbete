<?php
// database connection
include("../../config/database_handler.php");

// class
class Product {
    private $database_handler;
    private $product_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    // fetch all products
public function fetchAllProducts() {

$query_string = "SELECT id, name, description, price, file_name FROM products";
$statementHandler = $this->database_handler->prepare($query_string);

if($statementHandler !== false) {

    $statementHandler->execute();
    return $statementHandler->fetchAll();

} else {
    echo "Could not create database statement!";
    die();
}

}
// fetch single product
public function fetchSingleProduct($productID) {

    $query_string = "SELECT * FROM products WHERE id=:product_id";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {
        
        $statementHandler->bindParam(":product_id", $productID);
        $statementHandler->execute();

        return $statementHandler->fetch();



    } else {
        echo "Could not create database statement!";
        die();
    }
}
}
?>