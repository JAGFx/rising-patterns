<?php

namespace Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Service;

use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Contract\BookUsageContract;
use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Entity\Book;
use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Entity\EnchantedBook;
use LogicException;

class Enchanter implements BookUsageContract
{
    public function build(string $title): Book
    {
        return new Book($title);
    }

    public function enchant(Book $book, string $enchantment): EnchantedBook
    {
        if ($book instanceof EnchantedBook) {
            throw new LogicException('An enchanted book cannot be enchanted again.');
        }

        return new EnchantedBook($book->getTitle(), $enchantment);
    }
}
