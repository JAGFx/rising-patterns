<?php

namespace Jagfx\RisingPatterns;

use DateTimeImmutable;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Entity\Item;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service\ItemSerializer;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service\JsonSerializer;
use Jagfx\RisingPatterns\Creational\Factories\AbstractFactory\Service\XmlSerializer;
use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Service\Enchanter;
use Jagfx\RisingPatterns\Structural\Adapter\Entity\AmazonS3Document;
use Jagfx\RisingPatterns\Structural\Adapter\Entity\FileStorageDocument;
use Jagfx\RisingPatterns\Structural\Adapter\Service\AmazonS3Syncer;
use Jagfx\RisingPatterns\Structural\Adapter\Service\FileStorageSyncer;
use Jagfx\RisingPatterns\Structural\Decorator\Entity\EnchantedItem;
use Jagfx\RisingPatterns\Structural\Decorator\Entity\GodItem;
use Jagfx\RisingPatterns\Structural\Facade\Entity\AdobeConnectVirtualMeeting;
use Jagfx\RisingPatterns\Structural\Facade\Entity\CiscoWebexVirtualMeeting;
use Jagfx\RisingPatterns\Structural\Facade\Service\AdobeConnectSyncer;
use Jagfx\RisingPatterns\Structural\Facade\Service\CiscoWebexSyncer;
use LogicException;
use SplFileObject;
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
        self::facade();
        self::adapter();
        self::decorator();
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
            echo sprintf('Error: %s%s', $logicException->getMessage(), PHP_EOL);
        }

        echo "\n\n";
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
            echo "Error serializing item to JSON: {$throwable->getMessage()}\n\n";
        }

        try {
            echo "-- Serializing item to XML:\n";
            $itemXml = $itemSerializer->serialize($item, $xmlSerializer);
            echo sprintf('> File Name: %s%s', $itemXml->getFileName(), PHP_EOL);
            echo $itemXml->getContent() . PHP_EOL;
        } catch (Throwable $throwable) {
            echo sprintf('Error serializing item to XML: %s%s', $throwable->getMessage(), PHP_EOL);
        }

        echo "\n\n";
    }

    private static function facade(): void
    {
        echo "Structural | Facade\n";
        echo "-----------------------------------------\n\n";

        $adobeConnectSyncer = new AdobeConnectSyncer();
        $ciscoWebexSyncer   = new CiscoWebexSyncer();

        echo "-- Adobe connect create:\n";
        $adobeConnectVirtualMeeting = new AdobeConnectVirtualMeeting(
            new DateTimeImmutable(),
            60,
            [],
        );
        echo sprintf('> Before create: %s%s', $adobeConnectVirtualMeeting, PHP_EOL);
        $adobeConnectSyncer->create($adobeConnectVirtualMeeting);
        echo sprintf('> After create: %s%s', $adobeConnectVirtualMeeting, PHP_EOL);

        echo "-- Cisco webex create:\n";
        $ciscoWebexVirtualMeeting = new CiscoWebexVirtualMeeting(
            new DateTimeImmutable(),
            60,
            [],
        );
        echo sprintf('> Before create: %s%s', $ciscoWebexVirtualMeeting, PHP_EOL);
        $ciscoWebexSyncer->create($ciscoWebexVirtualMeeting);
        echo sprintf('> After create: %s%s', $ciscoWebexVirtualMeeting, PHP_EOL);

        try {
            echo "-- Try to use wrong syncer should not work\n";
            $ciscoWebexSyncer->create($adobeConnectVirtualMeeting);
        } catch (Throwable $throwable) {
            echo sprintf('Error: %s%s', $throwable->getMessage(), PHP_EOL);
        }

        echo "\n\n";
    }

    private static function adapter(): void
    {
        echo "Structural | Adapter\n";
        echo "-----------------------------------------\n\n";

        $amazonS3Syncer    = new AmazonS3Syncer();
        $fileStorageSyncer = new FileStorageSyncer();
        $filePath          = realpath('./') . DIRECTORY_SEPARATOR . 'rising_patterns.png';

        echo "-- Amazon S3 create:\n";
        $amazonS3Document = new AmazonS3Document(new SplFileObject($filePath));
        echo sprintf('> Before create: %s%s', $amazonS3Document, PHP_EOL);
        $amazonS3Syncer->save($amazonS3Document);
        echo sprintf('> After create: %s%s', $amazonS3Document, PHP_EOL);

        echo "-- File storage create:\n";
        $fileStorageDocument = new FileStorageDocument(new SplFileObject($filePath));
        echo sprintf('> Before create: %s%s', $fileStorageDocument, PHP_EOL);
        $fileStorageSyncer->save($fileStorageDocument);
        echo sprintf('> After create: %s%s', $fileStorageDocument, PHP_EOL);

        try {
            echo "-- Try to use wrong syncer should not work\n";
            $fileStorageSyncer->save($amazonS3Document);
        } catch (Throwable $throwable) {
            echo sprintf('Error: %s%s', $throwable->getMessage(), PHP_EOL);
        }

        echo "\n\n";
    }

    private static function decorator(): void
    {
        echo "Structural | Decorator\n";
        echo "-----------------------------------------\n\n";

        echo "-- Self item:\n";
        $item = new Structural\Decorator\Entity\Item(10, 2);
        echo sprintf('> Item strength [standalone strength * standalone factor] : %d%s', $item->getStrength(), PHP_EOL);

        echo "-- Enchanted item:\n";
        $enchantedItem = new EnchantedItem($item, 1.5);
        echo sprintf('> Enchanted item strength [standalone strength * standalone factor * enchanted factor]: %d%s', $enchantedItem->getStrength(), PHP_EOL);

        echo "-- God item:\n";
        $godItem = new GodItem($enchantedItem);
        echo sprintf('> God item strength [standalone strength * standalone factor * enchanted factor * god factor]: %d%s', $godItem->getStrength(), PHP_EOL);

        echo "-- God item from standalone item:\n";
        $godItem = new GodItem($item);
        echo sprintf('> God item strength [standalone strength * standalone factor * god factor]: %d%s', $godItem->getStrength(), PHP_EOL);
    }
}
