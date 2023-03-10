<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/PostalAddress
 */
class PostalAddress extends ContactPoint
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'streetAddress'   => '',
        'addressLocality' => '',
        'addressRegion'   => '',
        'addressCountry'  => '',
        'postalCode'      => '',
    ];
}