<?php

require_once 'config/Bootstrap.php';
$userObj=new User();
$result='';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $login=$_POST['login'];
    $position=$_POST['position'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $password=$_POST['password'];
 
    $result=$userObj->add_user($login, $position, $email, $phone_number, $password);
    if($result==='successfull'){
        header("Location:http://localhost:8000/user.php");
    }else{
        echo json_encode(["message"=>$result]);
    }
}


if($_SERVER['REQUEST_METHOD'] == "GET"){
    $data=$userObj->getAll('users');
} 
// var_dump($data);
?>

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

    <!-- start nav  -->
    <?php require_once "assets/navbar.php"; ?>
    <!-- end nav -->
      </a>
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
                <input type="text" required placeholder="Login" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <input type="text" required placeholder="phone number" name="phone_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <input type="email" required name="email" placeholder="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <select required class="form-select"name='position' aria-label="Default select example">
                  <option value="user" selected>user</option>
                  <option value="admin">admin</option>
                  <option value="seller">seller</option>
                </select>
              </div>
              <div class="mb-3">
                <input placeholder="password" required type="password" name='password' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <h1 class="h2"> <?=$result ?></h1>
            </form>
            <!-- table  -->
            <table class="table">
              <thead id="getPoduct">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Login</th>
                  <th scope="col">Position</th>
                  <th scope="col">email</th>
                  <th scope="col">phone number</th>
                  <th scope="col">password</th>
                  <th scope="col">created_At</th>
                </tr>
              </thead>
              <tbody id="prod_cont">
                <?php  
                foreach (array_reverse($data) as $user): ?>
                      <tr>
        <th scope="row"><?= $iter ?></th>
        <td scope="col"><?= $user->login ?></td>
        <td scope="col"><?= $user->position ?></td>
        <td scope="col"><?= $user->email ?></td>
        <td scope="col"><?= $user->phone_number ?></td>
        <td scope="col"><?= '$'.$user->password ?></td>
        <td scope="col"><?= $user->created_at ?></td>
        <td scope="col"> 
        <a href=<?= "http://localhost:8000/singleuser.php/?id=$user->id" ?>>
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


