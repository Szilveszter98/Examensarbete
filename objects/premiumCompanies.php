<?php
// database connection
include("../../config/database_handler.php");

//class Company
    class OneMonth{

        private $database_handler;
        private $companyID;
        
        private $token_validity_time =43200; //minutes

        public function __construct($database_handler_parameter_IN){
            
            $this->database_handler= $database_handler_parameter_IN;

        }

         
        //Create token for them who bought premium and insert companyID, productID, token, date and enddate 
        // Check if token is not empty(if empty, no access)
        
public function createToken($companyID, $productID, $companyEmail){
    print_r($productID);
    print_r($companyID);
    print_r($companyEmail);
   
    $uniqToken = md5(uniqid($companyEmail, true).time());
    $endDate =  date('Y/m/d',strtotime('+30 days'));

    $query_string= "INSERT INTO premiumcompanies (companyID, productID, token, endDate, date_updated ) VALUES (:companyid, :productid, :token, :endDate, :current_time)";
    $statementHandler=$this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $currentTime= time();
        
        $statementHandler->bindParam(':companyid', $companyID);
        $statementHandler->bindParam(':productid', $productID);
        $statementHandler->bindParam(':token', $uniqToken);
        $statementHandler->bindParam(':endDate', $endDate);
        $statementHandler->bindParam(':current_time', $currentTime, PDO::PARAM_INT);
        $statementHandler->execute();
      
       
        return $uniqToken;
     
    }else{
        return false;
    }
}
public function fetchSingleCompany($companyID) {

    $query_string = "SELECT * FROM premiumcompanies WHERE companyID=:company_id";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {
        
        $statementHandler->bindParam(":company_id", $companyID);
        $statementHandler->execute();

        return $statementHandler->fetch();



    } else {
        echo "Could not create database statement!";
        die();
    }
}
    
public function validatePremiumToken($companyID){

    $query_string= "SELECT companyID, date_updated, endDate, token , productID FROM premiumCompanies WHERE companyID=$companyID  ";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':companyID', $companyID);
        $statementHandler->execute();
        
        $token_data= $statementHandler->fetch();
         

        $diff= time() - $token_data['date_updated'];
        

        if(($diff / 60)< $this->token_validity_time) {
           
            return true;
          
        } else {
            
            return false;
            }
            
        }else{
            echo "error 131";
            return false;
        } 


}
    }

    class ThreeMonth{

        private $database_handler;
        private $companyID;
        
        private $token_validity_time =129600; //minutes

        public function __construct($database_handler_parameter_IN){
            
            $this->database_handler= $database_handler_parameter_IN;

        }

         
        //Create token for them who bought premium and insert companyID, productID, token, date and enddate 
        // Check if token is not empty(if empty, no access)
        
public function createToken($companyID, $productID, $companyEmail){
    print_r($productID);
    print_r($companyID);
    print_r($companyEmail);
   
    $uniqToken = md5(uniqid($companyEmail, true).time());
    $endDate =  date('Y/m/d',strtotime('+90 days'));

    $query_string= "INSERT INTO premiumcompanies (companyID, productID, token, endDate, date_updated ) VALUES (:companyid, :productid, :token, :endDate, :current_time)";
    $statementHandler=$this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $currentTime= time();
        
        $statementHandler->bindParam(':companyid', $companyID);
        $statementHandler->bindParam(':productid', $productID);
        $statementHandler->bindParam(':token', $uniqToken);
        $statementHandler->bindParam(':endDate', $endDate);
        $statementHandler->bindParam(':current_time', $currentTime, PDO::PARAM_INT);
        $statementHandler->execute();
      
       
        return $uniqToken;
     
    }else{
        return false;
    }
}
public function validatePremiumToken($companyID){

    $query_string= "SELECT companyID, date_updated, endDate, token , productID FROM premiumCompanies WHERE companyID=$companyID  ";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':companyID', $companyID);
        $statementHandler->execute();
        
        $token_data= $statementHandler->fetch();
         

        $diff= time() - $token_data['date_updated'];
        

        if(($diff / 60)< $this->token_validity_time) {
           
            return true;
          
        } else {
            
            return false;
            }
            
        }else{
            echo "error 131";
            return false;
        } 


}
    }

    class SixMonth{

        private $database_handler;
        private $companyID;
        
        private $token_validity_time =259200; //minutes

        public function __construct($database_handler_parameter_IN){
            
            $this->database_handler= $database_handler_parameter_IN;

        }

         
        //Create token for them who bought premium and insert companyID, productID, token, date and enddate 
        // Check if token is not empty(if empty, no access)
        
public function createToken($companyID, $productID, $companyEmail){
    print_r($productID);
    print_r($companyID);
    print_r($companyEmail);
   
    $uniqToken = md5(uniqid($companyEmail, true).time());
    $endDate =  date('Y/m/d',strtotime('+180 days'));

    $query_string= "INSERT INTO premiumcompanies (companyID, productID, token, endDate, date_updated ) VALUES (:companyid, :productid, :token, :endDate, :current_time)";
    $statementHandler=$this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $currentTime= time();
        
        $statementHandler->bindParam(':companyid', $companyID);
        $statementHandler->bindParam(':productid', $productID);
        $statementHandler->bindParam(':token', $uniqToken);
        $statementHandler->bindParam(':endDate', $endDate);
        $statementHandler->bindParam(':current_time', $currentTime, PDO::PARAM_INT);
        $statementHandler->execute();
      
       
        return $uniqToken;
     
    }else{
        return false;
    }
}
public function validatePremiumToken($companyID){

    $query_string= "SELECT companyID, date_updated, endDate, token , productID FROM premiumCompanies WHERE companyID=$companyID  ";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':companyID', $companyID);
        $statementHandler->execute();
        
        $token_data= $statementHandler->fetch();
         

        $diff= time() - $token_data['date_updated'];
        

        if(($diff / 60)< $this->token_validity_time) {
           
            return true;
          
        } else {
            
            return false;
            }
            
        }else{
            echo "error 131";
            return false;
        } 


}
    }