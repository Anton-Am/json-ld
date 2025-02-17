<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/SocialMediaPosting
 */
class SocialMediaPosting extends Article
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'sharedContent' => CreativeWork::class,
    ];
}