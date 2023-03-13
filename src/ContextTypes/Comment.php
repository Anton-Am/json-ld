<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/Comment
 */
class Comment extends CreativeWork
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'downvoteCount' => null,
        'upvoteCount'   => null,
    ];
}
