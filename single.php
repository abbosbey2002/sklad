<?php
include_once 'config/Bootstrap.php';
$obj=new Product();
$product_id=$_GET['id'];

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
  $product=$obj->get_single($product_id, 'prod')[0];

}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delINput'])){
  $data=["id"=>$product_id, "amn"=>$_POST['delINput']];
  $obj->sell($data);
  header("Location: http://localhost:8000/");
}   

if($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['amount']))){
  $data=["amount"=>$_POST['amount'], 'id'=>$product_id];
  $obj->prixod($data);
  header("location: http://localhost:8000/single.php/?id=$product_id");
}



?>
<?php require_once "assets/navbar.php"; ?>


  <a href="http://localhost:8000">Orqaga</a>

  <h1 id="getPoduct"></h1>
  
      <div class="container">
      <div class="d-flex justify-content-between">
          <div class="col-md-6 col-lg-6     my-3">
            <div class="card">
              <div class="col-12 row row-2">
                <img width="100%" height='100%' id="image" src=<?= $product->image ?> class=" img-thumbnail" alt="...">

              </div>
              <div class="card-body">
                <h5 id="card-title" class="card-title"> <span id='delId'><?= $product->id ?></span> <?= $product->title ?></h5>
                <p id="card-text" class="card-text"> <?= $product->descr ?> </p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><b>Price:</b> <span id="price"><?= $product->price ?></span></li>
                  <li   class=" list-group-item"><b>Amount:</b> <span id="amount" ><?= $product->amount ?></span> </li>
                  <li class="list-group-item"><b>Category ID:</b><?= $product->category ?></li>
                  <li class="list-group-item"><b>Created At:</b> <?= $product->created_at ?> </li>
                </ul>
                <a href="#" class="btn btn-primary my-3">Buy Now</a>
                <form class="form-controll card m-1" method="POST" action="<?="http://localhost:8000/destroy.php/?id=$product->id"?>">

            <button id="delBtn" type="submit" class="btn btn-danger">Delete</button>
            </form>
                
              </div>
            </div>
          </div>
          <div>
          </div>
          <div class="card row justify-content col-6 m-4"> 
            <form class="form-control card m-1" method="POST" action="">
                <h1 class='h2 text'>Prixod tovar</h1>
                <input required placeholder="amount" class="m-2 form-control" name='amount' type="number">
                <button class="btn btn-warning" type="submit">Prixod</button>
            </form>
            <form class="form-controll card m-1" method="POST" action="">
              <input required name="delINput" id="delINput" type="number" >
            <button id="delBtn" type="submit" class="btn btn-danger">Sell</button>
            </form>

          </div>
        </div>
      </div>

      
      <!-- <script src="app.js"></script> -->
      <!-- <script src="pro.js"></script> -->
      <!-- <script src="js/app.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>