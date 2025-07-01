<?php

namespace Jagfx\RisingPatterns;

use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity\Item;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service\ItemSerializer;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service\JsonSerializer;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service\XmlSerializer;
use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Service\Enchanter;
use LogicException;
use Throwable;

class RisingPatterns
{
    /**
     * Entry point for CLI usage.
     */
    /**
     * @param array<string, mixed> $argv
     */
    public static function main(array $argv): void
    {
        echo "###########################\n";
        echo "### Rising Patterns CLI ###\n";
        echo "###########################\n\n";

        self::simpleFactory();
        self::abstractFactory();
    }

    private static function simpleFactory(): void
    {
        echo "Creational | Factories | Simple Factory\n";
        echo "-----------------------------------------\n\n";

        $enchanter = new Enchanter();

        $book = $enchanter->buildEmptyBook('The Art of War');
        echo "> Build of {$book} \n";
        $enchantedBook = $enchanter->enchant($book, 'Wisdom of Ages');
        echo "> Enchant {$enchantedBook} \n";

        try {
            echo "> Enchant a enchanted book again should not work\n";
            $enchanter->enchant($enchantedBook, 'An enchantment that should not work');
        } catch (LogicException $logicException) {
            echo "Error: " . $logicException->getMessage() . "\n";
        }
    }

    private static function abstractFactory(): void
    {
        echo "Creational | Factories | Abstract Factory\n";
        echo "-----------------------------------------\n\n";

        $item = new Item(
            'My Item',
            ['author' => 'John Doe', 'date' => '2023-10-01']
        );

        $jsonSerializer = new JsonSerializer();
        $xmlSerializer  = new XmlSerializer();
        $itemSerializer = new ItemSerializer();

        echo sprintf('Item: %s%s', $item->getTitle(), PHP_EOL);
        echo "> Properties:\n";
        var_dump($item->getProps());
        try {
            echo "-- Serializing item to JSON:\n";
            $itemJson = $itemSerializer->serialize($item, $jsonSerializer);
            echo sprintf('> File Name: %s%s', $itemJson->getFileName(), PHP_EOL);
            echo $itemJson->getContent() . "\n\n";
        } catch (Throwable $throwable) {
            echo "Error serializing item to JSON: " . $throwable->getMessage() . "\n\n";
        }

        try {
            echo "-- Serializing item to XML:\n";
            $itemXml = $itemSerializer->serialize($item, $xmlSerializer);
            echo sprintf('> File Name: %s%s', $itemXml->getFileName(), PHP_EOL);
            echo $itemXml->getContent() . PHP_EOL;
        } catch (Throwable $throwable) {
            echo "Error serializing item to XML: " . $throwable->getMessage() . "\n";
        }
    }
}
