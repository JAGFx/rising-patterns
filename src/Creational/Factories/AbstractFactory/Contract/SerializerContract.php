<?php

namespace Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Contract;

use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity\Item;

interface SerializerContract
{
    public function getFileName(Item $document): string;

    public function serialize(Item $item): string;
}
