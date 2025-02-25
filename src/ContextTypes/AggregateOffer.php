<?php

namespace AntonAm\JsonLD\ContextTypes;

class AggregateOffer extends Offer
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'highPrice'  => null,
        'lowPrice'   => null,
        'offerCount' => null,
    ];
}
