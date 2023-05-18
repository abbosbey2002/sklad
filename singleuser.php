<?php
include_once 'config/Bootstrap.php';

$obj=new User();
$product_id=$_GET['id'] ?? 1;

$user=$obj->get_single($product_id , "users")[0];
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['DELETE'])){
    echo 'ehfgerwbfi';
    $obj->destroy($product_id, 'users');

    header("Location: http://localhost:8000/user.php");  
}


if($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_POST['DELETE'])){
    $id=$product_id;
    $login=$_POST['login'];
    $position=$_POST['position'];
     $email=$_POST['email'];
     $phone_number=$_POST['phonenumber'];
     $password=$_POST['password'];
    $obj->edit_user($id, $login, $position, $email, $phone_number, $password);
    header("Location: http://localhost:8000/user.php");
}

?>




<!-- navbar  -->
<?php require_once "assets/navbar.php" ?>
<!-- end navnbar  -->
<!-- update user -->
<div class="row col-sm-3 col-xl-4 col-4 col-md-4 m-4 p-2">
    
    <form method="POST" action="">
              <div class="mb-3">
                  <input type="text" value=<?=$user->login ?> required  placeholder="Login" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                  <input type="text" value=<?=$user->phone_number ?> required placeholder="phone number" name="phonenumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <input type="email" value=<?=$user->email ?> required name="email" placeholder="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <select value=<?=$user->position ?> required class="form-select"name='position' aria-label="Default select example">
                  <option value="user" selected>user</option>
                  <option value="admin">admin</option>
                  <option value="seller">seller</option>
                </select>
            </div>
            <div class="mb-3">
                <input placeholder="password" value=<?=$user->password ?> required type="password" name='password' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              
            </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <h1 class="h2"> <?=$result ?></h1>
            </form>
        </div>
        <div class="row col-2 m-2 p-2">
            <form action="" method="POST">
                <input  name="DELETE" value="exist" type="hidden">
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
            <!-- end update user -->