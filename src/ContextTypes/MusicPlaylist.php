<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * https://schema.org/MusicPlaylist
 */
class MusicPlaylist extends MusicAbstractContext
{
    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [
        'numTracks' => null,
        'track'     => MusicRecording::class,
    ];
}
