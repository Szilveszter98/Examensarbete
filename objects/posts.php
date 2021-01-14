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

 
}
 
    /* 

// update product 
    public function updatePost($data) {


        print_r($data);

        if(!empty($data['title'])) {
            $query_string = "UPDATE posts SET title=:title WHERE id=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":title", $data['title']);
            $statementHandler->bindParam(":post_id", $data['id']);

            $statementHandler->execute();
            
        }

        if(!empty($data['content'])) {
            $query_string = "UPDATE posts SET content=:content WHERE id=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":content", $data['content']);
            $statementHandler->bindParam(":post_id", $data['id']);

            $statementHandler->execute();
            
        }

        if(!empty($data['price'])) {
        $query_string = "UPDATE posts SET price=:price WHERE id=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":price", $data['price']);
            $statementHandler->bindParam(":post_id", $data['id']);

            $statementHandler->execute();
            
        }

        $query_string = "SELECT id, title, content, date_posted, user_id FROM posts WHERE id=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":post_id", $data['id']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());
         
        


    }
// delete product
    public function deletePost($postID) {

        $query_string = "Delete FROM posts WHERE id=:postID";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":postID", $postID);
        
            $success = $statementHandler->execute();

            if($success === true) {
                echo "$postID has been deleted!";
                echo "<a href='../../index.php>Back to the index</a>";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }

}
*/

 ?>