<?php
class Register extends Controller 
{
    public $UserModel;

    public function __construct()
    {
        $this->UserModel = $this->model("UserModel");
    }

    public function SayHi()
    {
        $this->view("master2", []);
    }

    public function proccessRegister()
    {
        //Lay du lieu khi sibmit form
         $fullname;
         $username;
         $passpord;
         $email;
         $address;
       if(!empty($_POST))
       {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $address = $_POST['address'];
       }
    
       //luu du lieu vao database
       $result = $this->UserModel->InsertNewUser($username, $password, $fullname, $email, $address);
       
       //thong bao trinh duyet Oke/fail

       echo $result;

    //    $this->view("master2", [
    //         "result" => $result
    //    ]);
    }


}