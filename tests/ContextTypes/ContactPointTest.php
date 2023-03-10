<?php

namespace AntonAm\JsonLD\Test\ContextTypes;

use AntonAm\JsonLD\ContextTypes\ContactPoint;
use AntonAm\JsonLD\Test\TestCase;

class ContactPointTest extends TestCase
{

    protected $class = ContactPoint::class;

    protected $attributes = [
        'telephone'   => '18009999999',
        'contactType' => 'customer service',
    ];

    /**
     * @test
     */
    public function shouldHaveTelephone()
    {
        $context = $this->make();

        $this->assertEquals('18009999999', $context->getProperty('telephone'));
    }

    /**
     * @test
     */
    public function shouldHaveContactType()
    {
        $context = $this->make();

        $this->assertEquals('customer service', $context->getProperty('contactType'));
    }
}
