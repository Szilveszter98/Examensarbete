<?php
// database connection
include("../../config/database_handler.php");

// class
class Comment {
    private $database_handler;
    private $comment_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setCommentId($comment_id_IN) {

        $this->comment_id = $comment_id_IN;

    }

    public function createComment($userID_param, $companyID_param, $comment_param, $postID_param) {

        $query_string = "INSERT INTO postcomments (userID, companiesID, comment, postID) VALUES(:userID, :companiesID, :comment, :postID)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            $statementHandler->bindParam(":userID", $userID_param);
            $statementHandler->bindParam(":companiesID", $companyID_param);
            $statementHandler->bindParam(":comment", $comment_param);
            $statementHandler->bindParam(":postID", $postID_param);
           
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
    public function fetchAllComments($postID) {

        $query_string = "SELECT * FROM `postcomments` WHERE postID=:postID ORDER BY date ASC";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            $statementHandler->bindParam(":postID", $postID);
            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }


}
