<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/PriceSpecification
 */
class PriceSpecification extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'price'         => null,
        'priceCurrency' => null,
    ];
}
