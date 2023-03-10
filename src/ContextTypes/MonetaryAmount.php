<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/MonetaryAmount
 */
class MonetaryAmount extends StructuredValue
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'currency'     => null,
        'maxValue'     => null,
        'minValue'     => null,
        'validFrom'    => null,
        'validThrough' => null,
        'value'        => QuantitativeValue::class
    ];
}
