<?php

header('Access-Control-Allow-Origin');

require_once 'config/Bootstrap.php';
$userObj=new User();


if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo json_encode($_POST);
    $login=$_POST['login'];
    $position=$_POST['position'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $password=$_POST['password'];
 
    $userObj->add_user($login, $position, $email, $phone_number, $password);
}


// read header      
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $data=$userObj->getAll('users');
    echo json_encode($data);
} 