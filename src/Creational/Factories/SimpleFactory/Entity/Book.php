<?php

namespace Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Entity;

class Book
{
    public function __construct(
        protected string $title,
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

    public function __toString(): string
    {
        return 'Book named ' . $this->getTitle();
    }
}
