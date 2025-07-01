<?php

namespace Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service;

use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Contract\SerializerContract;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity\Item;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity\ItemSerialized;

class ItemSerializer
{
    public function serialize(Item $document, SerializerContract $serializer): ItemSerialized
    {
        return new ItemSerialized(
            $serializer->getFileName($document),
            $serializer->serialize($document)
        );
    }
}
