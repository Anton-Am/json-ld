<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/WebPage
 */
class WebPage extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        '@id' => null,
    ];

    /**
     * Set the canonical URL of the article page.
     *
     * @param string $url
     */
    protected function setUrlAttribute($url): void
    {
        // The URL is used as an ID
        $this->properties['@id'] = $url;
    }
}