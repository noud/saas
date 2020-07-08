<?php

namespace App\Http\Controllers\invoice;

use App;
use Config;
use App\Http\Controllers\Controller;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

// <...>
class InvoiceController extends Controller
{
    protected $dateFormat;
    protected $currencySymbol ;
    protected $currencyCode;
    protected $currencyDecimalPoint;
    protected $currencyThousandsSeparator;
    protected $currencyFormat;
    // protected $currencyValue;
    protected $client;
    protected $serialNumberSequence;
    protected $serialNumberSeries;
    protected $serialNumberFormat;
    protected $name;
    protected $datePayUntilDays;

    function __construct() {
        $this->dateFormat = Config::get('invoice.date.format');
        $this->currencySymbol = Config::get('invoice.currency.symbol');
        $this->currencyCode = strtolower(Config::get('invoice.currency.code'));
        $this->currencyDecimalPoint = Config::get('invoice.currency.decimal_point');
        $this->currencyThousandsSeparator = Config::get('invoice.currency.thousands_separator');
        $this->currencyFormat = Config::get('invoice.currency.format');
        // $this->currencyValue = 1000.00;
        $this->client = new Party(Config::get('invoice.seller.attributes'));
        $this->serialNumberSequence = Config::get('invoice.serial_number.sequence');
        $this->serialNumberSeries = Config::get('invoice.serial_number.series');
        $this->serialNumberFormat = Config::get('invoice.serial_number.format');
        $this->datePayUntilDays = Config::get('invoice.date.pay_until_days');
        $this->name = 'Factuur';
    }

    function invoice($locale) {
        App::setLocale($locale);

        $customer = new Party([
            'name'          => 'Smartshore Ability',
            'address'       => 'Nijverheidsweg 16 A, 3534 AM  UTRECHT',
            'phone'         => '030 320 0977',
            'custom_fields' => [
                'email'         => 'info@smartshore.nl',
                'order number' => 'conform afspraak met Jelke',
            ],
        ]);

        $items = [
            (new InvoiceItem())->title('assessment elasticsearch, docker, ansible dag')->tax(210)->pricePerUnit(500.00)->quantity(2),
            (new InvoiceItem())->title('onkosten: OV Tilburg CS retour Utrecht')->pricePerUnit(28.20)->quantity(1),
        ];

        $notes = [
            '',
            'graag tot ziens',
        ];
        $notes = implode("<br>", $notes);

        $locale = App::getLocale();
        if (App::isLocale('en')) {
            $this->name = 'Invoice';
            $this->dateFormat = 'm/d/Y';
            $this->currencySymbol = '$';
            $this->currencyCode = 'USD';
            $this->currencyThousandsSeparator = '.';
            $this->currencyDecimalPoint = ',';
            unset($this->taxRate);
        }

        $invoice = Invoice::make('receipt')
            ->name($this->name)
            ->series('GIG')
            ->sequence(1)
            ->seller($this->client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat($this->dateFormat)
            ->payUntilDays($this->datePayUntilDays)
            ->currencySymbol($this->currencySymbol)
            ->currencyCode($this->currencyCode)
            ->currencyFormat($this->currencyFormat)
            // ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator($this->currencyThousandsSeparator)
            ->currencyDecimalPoint($this->currencyDecimalPoint)
            ->filename($this->client->name . ' ' . $customer->name . ' (' . $locale  . ')')
            ->addItems($items)
            ->notes($notes)
            ->logo(false);

       if (isset($this->taxRate)) {
            $invoice->taxRate($this->taxRate);
        }

        // You can additionally save generated invoice to configured disk
        $invoice->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}