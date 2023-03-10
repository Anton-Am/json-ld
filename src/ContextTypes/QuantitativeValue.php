<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/QuantitativeValue
 */
class QuantitativeValue extends Thing
{
    /**
     * Property structure
     *
     * @var array
     * @uses \AntonAm\JsonLD\ContextTypes\JobPosting unitText [HOUR || DAY || WEEK || MONTH || YEAR]
     */
    protected $structure = [
        'maxValue' => null,
        'minValue' => null,
        'value'    => null,
        'unitText' => null,
    ];
}