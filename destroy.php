<?php

include_once "config/Bootstrap.php";

$obj=new Product();
if($_SERVER['REQUEST_METHOD'] == "POST" && !(isset($_POST['delINput']))){
   $result='';
    $product_id=$_GET['id'];
    $obj->destroy($product_id, 'prod');
    header("Location: http://localhost:8000/"); 
}