<?php

namespace Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Entity;

class EnchantedBook extends Book
{
    public function __construct(
        string $title,
        private string $enchantment,
    ) {
        parent::__construct($title);
    }

    public function getEnchantment(): string
    {
        return $this->enchantment;
    }

    public function __toString(): string
    {
        return sprintf('Enchanted book named %s with enchantment %s', $this->getTitle(), $this->getEnchantment());
    }
}
