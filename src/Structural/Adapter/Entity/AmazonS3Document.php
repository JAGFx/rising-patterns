<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Entity;

use Jagfx\RisingPatterns\Structural\Adapter\Contract\DocumentContract;
use SplFileObject;

class AmazonS3Document implements DocumentContract
{
    public function __construct(
        private SplFileObject $file,
        private ?string $objectKey = null,
        private ?string $bucketName = null,
    ) {
    }

    public function getFile(): SplFileObject
    {
        return $this->file;
    }

    public function setFile(SplFileObject $file): void
    {
        $this->file = $file;
    }

    public function getObjectKey(): ?string
    {
        return $this->objectKey;
    }

    public function setObjectKey(?string $objectKey): void
    {
        $this->objectKey = $objectKey;
    }

    public function getBucketName(): ?string
    {
        return $this->bucketName;
    }

    public function setBucketName(?string $bucketName): void
    {
        $this->bucketName = $bucketName;
    }

    public function __toString(): string
    {
        return sprintf('AmazonS3Document: %s in bucket %s', $this->getObjectKey(), $this->getBucketName());
    }
}
