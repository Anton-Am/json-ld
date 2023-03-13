<?php

namespace AntonAm\JsonLD\Test\ContextTypes;

use AntonAm\JsonLD\ContextTypes\AggregateRating;
use AntonAm\JsonLD\Test\TestCase;

class AggregateRatingTest extends TestCase
{
    protected $class = AggregateRating::class;

    protected $attributes = [
        'sameAs'       => 'http://google.com/profile',
        'reviewCount'  => 5,
        'ratingValue'  => 2.4,
        'bestRating'   => 4.5,
        'worstRating'  => 1,
        'ratingCount'  => 4,
        'itemReviewed' => [
            '@type' => 'Thing',
            'name'  => 'Fluff Hut',
        ],
    ];

    /**
     * @test
     */
    public function shouldGetProperties()
    {
        $context = $this->make();

        $this->assertEquals(array_merge([
            '@context'         => 'https://schema.org',
            '@type'            => 'AggregateRating',
            'name'             => '',
            'alternateName'    => '',
            'description'      => '',
            'image'            => '',
            'mainEntityOfPage' => '',
            'url'              => '',
            'identifier'       => ''
        ], $this->attributes), $context->getProperties());
    }
}
