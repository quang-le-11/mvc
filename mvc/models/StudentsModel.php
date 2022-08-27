<?php
class StudentsModel extends DB {
    public function GetStudent()
    {
        return "Le Vinh Quang asa";
    }

    public function sum($a, $b) 
    {
        return $a + $b;
    }

    public function Student() 
    {
        $qr = "SELECT * FROM sinhvien";
        return mysqli_query($this->con, $qr);
    }
}
?>