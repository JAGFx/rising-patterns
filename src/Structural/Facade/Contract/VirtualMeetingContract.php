<?php

namespace Jagfx\RisingPatterns\Structural\Facade\Contract;

use DateTimeImmutable;

interface VirtualMeetingContract
{
    public function getExpectedAt(): DateTimeImmutable;

    public function getDurationInMinutes(): int;

    /**
     * @return AttendeeContract[]
     */
    public function getAttendees(): array;

    public function getRoomUrl(): ?string;
}
