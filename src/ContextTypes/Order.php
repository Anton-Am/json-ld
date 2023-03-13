<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/Order
 */
class Order extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'merchant'                => Organization::class,
        'orderNumber'             => null,
        'orderStatus'             => null,
        'priceCurrency'           => null,
        'price'                   => null,
        'acceptedOffer'           => Offer::class,
        'priceSpecification.name' => null
    ];
}
