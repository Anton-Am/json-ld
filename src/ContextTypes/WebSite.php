<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/WebSite
 */
class WebSite extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'potentialAction' => SearchAction::class
    ];
}