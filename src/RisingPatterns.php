<?php

namespace Jagfx\RisingPatterns;

use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Service\Enchanter;
use LogicException;

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
    }

    private static function simpleFactory(): void
    {
        echo "Creational | Factories | Simple Factory\n";
        echo "-----------------------------------------\n\n";

        $enchanter = new Enchanter();

        $book = $enchanter->build('The Art of War');
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
}
