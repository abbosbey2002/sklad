<?php

include 'config/Bootstrap.php';
$product_obj=new Product();
$result='';
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $result=$product_obj->add_product($_POST);
}



$products=$product_obj->getAll('prod');
// var_dump($products[0]->title);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- start nav  -->
    <?php require_once 'assets/navbar.php'; ?>
    <!-- end nav -->
    <!-- main section start -->

    <div class="main_section">
        <div class="row">
          <div class="col-3">
             <?php require_once "assets/menus.php" ?>
          </div>
          <div class="col-8" id="main_menu">
          <!-- this menu body -->
          <div id="product">
            <form method="POST" action="">
              <div class="mb-3">
                <input type="text" required placeholder="Title" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <input type="text" required placeholder="Description" name="descr" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <input type="text" required name="image" placeholder="image url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <select required class="form-select"name='category_id' aria-label="Default select example">
                  <option selected>select category</option>
                  <option value="1">Electronica</option>
                  <option value="2">uy</option>
                  <option value="3">kiyim</option>
                </select>
              </div>
              <div class="mb-3">
                <select required class="form-select"name='sklad_id' aria-label="Default select example">
                  <option selected>select sklad</option>
                  <option value="1">stimul</option>
                  <option value="2">tulpor</option>
                  <option value="3">krug</option>
                </select>
              </div>
              <div class="mb-3">
                <input placeholder="amount" required type="number" name='amount' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <input name="price" placeholder="price" required type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- table  -->
            <table class="table">
              <thead id="getPoduct">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">category</th>
                  <th scope="col">skald</th>
                  <th scope="col">amount</th>
                  <th scope="col">price</th>
                </tr>
              </thead>
              <tbody id="prod_cont">
                <?php  
                foreach ($products as $product): ?>
                      <tr>
        <th scope="row"><?= $product->id ?></th>
        <td scope="col"><?= $product->title ?></td>
        <td scope="col"><?= $product->category_id ?></td>
        <td scope="col"><?= $product->sklad_id ?></td>
        <td scope="col"><?= $product->amount ?></td>
        <td scope="col"><?= '$'.$product->price ?></td>
        <td scope="col"> 
        <a href=<?= "http://localhost:8000/single.php/?id=$product->id" ?>>
         <button class="productEdit btn btn-warning">Edit</button> </td>
         </a>
         <td scope="col"></td>
        
        </tr> 
               <?php endforeach; ?>
            
                <!-- paste -->
              </tbody>
            </table>
            <!-- table  -->
            </div>  
           <!-- this menu body -->  <!-- this menu body -->
         </div>
        
    <!-- main section end  -->  
    
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>