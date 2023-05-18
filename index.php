<?php

require_once 'config/Bootstrap.php';
$product_obj=new Product();
$result='';
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $result=$product_obj->add_product($_POST);
  
}

$category=new Category();
$categorys=$category->getAll('category');

$sklad_obj=new Sklad();
$sklads=$sklad_obj->getAll('sklad');

// echo  ($categorys[0]->title);


$products=$product_obj->getAll('prod');
// var_dump($products[0]->title);

?>


  
    <!-- start nav  -->
    <?php require_once 'assets/navbar.php'; ?>
    <!-- end nav -->
    <!-- main section start -->

    <div class="main_section">
        <div class="row">
          <div class="col-3">
             <?php require_once "assets/menus.php" ?>
          </div>
          <div class="col-8 bg-secondary-subtle m-2 p-3" id="main_menu">
          <!-- this menu body -->
          <div class="">
          <div id="product" class="border border-white p-2">
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
                <select required class="form-select"name='category' aria-label="Default select example">
                  <option value="0" selected>select category</option>
                     <?php foreach ($categorys as $value): ?>
                    
                  <option value=<?=$value->title?>><?= $value->title ?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
              <div class="mb-3">
                <select required class="form-select"name='sklad' aria-label="Default select example">
                <option value="0" selected>select sklad</option>
                <?php foreach ($sklads as $value): ?>
                  <option value=<?= $value->title ?>><?= $value->title ?></option>
                  <?php endforeach; ?> 
                </select>
              </div>
              <div class="mb-3">
                <input placeholder="amount" required type="number" name='amount' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <input name="price" placeholder="price" required type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              
              </div>
              <p class="text text-danger"> <?= $result ?>  </p>
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
        <td scope="col"><?= $product->category ?></td>
        <td scope="col"><?= $product->sklad ?></td>
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
         </div>
        
    <!-- main section end  -->  
    
   <?php require_once "assets/footer.php" ?>