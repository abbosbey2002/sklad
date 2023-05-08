<?php

include_once "GetApi.php";

class Product extends getAllTable
{
    public static $pdo;
    // produt data
    public $id;
    public $title;
    public $descr;
    public $image;
    public $category_id;
    public $sklad_id;
    public $amount;
    public $price;      
    // add products
    public function add_product($data)
    {
        
            // clear data 
            $product=$data;
            $title=$product['title'];
            $descr=$product['descr'];
            $image=$product['image'];
            $category_id=$product['category_id'];
            $sklad_id=$product['sklad_id'];
            $amount=$product['amount'];
            $price=$product['price'];
            // end clear data
            // query   sql
            $query = "INSERT INTO prod    (title, descr, image, category_id, sklad_id, amount, price) VALUES 
            (:title, :descr, :image, :category_id, :sklad_id, :amount, :price)";
            // pdo connect database
            $stmt = self::$pdo->prepare($query);
            $stmt->execute([
                "title"=>$title,
                "descr"=>$descr,
                "image"=>$image,
                "category_id"=>$category_id,
                "sklad_id"=>$sklad_id,
                "amount"=>$amount,
                "price"=>$price,            
            ]);
    }
}


   
