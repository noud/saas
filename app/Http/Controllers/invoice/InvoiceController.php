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
    protected $name = 'Factuur';
    protected $dateFormat;
    protected $currencySymbol ;
    protected $currencyCode;
    protected $currencyDecimalPoint;
    protected $currencyThousandsSeparator;
    protected $currencyFormat;
    protected $client;
    protected $serialNumberSequence;
    protected $serialNumberSeries;
    protected $serialNumberFormat;
    protected $datePayUntilDays;

    function __construct() {
        $this->dateFormat = Config::get('invoice.date.format');
        $this->currencySymbol = Config::get('invoice.currency.symbol');
        $this->currencyCode = strtolower(Config::get('invoice.currency.code'));
        $this->currencyDecimalPoint = Config::get('invoice.currency.decimal_point');
        $this->currencyThousandsSeparator = Config::get('invoice.currency.thousands_separator');
        $this->currencyFormat = Config::get('invoice.currency.format');
        $this->client = new Party(Config::get('invoice.seller.attributes'));
        $this->serialNumberSequence = Config::get('invoice.serial_number.sequence');
        $this->serialNumberSeries = Config::get('invoice.serial_number.series');
        $this->serialNumberFormat = Config::get('invoice.serial_number.format');
        $this->datePayUntilDays = Config::get('invoice.date.pay_until_days');
    }

    function invoice(string $buyerId, $locale) {
        App::setLocale($locale);

        switch($buyerId) {
            case 'bondify':
                    $customer = new Party([
                        'name'          => 'Bondify',
                        'address'       => 'Stationsplein 45 - A4.004 - 3013AK ROTTERDAM, NL',
                        'phone'         => '+31 6 300 32 630',
                        'custom_fields' => [
                            'email'         => 'Balder Verberne <balder.verberne@bondify.com>',
                            'order number' => 'conform afspraak met Balder',
                        ],
                    ]);
                break;
            case 'smartshore':
                    $customer = new Party([
                        'name'          => 'Smartshore Ability',
                        'address'       => 'Nijverheidsweg 16 A, 3534 AM  UTRECHT, NL',
                        'phone'         => '030 320 0977',
                        'custom_fields' => [
                            'email'         => 'info@smartshore.nl',
                            'order number' => 'conform afspraak met Jelke',
                        ],
                    ]);
                break;
            default:
                $customer = new Party([
                    'name'          => 'Ashley Medina',
                    'address'       => 'The Green Street 12',
                    'code'          => '#22663214',
                    'custom_fields' => [
                        'order number' => '> 654321 <',
                    ],
                ]);
        }

        $items = [
            (new InvoiceItem())->title('assessment elasticsearch, docker, ansible dag')->tax(210)->pricePerUnit(500)->quantity(2),
            (new InvoiceItem())->title('onkosten: OV Tilburg CS retour Utrecht onsite')->pricePerUnit(28.20)->quantity(1),
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
            ->sequence(2)
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
        $invoice->save('local');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
    }
}