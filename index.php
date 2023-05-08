<?php

include 'config/Bootstrap.php';

// $table_name='sklad';
// $sklad=new Sklad();


// $id=9;
//  $title='zamok';       
//  $descr='bu xitydan kelgan zamoklar r';
//     $type='zamok';
//  $owner='Abbos'; 

// for($i=22; $i<=32; $i++){
//     $res=$sklad->destroy($i, 'sklad');
//     echo json_encode($res);
// }

// $usr=new User();
// $user=$usr->edit_user(2, 'malika', 'user', 'ab@gmia.com', 34756874568, 4764234);
// echo json_encode(["message"=>$user]);


// $data=[];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    var_dump($_POST);
    echo json_encode($_POST);
    $newP=new Product();
    $data=$newP->add_product($data=$_POST);
}


