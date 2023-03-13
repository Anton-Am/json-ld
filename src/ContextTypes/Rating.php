<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/Rating
 */
class Rating extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'ratingValue' => null,
        'bestRating'  => null,
        'worstRating' => null,
    ];
}