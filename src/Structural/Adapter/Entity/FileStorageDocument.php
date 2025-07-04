<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Entity;

use Jagfx\RisingPatterns\Structural\Adapter\Contract\DocumentContract;
use SplFileObject;

class FileStorageDocument implements DocumentContract
{
    public function __construct(
        private SplFileObject $file,
        private ?string $targetPath = null,
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

    public function getTargetPath(): ?string
    {
        return $this->targetPath;
    }

    public function setTargetPath(?string $targetPath): void
    {
        $this->targetPath = $targetPath;
    }

    public function __toString(): string
    {
        return 'FileStorageDocument: ' . $this->getTargetPath();
    }
}
