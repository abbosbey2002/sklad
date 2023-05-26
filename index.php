


   <?php

require_once "./config/Bootstrap.php";

$user_obj=new User();
$users=$user_obj->getAll('users');

// print_r($users);

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $res=false;
    foreach ($users as $user) {
        # code...
        if($user->login===$_POST['login'] && $user->password===$_POST['password']){
            header("Location: http://localhost:8000/dashboard.php");
            return $res=true;
        }
    }

    if($res){
    }else{
       $login_error='This login or password not exist';
    }
}


?>
<link rel="stylesheet" href="./css/login.css" />
<div class="login_container"  >
    <form action="" method="POST" class="login_form">
        <h1 class="login_header">Login</h1>
        <input class="input_login" type="text" name="login"  placeholder="Login">
        <input type="password" class="input_login" name="password" placeholder="Password">
        <p class="login_error"><?= $login_error ?></p>

        <input class="button button_login" type="submit">
        <p class="login_text"><a href="#"> forget password? </a> </p>
        <p class="login_text">Don't have a account? <a href="#">SignUp</a></p> 
    </form>
</div>