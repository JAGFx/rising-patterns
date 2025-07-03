<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Contract;

interface AttendeeContract
{
    public function getFullName(): string;

    public function getEmail(): string;
}
