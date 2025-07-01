<?php

namespace Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service;

use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Contract\SerializerContract;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity\Item;
use LogicException;

class JsonSerializer implements SerializerContract
{
    public function getFileName(Item $document): string
    {
        return $document->getTitle() . '.json';
    }

    public function serialize(Item $item): string
    {
        $result = json_encode($item->getProps(), JSON_PRETTY_PRINT);

        if (is_bool($result)) {
            throw new LogicException('Failed to convert array to JSON');
        }

        return $result;
    }
}
