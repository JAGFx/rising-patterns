<?php

namespace Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service;

use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Contract\SerializerContract;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity\Item;
use LogicException;
use SimpleXMLElement;

class XmlSerializer implements SerializerContract
{
    public function getFileName(Item $document): string
    {
        return $document->getTitle() . '.xml';
    }

    public function serialize(Item $item): string
    {
        $xmlRoot = new SimpleXMLElement('<root/>');
        $this->arrayToXml($item->getProps(), $xmlRoot);

        $result = $xmlRoot->asXML();

        if ($result === false) {
            throw new LogicException('Failed to convert array to XML');
        }

        return $result;
    }

    /**
     * @param array<string, mixed> $data The data to convert.
     */
    private function arrayToXml(array $data, SimpleXMLElement $xml): void
    {
        /**
         * @var array<string, mixed>|string $value
         */
        foreach ($data as $key => $value) {
            // Handle numeric keys (e.g., items in a list)
            if (is_numeric($key)) {
                $key = 'item'; // Or a more specific tag like 'user', 'product'
            }

            if (is_array($value)) {
                $subNode = $xml->addChild($key);
                $this->arrayToXml($value, $subNode); // Recurse for nested arrays
            } else {
                $xml->addChild($key, htmlspecialchars((string)$value)); // Add child node, escape special chars
            }
        }
    }
}
