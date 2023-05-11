<?php

require_once "config/Bootstrap.php";

class getAllTable{
    public static $pdo;

    // clear data
    public function clear_data($data)
    {
        return htmlspecialchars(strip_tags($data));
    }


    // get all table product by table name 
    public function getAll($table_name)
    {
        $query="SELECT * FROM $table_name";
        $stmt=self::$pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GetAllTable');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // remove product by it and table name  
    // not fulll
    public function destroy($id, $table_name)
    {
        $query="DELETE  FROM $table_name WHERE id=?";
        $stmt=self::$pdo->prepare($query);
        $stmt->execute([$id]);
        if($stmt->rowCount()) {
            return ["message"=>"Successfull"];
      }else{
        return ["message"=>"something went wrong"];
      }
    }

    // get single product
    public function get_single($id, $table_name)
    {
        $query="SELECT * FROM $table_name WHERE id=?";
        $stmt=self::$pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'GetAllTable');
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
}