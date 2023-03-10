<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/SearchAction
 */
class SearchAction extends Action
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'query'       => null,
        'query-input' => null
    ];
}