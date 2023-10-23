<?php

use DesignPattern\Right\{GenerateOrder, GenerateOrderHandler};

require "vendor/autoload.php";

$budgetValue = $argv[1];
$items = $argv[2];
$customereName = $argv[3];

$generateOrder = new GenerateOrder($budgetValue, $items, $customereName);
$gerarPedidoHandler = new GenerateOrderHandler();
$gerarPedidoHandler->execute($generateOrder);