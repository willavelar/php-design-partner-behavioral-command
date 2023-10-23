<?php

use DesignPattern\Wrong\{Budget, Order};

require "vendor/autoload.php";

$budgetValue = $argv[1];
$items = $argv[2];
$customereName = $argv[3];

$budget =  new Budget();

$budget->items = $items;
$budget->value = $budgetValue;

$order = new Order();
$order->finalizationDate = new DateTimeImmutable();
$order->customerName = $customereName;
$order->budget = $budget;

echo "create new order in database" . PHP_EOL;
echo "send email to customer" . PHP_EOL;