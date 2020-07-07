<?php

namespace App\Http\Controllers\invoice;

use App;
use Config;
use App\Http\Controllers\Controller;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

// <...>
class AdvancedUsageController extends Controller
{
    function advanced($locale) {
        App::setLocale($locale);

        $client = new Party([
            'name'          => 'Roosevelt Lloyd',
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => 'Ashley Medina',
            'address'       => 'The Green Street 12',
            'code'          => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        $items = [
            (new InvoiceItem())->title('Service 1')->pricePerUnit(47.79)->quantity(2)->discount(10),
            (new InvoiceItem())->title('Service 2')->pricePerUnit(71.96)->quantity(2),
            (new InvoiceItem())->title('Service 3')->pricePerUnit(4.56),
            (new InvoiceItem())->title('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
            (new InvoiceItem())->title('Service 5')->pricePerUnit(71.09)->quantity(7)->discountByPercent(9),
            (new InvoiceItem())->title('Service 6')->pricePerUnit(76.32)->quantity(9),
            (new InvoiceItem())->title('Service 7')->pricePerUnit(58.18)->quantity(3)->discount(3),
            (new InvoiceItem())->title('Service 8')->pricePerUnit(42.99)->quantity(4)->discountByPercent(3),
            (new InvoiceItem())->title('Service 9')->pricePerUnit(33.24)->quantity(6)->units('m2'),
            (new InvoiceItem())->title('Service 11')->pricePerUnit(97.45)->quantity(2),
            (new InvoiceItem())->title('Service 12')->pricePerUnit(92.82),
            (new InvoiceItem())->title('Service 13')->pricePerUnit(12.98),
            (new InvoiceItem())->title('Service 14')->pricePerUnit(160)->units('hours'),
            (new InvoiceItem())->title('Service 15')->pricePerUnit(62.21)->discountByPercent(5),
            (new InvoiceItem())->title('Service 16')->pricePerUnit(2.80),
            (new InvoiceItem())->title('Service 17')->pricePerUnit(56.21),
            (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            (new InvoiceItem())->title('Service 19')->pricePerUnit(76.37),
            (new InvoiceItem())->title('Service 20')->pricePerUnit(55.80),
        ];

        $notes = [
            'your multiline',
            'additional notes',
            'in regards of delivery or something else',
        ];
        $notes = implode("<br>", $notes);

        $serialNumberSequence = Config::get('invoice.serial_number.sequence');
        $serialNumberSeries = Config::get('invoice.serial_number.series');
        // @todo format
        $serialNumberFormat = Config::get('invoice.serial_number.format');

        $currencySymbol = Config::get('invoice.currency.symbol');
        $currencyCode = strtolower(Config::get('invoice.currency.code'));
        $currencyDecimalPoint = Config::get('invoice.currency.decimal_point');
        $currencyThousandsSeparator = Config::get('invoice.currency.thousands_separator');
        // @todo format
        $currencyFormat = Config::get('invoice.currency.format');

        $currencyValue = 123.45;

        $name = 'Factuur';
        $dateFormat = 'd-m-Y';
        $currencyThousandsSeparator = ',';
        $currencyDecimalPoint = '.';
        $taxRate = 21;
        $locale = App::getLocale();

        if (App::isLocale('en')) {
            $name = 'Invoice';
            $dateFormat = 'm/d/Y';
            $currencySymbol = '$';
            $currencyCode = 'USD';
            $currencyThousandsSeparator = '.';
            $currencyDecimalPoint = ',';
            unset($taxRate);
        }

        $invoice = Invoice::make('receipt')
            ->name($name)
            ->series('BIG')
            ->sequence(667)
            ->serialNumberFormat($serialNumberSequence . '/' . $serialNumberSeries)
            ->seller($client)
            ->buyer($customer)
            ->date(now()->subWeeks(3))
            ->dateFormat($dateFormat)
            ->payUntilDays(14)
            ->currencySymbol($currencySymbol)
            ->currencyCode($currencyCode)
            ->currencyFormat($currencySymbol . $currencyValue)
            // ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator($currencyThousandsSeparator)
            ->currencyDecimalPoint($currencyDecimalPoint)
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('vendor/invoices/sample-logo.png'));

       if (isset($taxRate)) {
            $invoice->taxRate($taxRate);
        }

        // You can additionally save generated invoice to configured disk
        $invoice->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}