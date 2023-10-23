<?php

use DesignPattern\Wrong2\{GenerateOrder};

require "vendor/autoload.php";

$budgetValue = $argv[1];
$items = $argv[2];
$customereName = $argv[3];

$generateOrder = new GenerateOrder($budgetValue,$items,$customereName);
$generateOrder->execute();

