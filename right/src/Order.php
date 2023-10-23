<?php

namespace DesignPattern\Right;

class Order
{
    public string $customerName;
    public \DateTimeInterface $finalizationDate;
    public Budget $budget;
}