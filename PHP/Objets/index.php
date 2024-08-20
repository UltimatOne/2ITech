<?php 
require "robot.php";

$robot1 = new robot('T-800','red','180');

$robot2 = new robot('R2D2','white','120');

$dog1 = new dog("Baxter","60","01/07/2020","Croisé Staff et Labrador");

$dog1->setOwner("Jean-Jacques","Goddet");



var_dump($robot1);
var_dump($robot2);
$robot1->sayHello();
echo "<p>" . $dog1->getOwnerName() . "</p>";
$dog1->dogBarks();