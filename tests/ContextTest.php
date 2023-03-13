<?php

namespace AntonAm\JsonLD\Test;

use AntonAm\JsonLD\Context;
use AntonAm\JsonLD\ContextTypes\Event;
use Mockery;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class ContextTest extends PHPUnitTestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * @test
     */
    public function shouldGetEventProperties()
    {
        $context = Context::create(Event::class, ['name' => 'Foo Bar']);

        $this->assertEquals([
            '@context' => 'https://schema.org',
            '@type'    => 'Event',
            'name'     => 'Foo Bar',
        ], $context->getProperties());
    }

    /**
     * @test
     */
    public function shouldAllowSameAsToBeArray()
    {
        $context = Context::create(Event::class, [
            'name'   => 'Foo Bar',
            'sameAs' => [
                'https://google.com/facebook',
                'https://google.com/instagram',
                'https://google.com/linkedin'
            ],
        ]);

        $this->assertEquals([
            '@context' => 'https://schema.org',
            '@type'    => 'Event',
            'name'     => 'Foo Bar',
            'sameAs'   => [
                'https://google.com/facebook',
                'https://google.com/instagram',
                'https://google.com/linkedin'
            ],
        ], $context->getProperties());
    }

    /**
     * @test
     */
    public function shouldAllowSameAsToBeAString()
    {
        $context = Context::create(Event::class, [
            'name'   => 'Foo Bar',
            'sameAs' => 'https://google.com/facebook',
        ]);

        $this->assertEquals([
            '@context' => 'https://schema.org',
            '@type'    => 'Event',
            'name'     => 'Foo Bar',
            'sameAs'   => 'https://google.com/facebook',
        ], $context->getProperties());
    }

    /**
     * @test
     */
    public function shouldGenerateEventScriptTag()
    {
        $context = Context::create(Event::class, ['name' => 'Foo Bar']);

        $this->assertEquals('<script type="application/ld+json">{"@context":"https:\/\/schema.org","@type":"Event","name":"Foo Bar"}</script>', $context->generate());
    }
}
