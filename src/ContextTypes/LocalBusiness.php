<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/LocalBusiness
 */
class LocalBusiness extends Organization
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'openingHours' => null,
        'priceRange'   => null,
        'geo'          => GeoCoordinates::class,
        'hasMap'       => null,
    ];

    /**
     * Set the opening hours of the business.
     *
     * @param mixed $items
     * @return mixed
     */
    protected function setOpeningHoursAttribute($items)
    {
        return $items;
    }
}
