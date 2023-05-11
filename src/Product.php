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
    public $import;

    
    // filter 
   
    public function edit_($data){
        echo $data->title;
        // sql query
        $query="UPDATE prod SET
        title = :title,
        descr = :descr,
        image = :image,
        category_id = :category_id,
        sklad_id = :sklad_id,
        amount = :amount,
        price = :price,
        import = :import,
        sell = :sell
        WHERE
        id = :id";
        // conn db
        $stm=self::$pdo->prepare($query);
        $stm->execute([
            "title"=>$data->title,
            "descr"=>$data->descr,
            "image"=>$data->image,
            "category_id"=>$data->category_id,
            "sklad_id"=>$data->sklad_id,
            "amount"=>$data->amount,
            "price"=>$data->price,
            "import"=>$data->import,
            "sell"=>$data->sell,
            "id"=>$data->id
        ]);
        echo $data->import;
    }
    
    
    public function prixod($data){
        $id=$data['id'];
        $amn=$data['amount'];
        $product=$this->get_single($id, 'prod')[0];
        $date=date('Y:m:d');
        $product->import="$product->import/$date-$amn";
        $product->amount+=$amn;
        $this->edit_($product);

    }
    public function sell($data){
        
        $data;
        var_dump($data['id']);
        $id=$data['id'];
        $amn=$data['amn'];
        $product=$this->get_single($id, 'prod')[0];
        if($amn <= $product->amount){
            $date=date('Y:m:d');
            $product->sell="$product->sell/$date-$amn";
            $product->amount-=$amn;
            $this->edit_($product);
        }else{
            return 'big amount';
        }

    }

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
            $sell=null;
            $import=null;
            // end clear data
            // query   sql
            $query = "INSERT INTO prod    (title, descr, image, category_id, sklad_id, amount, price, sell, import) VALUES 
            (:title, :descr, :image, :category_id, :sklad_id, :amount, :price, :sell, :import)";
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
                "sell"=>$sell,
                "import"=>$import       
            ]);
    }
}


   
