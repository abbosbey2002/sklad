<?php


// require_once "./config/Bootstrap.php";
require_once  "GetApi.php";

class Category extends getAllTable{
    // set value
    public static $pdo;
    public  $id;
    public String $title;       
    public $created_at;
    // add categry
    public function creat_category($cat_id,  $title){
        // in this sql query
        $query = 'INSERT INTO category SET cat_id = :cat_id, title = :title';

        // clear data
        $title=$this->clear_data($title);
        $id=$this->clear_data($cat_id);

        $stmt=self::$pdo->prepare($query);
        $stmt->execute([
            "cat_id"=>$cat_id,
            "title"=>$title
        ]);

        if($stmt->rowCount()) {
        return ["message"=>"successfull"];
      }

    }   

    // update function
    public function edit_category($id,  $cat_id, $title,){
        // in this sql query
        $query = "UPDATE category SET cat_id=:cat_id, title = :title WHERE id=$id";

        // clear data
        $id=$this->clear_data($id);
        $title=$this->clear_data($title);

        $stmt=self::$pdo->prepare($query);
        $stmt->execute([
            "cat_id"=>$cat_id,
            "title"=>$title
        ]);

        if($stmt->rowCount()) {
            return ["message"=>"Successfull"];
      }

    }   

    

}