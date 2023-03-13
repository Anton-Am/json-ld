<?php

namespace AntonAm\JsonLD\ContextTypes;

/**
 * The publication format of the book.
 * https://schema.org/BookFormatType
 */
class BookFormatType extends Enumeration
{
    /**
     * Book format: Audiobook. This is an enumerated value for use with the
     * bookFormat property. There is also a type 'Audiobook' in the bib
     * extension which includes Audiobook specific properties.
     *
     * @see https://schema.org/AudiobookFormat
     */
    public const AUDIOBOOK = 'https://schema.org/AudiobookFormat';

    /**
     * Book format: Ebook.
     *
     * @see https://schema.org/EBook
     */
    public const EBOOK = 'https://schema.org/EBook';

    /**
     * Book format: GraphicNovel. May represent a bound collection of
     * ComicIssue instances.
     *
     * @see https://schema.org/GraphicNovel
     */
    public const GRAPHIC_NOVEL = "https://schema.org/GraphicNovel";

    /**
     * Book format: Hardcover.
     *
     * @see https://schema.org/Hardcover
     */
    public const HARDCOVER = 'https://schema.org/Hardcover';

    /**
     * Book format: Paperback.
     *
     * @see https://schema.org/Paperback
     */
    public const PAPERBACK = 'https://schema.org/Paperback';

    /**
     * Property structure
     *
     * @var array
     */
    protected $structure = [];
}