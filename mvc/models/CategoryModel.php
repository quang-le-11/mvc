<?php

class CategoryModel extends DB 
{
    public function listAll() 
    {
        $qr = "SELECT * FROM category";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();

        return json_decode($arr);
    }
}