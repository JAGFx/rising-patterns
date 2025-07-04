<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Contract;

interface DocumentSyncerContract
{
    public function save(DocumentContract $document): void;

    public function remove(DocumentContract $document): void;
}
