<?php

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

// <...>
class RandomController extends Controller
{
    function random() {
        $customer = new Buyer([
            'name'          => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }
}