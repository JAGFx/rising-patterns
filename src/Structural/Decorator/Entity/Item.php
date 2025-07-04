<?php

namespace Jagfx\RisingPatterns\Structural\Decorator\Entity;

use Jagfx\RisingPatterns\Structural\Decorator\Contract\ItemBattleSpecContract;

class Item implements ItemBattleSpecContract
{
    public function __construct(
        protected int $brutStrength,
        protected int $factor = 1,
    ) {
    }

    public function getStrength(): int
    {
        return $this->getBrutStrength() * $this->getFactor();
    }

    public function getBrutStrength(): int
    {
        return $this->brutStrength;
    }

    public function setBrutStrength(int $brutStrength): void
    {
        $this->brutStrength = $brutStrength;
    }

    public function getFactor(): int
    {
        return $this->factor;
    }

    public function setFactor(int $factor): void
    {
        $this->factor = $factor;
    }
}
