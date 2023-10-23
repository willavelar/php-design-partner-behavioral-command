<?php

namespace DesignPattern\Wrong;

class Order
{
    public string $customerName;
    public \DateTimeInterface $finalizationDate;
    public Budget $budget;
}