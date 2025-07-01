<?php

namespace Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity;

class Item
{
    public function __construct(
        private string $title,
        /**
         * @var array<string, mixed>
         */
        private array $props = [],
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return array<string, mixed>
     */
    public function getProps(): array
    {
        return $this->props;
    }

    /**
     * @param array<string, mixed> $props
     */
    public function setProps(array $props): void
    {
        $this->props = $props;
    }
}
