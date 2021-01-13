<?php
// database connection
include("../../config/database_handler.php");
//class Company
    class Company{

        private $database_handler;
        private $companyname;
        private $token_validity_time =15; //minutes

        public function __construct($database_handler_parameter_IN){
            
            $this->database_handler= $database_handler_parameter_IN;

        }
//Register Users
public function registerCompany( $companyName_IN, $description_IN, $telefonNummer_IN, $password_IN, $email_IN, $organisationsNummer_IN, $address_IN, $postnummer_IN){
    $return_object =new stdClass();

    
        if($this->isEmailTaken($companyName_IN)===false){

            $return = $this->insertCompanytoDatabase($companyName_IN, $description_IN, $telefonNummer_IN, $password_IN , $email_IN, $organisationsNummer_IN, $address_IN, $postnummer_IN);
            if($return !== false){

                $return_object->state ="Success";
                $return_object->user = $return;
            }else{
                $return_object->state = "ERROR";
                $return_object->message =" Something went wrong with register";
            }
            } else {
                $return_object->state = "ERROR";
                $return_object->message = "Email is taken";
            }



return json_encode($return_object);
}
//Insert user-data to database

private function insertCompanyToDatabase($companyName_param, $description_param, $telefonNummer_param, $password_param, $email_param, $organisationsNummer_param, $address_param, $postnummer_param){

    $query_string = "INSERT INTO companies (companyName, description, telefonNummer, password, email, organisationsNummer, address, postnummer) VALUES (:companyName,:description,:telefonNummer, :password, :email, :organisationsNummer, :address, :postnummer )";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $encrypted_password = md5($password_param);

        $statementHandler->bindParam(':companyName', $companyName_param);
        $statementHandler->bindParam(':description', $description_param);
        $statementHandler->bindParam(':telefonNummer', $telefonNummer_param);
        $statementHandler->bindParam(':email', $email_param);
        $statementHandler->bindParam(':password', $encrypted_password);
        $statementHandler->bindParam(':organisationsNummer', $organisationsNummer_param);
        $statementHandler->bindParam(':address', $address_param);
        $statementHandler->bindParam(':postnummer', $postnummer_param);

        $statementHandler->execute();

        $last_insert_company_id = $this->database_handler->lastInsertId();

        $query_string ="SELECT id, companyName, description, telefonNummer, password, email, oragnisationsNummer, address, postnummer FROM companies WHERE id=:last_company_id";
        $statementHandler= $this->database_handler->prepare($query_string);
        $statementHandler->bindParam(':last_company_id', $last_insert_company_id);
        $statementHandler->execute();

        return $statementHandler->fetch();

    }else{
        return false;
    }
}
/* // Watching if  username is taken
private function isUsernameTaken($username_param){

    $query_string = "SELECT COUNT(id) FROM users WHERE username=:username";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false){
        $statementHandler->bindParam(':username', $username_param);
        $statementHandler->execute();

        $numberOfUsernames= $statementHandler->fetch()[0];
        if($numberOfUsernames >0 ){
            return true;
        }else{
            return false;
        }

    }else{
        echo "Statmenthandles epic fail";
        die;
    }
} */

// Watching if email is taken
private function isEmailTaken($email_param){

    $query_string = "SELECT COUNT(id) FROM companies WHERE email=:email";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false){
        $statementHandler->bindParam(':email', $email_param);
        $statementHandler->execute();

        $numberOfUsers = $statementHandler->fetch()[0];

        if($numberOfUsers > 0){
            return true;
        }else{
            return false;
        }

    }else{
        echo "statmenthandler epic fail!";
        die;
    }

}

// Login company
public function loginCompany($email_parameter, $password_parameter) {

    $return_object= new stdClass();

    $query_string= "SELECT id, companyName,  email FROM companies WHERE email=:email_IN AND password=:password_IN";
    $statementHandler = $this->database_handler->prepare($query_string);
    
    if($statementHandler !== false){

        $password = md5($password_parameter);

        $statementHandler->bindParam(':email_IN', $email_parameter);
        $statementHandler->bindParam(':password_IN', $password);
      
        $statementHandler->execute();
        $return =  $statementHandler->fetch();

        if(!empty($return)){
            $this->email = $return['email'];
           
            $return_object->token=$this->getToken($return['id'], $return['email']);
            return json_encode($return_object);
           
            

        }else{
            header( 'Location: http://localhost/examensarbete/loginCompany.php?err=true' );
        }
    }else{
        echo "could not create a statmenthandler";
        die;
    }

}

// get token 
private function getToken($companyID, $email){

    $token = $this->checkToken($companyID);
    return $token;
    
}

// check token 
private function checkToken($companyID_IN){

    $query_string = "SELECT token, date_updated FROM companytokens WHERE company_id=:companyID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':companyID', $companyID_IN);
        $statementHandler->execute();
        $return =$statementHandler->fetch();


        if(!empty($return['token'])){
            //token finns

            $token_timestamp = $return['date_updated'];
            $diff= time()- $token_timestamp;

            if(($diff / 60) > $this->token_validity_time){

                $query_string= "DELETE FROM companytokens WHERE company_id=:companyID";
                $statementHandler = $this->database_handler->prepare($query_string);

                $statementHandler->bindParam('companyID', $companyID_IN);
                $statementHandler->execute();

                return $this->createToken($companyID_IN);
            }else{
                return $return['token'];
            }
        }else{
            return $this->createToken($companyID_IN);
        }

    }else{
        echo "could not create a statementhandler";
    }

}
// create token 
private function createToken($company_id_parameter){

    $uniqToken = md5($this->email.uniqid('', true).time());

    $query_string= "INSERT INTO companytokens (company_id, token, date_updated) VALUES (:companyid, :token, :current_time)";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $currentTime= time();
        $statementHandler->bindParam(':companyid', $company_id_parameter);
        $statementHandler->bindParam(':token', $uniqToken);
        $statementHandler->bindParam(':current_time', $currentTime, PDO::PARAM_INT);

        $statementHandler->execute();
      

        return $uniqToken;
    }else{
        return "could not create a statementhandler";
    }
}
// validate token 
public function validateToken($token){

    $query_string= "SELECT company_id, date_updated FROM companytokens WHERE token=:token";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':token', $token);
        $statementHandler->execute();

        $token_data= $statementHandler->fetch();

        if(!empty($token_data['date_updated'])){
            $diff= time() - $token_data['date_updated'];

            if(($diff / 60)< $this->token_validity_time) {
                $query_string = "UPDATE companytokens SET date_updated=:updated_date WHERE token=:token";
                $statementHandler = $this->database_handler->prepare($query_string);

                $updatedDate = time();
                $statementHandler->bindParam(':updated_date', $updatedDate, PDO::PARAM_INT);
                $statementHandler->bindParam(':token', $token);

                $statementHandler->execute();
                return true;
            } else {
                echo "session closed due to inactivity <br/>";
                return false;
            }
        }else{
            echo "could not create statementhandler";
            return false;
        }
    }else{
        echo "couldnt create statementhandler<br/>";
        return false;
    }
    return true;
}
// get user ID
public function getCompanyId($token)
{
    $query_string = "SELECT company_id FROM companytokens WHERE token=:token";
    $statementHandler = $this->database_handler->prepare($query_string);

    if ($statementHandler !== false) {

        $statementHandler->bindParam(":token", $token);
        $statementHandler->execute();

        $return = $statementHandler->fetch();

        if (!empty($return)) {
         $companyID =$return["company_id"];
     
            return $return;
           
        } else {
            return -1;
        }
    } else {
        echo "Couldn't create a statementhandler!";
    }
}
 
// get user DATA
public function getCompanyData($companyID) {
    
   
    $query_string = "SELECT id, companyName, description, telefonNummer, password, email, organisationsNummer, address, postnummer FROM companies WHERE ID=:companyID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $statementHandler->bindParam(":companyID", $companyID["company_id"]);
      
      
        $statementHandler->execute();

        $return = $statementHandler->fetch();
        $row = $return;
        
        if(!empty($return)) {
            
            
            return $return;
        } else {
            return false;
        }

    } else {
        echo "Couldn't create statement handler!";
    }

}
 public function updateCompanyProfile($companyName_param, $description_param, $telefonNummer_param, $password_param, $email_param, $organisationsNummer_param, $address_param, $postnummer_param, $companyID){
        
        $query_string = "UPDATE companies SET companyName=:companyName, description=:description, telefonNummer=:telefonNummer, password=:password, email=:email, organisationsNummer=:organisationsNummer, address=:address, postnummer=:postnummer WHERE id =:companyID";
       

        $statementHandler = $this->database_handler->prepare($query_string);
    
        if($statementHandler !== false) {
    
            $encrypted_password = md5($password_param);

            $statementHandler->bindParam(':companyID', $companyID);
            $statementHandler->bindParam(':companyName', $companyName_param);
        $statementHandler->bindParam(':description', $description_param);
        $statementHandler->bindParam(':telefonNummer', $telefonNummer_param);
        $statementHandler->bindParam(':email', $email_param);
        $statementHandler->bindParam(':password', $encrypted_password);
        $statementHandler->bindParam(':organisationsNummer', $organisationsNummer_param);
        $statementHandler->bindParam(':address', $address_param);
        $statementHandler->bindParam(':postnummer', $postnummer_param);

    
            $statementHandler->execute();
            return $statementHandler->fetch();
    
        }else{
            return false;
            echo "sorry we got some problem";
        }
    }
    
public function logoutCompany($companyID) {

    $query_string = "Delete FROM companytokens WHERE company_id=:companyID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $statementHandler->bindParam(":companyID", $companyID);
    
        $success = $statementHandler->execute();

        if($success === true) {
            header( 'Location: http://localhost/examensarbete/index.php' );
            
        } else {
            echo "Error!";
        }

    } else {
        echo "Could not create database statement!";
        die();
    }
} 
public function deleteCompany($companyID){
    $query_string = "Delete FROM companies WHERE id=:companyID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $statementHandler->bindParam(":companyID", $companyID);
    
        $success = $statementHandler->execute();

        if($success === true) {
            header( 'Location: http://localhost/examensarbete/index.php' );
            
        } else {
            echo "Error!";
        }

    } else {
        echo "Could not create database statement!";
        die();
    }
}






}
?>