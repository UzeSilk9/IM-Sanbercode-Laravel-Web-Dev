<?php

 require_once('animal.php');
 require_once('ape.php');
 require_once('frog.php');

 $sheep = new Animal("shaun");

echo "Name : $sheep->name <br>"; // "shaun"
echo "Legs : $sheep->legs <br>"; // 4
echo "Cold Blooded : $sheep->cold_blooded <br><br>"; // "no"

$sungokong = new Ape("kera sakti");

echo "Name : $sungokong->name <br>"; 
echo "Legs : $sungokong->legs <br>";
echo "Cold Blooded : $sungokong->cold_blooded <br><br>";
$sungokong->yell();

$kodok = new Frog("buduk");
echo "Name : $kodok->name <br>";
echo "Legs : $kodok->legs <br>"; 
echo "Cold Blooded : $kodok->cold_blooded";
$kodok->jump(); // "hop hop"

// NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded())
?>