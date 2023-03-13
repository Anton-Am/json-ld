<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/AggregateRating
 */
class AggregateRating extends Rating
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'reviewCount'  => null,
        'ratingCount'  => null,
        'itemReviewed' => Thing::class,
    ];
}
