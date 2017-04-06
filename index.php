<?php
require_once 'ChildClass.php';

$base = new ChildClass();
echo "попытка присваивания readOnly св-ва: <br>";
$base->propertyReadOnlyA = 2;
var_dump($base);
$base->a = "wwwww";
$base->b = "eeeee";

var_dump(isset($base->c));
var_dump(isset($base->propertyReadOnlyA));
var_dump(isset($base->propertyReadWrite));

echo "попытка обращения к несуществующему св-ву <br>";
$base->propertyRandom;
var_dump($base);
//
$base->propertyReadWrite = 2222;
var_dump($base);


