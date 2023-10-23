## Command

Command is a behavioral design pattern that turns a request into a stand-alone object that contains all information about the request.

-----

We need to generate a new order and thus execute everything that comes with it, such as sending emails

### The problem

If we need to use request generation elsewhere, such as on a web page, or in an api, we would have to repeat the code to execute the same command.

```php
<?php
class Budget 
{
    public float $value;
    public int $items;
}
```
```php
<?php
class Order
{
    public string $customerName;
    public \DateTimeInterface $finalizationDate;
    public Budget $budget;
}
```
```php
<?php
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
```

### Not good solution

We can make a class, which will have the command to execute the request within a function, which can be called from several different places

```php
<?php
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
```

### The solution 

Now, using the Command design patern, we create a handler to be able to execute a request generation with dependency injection, not needing to know from where, or what abstraction, being able to execute it without getting attached to rules that are not necessary for it to get stuck.

```php
<?php
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
```

```php
<?php
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
```

-----

### Installation for test

![PHP Version Support](https://img.shields.io/badge/php-7.4%2B-brightgreen.svg?style=flat-square) ![Composer Version Support](https://img.shields.io/badge/composer-2.2.9%2B-brightgreen.svg?style=flat-square)

```bash
composer install
```

```bash
php wrong/test.php {budgetValue} {items} {customereName}
php wrong2/test.php {budgetValue} {items} {customereName}
php right/test.php {budgetValue} {items} {customereName}
```