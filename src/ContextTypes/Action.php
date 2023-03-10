<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/Action
 */
class Action extends Thing
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'target' => null
    ];
}