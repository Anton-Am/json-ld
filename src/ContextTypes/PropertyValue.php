<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/PropertyValue
 */
class PropertyValue extends StructuredValue
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'value'                => null,
        'maxValue'             => null,
        'minValue'             => null,
        'measurementTechnique' => null,
        'propertyID'           => null,
        'unitCode'             => null,
        'unitText'             => null,
        'valueReference'       => null
    ];
}
