<?php 
require_once("animal.php");

class ape extends animal{
    public $legs = 2;
    public function yell(){
        echo "Yell : Auooo";
    }
}
?>