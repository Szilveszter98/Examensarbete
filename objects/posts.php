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
    public function fetchLastPost() {
        $last_insert_post_id = $this->database_handler->lastInsertId();
        $query_string = "SELECT * FROM posts WHERE id=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":post_id", $last_insert_post_id);
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

        $query_string = "SELECT id, title, description, type, ort, date FROM posts ORDER BY date DESC";
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

        $query_string = "Delete FROM posts WHERE id=:postID ";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":postID", $postID);
        
            $success = $statementHandler->execute();

            if($success === true) {
                return $success;
              
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    }



    public function uploadPostImages(){
        $postID=$_POST['postID'];    
        print_r($postID);
            if (!empty($_FILES['file']['name'])){
            
                $file = count($_FILES['file']['name']);
        
                for($i=0;$i<$file;$i++){
                    $file_name = $_FILES['file']['name'][$i];
                    
            // post variabler för writepost
            $file_tmp_name = $_FILES['file']['tmp_name'][$i];
            $file_size = $_FILES['file']['size'][$i];
            $file_error = $_FILES['file']['error'][$i];
            $file_type = $_FILES['file']['type'][$i];
        
            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext)); 
        
            $allowed = array('jpg', 'jpeg', 'png', ' ');
        
            // lägger till file för posten samt gör en rad för ny post.
            if (in_array($file_actual_ext, $allowed)) {
                if ($file_error === 0) {
                    if ($file_size < 10000000) {
                        $file_new_name = uniqid('', true) . "." . $file_actual_ext;
                        $file_destination = '../../uploads/' . $file_new_name;
                        move_uploaded_file($file_tmp_name, $file_destination);
                    
                        
                    } else {
                        echo "Din fil är för stor!";
                    }
                } else {
                    echo "Det blev ett error vid uppladdningen av filen";
                }
            } else {
            echo "Du kan inte ladda upp filer av denna typ";
                }
            
                if (empty($_FILES['file']['name'])){
                $file_new_name = " ";
                }
        
                        $query_image = "INSERT INTO postimages (postID, file_name) VALUES (:postID, :file_new_name)";
                        $statementHandler = $this->database_handler->prepare($query_image);
                        $statementHandler->bindParam(':postID', $postID);
                        $statementHandler->bindParam(':file_new_name', $file_new_name);
                        $return = $statementHandler->execute();
                    
                       
                    
                }
            }
        }

        public function fetchPostImages($postID){

            $query_string = "SELECT file_name FROM postimages WHERE postID=:postID";
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
        // sql för att ta bort images
 public function deletePostImages($postID, $file_name){
    $query = "DELETE FROM postimages WHERE postID = :postID AND file_name = :file_name";
 $statementHandler =$this->database_handler->prepare($query);
 $statementHandler->bindParam(':postID', $postID);
 $statementHandler->bindParam(':file_name', $file_name);
 $return = $statementHandler->execute();
 
 
     if (!$return) {
         print_r($this->databasse_handler->errorInfo());
     } else {
     // header("Refresh:0");
     } 
 }
}


 ?>