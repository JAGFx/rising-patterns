<?php

namespace Jagfx\RisingPatterns\Structural\Decorator\Entity;

use Jagfx\RisingPatterns\Structural\Decorator\Contract\ItemBattleSpecContract;

class GodItem implements ItemBattleSpecContract
{
    public const int GOD_FACTOR = 1000;

    public function __construct(
        protected ItemBattleSpecContract $item,
    ) {
    }

    public function getStrength(): int
    {
        return $this->item->getStrength() * self::GOD_FACTOR;
    }
}
