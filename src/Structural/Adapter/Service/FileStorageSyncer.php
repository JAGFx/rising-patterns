<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Service;

use Jagfx\RisingPatterns\Structural\Adapter\Contract\DocumentContract;
use Jagfx\RisingPatterns\Structural\Adapter\Contract\DocumentSyncerContract;
use Jagfx\RisingPatterns\Structural\Adapter\Entity\FileStorageDocument;
use LogicException;

class FileStorageSyncer implements DocumentSyncerContract
{
    public function save(DocumentContract $document): void
    {
        if (!$document instanceof FileStorageDocument) {
            throw new LogicException('The document is not an FileStorageDocument object.');
        }

        $document->setTargetPath('/path/to/file-storage/');
    }

    public function remove(DocumentContract $document): void
    {
        if (!$document instanceof FileStorageDocument) {
            throw new LogicException('The document is not an FileStorageDocument object.');
        }

        $document->setTargetPath(null);
    }
}
