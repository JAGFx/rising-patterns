<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Contract;

use SplFileObject;

interface DocumentContract
{
    public function getFile(): SplFileObject;
}
