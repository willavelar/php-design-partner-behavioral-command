<?php

namespace DesignPattern\Right;

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

    public function getBudgetValue(): float
    {
        return $this->budgetValue;
    }

    public function getItems(): int
    {
        return $this->items;
    }

    public function getCustomereName(): string
    {
        return $this->customereName;
    }


}