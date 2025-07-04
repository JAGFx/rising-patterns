<?php

namespace Jagfx\RisingPatterns\Structural\Decorator\Entity;

use Jagfx\RisingPatterns\Structural\Decorator\Contract\ItemBattleSpecContract;

class EnchantedItem implements ItemBattleSpecContract
{
    public function __construct(
        protected ItemBattleSpecContract $item,
        protected float $enchantmentFactor
    ) {
    }

    public function getStrength(): int
    {
        return (int) ($this->item->getStrength() * $this->getEnchantmentFactor());
    }

    public function getEnchantmentFactor(): float
    {
        return $this->enchantmentFactor;
    }

    public function setEnchantmentFactor(float $enchantmentFactor): void
    {
        $this->enchantmentFactor = $enchantmentFactor;
    }
}
