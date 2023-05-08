<?php
require_once 'GetApi.php';

class User extends getAllTable
{
    public static $pdo;

    // user data
    public $id;
    public $login;
    public $position;
    public $email;
    public $phone_number;
    public $password;


    private function check_user($login, $email){
        $users=$this->getAll('users');

        // check user 
        $checkUser='';
        foreach ($users as $user) {
            if($user->login===$login){
                $checkUser='exist';
            }
        }
        
        if($checkUser=='exist'){
                    return 'this username  already exists';
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'this not email';
        }
        else {
            return 'success';
        }
    }

    // add user in table
    public function add_user($login, $position, $email, $phone_number, $password)
    {
        // clear user data
        $login=$this->clear_data($login);
        $position=$this->clear_data($position);
        $email=$this->clear_data($email);
        $phone_number=$this->clear_data($phone_number);
        $password=$this->clear_data($password);
        // check data 
        $respons=$this->check_user($login, $email);
        if($respons==='success'){
            // user query  
            $query = "INSERT INTO users(login, position, email, phone_number, password) VALUES (:login, :position, :email, :phone_number, :password)";
            // pdo 
            $stmt=self::$pdo->prepare($query);
            $stmt->execute([
                "login"=>$login,
                "position"=>$position,
                "email"=>$email,
                "phone_number"=>$phone_number,
                "password"=>$password,
            ]);
            if($stmt->rowCount()){
                return 'successfull';
            }else{
                return 'something went wrong';
            }
        }else{
            return $respons;
        }
        
    }
    private function check_update($id, $login, $email){
        $users=$this->getAll('users');

        // check user 
        $checkUser='';
        foreach ($users as $user) {
            if($user->login===$login && !($user->id==$id)){
                $checkUser='exist';
            }
        }
        
        if($checkUser=='exist'){
                    return 'this username  already exists';
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return 'this not email';
        }
        else {
            return 'success';
        }
    }
    // edit user 
    public function edit_user($id, $login, $position, $email, $phone_number, $password){
        $result=$this->check_update($id, $login, $email);
        if($result=='success'){
            $query = "UPDATE users SET 
        login=:login,
        position=:position, 
        email=:email, 
        phone_number=:phone_number,
        password=:password WHERE id=:id";

        $stmt=self::$pdo->prepare($query);
        $stmt->execute([
            "id"=>$id,
            "login"=>$login,
            "position"=>$position,
            "email"=>$email,
            "phone_number"=>$phone_number,
            "password"=>$password,
        ]);
        if($stmt->execute()){
            return "success";
        }else{
            return "something went wrong?";
        }
        }else{
            return $result;
        }
    }


}
