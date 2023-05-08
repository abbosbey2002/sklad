<?php

header('Access-Control-Allow-Origin');

require_once 'config/Bootstrap.php';
$sklad_Obj=new Sklad();


if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo json_encode($_POST);
    $title=$_POST['title'];
    $cat_id=$_POST['cat_id'];
    $descr=$_POST['descr'];
    $descr=$_POST['type'];
    $descr=$_POST['owner'];

    $sklad_Obj->creat_sklad($title, $descr, $type, $owner);
}


// read header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $data=$sklad_Obj->getAll('sklad');
    echo json_encode($data);
}