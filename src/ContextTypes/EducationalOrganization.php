<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/EducationalOrganization
 */
class EducationalOrganization extends Organization
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'alumni' => Person::class,
    ];
}
