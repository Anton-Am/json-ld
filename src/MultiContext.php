<?php

namespace AntonAm\JsonLD;

use JsonException;

class MultiContext
{
    private array $contextPropertiesList = [];
    public const TYPE_GRAPH = 10;
    public const TYPE_ARRAY = 20;
    public const TYPE_SCRIPTS = 30;

    /**
     * @param array $contextList
     * @param int $type
     */
    public function __construct(array $contextList = [], private int $type = self::TYPE_GRAPH)
    {
        foreach ($contextList as $context) {
            if (isset($context['context'], $context['data'])) {
                $this->contextPropertiesList[] = (new Context($context['context'], $context['data']))->getProperties();
            }
        }
    }

    /**
     * @param array $contextList
     * @param int $type
     * @return static
     */
    public static function create(array $contextList, int $type = self::TYPE_GRAPH): self
    {
        return new self($contextList, $type);
    }


    /**
     * @return string
     * @throws JsonException
     */
    public function generateScripts(): string
    {
        $scriptList = '';
        if (count($this->contextPropertiesList) > 0) {
            foreach ($this->contextPropertiesList as $context) {
                $scriptList .= "<script type=\"application/ld+json\">" . json_encode($context, JSON_THROW_ON_ERROR | JSON_HEX_APOS | JSON_UNESCAPED_UNICODE) . "</script>" . PHP_EOL;
            }
        }

        return $scriptList;
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function generateArray(): string
    {
        if (count($this->contextPropertiesList) > 0) {
            return "<script type=\"application/ld+json\">" . json_encode($this->contextPropertiesList, JSON_THROW_ON_ERROR | JSON_HEX_APOS | JSON_UNESCAPED_UNICODE) . "</script>";
        }

        return '';
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function generateGraph(): string
    {
        if (count($this->contextPropertiesList) > 0) {
            $graphArray = [
                '@context' => 'https://schema.org',
                '@graph'   => []
            ];
            foreach ($this->contextPropertiesList as $item) {
                unset($item['@context']);
                $graphArray['@graph'][] = $item;
            }
            return "<script type=\"application/ld+json\">" . json_encode($graphArray, JSON_THROW_ON_ERROR | JSON_HEX_APOS | JSON_UNESCAPED_UNICODE) . "</script>";
        }

        return '';
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function __toString(): string
    {
        return match ($this->type) {
            self::TYPE_ARRAY => $this->generateArray(),
            self::TYPE_SCRIPTS => $this->generateScripts(),
            default => $this->generateGraph(),
        };
    }
}
