<?php
class Home extends Controller {
    function SayHi() {
        $teo = $this->model("StudentsModel");
        echo $teo->GetStudent();
    }

    function Show($a, $b) {
        $teo = $this->model("StudentsModel");

        $tong = $teo->sum($a, $b);

        $this->view("aodep", ["number" => $tong]);
    }
}
?>