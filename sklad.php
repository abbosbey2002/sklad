<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin');

require_once 'config/Bootstrap.php';
$cate_Obj=new Sklad(); 

// delete category
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete_ID'])){

  $id=$_POST['delete_ID'];
  echo $id;
  $cate_Obj->destroy($id, 'sklad');  
  header("Location: http://localhost:8000/sklad.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_POST['delete_ID'])){
    $title=$_POST['title'];
    $descr=$_POST['descr'];
    $type=$_POST['type'];
    $owner=$_POST['owner'];

    $cat_id=1;
    $cate_Obj->creat_sklad($title, $descr, $type, $owner);
    header("Location: http://localhost:8000/sklad.php");
}



// // read header
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $data=$cate_Obj->getAll('sklad');
   
    // echo json_encode($data);
} 

include_once "./assets/navbar.php";


?>



<div class="main_section">
        <div class="row">
          <div class="col-3">
             <?php require_once "assets/menus.php" ?>
          </div>
          <div class="col-8" id="main_menu" class="my-2">
          <!-- this menu body -->
        <form  class="form-control my-3" action="" method="POST">
        <h2 class="h2 text text-center"> create sklad </h2>
        <input name="title" type="text" class="form-control my-2" placeholder="sklad name">
        <input name="descr" type="text" class="form-control my-2" placeholder="descr sklad">
        <input name="owner" type="text" class="form-control my-2" placeholder="sklad owner">
        <input name="type" type="text" class="form-control my-2" placeholder="sklad type">
        <input type="submit" class="btn btn-primary m-2">
        </form>


          <table class="table">
               <thead id="getPoduct">
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Title</th>
                  
              </thead>
              <tbody id="prod_cont">
              <?php foreach ($data as $key=>$value): ?>
                <tr>

                  <th> <?= $key+1 ?> </th>
                  <td> <?= $value->title ?> </td>
                  <td> 
                  <form action="" method="POST">
                    <input name="delete_ID" type="hidden" value=<?=$value->id ?>>
                    <input type="submit" class="btn btn-danger" />
                </form>  
                </td>
                </tr>
                  <?php endforeach; ?>
                  
                <!-- paste -->
              </tbody>
            </table>
        
        
        </div>  
           <!-- this menu body -->  <!-- this menu body -->
         </div>