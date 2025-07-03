<?php

namespace Jagfx\RisingPatterns\Structural\Facade\Contract;

interface AttendeeContract
{
    public function getFullName(): string;

    public function getEmail(): string;
}
