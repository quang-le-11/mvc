<?php
class Home extends Controller {
    public $CategoryModel;
    public $AdsModel;

    public function __conctruct() 
    {
        //Model
        $this->CategoryModel = $this->model("Catelogory");
        $this->AdsModel = $this->model("AdsModel");
    }

    public function SayHi() {
        $this->view("master", [
           
        ]);
    }
}
?>