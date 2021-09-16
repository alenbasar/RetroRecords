<?php
// Array with names
$a[] = "Black Sabbath";
$a[] = "Billy Idol";
$a[] = "ACDC";
$a[] = "Guns n Roses";
$a[] = "Dio";
$a[] = "Metallica";
$a[] = "Deep Purple";
$a[] = "Led Zeppelin";
$a[] = "Rolling Stones";
$a[] = "Pink Floyd";
$a[] = "Blondie";
$a[] = "Bee Gees";
$a[] = "Jefferson Airplane";
$a[] = "Kiss";
$a[] = "Amon Amarth";
$a[] = "Elvis Presley";
$a[] = "Queen";
$a[] = "Rod Stewart";
$a[] = "Doors";
$a[] = "The Who";
$a[] = "Michael Jackson";
$a[] = "Burzum";
$a[] = "MGMT";
$a[] = "Velvet Revolver";
$a[] = "The Exploited";
$a[] = "Sex Pistols";
$a[] = "Ramones";
$a[] = "The Clash";
$a[] = "Dick Dale";
$a[] = "Lynyrd Skynyrd";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>