<?php
class Register extends Controller 
{
    public function SayHi()
    {
        $this->view("master2", []);
    }

    public function proccessRegister()
    {
         $fullname;
         $username;
         $passpord;
         $email;
         $address;
       if(!empty($_POST))
       {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $passpord = $_POST['password'];
        $email = $_POST['email'];
        $address = $_POST['address'];
       }
       echo $fullname . '<br>';
       echo $username . '<br>';
       echo $passpord . '<br>';
       echo $email . '<br>';
       echo $address . '<br>';
    }


}