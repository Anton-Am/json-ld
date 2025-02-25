<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/ImageObject
 */
class ImageObject extends MediaObject
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'caption'   => null,
        'thumbnail' => ImageObject::class,
    ];
}