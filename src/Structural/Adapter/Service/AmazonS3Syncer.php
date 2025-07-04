<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Service;

use Jagfx\RisingPatterns\Structural\Adapter\Contract\DocumentContract;
use Jagfx\RisingPatterns\Structural\Adapter\Contract\DocumentSyncerContract;
use Jagfx\RisingPatterns\Structural\Adapter\Entity\AmazonS3Document;
use LogicException;

class AmazonS3Syncer implements DocumentSyncerContract
{
    public function save(DocumentContract $document): void
    {
        if (!$document instanceof AmazonS3Document) {
            throw new LogicException('The document is not an AmazonS3Document object.');
        }

        $document->setObjectKey('path/to/amazon-s3/document/');
        $document->setBucketName('my-amazon-s3-bucket');
    }

    public function remove(DocumentContract $document): void
    {
        if (!$document instanceof AmazonS3Document) {
            throw new LogicException('The document is not an AmazonS3Document object.');
        }

        $document->setObjectKey(null);
        $document->setBucketName(null);
    }
}
