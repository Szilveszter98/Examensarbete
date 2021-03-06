<?php
// database connection
include("../../config/database_handler.php");
//class user
    class User{

        private $database_handler;
        private $username;
        private $token_validity_time =15; //minutes

        public function __construct($database_handler_parameter_IN){
            
            $this->database_handler= $database_handler_parameter_IN;

        }
//Register Users
public function registerUser( $firstname_IN, $lastname_IN, $username_IN,$password_IN, $email_IN){
    $return_object =new stdClass();

    if($this->isUsernameTaken($username_IN) === false){
        if($this->isEmailTaken($username_IN)===false){

            $return = $this->insertUsertoDatabase($firstname_IN, $lastname_IN, $username_IN,$password_IN, $email_IN);
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


}else{
    $return_object->state = "ERROR";
    $return_object->message = "Username is taken";
}
return json_encode($return_object);
}
//Insert user-data to database

private function insertUserToDatabase($firstname_param,$lastname_param,$username_param, $password_param, $email_param){

    $query_string = "INSERT INTO users (firstname, lastname, username, password, email) VALUES (:firstname,:lastname,:username, :password, :email)";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $encrypted_password = md5($password_param);

        $statementHandler->bindParam(':firstname', $firstname_param);
        $statementHandler->bindParam(':lastname', $lastname_param);
        $statementHandler->bindParam(':username', $username_param);
        $statementHandler->bindParam(':email', $email_param);
        $statementHandler->bindParam(':password', $encrypted_password);

        $statementHandler->execute();

        $last_insert_user_id = $this->database_handler->lastInsertId();

        $query_string ="SELECT id, username, email FROM users WHERE id=:last_user_id";
        $statementHandler= $this->database_handler->prepare($query_string);
        $statementHandler->bindParam(':last_user_id', $last_insert_user_id);
        $statementHandler->execute();

        return $statementHandler->fetch();

    }else{
        return false;
    }
}
// Watching if  username is taken
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
}


// Watching if email is taken
private function isEmailTaken($email_param){

    $query_string = "SELECT COUNT(id) FROM users WHERE email=:email";
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

// Login user
public function loginUser($username_parameter, $password_parameter) {

    $return_object= new stdClass();

    $query_string= "SELECT id, firstname,  username, email, role FROM users WHERE username=:username_IN AND password=:password_IN";
    $statementHandler = $this->database_handler->prepare($query_string);
    
    if($statementHandler !== false){

        $password = md5($password_parameter);

        $statementHandler->bindParam(':username_IN', $username_parameter);
        $statementHandler->bindParam(':password_IN', $password);
      
        $statementHandler->execute();
        $return =  $statementHandler->fetch();

        if(!empty($return)){
            $this->username = $return['username'];
           
            $return_object->token=$this->getToken($return['id'], $return['username']);
            return json_encode($return_object);
           
            

        }else{
            header( 'Location: http://localhost/examensarbete/v1/users/loginUser.php?err=true' );
           
            

        }
    }else{
        echo "could not create a statmenthandler";
        die;
    }

}

// get token 
private function getToken($userID, $username){

    $token = $this->checkToken($userID);
    return $token;
    
}

// check token 
private function checkToken($userID_IN){

    $query_string = "SELECT token, date_updated FROM tokens WHERE user_id=:userID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':userID', $userID_IN);
        $statementHandler->execute();
        $return =$statementHandler->fetch();


        if(!empty($return['token'])){
            //token finns

            $token_timestamp = $return['date_updated'];
            $diff= time()- $token_timestamp;

            if(($diff / 60) > $this->token_validity_time){

                $query_string= "DELETE FROM tokens WHERE user_id=:userID";
                $statementHandler = $this->database_handler->prepare($query_string);

                $statementHandler->bindParam('userID', $userID_IN);
                $statementHandler->execute();

                return $this->createToken($userID_IN);
            }else{
                return $return['token'];
            }
        }else{
            return $this->createToken($userID_IN);
        }

    }else{
        echo "could not create a statementhandler";
    }

}
// create token 
private function createToken($user_id_parameter){

    $uniqToken = md5($this->username.uniqid('', true).time());

    $query_string= "INSERT INTO tokens (user_id, token, date_updated) VALUES (:userid, :token, :current_time)";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $currentTime= time();
        $statementHandler->bindParam(':userid', $user_id_parameter);
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

    $query_string= "SELECT user_id, date_updated FROM tokens WHERE token=:token";
    $statementHandler= $this->database_handler->prepare($query_string);

    if($statementHandler !== false){

        $statementHandler->bindParam(':token', $token);
        $statementHandler->execute();

        $token_data= $statementHandler->fetch();

        if(!empty($token_data['date_updated'])){
            $diff= time() - $token_data['date_updated'];

            if(($diff / 60)< $this->token_validity_time) {
                $query_string = "UPDATE tokens SET date_updated=:updated_date WHERE token=:token";
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
public function getUserId($token)
{
    $query_string = "SELECT user_id FROM tokens WHERE token=:token";
    $statementHandler = $this->database_handler->prepare($query_string);

    if ($statementHandler !== false) {

        $statementHandler->bindParam(":token", $token);
        $statementHandler->execute();

        $return = $statementHandler->fetch();

        if (!empty($return)) {
         $userID =$return["user_id"];
      
            return $return;
           
        } else {
            return -1;
        }
    } else {
        echo "Couldn't create a statementhandler!";
    }
}
 
// get user DATA
public function getUserData($userID) {
    
    
    $query_string = "SELECT id, firstname, lastname, username, email, role FROM users WHERE id=:userID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $statementHandler->bindParam(":userID", $userID["user_id"]);
      
      
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
// fetch user data
public function fetchUserData($userID) {
    
    
    $query_string = "SELECT id, firstname, lastname, username, email, role FROM users WHERE id=:userID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $statementHandler->bindParam(":userID", $userID);
      
      
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
//update user profile
public function updateUserProfile($firstname_param,$lastname_param,$username_param, $password_param, $email_param, $userID){

        $query_string = "UPDATE users SET firstname=:firstname, lastname=:lastname, username=:username, password=:password, email=:email WHERE id=:userID";
       

        $statementHandler = $this->database_handler->prepare($query_string);
    
        if($statementHandler !== false) {
    
            $encrypted_password = md5($password_param);
            $statementHandler->bindParam(':userID', $userID);
            $statementHandler->bindParam(':firstname', $firstname_param);
            $statementHandler->bindParam(':lastname', $lastname_param);
            $statementHandler->bindParam(':username', $username_param);
            $statementHandler->bindParam(':email', $email_param);
            $statementHandler->bindParam(':password', $encrypted_password);
    
            $statementHandler->execute();
            return $statementHandler->fetch();
    
        }else{
            return false;
            echo "sorry we got some problem";
        }
    }
    // log out user
public function logoutUser($userID) {

    $query_string = "Delete FROM tokens WHERE user_id=:userID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $statementHandler->bindParam(":userID", $userID);
    
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
//delete user
public function deleteUser($userID){
    $query_string = "Delete FROM users WHERE id=:userID";
    $statementHandler = $this->database_handler->prepare($query_string);

    if($statementHandler !== false) {

        $statementHandler->bindParam(":userID", $userID);
    
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