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
        
public function createToken($companyID, $productID){

    $uniqToken = md5($this->email.uniqid('', true).time());
$endDate =  date('m/d/Y',strtotime('+30 days'));

    $query_string= "INSERT INTO premiumCompanies (companyID, productID, token, date_updated, endDate) VALUES (:companyid, :productid :token, :current_time, endDate)";
    $statementHandler= $this->database_handler->prepare($query_string);

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
        return "could not create a statementhandler";
    }
}

    
public function validatePremiumToken($companyID){

    $query_string= "SELECT companyID, date_updated, endDate, token , productID FROM premiumCompanies WHERE companyID=9  ";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':companyID', $companyID);
        $statementHandler->execute();
        
        $token_data= $statementHandler->fetch();
         

        $diff= time() - $token_data['date_updated'];
        print_r($diff);

        if(($diff / 60)< $this->token_validity_time) {
            echo "du har gilltig access";
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

