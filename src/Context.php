<?php

namespace AntonAm\JsonLD;

use AntonAm\JsonLD\ContextTypes\AbstractContext;
use InvalidArgumentException;
use AntonAm\JsonLD\Contracts\ContextTypeInterface;

class Context
{
    /**
     * Context type
     *
     * @var ContextTypeInterface
     */
    protected $context;

    /**
     * Create a new Context instance
     *
     * @param string $context
     * @param array $data
     */
    public function __construct(string $context, array $data = [])
    {
        $class = $this->getContextTypeClass($context);

        $entity = new $class($data);
        if (!is_a($entity, AbstractContext::class)) {
            throw new InvalidArgumentException(sprintf('Unknown context type: "%s"', $context));
        }

        $this->context = $entity;
    }

    /**
     * Present given data as a JSON-LD object.
     *
     * @param string $context
     * @param array $data
     * @return static
     */
    public static function create(string $context, array $data = []): self
    {
        return new self($context, $data);
    }

    /**
     * Return the array of context properties.
     *
     * @return array
     */
    public function getProperties(): array
    {
        return array_filter($this->context->getProperties(), static function($v) {
            return !(is_null($v) or '' === $v);
        });
    }

    /**
     * Generate the JSON-LD script tag.
     *
     * @return string
     */
    public function generate(): string
    {
        $properties = $this->getProperties();

        return $properties
            ? "<script type=\"application/ld+json\">" . json_encode($properties, JSON_HEX_APOS | JSON_UNESCAPED_UNICODE) . "</script>"
            : '';
    }

    /**
     * Return script tag.
     *
     * @param string $name
     * @return string|null
     * @throws InvalidArgumentException
     */
    protected function getContextTypeClass(string $name): ?string
    {
        // Check for custom context type
        if (class_exists($name)) {
            return $name;
        }

        throw new InvalidArgumentException(sprintf('Undefined context type: "%s"', $name));
    }

    /**
     * Return script tag.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->generate();
    }
}
