<?php

namespace DesignPattern\Wrong2;

class Order
{
    public string $customerName;
    public \DateTimeInterface $finalizationDate;
    public Budget $budget;
}