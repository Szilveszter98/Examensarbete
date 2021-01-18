<?php
// database connection
include("../../config/database_handler.php");

// class
class Post {
    private $database_handler;
    private $post_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setPostId($post_id_IN) {

        $this->post_id = $post_id_IN;

    }

    // add post to database
    public function createPost($userID_paramm, $title_param, $description_param, $startDate_param, $type_param, $ort_param, $email_param, $telefonNummer_param) {

        $query_string = "INSERT INTO posts (title, description, startDate, type, ort, email, telefonNummer, userID) VALUES(:title, :description, :startDate, :type, :ort, :email, :telefonNummer, :userID )";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":title", $title_param);
            $statementHandler->bindParam(":description", $description_param);
            $statementHandler->bindParam(":startDate", $startDate_param);
            $statementHandler->bindParam(":type", $type_param);
            $statementHandler->bindParam(":ort", $ort_param);
            $statementHandler->bindParam(":email", $email_param);
            $statementHandler->bindParam(":telefonNummer", $telefonNummer_param);
            $statementHandler->bindParam(":userID", $userID_paramm);
            $success = $statementHandler->execute();

            if($success === true) {
                echo "New product has been created!";
                echo "<a href='../../index.php'> Back to the login site </a>";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }

    //fetch 1 product
    public function fetchSinglePost($postID) {

        $query_string = "SELECT * FROM posts WHERE id=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":post_id", $postID);
            $statementHandler->execute();

            return $statementHandler->fetch();



        } else {
            echo "Could not create database statement!";
            die();
        }
    }
    public function getPostWithUserID($userID) {

        $query_string = "SELECT * FROM posts WHERE userID=:userID";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":userID", $userID);
            $statementHandler->execute();

            return $statementHandler->fetchAll();



        } else {
            echo "Could not create database statement!";
            die();
        }
    }

  
// fetch all products
    public function fetchAllPosts() {

        $query_string = "SELECT id, title, description, type, ort, date FROM posts";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }

 

 
     

// update post
    public function updatePost( $title_param, $description_param, $startDate_param, $type_param, $ort_param, $email_param, $telefonNummer_param, $postID){
      

        $query_string = "UPDATE posts SET title=:title, description=:description, startDate=:startDate, type=:type, ort=:ort, email=:email, telefonNummer=:telefonNummer WHERE ID=:postID";
        

        $statementHandler = $this->database_handler->prepare($query_string);
  
        if($statementHandler !== false) {
            $statementHandler->bindParam(":title", $title_param);
            $statementHandler->bindParam(":description", $description_param);
            $statementHandler->bindParam(":startDate", $startDate_param);
            $statementHandler->bindParam(":type", $type_param);
            $statementHandler->bindParam(":ort", $ort_param);
            $statementHandler->bindParam(":email", $email_param);
            $statementHandler->bindParam(":telefonNummer", $telefonNummer_param);
            $statementHandler->bindParam(":postID", $postID);

            $statementHandler->execute();
            return $statementHandler->fetch();

    
        }else{
           
           return false;

           print_r("error");
        }
    }
    
        


    
    
// delete product
    public function deletePost($postID) {

        $query_string = "Delete FROM posts WHERE id=:postID";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":postID", $postID);
        
            $success = $statementHandler->execute();

            if($success === true) {
              header('location: http://localhost/examensarbete/v1/users/userProfile.php');
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }

}


 ?>