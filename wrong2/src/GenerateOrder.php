<?php

namespace DesignPattern\Wrong2;

class GenerateOrder
{
    private float $budgetValue;
    private int $items;
    private string $customereName;

    public function __construct(float $budgetValue, int $items, string $customereName)
    {
        $this->budgetValue = $budgetValue;
        $this->items = $items;
        $this->customereName = $customereName;
    }

    public function execute()
    {
        $budget =  new Budget();

        $budget->items = $this->items;
        $budget->value = $this->budgetValue;

        $order = new Order();
        $order->finalizationDate = new \DateTimeImmutable();
        $order->customerName = $this->customereName;
        $order->budget = $budget;

        echo "create new order in database" . PHP_EOL;
        echo "send email to customer" . PHP_EOL;
    }
}