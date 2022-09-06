<?php

class UserModel extends DB 
{
   public function InsertNewUser($username, $password, $fullname, $email, $address)
   {
        $qr = "INSERT INTO user (username, password, fullname, email, address)
        VALUES('$username', '$password', ' $fullname', '$email', '$address')";
        
        $result = false;
        if(mysqli_query($this->con, $qr))
        {
            $result = true;
        }
        return json_decode($result);
    }
}