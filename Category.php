<?php

header('Access-Control-Allow-Origin');

require_once 'config/Bootstrap.php';
$cate_Obj=new Category();


if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo json_encode($_POST);
    $title=$_POST['title'];
    $cat_id=$_POST['cat_id'];

    $cate_Obj->creat_category($title, $cat_id);
}


// read header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $data=$cate_Obj->getAll('category');
    echo json_encode($data);
}