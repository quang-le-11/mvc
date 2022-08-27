<?php
class Home extends Controller {
    function SayHi() {
        //MOdel
        $teo = $this->model("StudentsModel");
        echo $teo->GetStudent();
    }

    function Show($a, $b) {

        //Model
        $teo = $this->model("StudentsModel");
        $tong = $teo->sum($a, $b);

        //View
        $this->view("aodep", [
            "page" => "news",
            "number" => $tong,
            "Mau" => "red",
            "student" => $teo->Student()
        ]);
    }
}
?>