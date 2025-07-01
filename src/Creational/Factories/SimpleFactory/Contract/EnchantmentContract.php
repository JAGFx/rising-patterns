<?php

namespace Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Contract;

use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Entity\Book;
use Jagfx\RisingPatterns\Creational\Factories\SimpleFactory\Entity\EnchantedBook;

interface EnchantmentContract
{
    public function buildEmptyBook(string $title): Book;

    public function enchant(Book $book, string $enchantment): EnchantedBook;
}
