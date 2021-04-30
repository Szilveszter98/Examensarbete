<?php
// database connection
include("../../config/database_handler.php");


    class FakturaData{

        private $database_handler;
        private $companyID;
      

        public function __construct($database_handler_parameter_IN){
            
            $this->database_handler= $database_handler_parameter_IN;

        }

        //register premiumcompany to database
 public function insertPremiumCompaniesToDatabase($companyID,$companyReferens, $productName, $productPrice, $companyAddress, $companyName, $productValidTime){
    
    $query_string = "INSERT INTO faktura (companyID, companyReferens, productName, amount, companyAddress, companyName, lastPayDate, productValidTime) VALUES (:companyID, :companyReferens, :productName, :amount, :companyAddress, :companyName, :lastPayDate, :productValidTime)";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $lastPayDate =  date('Y/m/d',strtotime('+30 days'));

        $statementHandler->bindParam(':companyID', $companyID);
        $statementHandler->bindParam(':companyReferens', $companyReferens);
        $statementHandler->bindParam(':productName', $productName);
        $statementHandler->bindParam(':amount', $productPrice);
        $statementHandler->bindParam(':companyAddress', $companyAddress);
        $statementHandler->bindParam(':companyName', $companyName);
        $statementHandler->bindParam(':lastPayDate', $lastPayDate);
        $statementHandler->bindParam(':productValidTime', $productValidTime);

        $statementHandler->execute();
        
        return $statementHandler->fetch();
       
  
        

    }else{
        return false;
    }
}
// fetch the faktura 
public function fetchFaktura($companyID) {

    $query_string = "SELECT * FROM faktura WHERE companyID=:companyID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {
        
        $statementHandler->bindParam(":companyID", $companyID);
        $statementHandler->execute();

        return $statementHandler->fetch();



    } else {
        echo "Could not create database statement!";
        die();
    }
}

    }