<?php

namespace AntonAm\JsonLD\Test\ContextTypes;

use AntonAm\JsonLD\Test\Stubs\ContextStub;
use AntonAm\JsonLD\Test\TestCase;

class AbstractContextTest extends TestCase
{
    protected $class = ContextStub::class;

    protected $attributes = [
        'sameAs' => 'http://google.com/profile',
        'name'   => 'My Profile Page',
    ];

    /**
     * @test
     */
    public function shouldGetProperties()
    {
        $context = $this->make();

        $this->assertEquals(array_merge([
            '@context' => 'https://schema.org',
            '@type'    => 'ContextStub',
        ], $this->attributes), $context->getProperties());
    }

    /**
     * @test
     */
    public function shouldSetContext()
    {
        $context = $this->make();

        $properties = $context->getProperties();

        $this->assertEquals('https://schema.org', $properties['@context']);
    }

    /**
     * @test
     */
    public function shouldSetTypeUsingClassName()
    {
        $context = $this->make();

        $properties = $context->getProperties();

        $this->assertEquals('ContextStub', $properties['@type']);
    }
}
