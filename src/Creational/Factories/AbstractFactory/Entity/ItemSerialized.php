<?php

namespace Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity;

class ItemSerialized
{
    public function __construct(
        private string $fileName,
        private string $content,
    ) {
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
