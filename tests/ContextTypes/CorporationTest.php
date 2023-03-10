<?php

namespace AntonAm\JsonLD\Test\ContextTypes;

use AntonAm\JsonLD\ContextTypes\Corporation;
use AntonAm\JsonLD\Test\TestCase;

class CorporationTest extends TestCase
{

    protected $class = Corporation::class;

    protected $attributes = [
        'name'         => 'Acme Corp.',
        'url'          => 'https://example.com',
        'description'  => 'Lorem ipsum dolor sit amet',
        'tickerSymbol' => 'ACME',
        'address'      => [
            'streetAddress'   => '1785 East Sahara Avenue, Suite 490-423',
            'addressLocality' => 'Las Vegas',
            'addressRegion'   => 'NV',
            'postalCode'      => '89104',
        ],
    ];

    /**
     * @test
     */
    public function shouldHaveUrl()
    {
        $context = $this->make();

        $this->assertEquals('https://example.com', $context->getProperty('url'));
        $this->assertEquals('PostalAddress', $context->getProperty('address')['@type']);
    }
}
