<?php

require_once "./config/Bootstrap.php";
require_once  "GetApi.php";

class Sklad extends getAllTable{
    public static $pdo;
    // public  $id;
    // public String $title;       
    // public String $descr;
    // public String $type;
    // public String $owner;
    // public $created_at;

  

    // insert sklad 

    public function creat_sklad($title, $descr, $type, $owner){
        // in this sql query
        $query = 'INSERT INTO sklad SET title = :title, descr = :descr, type = :type, owner = :owner';

        // clear data
        $title=$this->clear_data($title);
        $descr=$this->clear_data($descr);
        $type=$this->clear_data($type);
        $owner=$this->clear_data($owner);

        $stmt=self::$pdo->prepare($query);
        $stmt->execute([
            "title"=>$title,
            "descr"=>$descr,
            "type"=>$type,
            "owner"=>$owner
        ]);

        if($stmt->rowCount()) {
        return ["message"=>"successfull"];
      }

    }   

    // update function
    public function edit_sklad($id, $title, $descr, $type, $owner){
        // in this sql query
        $query = "UPDATE sklad SET title = :title, descr = :descr, type = :type, owner = :owner WHERE id=:id";

        // clear data
        $title=$this->clear_data($title);
        $descr=$this->clear_data($descr);
        $type=$this->clear_data($type);
        $owner=$this->clear_data($owner);

        $stmt=self::$pdo->prepare($query);
        $stmt->execute([
            "id"=>$id,
            "title"=>$title,
            "descr"=>$descr,
            "type"=>$type,
            "owner"=>$owner
        ]);

        if($stmt->rowCount()) {
            return ["message"=>"Successfull"];
      }

    }   
     

}