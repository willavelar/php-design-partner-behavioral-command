<?php

namespace DesignPattern\Right;

class GenerateOrderHandler
{
    public function __construct(/* OrderRepository, MailService */)
    {
    }

    public function execute(GenerateOrder $generateOrder)
    {
        $budget =  new Budget();

        $budget->items = $generateOrder->getItems();
        $budget->value = $generateOrder->getBudgetValue();

        $order = new Order();
        $order->finalizationDate = new \DateTimeImmutable();
        $order->customerName = $generateOrder->getCustomereName();
        $order->budget = $budget;

        // PedidoRepository
        echo "create new order in database" . PHP_EOL;

        // MailService
        echo "send email to customer" . PHP_EOL;
    }
}