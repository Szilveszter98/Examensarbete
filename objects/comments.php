<?php
// database connection
include("../../config/database_handler.php");

// class
class Comment {
    private $database_handler;
    private $commentID;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }



    public function createComment( $companyID, $comment, $name) {

        $query_string = "INSERT INTO companycomments ( companyID, comment, name) VALUES( :companyID, :comment, :name)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":companyID", $companyID);
            $statementHandler->bindParam(":comment", $comment);
            $statementHandler->bindParam(":name", $name);
           
            $success = $statementHandler->execute();

            if($success === true) {
               
               return $success;
            } else {
                echo "Error while trying to insert comment to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }
    public function fetchAllComments($companyID) {

        $query_string = "SELECT * FROM `companycomments` WHERE companyID=:companyID ORDER BY date_posted DESC";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            $statementHandler->bindParam(":companyID", $companyID);
            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }
    public function deleteCompanyComment($companyID, $commentID){
        $query = "DELETE FROM companycomments WHERE companyID = :companyID AND ID = :commentID";
     $statementHandler =$this->database_handler->prepare($query);
     $statementHandler->bindParam(':companyID', $companyID);
     $statementHandler->bindParam(':commentID', $commentID);
     $return = $statementHandler->execute();
     
     
         if (!$return) {
             print_r($this->databasse_handler->errorInfo());
         } else {
            
         } 
     }

}
